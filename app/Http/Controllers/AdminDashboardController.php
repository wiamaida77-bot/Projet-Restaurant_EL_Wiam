<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Reservation;
use App\Models\ContactMessage;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'menu_items' => MenuItem::count(),
            'available_items' => MenuItem::where('is_available', true)->count(),
            'pending_reservations' => Reservation::where('status', 'pending')->count(),
            'total_reservations' => Reservation::count(),
            'unread_messages' => ContactMessage::count(),
        ];

        $recentReservations = Reservation::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentReservations', 'recentMessages'));
    }
}
