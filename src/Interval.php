<?php

declare(strict_types=1);

namespace Stadly\Date;

use DateInterval;

final class Interval
{
    /**
     * @param DateInterval $a First date interval to compare.
     * @param DateInterval $b Second date interval to compare.
     * @return int|null 0 if $a == $b, < 0 if $a < b, > 0 if $a > $b, null if undetermined.
     */
    public static function compare(DateInterval $a, DateInterval $b): ?int
    {
        $aSeconds = self::getSecondsInInterval($a);
        $aMonths = self::getMonthsInInterval($a);
        $bSeconds = self::getSecondsInInterval($b);
        $bMonths = self::getMonthsInInterval($b);

        $minSecondsPerMonth = 28 * 24 * 60 * 60;
        $maxSecondsPerMonth = 31 * 24 * 60 * 60;

        if ($aSeconds === $bSeconds || $aMonths === $bMonths) {
            return $aSeconds + $aMonths <=> $bSeconds + $bMonths;
        }

        if ($aSeconds + $maxSecondsPerMonth * $aMonths < $bSeconds + $minSecondsPerMonth * $bMonths) {
            return -1;
        }

        if ($bSeconds + $maxSecondsPerMonth * $bMonths < $aSeconds + $minSecondsPerMonth * $aMonths) {
            return 1;
        }

        return null;
    }

    /**
     * @param DateInterval $interval Date interval.
     * @return int Number of months in the date interval.
     */
    private static function getMonthsInInterval(DateInterval $interval): int
    {
        $years = $interval->y;
        $months = $years * 12 + $interval->m;

        if ($interval->invert === 1) {
            return -$months;
        }

        return $months;
    }

    /**
     * @param DateInterval $interval Date interval.
     * @return float Number of seconds in the date interval.
     */
    private static function getSecondsInInterval(DateInterval $interval): float
    {
        $days = $interval->d;
        $hours = $days * 24 + $interval->h;
        $minutes = $hours * 60 + $interval->i;
        $seconds = $minutes * 60 + $interval->s + $interval->f;

        if ($interval->invert === 1) {
            return -$seconds;
        }

        return $seconds;
    }
}
