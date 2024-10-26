@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Email</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('send.verification.code') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Perusahaan</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Kode Verifikasi</button>
                    </form>

                    <hr>

                    <form method="POST" action="{{ route('verify.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="verification_code">Kode Verifikasi</label>
                            <input type="text" class="form-control" id="verification_code" name="verification_code" required>
                        </div>
                        <button type="submit" class="btn btn-success">Verifikasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection