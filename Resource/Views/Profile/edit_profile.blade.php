@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-card">

        @if($errors->any())
            <ul class="alert error">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h2>
                        <input type="text" name="name" value="{{ old('name', $profile->name) }}" required>
                    </h2>

                    <div class="profile-meta">
                        <input type="text" name="batch" value="{{ old('batch', $profile->batch) }}" required>
                        <input type="text" name="department" value="{{ old('department', $profile->department) }}" required>
                    </div>

                    <div class="profile-details">
                        <div>
                            <strong>Current Workplace:</strong>
                            <input type="text" name="workplace" value="{{ old('workplace', $profile->workplace) }}">
                        </div>
                        <div>
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ old('email', $profile->email) }}" required>
                        </div>
                        <div>
                            <strong>Phone:</strong>
                            <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" required>
                        </div>
                    </div>

                    <div class="social-links edit">
                        <input type="url" name="linkedin" placeholder="LinkedIn URL" value="{{ old('linkedin', $profile->linkedin) }}">
                        <input type="url" name="twitter" placeholder="Twitter URL" value="{{ old('twitter', $profile->twitter) }}">
                        <input type="url" name="github" placeholder="GitHub URL" value="{{ old('github', $profile->github) }}">
                        <input type="url" name="website" placeholder="Website URL" value="{{ old('website', $profile->website) }}">
                    </div>

                    <div class="profile-photo-upload">
                        <label for="profile_photo">Upload Profile Photo:</label>
                        <input type="file" name="profile_photo" id="profile_photo" accept="image/*">
                    </div>

                    <button type="submit" class="btn primary full-width">Save Changes</button>
                    <a href="{{ route('profile.show') }}" class="btn">Cancel</a>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
