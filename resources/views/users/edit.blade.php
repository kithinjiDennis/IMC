
@extends('layouts.app')

@section('title', 'Edit user')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Edit {{(Auth::user()->id == $user->id) ? 'Profile' : 'User'}}
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
		<div class="kt-subheader__breadcrumbs">
				<span class="kt-subheader__breadcrumbs-separator"></span>
				<a href="{{url('users/listing')}}" class="kt-subheader__breadcrumbs-link">
					Users 
				</a>
				<span class="kt-subheader__breadcrumbs-separator"></span>
				Edit user 		
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
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('users/save-edit-user')}}" method="POST">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">Edit User :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">
									
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" name="id" value="{{$user->id}}">
										<input maxlength='50' placeholder="name" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>											
										@if ($errors->has('name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
										<div class="col-lg-9 col-xl-9">
											<div class="input-group">
											<input placeholder="Email" readonly="true" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>
											@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('email') }}</strong>
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



@endsection
