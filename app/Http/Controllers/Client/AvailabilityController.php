<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class AvailabilityController extends Controller
{
    function checkRoomAvailability(Request $request) {}

    function showAvailableRooms(Request $request)
    {
        $data = $request->input();
        $query = 'select r.* from rooms r where r.id NOT IN(
                SELECT room_id from reservations b where 
                b.room_id=r.id AND
                b.status = "confirmed" AND
                b.check_out > :checkIn AND
                b.check_in < :checkOut 
            )';
        $rooms = DB::select(
            $query,
            $data
        );

        dd($rooms);
    }
}
