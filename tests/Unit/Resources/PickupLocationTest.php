<?php

namespace Tests\Unit\Resources;

use Tests\TestCase;
use Mvdnbrk\MyParcel\Resources\PickupLocation;

class PickupLocationTest extends TestCase
{
    /** @test */
    public function can_get_distance_for_humans()
    {
        $pickup = new PickupLocation;

        $pickup->distance = 999;
        $this->assertEquals('999 meter', $pickup->distanceForHumans());

        $pickup->distance = 1000;
        $this->assertEquals('1 km', $pickup->distanceForHumans());

        $pickup->distance = 1500;
        $this->assertEquals('1.5 km', $pickup->distanceForHumans());

        $pickup->distance = 2211;
        $this->assertEquals('2.2 km', $pickup->distanceForHumans());

        $pickup->distance = 2255;
        $this->assertEquals('2.3 km', $pickup->distanceForHumans());

        $pickup->distance = 11500;
        $this->assertEquals('12 km', $pickup->distanceForHumans());
    }

    /** @test */
    public function to_array()
    {
        $pickup = new PickupLocation([
            'name' => 'Test name',
            'phone' => '0101111111',
            'location_code' => 'testcode1234',
            'opening_hours' => [],
            'latitude' => 1.11,
            'longitude' => 2.22,
            'distance' => 100,
        ]);

        $array = $pickup->toArray();

        $this->assertInternalType('array', $array);
        $this->assertEquals('Test name', $array['name']);
        $this->assertEquals('0101111111', $array['phone']);
        $this->assertEquals('testcode1234', $array['location_code']);
        $this->assertEquals([], $array['opening_hours']);
        $this->assertEquals(1.11, $array['latitude']);
        $this->assertEquals(2.22, $array['longitude']);
        $this->assertEquals('100 meter', $array['distance']);
    }
}
