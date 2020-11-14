@extends('master')
@section('content')
<div class="container" id="formulario_login">
    <div class="row">
        <div class="col-md-12 py-5 pr-md-5">
            <div class="heading-section heading-section-white ftco-animate mb-5">
                <span class="subheading">Login de paciente</span>
                <p>Campos com (*) são obrigatórios</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="appointment-form ftco-animate">
                @csrf

                <div class="d-md-flex">
                    <div class="form-group">
                        <x-jet-label value="{{ __('Email') }}" />
                        <x-jet-input class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                </div>

                <div class="d-md-flex">
                    <div class="form-group">
                        <x-jet-label value="{{ __('Password') }}" />
                        <x-jet-input class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif


                </div>
                <div class="d-md-flex col-md-5 ml-auto">
                    <div class="form-group ml-md-4">
                        <x-jet-button class="btn btn-secondary py-3 px-4">
                            {{ __('Login') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
