@extends('layouts.app')

@section('title', 'Login')

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
						<div class="kt-login__title">
							<h3>Sign In</h3>
						</div>

						<!--begin::Form-->
						<form method="POST" action="{{ route('login') }}">
							@if(Session::has('message'))
							<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
							@endif
							@csrf
							<div class="form-group">
								<input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
								@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
								@if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>

							<!--begin::Action-->
							<div class="kt-login__actions">
								<a href="{{ route('password.request') }}" class="kt-link kt-login__link-forgot">
									Forgot Password ?
								</a>
								<button id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In</button>
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
