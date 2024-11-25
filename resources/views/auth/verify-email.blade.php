@extends('layouts.clear')

@section('title', 'POLARIS | Verify Email')

@section('content')
<div class="flex items-center justify-center min-h-screen w-screen bg-cover bg-center bg-gray-100" style="background-image: url('{{ asset('images/SignUp_BG.png') }}')">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <!-- Polaris Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/Logo.png') }}" alt="Polaris Logo" class="h-16 w-18">
        </div>

        <!-- Verification Message -->
        <div class="text-center mb-4">
            <h1 class="text-2xl font-semibold text-gray-700 mb-2">Verify Your Email</h1>
            <p class="text-gray-600">Please verify your email through the link we’ve sent to your inbox.</p>
        </div>

        <!-- Resend Email -->
        <div class="text-center">
            <p class="text-gray-600 mb-4">Didn't receive the email?</p>
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    Send Again
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
