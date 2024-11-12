@extends('layouts.clear')

@section('title', '404 Not Found')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen mx-auto">
        <img src="{{ asset('images/404.svg') }}" alt="Logo" class="w-60 h-auto mb-4">
    <h1 class="text-4xl font-bold text-gray-800 mb-2">404 - Page Not Found</h1>
        <p class="text-lg text-gray-600 mb-6">Oops! Halaman yang Anda cari tidak bisa ditemukan.</p>
        <a href="{{ url('/') }}" class="bg-secondary-900 rounded-xl text-white px-6 py-3 hover:bg-secondary-950">
            Kembali ke Home
        </a>
    </div>
@endsection
