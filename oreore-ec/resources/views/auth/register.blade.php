@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
            <!-- <div class="card-header">{{ __('Register') }}</div> -->

            <!-- <div class="card-body"> -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group col-12">
                    <label for="name" class="">{{ __('名前') }}</label>

                    <!-- <div class="col-md-6"> -->
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- </div> -->
                </div>

                <div class="form-group col-12">
                    <label for="email" class="">{{ __('メールアドレス') }}</label>

                    <!-- <div class="col-md-6"> -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- </div> -->
                </div>

                <div class="form-group col-12">
                    <label for="company" class="">{{ __('会社名') }}</label>

                    <!-- <div class="col-md-6"> -->
                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror"
                        name="company" value="{{ old('company') }}" required autocomplete="company">

                    @error('company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- </div> -->
                </div>

                <div class="form-row col-12 pr-1">
                    <div class="form-group col-12 col-lg-6">
                        <label for="password" class="">{{ __('パスワード') }}</label>

                        <!-- <div class="col-md-6"> -->
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!-- </div> -->
                    </div>

                    <div class="form-group col-12 col-lg-6">
                        <label for="password-confirm" class="">{{ __('パスワード確認') }}</label>

                        <!-- <div class="col-md-6"> -->
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                        <!-- </div> -->
                    </div>
                </div>

                <!-- <div class="form-group row mb-0"> -->
                <div class="form-group col-12">
                    <!-- <div class="col-md-6 offset-md-4"> -->
                    <button type="submit" class="btn btn-green">
                        {{ __('登録') }}
                    </button>
                    <!-- </div> -->
                </div>
            </form>
            <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
