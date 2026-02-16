<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation->update($validated);

        return redirect('/admin/reservations')->with('success', 'Reservation status updated successfully!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('/admin/reservations')->with('success', 'Reservation deleted successfully!');
    }
}
