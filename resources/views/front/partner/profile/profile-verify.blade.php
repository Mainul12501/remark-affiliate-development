@extends('front.master')

@section('title', 'Partner Profile Verify')

@section('body')
    <!-- Profile Section -->
    <section class="partner-profile-section">
        <div class="partner-profile-container">
            <form action="{{ route('partner.profile') }}">
                <h2 class="partner-upload-heading">Upload Your Profile Picture</h2>

                <!-- Profile Picture Upload -->
                <div class="partner-profile-picture-box">
                    <svg class="partner-profile-icon" viewBox="0 0 140 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="70" cy="45" r="25" fill="#5DADE2"/>
                        <path d="M30 110 C30 85, 45 75, 70 75 C95 75, 110 85, 110 110 Z" fill="#5DADE2"/>
                    </svg>
                </div>
                <button class="partner-btn-upload">Upload</button>

                <!-- Name Input -->
                <div>
                    <label class="partner-form-label">Name</label>
                    <input type="text" class="partner-form-input" placeholder="">
                </div>

                <!-- Bio Textarea -->
                <div>
                    <label class="partner-form-label">Bio</label>
                    <textarea class="partner-form-textarea" placeholder=""></textarea>
                </div>

                <!-- Submit Button -->
                <button class="partner-btn-submit">Submit</button>
            </form>
        </div>
    </section>
@endsection
