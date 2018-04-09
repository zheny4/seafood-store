@extends('layouts.app')

@section('content')
<div>
    <h3>{{ __('Register') }}</h3>

    <div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">
                    {{ __('Name') }}
                </label>
                <div>
                    <input id="name"
                           type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div>
                <label for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <div>
                    <input id="email"
                           type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email"
                           value="{{ old('email') }}"
                           required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div>
                <label for="password">
                    {{ __('Password') }}
                </label>
                <div>
                    <input id="password"
                           type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password"
                           required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div>
                <label for="password-confirm">
                    {{ __('Confirm Password') }}
                </label>
                <div>
                    <input id="password-confirm"
                           type="password"
                           class="form-control"
                           name="password_confirmation"
                           required>
                </div>
            </div>

            <div>
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
