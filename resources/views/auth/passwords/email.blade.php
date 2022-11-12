@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- login-area start -->
                <div class="register-area ptb-100">
                    <div class="login">
                        <div class="card">
                            <div class="card-header">{{ __('Забули пароль?') }}</div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-end">{{ __('Адреса електронної пошти') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="default-btn floatright">
                                                    {{ __('Відправити посилання') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- login-area end -->
            </div>
        </div>
    </div>
@endsection


