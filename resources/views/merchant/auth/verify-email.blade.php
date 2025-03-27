{{-- filepath: e:\php\laravelProject\udemyCoursesProjects\verification\resources\views\merchant\auth\verify-email.blade.php --}}
@extends('merchant.auth.master')
@section('title', 'Verify Email')
@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="card-body">
            @include('merchant.auth.logo')

            <div class="mb-4 text-center text-muted">
                <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-center" role="alert">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('merchant.verification.send') }}" class="w-45">
                    @csrf
                    <button class="btn btn-primary btn-block">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('merchant.logout') }}" class="w-45">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-block">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection