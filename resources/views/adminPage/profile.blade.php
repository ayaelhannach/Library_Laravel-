<!-- resources/views/admin/profile.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="admin-profile">
        <div class="card">
            <div class="profile-details">
                <img src="{{ asset('images/' . Auth::user()->profile_image) }}" alt="Profile" />
                <h3>{{ Auth::user()->name }}</h3>
                <p>{{ Auth::user()->email }}</p>
                <button>Edit Profile</button>
            </div>
        </div>
    </div>
@endsection
