@extends('layouts.app')

@section('title', 'Regístrate')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <img src="{{ asset('img/bg-register.svg') }}" style="width:75%" class="w3-image my-2 center">

                    <div class="card-header text-uppercase text-center">
                        <i class="fa fa-user-edit"></i>
                        @lang('general.link-register')
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">@lang('general.link-name')</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">@lang('general.link-email')</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right">@lang('general.link-phone')</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_number" class="col-md-4 col-form-label text-md-right">Tipo de
                                    documento</label>

                                <div class="col-md-6">
                                    <select name="type_number" id="type_number"
                                        class="form-control @error('type_number') is-invalid @enderror">
                                        <option value="">Seleccione</option>
                                        <option value="cedula" @if (old('type_number') == 'Female') selected @endif>Cédula de ciudadanía</option>
                                        <option value="pasaporte" @if (old('type_number') == 'Male') selected @endif>Pasaporte</option>
                                    </select>

                                    @error('type_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dnumber"
                                    class="col-md-4 col-form-label text-md-right">Número de documento</label>

                                <div class="col-md-6">
                                    <input id="dnumber" type="number"
                                        class="form-control @error('dnumber') is-invalid @enderror" name="dnumber"
                                        value="{{ old('dnumber') }}" autocomplete="dnumber">

                                    @error('dnumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate"
                                    class="col-md-4 col-form-label text-md-right">@lang('general.link-birthdate')</label>

                                <div class="col-md-6">
                                    <input id="birthdate" type="date"
                                        class="form-control @error('birthdate') is-invalid @enderror" name="birthdate"
                                        value="{{ old('birthdate') }}" autocomplete="birthdate">

                                    @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-right">@lang('general.link-gender')</label>

                                <div class="col-md-6">
                                    <select name="gender" id="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">@lang('general.select-value')</option>
                                        <option value="Female" @if (old('gender') == 'Female') selected @endif>@lang('general.select-female')</option>
                                        <option value="Male" @if (old('gender') == 'Male') selected @endif>@lang('general.select-male')</option>
                                    </select>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">@lang('general.link-address')</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('general.link-register1')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
