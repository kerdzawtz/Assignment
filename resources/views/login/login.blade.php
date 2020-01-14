@extends('layouts.app')

@section('login')
<div class="col-md-6 offset-md-6">
    <form class="form-login form-inline" method="POST" action="{{ url('/login') }}">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="username" class="col-form-label text-md-right">{{ __('Username') }}</label>
                <input id="username" type="text" class="form-control form-control-sm {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autofocus required>
            </div>

            <div class="form-group">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control form-control-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>

            <div class="form-group">
                    <button type="submit" class="login_user btn btn-primary btn-sm">
                        {{ __('Login') }}
                    </button>
            </div>
        </div>
    </form>
</div>
@endsection
