@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profile</h1>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <!-- Tambahkan informasi profil pengguna sesuai kebutuhan -->
    </div>
@endsection