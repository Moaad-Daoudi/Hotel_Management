<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Amenity;
use Illuminate\Database\Seeder;

class HotelsAndRoomsSeeder extends Seeder
{
    public function run(): void
    {
        $hotelAmenities = Amenity::factory()->createMany([
            ['name' => 'Swimming Pool', 'category' => 'hotel'],
            ['name' => 'Free WiFi', 'category' => 'hotel'],
            ['name' => 'Gym', 'category' => 'hotel'],
            ['name' => 'Parking', 'category' => 'hotel'],
        ]);
        $roomAmenities = Amenity::factory()->createMany([
            ['name' => 'Air Conditioning', 'category' => 'room'],
            ['name' => 'Mini Bar', 'category' => 'room'],
            ['name' => 'Safe Box', 'category' => 'room'],
        ]);

        Hotel::factory(5)->create()->each(function ($hotel) use ($hotelAmenities, $roomAmenities) {
            $hotel->amenities()->attach($hotelAmenities->random(2)->pluck('id'));

            $roomTypes = RoomType::factory(4)->create(['hotel_id' => $hotel->id]);
            $roomTypes->each(function ($type) use ($roomAmenities) {
                $type->amenities()->attach($roomAmenities->random(2)->pluck('id'));
                Room::factory(5)->create([
                    'hotel_id' => $type->hotel_id,
                    'room_type_id' => $type->id,
                ]);
            });
        });
    }
}
