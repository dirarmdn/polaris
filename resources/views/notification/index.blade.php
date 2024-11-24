@extends('layouts.dashboard')

@section('title', 'Notifikasi')

@section('content')
<div class="container mx-auto mt-0 max-w-6xl">
    <h2 class="text-2xl font-semibold mb-4 mt-6">Notifikasi</h2>
    <hr class="border-gray-300 mb-10">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar Filter -->
        <div class="w-full md:w-[35%] border-r border-gray-200 pr-3 mb-6 md:mb-0">
            <div class="container px-4 border border-gray-300 p-4 rounded-lg max-w-xs ml-0">
                <!-- Form untuk Tandai Semua Notifikasi -->
                <form action="{{ route('notifications.markAllRead') }}" method="POST">
                @csrf
                <button type="submit" class="bg-gray-100 text-gray-600 py-2 px-4 text-sm rounded-lg mb-6 hover:bg-gray-200 flex items-center justify-center w-auto">
                    Tandai semua sebagai terbaca
                </button>
            </form>

                <hr class="border-gray-300 mb-5">
                <form method="GET" action="{{ route('notifications') }}">
                    <h5 class="text-lg font-semibold mb-4">Status</h5>
                    <div class="space-y-2 mb-4">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="all" {{ request('status') === 'all' ? 'checked' : '' }}>
                            <span>Semua</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="unread" {{ request('status') === 'unread' ? 'checked' : '' }}>
                            <span>Belum dibaca</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="status" value="read" {{ request('status') === 'read' ? 'checked' : '' }}>
                            <span>Sudah dibaca</span>
                        </label>
                    </div>

                    <hr class="border-gray-300 mb-4">

                    <h5 class="text-lg font-semibold mb-4">Urut Berdasarkan</h5>
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="urut" value="desc" {{ request('urut') === 'desc' ? 'checked' : '' }}>
                            <span>Terbaru</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="urut" value="asc" {{ request('urut') === 'asc' ? 'checked' : '' }}>
                            <span>Terlama</span>
                        </label>
                    </div>
                    <button type="submit" class="mt-4 bg-primary-900 text-white py-2 px-4 rounded-lg">
                        Terapkan Filter
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4 pl-0 md:pl-12">
            @if($notifications->isEmpty())
                <div class="text-center">
                    <img src="https://via.placeholder.com/200" alt="No Notifications" class="mx-auto mb-6">
                    <p class="text-gray-500 mb-4">Belum ada notifikasi baru untuk Anda</p>
                    <a href="/" class="bg-primary-900 text-white py-2 px-6 rounded-lg hover:bg-indigo-700">
                        Kembali ke Halaman Utama
                    </a>
                </div>
            @else
                <ul>
                @foreach ($notifications as $notification)
                <li class="p-4 mb-4 border rounded {{ $notification->isRead ? 'bg-gray-100' : 'bg-white' }}">
                    {{ $notification->message }}
                    <span class="text-xs text-gray-500 float-right">
                        {{ $notification->created_at ? $notification->created_at->diffForHumans() : 'No timestamp' }}
                    </span>
                </li>
            @endforeach

                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
