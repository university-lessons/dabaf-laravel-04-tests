<?php

namespace Tests\Unit;

use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoomTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_room_can_be_created_with_attributes(): void
    {
        $room = new Room(['number' => 2, 'isReserved' => false]);
        
        $this->assertEquals(2, $room->number);
        $this->assertEquals(false, $room->isReserved);
    }

    public function test_a_room_can_be_modified(): void
    {
        $room = new Room(['number' => 2, 'isReserved' => false]);
        $this->assertEquals(false, $room->isReserved);

        $room->isReserved = true;

        $this->assertEquals(true, $room->isReserved);
    }

    public function test_a_room_can_be_persisted(): void
    {
        $room = new Room(['number' => 2, 'isReserved' => false]);
        
        $this->assertCount(0, Room::all());
        
        $room->save();

        $this->assertCount(1, Room::all());
    }

    public function test_a_room_can_be_generated_by_factory(): void
    {
        // make in memory
        $room = Room::factory()->make();
        $this->assertCount(0,Room::all());

        // save to database
        $room2 = Room::factory()->create();
        $this->assertCount(1,Room::all());
    }
}
