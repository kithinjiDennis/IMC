@extends('layouts.app')
@section('title', 'Add')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         {{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Tips
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('awards/listing')}}" class="kt-subheader__breadcrumbs-link">
				Tips
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Tips
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('awards/listing')}}" class="btn btn-default btn-bold">
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
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('awards/store')}}" method="POST" enctype="multipart/form-data">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">{{ (isset($page) && $page !='') ? 'Edit' : 'Add' }} Tips :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Title(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">
										<input placeholder="name " id="title_en" name="title_en" value="{{ (isset($page) && $page !='') ? $page->title_en : '' }}" type="text" class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('title_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('title_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Title(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="name" id="title_ar" name="title_ar" value="{{ (isset($page) && $page !='') ? $page->title_ar : '' }}" type="text" class="form-control{{ $errors->has('title_ar') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('title_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('title_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>
                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Image</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                      <div class="custom-file">
                        <input  accept="image/*" type="file" class="custom-file-input" id="iconFile"  name="icon" value="<?php if(!empty($editmenu->icon)){ ?>{{$editmenu->icon}}<?php } ?>">
                        <label class="custom-file-label LabeliconFile" for="iconFile">Choose image</label>
                      </div>
                      <div class="col-md-2" style="text-align: center;margin-top: 5px;">
                        <span><img style="<?php if(empty($editmenu->icon)){ ?>display:none;<?php } ?>" id="iconPreview" width="32"  height="32" src="<?php if(!empty($editmenu->icon)){ ?>{{$editmenu->icon}}<?php } ?>"></span>
                      </div>
                    @if ($errors->has('icon'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('icon') }}</strong>
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
