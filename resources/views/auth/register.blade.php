@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="Nombres" type="text" class="form-control @error('Nombres') is-invalid @enderror" name="Nombres" value="{{ old('Nombres') }}" required autocomplete="Nombres" autofocus>

                                @error('Nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="Apellidos" type="text" class="form-control @error('Apellidos') is-invalid @enderror" name="Apellidos" value="{{ old('Apellidos') }}" required autocomplete="Apellidos" autofocus>

                                @error('Apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Dni" class="col-md-4 col-form-label text-md-right">{{ __('Dni') }}</label>

                            <div class="col-md-6">
                                <input id="Dni" type="text" class="form-control @error('Dni') is-invalid @enderror" name="Dni" value="{{ old('Dni') }}" required autocomplete="Dni" autofocus>

                                @error('Dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="GeneroId" class="col-md-4 col-form-label text-md-right">{{ __('GeneroId') }}</label>

                            <div class="col-md-6">
                                <input id="GeneroId" type="text" class="form-control @error('GeneroId') is-invalid @enderror" name="GeneroId" value="{{ old('GeneroId') }}" required autocomplete="GeneroId" autofocus>

                                @error('GeneroId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="FechaNacimiento" class="col-md-4 col-form-label text-md-right">{{ __('FechaNacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="FechaNacimiento" type="text" class="form-control @error('FechaNacimiento') is-invalid @enderror" name="FechaNacimiento" value="{{ old('FechaNacimiento') }}"  autocomplete="FechaNacimiento" autofocus>

                                @error('FechaNacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                            <div class="col-md-6">
                                <input id="Celular" type="text" class="form-control @error('Celular') is-invalid @enderror" name="Celular" value="{{ old('Celular') }}" required autocomplete="Celular" autofocus>

                                @error('Celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="UserName" class="col-md-4 col-form-label text-md-right">{{ __('UserName') }}</label>

                            <div class="col-md-6">
                                <input id="UserName" type="text" class="form-control @error('UserName') is-invalid @enderror" name="UserName" value="{{ old('UserName') }}" required autocomplete="UserName" autofocus>

                                @error('UserName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CodigoDepartamento" class="col-md-4 col-form-label text-md-right">{{ __('CodigoDepartamento') }}</label>

                            <div class="col-md-6">
                                <input id="CodigoDepartamento" type="text" class="form-control @error('CodigoDepartamento') is-invalid @enderror" name="CodigoDepartamento" value="{{ old('CodigoDepartamento') }}"  autocomplete="CodigoDepartamento" autofocus>

                                @error('CodigoDepartamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CodigoProvincia" class="col-md-4 col-form-label text-md-right">{{ __('CodigoProvincia') }}</label>

                            <div class="col-md-6">
                                <input id="CodigoProvincia" type="text" class="form-control @error('CodigoProvincia') is-invalid @enderror" name="CodigoProvincia" value="{{ old('CodigoProvincia') }}"  autocomplete="CodigoProvincia" autofocus>

                                @error('CodigoProvincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CodigoDistrito" class="col-md-4 col-form-label text-md-right">{{ __('CodigoDistrito') }}</label>

                            <div class="col-md-6">
                                <input id="CodigoDistrito" type="text" class="form-control @error('CodigoDistrito') is-invalid @enderror" name="CodigoDistrito" value="{{ old('CodigoDistrito') }}"  autocomplete="CodigoDistrito" autofocus>

                                @error('CodigoDistrito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="Foto" type="text" class="form-control @error('Foto') is-invalid @enderror" name="Foto" value="{{ old('Foto') }}"  autocomplete="Foto" autofocus>

                                @error('Foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="FechaRegistro" class="col-md-4 col-form-label text-md-right">{{ __('FechaRegistro') }}</label>

                            <div class="col-md-6">
                                <input id="FechaRegistro" type="text" class="form-control @error('FechaRegistro') is-invalid @enderror" name="FechaRegistro" value="{{ old('FechaRegistro') }}"  autocomplete="FechaRegistro" autofocus>

                                @error('FechaRegistro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="Email" type="Email" class="form-control @error('Email') is-invalid @enderror" name="Email" value="{{ old('Email') }}" required autocomplete="Email">

                                @error('Email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
