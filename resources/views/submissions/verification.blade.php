@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="bg-white p-10 rounded-xl shadow-lg w-96">
        <h2 class="text-center text-lg font-semibold mb-4">PLEASE VERIFY YOUR EMAIL ADDRESS</h2>

        <div class="flex justify-center mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/1000/1000035.png" alt="Email" class="h-12 w-12">
        </div>

        <p class="text-center text-sm mb-6">Enter your corporate email address to receive a verification code</p>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('send.verification.code') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="email" name="email" placeholder="Enter corporate email address"
                    class="w-full border border-gray-300 p-2 rounded">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700">
                    SEND VERIFICATION CODE
                </button>
            </div>
        </form>
    </div>
</div>
@endsection