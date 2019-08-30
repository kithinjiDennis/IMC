
@extends('layouts.app')

@section('title', 'Create menu')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
	   Menus
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>

	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('menu/listing')}}" class="kt-subheader__breadcrumbs-link">
				Menus 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($menuDetails)) ? 'Edit' : 'Add'}} Menu 			
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('menu/listing')}}" class="btn btn-default btn-bold">
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
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('menu/store')}}" method="POST">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">{{(isset($menuDetails)) ? 'Edit' : 'Add'}} Menu :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">
									
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Name(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" id="id" name="id" type="text" value="{{(isset($menuDetails)) ? $menuDetails->id: ''}}">
										<input placeholder="name " id="name_en" type="text" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{ (isset($menuDetails)) ? $menuDetails->name_en : old('name_en') }}" required autofocus>											
										@if ($errors->has('name_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Name(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="name" id="name_ar" type="text" class="form-control{{ $errors->has('name_ar') ? ' is-invalid' : '' }}" name="name_ar" value="{{ (isset($menuDetails)) ? $menuDetails->name_ar : old('name_ar') }}" required autofocus>											
										@if ($errors->has('name_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Menu Type</label>
										<div class="col-lg-9 col-xl-9">
										<select id="menu_type_id" name="menu_type_id"  class="form-control{{ $errors->has('menu_type_id') ? ' is-invalid' : '' }}">
										@foreach($menutypes as $menutype)
											<option value="{{$menutype->id}}" {{ ( isset($menuDetails) && $menutype->id == $menuDetails->menu_type_id) ? 'selected' : '' }}>{{$menutype->name}}</option>
										@endforeach
										</select>
										@if ($errors->has('menu_type_id'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('menu_type_id') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Page link</label>
										<div class="col-lg-9 col-xl-9">
										<select id="page_id" name="page_id"  class="form-control{{ $errors->has('page_id') ? ' is-invalid' : '' }}" >
											<option value="">Select Page</option>
											@foreach($pages as $page)
												<option value="{{$page->id}}" {{ ( isset($menuDetails) && $page->id == $menuDetails->page_id) ? 'selected' : '' }}>{{$page->name_en}}</option>
											@endforeach
										</select>
										@if ($errors->has('page_id'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('page_id') }}</strong>
											</span>
										@endif
										</div>
									</div>


									<!-- <div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Menu order</label>
										<div class="col-lg-9 col-xl-9">
										<select id="order" name="order"  class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}">
											<option value="1">1</option>
											<option value="2">2</option>
										</select>
										@if ($errors->has('order'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('order') }}</strong>
											</span>
										@endif
										</div>
									</div> -->
									

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