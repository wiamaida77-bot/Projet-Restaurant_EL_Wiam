@extends('admin.layouts.app')

@section('title', 'View Message - Admin')
@section('page-title', 'View Message')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">
                        {{ $contactMessage->subject ?: 'No subject' }}
                    </h2>
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        <span><strong>From:</strong> {{ $contactMessage->full_name }}</span>
                        <span><strong>Email:</strong> {{ $contactMessage->email }}</span>
                        <span><strong>Date:</strong> {{ $contactMessage->created_at->format('M d, Y H:i') }}</span>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="mailto:{{ $contactMessage->email }}" class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition-colors text-sm">
                        Reply
                    </a>
                    <form action="/admin/messages/{{ $contactMessage->id }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            <div class="prose max-w-none">
                <p class="text-gray-800 whitespace-pre-wrap">{{ $contactMessage->message }}</p>
            </div>
        </div>
    </div>
    
    <div class="mt-4">
        <a href="/admin/messages" class="text-orange-600 hover:text-orange-700 hover:underline font-medium">
            ← Back to Messages
        </a>
    </div>
</div>
@endsection
