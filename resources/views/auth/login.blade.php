@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" @submit.prevent="submitForm" aria-label="{{ __('Login') }}">

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                               <input type="text"
                                      class="form-control"
                                      :class="{ 'is-invalid': hasError('email') }"
                                      name="name"
                                      v-model.lazy="form.email" required autofocus>

                                <span v-if="hasError('email')" class="invalid-feedback" role="alert">
                                    <strong>@{{ errorMessage('email') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                               <input type="password"
                                      class="form-control"
                                      :class="{ 'is-invalid': hasError('password') }"
                                      name="password"
                                      v-model.lazy="form.password"
                                      required>

                                <span v-if="hasError('password')" class="invalid-feedback" role="alert">
                                    <strong>@{{ errorMessage('password') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input v-model="form.rememberMe" class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" :disabled="loading">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset(mix('js/user/login.js')) }}"></script>
@endpush
