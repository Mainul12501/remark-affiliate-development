@extends('front.master')

@section('title', "Login")

@section('body')
    <!-- Login Section -->
    <section class="login-section">
        <div class="login-container">
            <h1 class="login-title">Login</h1>
            <form action="" method="get">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email Address" >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="******" >
                </div>
                <button type="submit" class="btn-login">Login</button>
                <div class="forgot-password-link">
                    <a href="#">Forgot password?</a>
                </div>
                <div class="create-account-link">
                    <a href="#">Create an account</a>
                </div>
            </form>
        </div>
    </section>
@endsection
