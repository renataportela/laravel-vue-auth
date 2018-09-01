@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" @submit.prevent="submitForm" aria-label="{{ __('Register') }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type="text"
                                       class="form-control"
                                       :class="{ 'is-invalid': hasError('name') }"
                                       name="name"
                                       v-model.lazy="form.name" required autofocus>

                                 <span v-if="hasError('name')" class="invalid-feedback" role="alert">
                                     <strong>@{{ errorMessage('name') }}</strong>
                                 </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input type="email"
                                       class="form-control"
                                       :class="{ 'is-invalid': hasError('email') }"
                                       name="email"
                                       v-model.lazy="form.email" required>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       v-model.lazy="form.password_confirmation"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" :disabled="loading">
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

@push('scripts')
<script src="{{ asset(mix('js/user/register.js')) }}"></script>
@endpush
