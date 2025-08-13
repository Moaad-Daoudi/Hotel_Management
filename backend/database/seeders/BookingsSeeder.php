<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BookingsSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = Room::where('status', 'available')->get();
        $guests = Guest::factory(50)->create();

        foreach ($rooms->random(30) as $room) {
            $checkIn = Carbon::now()->subDays(rand(1, 30));
            $nights = rand(2, 7);
            $checkOut = $checkIn->copy()->addDays($nights);

            $booking = Booking::factory()->create([
                'hotel_id' => $room->hotel_id,
                'room_id' => $room->id,
                'guest_id' => $guests->random()->id,
                'check_in_date' => $checkIn,
                'check_out_date' => $checkOut,
                'total_amount' => $room->roomType->base_price * $nights,
                'status' => 'checked_out',
            ]);

            $invoice = Invoice::factory()->create([
                'booking_id' => $booking->id,
                'guest_id' => $booking->guest_id,
                'total_amount' => $booking->total_amount,
                'status' => 'paid',
            ]);

            Payment::factory()->create([
                'invoice_id' => $invoice->id,
                'booking_id' => $booking->id,
                'amount' => $invoice->total_amount,
                'status' => 'completed',
            ]);

            $room->update(['status' => 'available', 'cleaning_status' => 'dirty']);
        }
    }
}
