<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Helpers\UnitHelper;

class UnitHelperTest extends TestCase
{
    public function testMphToKnWithZeroMph()
    {
        $mph = 0;
        $this->assertEquals(0, UnitHelper::mphToKn($mph));
    }

    public function testMphToKnWithNegativeMph()
    {
        $mph = -10;
        $expectedKn = -8.68976;
        $this->assertEquals($expectedKn, UnitHelper::mphToKn($mph), '', 0.0001);
    }

    public function testMphToKnWithMaxFloatMph()
    {
        $mph = PHP_FLOAT_MAX;
        $expectedKn = $mph * 0.868976;
        $this->assertEquals($expectedKn, UnitHelper::mphToKn($mph));
    }

    public function testMphToKnWithNaNMph()
    {
        $mph = NAN;
        $this->assertNan(UnitHelper::mphToKn($mph));
    }

    public function testMphToKnWithInfinityMph()
    {
        $mph = INF;
        $this->assertInfinite(UnitHelper::mphToKn($mph));
    }

    public function testMphToKnWithNegativeInfinityMph()
    {
        $mph = -INF;
        $this->assertInfinite(UnitHelper::mphToKn($mph));
    }

    public function testFahrenheitToCelsiusWithZeroFahrenheit()
    {
        $fahrenheit = 0;
        $this->assertEquals(-17.8, UnitHelper::fahrenheitToCelsius($fahrenheit));
    }

    public function testFahrenheitToCelsiusWithPositiveFahrenheit()
    {
        $fahrenheit = 68;
        $expectedCelsius = 20;
        $this->assertEquals($expectedCelsius, UnitHelper::fahrenheitToCelsius($fahrenheit));
    }

    public function testFahrenheitToCelsiusWithNegativeFahrenheit()
    {
        $fahrenheit = -22;
        $expectedCelsius = -30;
        $this->assertEquals($expectedCelsius, UnitHelper::fahrenheitToCelsius($fahrenheit));
    }

    public function testFahrenheitToCelsiusWithFractionalFahrenheit()
    {
        $fahrenheit = 86.5;
        $expectedCelsius = 30.3;
        $this->assertEquals($expectedCelsius, UnitHelper::fahrenheitToCelsius($fahrenheit), '', 0.1);
    }

    public function testFahrenheitToCelsiusWithMaxFloatFahrenheit()
    {
        $fahrenheit = PHP_FLOAT_MAX;
        $expectedCelsius = round(($fahrenheit - 32) * 5 / 9, 1);
        $this->assertEquals($expectedCelsius, UnitHelper::fahrenheitToCelsius($fahrenheit));
    }

    public function testFahrenheitToCelsiusWithNaNFahrenheit()
    {
        $fahrenheit = NAN;
        $this->assertNan(UnitHelper::fahrenheitToCelsius($fahrenheit));
    }

    public function testFahrenheitToCelsiusWithInfinityFahrenheit()
    {
        $fahrenheit = INF;
        $this->assertInfinite(UnitHelper::fahrenheitToCelsius($fahrenheit));
    }

    public function testFahrenheitToCelsiusWithNegativeInfinityFahrenheit()
    {
        $fahrenheit = -INF;
        $this->assertInfinite(UnitHelper::fahrenheitToCelsius($fahrenheit));
    }

    public function testInHgToHPaWithZeroInHg()
    {
        $inHg = 0;
        $this->assertEquals(0, UnitHelper::inHgToHPa($inHg));
    }

    public function testInHgToHPaWithPositiveInHg()
    {
        $inHg = 29.92;
        $expectedHPa = 1013;
        $this->assertEquals($expectedHPa, UnitHelper::inHgToHPa($inHg));
    }

    public function testInHgToHPaWithNegativeInHg()
    {
        $inHg = -10;
        $expectedHPa = -339;
        $this->assertEquals($expectedHPa, UnitHelper::inHgToHPa($inHg));
    }

    public function testInHgToHPaWithMaxFloatInHg()
    {
        $inHg = PHP_FLOAT_MAX;
        $expectedHPa = round($inHg * 33.8638866667, 0);
        $this->assertEquals($expectedHPa, UnitHelper::inHgToHPa($inHg));
    }

    public function testInHgToHPaWithNaNInHg()
    {
        $inHg = NAN;
        $this->assertNan(UnitHelper::inHgToHPa($inHg));
    }

    public function testInHgToHPaWithInfinityInHg()
    {
        $inHg = INF;
        $this->assertInfinite(UnitHelper::inHgToHPa($inHg));
    }

    public function testInHgToHPaWithNegativeInfinityInHg()
    {
        $inHg = -INF;
        $this->assertInfinite(UnitHelper::inHgToHPa($inHg));
    }

    public function testInToMmWithZeroInches()
    {
        $inches = 0;
        $this->assertEquals(0, UnitHelper::inToMm($inches));
    }

    public function testInToMmWithPositiveInches()
    {
        $inches = 5;
        $expectedMm = 127;
        $this->assertEquals($expectedMm, UnitHelper::inToMm($inches));
    }

    public function testInToMmWithNegativeInches()
    {
        $inches = -3;
        $expectedMm = -76;
        $this->assertEquals($expectedMm, UnitHelper::inToMm($inches));
    }

    public function testCalculateWindDirectionWithZeroWindDirection()
    {
        $windDirection = 0;
        $this->assertEquals('N', UnitHelper::calculateWindDirection($windDirection));
    }

    public function testCalculateWindDirectionWithPositiveWindDirection()
    {
        $windDirection = 180;
        $expectedDirection = 'S';
        $this->assertEquals($expectedDirection, UnitHelper::calculateWindDirection($windDirection));
    }

    public function testCalculateWindDirectionWithFractionalWindDirection()
    {
        $windDirection = 337.5;
        $expectedDirection = 'NNW';
        $this->assertEquals($expectedDirection, UnitHelper::calculateWindDirection($windDirection));
    }
}
