<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{
    //
    public function index()
    {
        $reservations= Reservation::all();

        return response()->json([ 'data' => $reservations ], 200);
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);

        return response()->json([ 'data' => $reservation ], 200);
    }

    public function store(Request $request)
    {
        $values = $request->only('books_id', 'users_id', 'created_date');

        $reservation = Reservation::create($values);
        
        return response()->json(['message' => 'Reservation is correctly added'], 201);
    }

    public function update(Request $request, $id)
    {
        $reservation= Reservation::find($id);
        $reservation->save();

        return response()->json(['message' => 'The reservation has been updated'], 200);
    }

    public function destroy($id)
    {
        $reservation= Reservation::find($id);

        return response()->json([ 'message' => 'The reservation has been deleted'], 200);
    }
}
