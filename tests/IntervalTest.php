<?php

declare(strict_types=1);

namespace Stadly\Date;

use DateInterval;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Stadly\Date\Interval
 * @covers ::<protected>
 * @covers ::<private>
 */
final class IntervalTest extends TestCase
{
    /**
     * @covers ::compare
     */
    public function testCanCompareEqualIntervals(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M98DT83H233M98S');

        self::assertEquals(0, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareSecondShorterInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M98DT83H233M97S');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMinuteShorterInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M98DT83H232M98S');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareHourShorterInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M98DT82H233M98S');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareDayShorterInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M97DT83H233M98S');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMonthShorterInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y22M98DT83H233M98S');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareYearShorterInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P10Y23M98DT83H233M98S');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareSecondLongerInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M98DT83H233M99S');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMinuteLongerInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M98DT83H234M98S');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareHourLongerInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M98DT84H233M98S');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareDayLongerInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y23M99DT83H233M98S');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMonthLongerInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P11Y24M98DT83H233M98S');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareYearLongerInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $b = new DateInterval('P12Y23M98DT83H233M98S');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareEqualNegativeIntervals(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M98DT83H233M98S');
        $b->invert = 1;

        self::assertEquals(0, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareSecondShorterNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M98DT83H233M97S');
        $b->invert = 1;

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMinuteShorterNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M98DT83H232M98S');
        $b->invert = 1;

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareHourShorterNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M98DT82H233M98S');
        $b->invert = 1;

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareDayShorterNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M97DT83H233M98S');
        $b->invert = 1;

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMonthShorterNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y22M98DT83H233M98S');
        $b->invert = 1;

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareYearShorterNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P10Y23M98DT83H233M98S');
        $b->invert = 1;

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareSecondLongerNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M98DT83H233M99S');
        $b->invert = 1;

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMinuteLongerNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M98DT83H234M98S');
        $b->invert = 1;

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareHourLongerNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M98DT84H233M98S');
        $b->invert = 1;

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareDayLongerNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y23M99DT83H233M98S');
        $b->invert = 1;

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareMonthLongerNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P11Y24M98DT83H233M98S');
        $b->invert = 1;

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testCanCompareYearLongerNegativeInterval(): void
    {
        $a = new DateInterval('P11Y23M98DT83H233M98S');
        $a->invert = 1;
        $b = new DateInterval('P12Y23M98DT83H233M98S');
        $b->invert = 1;

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testNegativeIntervalIsLessThanPositiveInterval(): void
    {
        $a = new DateInterval('P1D');
        $a->invert = 1;
        $b = new DateInterval('P1D');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testPositiveIntervalIsGreaterThanNegativeInterval(): void
    {
        $a = new DateInterval('P1D');
        $b = new DateInterval('P1D');
        $b->invert = 1;

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function test27DaysIsShorterThan1Month(): void
    {
        $a = new DateInterval('P27D');
        $b = new DateInterval('P1M');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function test28DaysIsNotComparableWithMonth(): void
    {
        $a = new DateInterval('P28D');
        $b = new DateInterval('P1M');

        self::assertNull(Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function test29DaysIsNotComparableWithMonth(): void
    {
        $a = new DateInterval('P29D');
        $b = new DateInterval('P1M');

        self::assertNull(Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function test30DaysIsNotComparableWithMonth(): void
    {
        $a = new DateInterval('P30D');
        $b = new DateInterval('P1M');

        self::assertNull(Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function test31DaysIsNotComparableWithMonth(): void
    {
        $a = new DateInterval('P31D');
        $b = new DateInterval('P1M');

        self::assertNull(Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function test32DaysIsLongerThan1Month(): void
    {
        $a = new DateInterval('P32D');
        $b = new DateInterval('P1M');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testLessThan28DaysIsShorterThan1Month(): void
    {
        $a = new DateInterval('P27DT59M59S');
        $b = new DateInterval('P1M');

        self::assertLessThanOrEqual(-1, Interval::compare($a, $b));
    }

    /**
     * @covers ::compare
     */
    public function testMoreThan31DaysIsLongerThan1Month(): void
    {
        $a = new DateInterval('P31DT1S');
        $b = new DateInterval('P1M');

        self::assertGreaterThanOrEqual(1, Interval::compare($a, $b));
    }
}
