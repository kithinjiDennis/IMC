@extends('layouts.app')

@section('content')
<div class="kt-grid kt-grid--ver kt-grid--root">
	<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

			<!--begin::Aside-->
			@include('auth.non_login_sidebar')
			<!--begin::Aside-->

			<!--begin::Content-->
			<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

				

				<!--begin::Body-->
				<div class="kt-login__body">

					<!--begin::Signin-->
					<div class="kt-login__form">
						 @if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif
						<div class="kt-login__title">
							<h3>Forgot Password</h3>
						</div>
					
						<!--begin::Form-->
						<!-- <form method="POST" action="{{ route('password.email') }}"> -->
						<form method="POST" action="{{ url('users/forgot-password') }}">
							@csrf
							<div class="form-group">
								<input placeholder="E-Mail Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
								@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<!--begin::Action-->
							<div class="kt-login__actions">
								<button id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary">Send Password Reset Link</button>
							</div>

							<!--end::Action-->
						</form>

						<!--end::Form-->

					</div>

					<!--end::Signin-->
				</div>

				<!--end::Body-->
			</div>

			<!--end::Content-->
		</div>
	</div>
</div>
@endsection
