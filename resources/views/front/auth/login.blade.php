@extends('front.master')

@section('title', "Login")

@section('body')
    <!-- Login Section -->
    <section class="login-section">
        <div class="login-container">
            <h1 class="login-title">Login</h1>
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="email_phone" class="form-control" value="{{ old('email_phone') }}" placeholder="Email Or Phone Number" >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" >
                </div>
                <button type="submit" class="btn-login">Login</button>
                <div class="forgot-password-link">
                    <a href="#">Forgot password?</a>
                </div>
                <div class="create-account-link">
                    <a href="{{ route('auth.influencer-register') }}">Create an account</a>
                </div>
            </form>
        </div>
    </section>
@endsection

