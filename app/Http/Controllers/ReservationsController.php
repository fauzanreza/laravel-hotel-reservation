<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Models\Reservations;
use App\Models\Hotels;
use App\Models\Rooms;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationsController extends Controller
{
    public function index()
    {
        return ReservationResource::collection(Reservations::paginate(5));
    }

    public function store(Request $request)
    {
        $hotel = Hotels::find($request->hotel_id);
        $room = Rooms::find($request->room_id);

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|integer',
            'customer_email' => 'required|array',
            'customer_phone' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'status' => 'required|boolean'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' =>
            $validator->errors()], 400);
        }

        $hotel_id = $hotel->id;
        $room_id = $room->id;
        $customer_name = $request->input('customer_name');
        $customer_email = $request->input('customer_email');
        $customer_phone = $request->input('customer_phone');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $status = $request->input('status');

        $reservation = Reservations::create([
            'hotel_id' => $hotel_id,
            'room_id' => $room_id,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_phone' => $customer_phone,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'status' => $status,
        ]);
            return response()->json([
                'data' => new ReservationResource($reservation)
            ], 201);
    }

    public function show(Reservations $reservation)
    {
    return new ReservationResource($reservation);
    }

    public function update(Request $request, Reservations $reservation)
    {
        $hotel = Hotels::find($request->hotel_id);
        $room = Rooms::find($request->room_id);

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|integer',
            'customer_email' => 'required|array',
            'customer_phone' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'status' => 'required|boolean'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' =>
            $validator->errors()], 400);
        }

        $hotel_id = $hotel->id;
        $room_id = $room->id;
        $customer_name = $request->input('customer_name');
        $customer_email = $request->input('customer_email');
        $customer_phone = $request->input('customer_phone');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $status = $request->input('status');

        $reservation = Reservations::create([
            'hotel_id' => $hotel_id,
            'room_id' => $room_id,
            'customer_name' => $customer_name,
            'customer_email' => $customer_email,
            'customer_phone' => $customer_phone,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'status' => $status,
        ]);
            return response()->json([
                'data' => new ReservationResource($reservation)
            ], 200);
    }

    public function destroy(Reservations $reservation)
    {
        $reservation->delete();
        return response()->json(null,204);
     }
}
