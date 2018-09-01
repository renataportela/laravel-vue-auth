@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">

                     <div v-if="success" class="alert alert-success" role="alert" v-text="successMessage"></div>

                    <form method="POST" @submit.prevent="submitForm" aria-label="{{ __('Reset Password') }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" :disabled="loading">
                                    {{ __('Send Password Reset Link') }}
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
<script src="{{ asset(mix('js/user/sendResetLink.js')) }}"></script>
@endpush
