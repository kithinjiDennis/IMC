
@extends('layouts.app')

@section('title', 'Change password')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
	     Change Password	
      </h3>
		<span class="kt-subheader__separator kt-subheader__separator--v"></span>
			<div class="kt-subheader__breadcrumbs">
				<span class="kt-subheader__breadcrumbs-separator"></span>
				<a href="{{url('users/listing')}}" class="kt-subheader__breadcrumbs-link">
					Users 
				</a>
				<span class="kt-subheader__breadcrumbs-separator"></span>
				Change Password			
			</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('users/listing')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">

<!--begin: Form Wizard Nav -->							

<!--end: Form Wizard Nav -->
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

		<!--begin: Form Wizard Form-->
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('users/change-password-submit')}}" method="POST">
			@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
			@endif
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">Change password :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">

								   <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Old Password</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="Old password" id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" value="{{ old('old_password') }}" required autofocus>											
										@if ($errors->has('old_password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('old_password') }}</strong>
											</span>
										@endif
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="New password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>											
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
										<div class="col-lg-9 col-xl-9">
											<div class="input-group">
											<input placeholder="Confirm password" id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>
											@if ($errors->has('password_confirmation'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
											@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--end: Form Wizard Step 1-->

			<!--begin: Form Actions -->
			<div class="kt-form__actions">
			   <input type="submit" value="Submit" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
			</div>

			<!--end: Form Actions -->
		</form>

		<!--end: Form Wizard Form-->
	</div>
</div>
</div>
</div>
</div>
</div>

@stop

@section('script')

<script>

setTimeout(function() {
       $('.successMessage').fadeOut('slow');
    }, 2000); 

</script>
@stop

