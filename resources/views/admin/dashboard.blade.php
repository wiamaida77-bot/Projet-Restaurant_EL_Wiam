@extends('admin.layouts.app')

@section('title', 'Dashboard - Admin')
@section('page-title', 'Dashboard')

@section('content')
<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-full">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Menu Items</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['menu_items'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Available Items</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['available_items'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-full">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Pending Reservations</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['pending_reservations'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-full">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Messages</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['unread_messages'] }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Reservations -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Recent Reservations</h2>
        </div>
        <div class="p-6">
            @if($recentReservations->count() > 0)
                <div class="space-y-4">
                    @foreach($recentReservations as $reservation)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                            <div>
                                <p class="font-medium text-gray-900">{{ $reservation->full_name }}</p>
                                <p class="text-sm text-gray-600">{{ $reservation->reservation_date->format('M d, Y') }} at {{ $reservation->reservation_time }}</p>
                                <p class="text-sm text-gray-600">{{ $reservation->guests }} guests</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($reservation->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($reservation->status === 'confirmed') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="/admin/reservations" class="text-orange-600 hover:text-orange-700 hover:underline text-sm font-medium">
                        View all reservations →
                    </a>
                </div>
            @else
                <p class="text-gray-500 text-center py-4">No reservations yet</p>
            @endif
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Recent Messages</h2>
        </div>
        <div class="p-6">
            @if($recentMessages->count() > 0)
                <div class="space-y-4">
                    @foreach($recentMessages as $message)
                        <div class="p-3 bg-gray-50 rounded">
                            <div class="flex justify-between items-start mb-2">
                                <p class="font-medium text-gray-900">{{ $message->full_name }}</p>
                                <p class="text-xs text-gray-500">{{ $message->created_at->format('M d, Y') }}</p>
                            </div>
                            @if($message->subject)
                                <p class="text-sm font-medium text-gray-700 mb-1">{{ $message->subject }}</p>
                            @endif
                            <p class="text-sm text-gray-600">{{ Str::limit($message->message, 100) }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $message->email }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="/admin/messages" class="text-orange-600 hover:text-orange-700 hover:underline text-sm font-medium">
                        View all messages →
                    </a>
                </div>
            @else
                <p class="text-gray-500 text-center py-4">No messages yet</p>
            @endif
        </div>
    </div>
</div>
@endsection
