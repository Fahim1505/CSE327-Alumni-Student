@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-card">

        @if(session('success'))
            <p class="alert success">{{ session('success') }}</p>
        @endif

        <div class="profile-header">
            <div class="profile-photo">
                @if($profile->profile_photo)
                    <img src="{{ asset('storage/' . $profile->profile_photo) }}" alt="Profile Photo">
                @else
                    <div class="profile-photo-placeholder">
                        {{ strtoupper(substr($profile->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <div class="profile-info">
                <h2>{{ $profile->name }}</h2>

                <div class="profile-meta">
                    <span class="chip">{{ $profile->batch }}</span>
                    <span class="chip">{{ $profile->department }}</span>
                </div>

                <div class="profile-details">
                    <div><strong>Current Workplace</strong> {{ $profile->workplace }}</div>
                    <div><strong>Email</strong> {{ $profile->email }}</div>
                    <div><strong>Phone</strong> {{ $profile->phone }}</div>
                </div>

                <div class="social-links">
                    @if($profile->linkedin)
                        <a href="{{ $profile->linkedin }}" target="_blank">LinkedIn</a>
                    @endif
                    @if($profile->twitter)
                        <a href="{{ $profile->twitter }}" target="_blank">Twitter</a>
                    @endif
                    @if($profile->github)
                        <a href="{{ $profile->github }}" target="_blank">GitHub</a>
                    @endif
                    @if($profile->website)
                        <a href="{{ $profile->website }}" target="_blank">Website</a>
                    @endif
                </div>
            </div>

            <div class="profile-actions">
                <a href="{{ route('profile.edit') }}" class="btn primary">Edit Profile</a>
            </div>
        </div>

    </div>
</div>
@endsection
