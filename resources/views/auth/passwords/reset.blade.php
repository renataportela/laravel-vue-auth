@extends('layouts.app')

@section('initial-data')
<script type="text/javascript">
   window.resetToken = '{{ $token }}'
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
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
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                               <input type="password"
                                     class="form-control"
                                     :class="{ 'is-invalid': hasError('password-confirm') }"
                                     name="password_confirmation"
                                     v-model.lazy="form.password_confirmation"
                                     required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
<script src="{{ asset(mix('js/user/resetPassword.js')) }}"></script>
@endpush
