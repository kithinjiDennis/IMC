@extends('layouts.app')

@section('title',  'Update logo ')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.css') }}">
<style>
a.socialmiddlemenuicons {
    font-size: 18px;
    color: #005a9c;
    transition: .5s ease;
    width: 35px;
    height: 35px;
    border: 1px solid;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.invalid-feed {
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #fd397a; }
</style>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
            Update Logo
            </h3>
        </div>
    </div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
	<div class="row">

   <div class="col-md-12">
	   <!--begin::Portlet-->
	   <div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
                        logo update </h3>
											</div>
										</div>
										<!--begin::Form-->
										<form class="kt-form" method="POST" enctype="multipart/form-data" action="{{ url('settings/logoupdate') }}" >
										@csrf
										<input type="hidden" name="id" value="<?php if(!empty($editmenu->id)){ echo $editmenu->id; }?>" >
											<div class="kt-portlet__body">


                        <div class="form-group row">
                          <label class="col-form-label col-lg-2 col-sm-12"> </label>
                          <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="col-md-2" style="text-align:center;margin-top: 5px;margin-bottom: 55px;">
                              <center><span><img style="<?php if(empty($editmenu->icon)){ ?>display:none;<?php } ?>" style ="border-style:dashed;" id="iconPreview" width="200"  height="100" src="<?php if(!empty($editmenu->icon)){ echo url('/')."/images/".$editmenu->icon; } ?>"></span></center>
                            </div>

                            <div class="custom-file">
                              <input  accept="image/*" type="file" class="custom-file-input" id="iconFile"  name="icon" value="<?php if(!empty($editmenu->icon)){ ?>{{$editmenu->icon}}<?php } ?>" required>
                              <label class="custom-file-label LabeliconFile" for="iconFile">Choose image</label>
                            </div>

                            <?php
                        if(isset($errors)){
                          ?>
                          <span class="invalid-feed" role="alert">
                            <strong>{{ $errors->getBag('default')->first('icon') }}</strong>
                          </span>
                        <?php
                        }
                         ?>

                          </div>
                        </div>




											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-primary">Update</button>
												</div>
											</div>
										</form>
										<!--end::Form-->
									</div>
   </div>
   </div>
</div>
@stop
@section('script')

<script>

	function deleteThis(obj, id)
	{
		swal.fire({
			buttonsStyling: false,

			text: "Are you sure to delete this menu?",
			type: "danger",

			confirmButtonText: "Yes, delete!",
			confirmButtonClass: "btn btn-sm btn-bold btn-danger",

			showCancelButton: true,
			cancelButtonText: "No, cancel",
			cancelButtonClass: "btn btn-sm btn-bold btn-brand"
		}).then(function(result) {
			if (result.value) {
				$('.pageloader').show();
				$.ajax({
					url: "<?php echo url('admin/middlemenu/delete'); ?>",
					type: 'POST',
					data: {'_token' : '{{ csrf_token() }}', id:id},
					success: function(result) {
						$('.pageloader').hide();
						var newResult = JSON.parse(result);

						swal.fire({
							title: 'Deleted!',
							text: newResult.message,
							type: 'success',
							buttonsStyling: false,
							confirmButtonText: "OK",
							confirmButtonClass: "btn btn-sm btn-bold btn-brand",
						})
						$(obj).parents('.kt-datatable__row').remove();
					}
				});
			}
		});
	}



	setTimeout(function() {
       $('.successMessage').fadeOut('slow');
    }, 2000);

	function checkAll() {
		$('#kt_subheader_group_selected_rows').html($('input[name="chkID[]"]').filter(':checked').length);
		$('#kt_subheader_search').addClass('kt-hidden');
		$('#kt_subheader_group_actions').removeClass('kt-hidden');
	}

	function unCheckAll() {
		$('#kt_subheader_group_selected_rows').html($('input[name="chkID[]"]').filter(':checked').length);
		$('#kt_subheader_search').removeClass('kt-hidden');
		$('#kt_subheader_group_actions').addClass('kt-hidden');
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var filename = input.files[0].name;
			var reader = new FileReader();

			reader.onload = function(e) {
			$('#iconPreview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
			$('#iconPreview').show();
			setTimeout(function(){
				$('.LabeliconFile').text(filename.substring(filename.length - 30, filename.length));
			},1);

		}
	}

	$(document).ready(function() {
		$("#iconFile").change(function() {
			readURL(this);
		});

		$('select[name=type]').change(function() {
			if (this.value == 'custom') {
				$('.selectcustomicon').show();
			}
			else if (this.value != 'custom') {
				$('.selectcustomicon').hide();
			}
		});


	});

	function updateQueryStringParameter(uri, key, value) {
			var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
			var separator = uri.indexOf('?') !== -1 ? "&" : "?";
			if (uri.match(re)) {
			return uri.replace(re, '$1' + key + "=" + value + '$2');
			}
			else {
			return uri + separator + key + "=" + value;
			}
	}

	$(document).ready(function(){
		$( ".tbody_sortable" ).sortable({
			delay: 150,
			opacity: 0.5,
			stop: function(evt, ui) {
				var selectedData = new Array();
				$('.tbody_sortable > tr').find('.childBox').each(function() {
					selectedData.push($(this).val());
				});
				updateOrder(selectedData);
			}
		});
	})

	function updateOrder(selectedData) {
		$('.pageloader').show();
		$.ajax({
			url: "<?php echo url('admin/middlemenu'); ?>" + '/update-menu-order',
			type: 'POST',
			data: {'_token' : '{{ csrf_token() }}', selectedData:selectedData},
			success: function(result) {
				$('.pageloader').hide();
				var newResult = JSON.parse(result);

				swal.fire({
					title: 'Sucess!',
					text: newResult.message,
					type: 'success',
				})
				// setTimeout(function() {
				// 	window.location.reload();
				// }, 1500);
			}
		});
	}

   </script>
@stop
