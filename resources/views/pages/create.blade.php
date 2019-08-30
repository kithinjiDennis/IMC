
@extends('layouts.app')

@section('title', 'Add page')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         {{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Page
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('pages/listing')}}" class="kt-subheader__breadcrumbs-link">
				Pages 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Page			
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('pages/listing')}}" class="btn btn-default btn-bold">
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
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('pages/store')}}" method="POST">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">{{ (isset($page) && $page !='') ? 'Edit' : 'Add' }} Page :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">
									
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Name(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">	
										<input placeholder="name " id="name_en" name="name_en" value="{{ (isset($page) && $page !='') ? $page->name_en : '' }}" type="text" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" required autofocus>											
										@if ($errors->has('name_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Name(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="name" id="name_ar" name="name_ar" value="{{ (isset($page) && $page !='') ? $page->name_ar : '' }}" type="text" class="form-control{{ $errors->has('name_ar') ? ' is-invalid' : '' }}" required autofocus>											
										@if ($errors->has('name_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta title(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title " id="meta_title_en" name="meta_title_en" value="{{ (isset($page) && $page !='') ? $page->meta_title_en : '' }}" type="text" class="form-control{{ $errors->has('meta_title_en') ? ' is-invalid' : '' }}"  required autofocus>											
										@if ($errors->has('meta_title_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_title_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta title(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title" id="meta_title_ar" name="meta_title_ar" value="{{ (isset($page) && $page !='') ? $page->meta_title_ar : '' }}" type="text" class="form-control{{ $errors->has('meta_title_ar') ? ' is-invalid' : '' }}" required autofocus>											
										@if ($errors->has('meta_title_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_title_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2 col-sm-12">Meta description(En)</label>
										<div class="col-lg-9 col-md-9 col-sm-12">
										<textarea placeholder="meta desc" id="meta_desc_en" name="meta_desc_en" maxlength="500" class="form-control{{ $errors->has('meta_desc_en') ? ' is-invalid' : '' }}" rows="8">{{ (isset($page) && $page !='') ? $page->meta_desc_en : '' }}</textarea>
										<span class="form-text text-muted">Please enter description maximum length is 500.</span>
										@if ($errors->has('meta_desc_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_desc_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-2 col-sm-12">Meta description(Ar)</label>
										<div class="col-lg-9 col-md-9 col-sm-12">
										<textarea  placeholder="meta desc"  id="meta_desc_ar" name="meta_desc_ar" maxlength="500" class="form-control{{ $errors->has('meta_desc_ar') ? ' is-invalid' : '' }}" rows="8">{{ (isset($page) && $page !='') ? $page->meta_desc_ar : '' }}</textarea>
										<span class="form-text text-muted">Please enter description maximum length is 500.</span>
										@if ($errors->has('meta_desc_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_desc_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta keyword(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title " id="meta_keyword_en" name="meta_keyword_en" value="{{ (isset($page) && $page !='') ? $page->meta_keyword_en : '' }}"  type="text" class="form-control{{ $errors->has('meta_keyword_en') ? ' is-invalid' : '' }}" required autofocus>											
										@if ($errors->has('meta_keyword_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_keyword_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta keyword(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title" id="meta_keyword_ar" name="meta_keyword_ar" value="{{ (isset($page) && $page !='') ? $page->meta_keyword_ar : '' }}"type="text" class="form-control{{ $errors->has('meta_keyword_ar') ? ' is-invalid' : '' }}"  required autofocus>											
										@if ($errors->has('meta_keyword_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_keyword_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Select Template(En)</label>
										<div class="col-lg-9 col-xl-9">
										<select onchange="selectTemplate(this, 'en');" id="template_id" name="template_id"  class="form-control{{ $errors->has('template_id') ? ' is-invalid' : '' }}">
										<option value="0">Select Template</option>
										@foreach($templates as $template)
											<option value="{{$template->content_en}}">{{$template->name}}</option>
										@endforeach
										</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Content(En)</label>
										<div class="col-lg-9 col-xl-9">
										<textarea class="form-control" id="content_en" name="content_en" placeholder="Content" id="content_en" class="form-control{{ $errors->has('content_en') ? ' is-invalid' : '' }}">
										{{ (isset($page) && $page !='') ? $page->content_en : '' }}
										</textarea>
										@if ($errors->has('content_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('content_en') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Select Template(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<select onchange="selectTemplate(this, 'ar');" id="template_id" name="template_id"  class="form-control{{ $errors->has('template_id') ? ' is-invalid' : '' }}">
										<option value="0">Select Template</option>
										@foreach($templates as $template)
											<option value="{{$template->content_ar}}">{{$template->name}}</option>
										@endforeach
										</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Content(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<textarea class="form-control" id="content_ar" name="content_ar" placeholder="Content" id="content_ar" class="form-control{{ $errors->has('content_ar') ? ' is-invalid' : '' }}">
										{{ (isset($page) && $page !='') ? $page->content_ar : '' }}
										</textarea>
										@if ($errors->has('content_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('content_ar') }}</strong>
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

<script src="{{ asset('unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

<script>

CKEDITOR.replace( 'content_en', {
	height: 400,
	width: 700
});
CKEDITOR.replace( 'content_ar', {
	height: 400,
	width: 700
});

/* select template */

function selectTemplate(obj, type) {

	var thisvalue = obj.value; //$(obj).find("option:selected").text();

	if(type == 'en') {

		CKEDITOR.instances['content_en'].setData(thisvalue);


	} else {

		CKEDITOR.instances['content_ar'].setData(thisvalue);
	}
	
}

</script>

@stop
