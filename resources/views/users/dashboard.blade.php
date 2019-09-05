@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
#kt_subheader {
    background-color:#ecebeb ;
}
</style>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
welcome to the IMC Dashboard
            </h3>
        </div>

    </div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
	<div class="row">
		<div class="col-xl-8 col-lg-12 order-lg-3 order-xl-1">

	  <!--begin:: Widgets/Best Sellers-->
	  <div class="kt-portlet kt-portlet--height-fluid">
	    <div class="kt-portlet__head">
	      <div class="kt-portlet__head-label">
	        <h3 class="kt-portlet__head-title">
	          Best Sellers
	        </h3>
	      </div>
	      <div class="kt-portlet__head-toolbar">
	        <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
	              Latest
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
	              Month
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
	              All time
	            </a>
	          </li>
	        </ul>
	      </div>
	    </div>
	    <div class="kt-portlet__body">
	      <div class="tab-content">
	        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
	          <div class="kt-widget5">
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product27.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Great Logo Designn
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic admin themes.
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Keenthemes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">19,200</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">1046</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product22.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Branding Mockup
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic bootstrap themes.
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Fly themes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">24,583</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">3809</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product15.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Awesome Mobile App
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic admin themes.Lorem Ipsum Amet
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Fly themes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">210,054</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">1103</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="tab-pane" id="kt_widget5_tab2_content">
	          <div class="kt-widget5">
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product10.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Branding Mockup
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic bootstrap themes.
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Fly themes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">24,583</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">3809</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product11.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Awesome Mobile App
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic admin themes.Lorem Ipsum Amet
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Fly themes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">210,054</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">1103</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product6.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Great Logo Designn
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic admin themes.
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Keenthemes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">19,200</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">1046</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="tab-pane" id="kt_widget5_tab3_content">
	          <div class="kt-widget5">
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product11.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Awesome Mobile App
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic admin themes.Lorem Ipsum Amet
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Fly themes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">210,054</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">1103</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product6.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Great Logo Designn
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic admin themes.
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Keenthemes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">19,200</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">1046</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	            <div class="kt-widget5__item">
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__pic">
	                  <img class="kt-widget7__img" src="./assets/media//products/product10.jpg" alt="">
	                </div>
	                <div class="kt-widget5__section">
	                  <a href="#" class="kt-widget5__title">
	                    Branding Mockup
	                  </a>
	                  <p class="kt-widget5__desc">
	                    Metronic bootstrap themes.
	                  </p>
	                  <div class="kt-widget5__info">
	                    <span>Author:</span>
	                    <span class="kt-font-info">Fly themes</span>
	                    <span>Released:</span>
	                    <span class="kt-font-info">23.08.17</span>
	                  </div>
	                </div>
	              </div>
	              <div class="kt-widget5__content">
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">24,583</span>
	                  <span class="kt-widget5__sales">sales</span>
	                </div>
	                <div class="kt-widget5__stats">
	                  <span class="kt-widget5__number">3809</span>
	                  <span class="kt-widget5__votes">votes</span>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>

	  <!--end:: Widgets/Best Sellers-->
	</div>

	<div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">

	  <!--begin:: Widgets/New Users-->
	  <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
	    <div class="kt-portlet__head">
	      <div class="kt-portlet__head-label">
	        <h3 class="kt-portlet__head-title">
	          New Users
	        </h3>
	      </div>
	      <div class="kt-portlet__head-toolbar">
	        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content" role="tab">
	              Today
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab2_content" role="tab">
	              Month
	            </a>
	          </li>
	        </ul>
	      </div>
	    </div>
	    <div class="kt-portlet__body">
	      <div class="tab-content">
	        <div class="tab-pane active" id="kt_widget4_tab1_content">
	          <div class="kt-widget4">
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_4.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Anna Strong
	                </a>
	                <p class="kt-widget4__text">
	                  Visual Designer,Google Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-brand btn-bold">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_14.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Milano Esco
	                </a>
	                <p class="kt-widget4__text">
	                  Product Designer, Apple Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-warning btn-bold">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_11.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Nick Bold
	                </a>
	                <p class="kt-widget4__text">
	                  Web Developer, Facebook Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-danger btn-bold">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_1.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Wiltor Delton
	                </a>
	                <p class="kt-widget4__text">
	                  Project Manager, Amazon Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-success btn-bold">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_5.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Nick Stone
	                </a>
	                <p class="kt-widget4__text">
	                  Visual Designer, Github Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-primary btn-bold">Follow</a>
	            </div>
	          </div>
	        </div>
	        <div class="tab-pane" id="kt_widget4_tab2_content">
	          <div class="kt-widget4">
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_2.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Kristika Bold
	                </a>
	                <p class="kt-widget4__text">
	                  Product Designer,Apple Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-success">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_13.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Ron Silk
	                </a>
	                <p class="kt-widget4__text">
	                  Release Manager, Loop Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-brand">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_9.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Nick Bold
	                </a>
	                <p class="kt-widget4__text">
	                  Web Developer, Facebook Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-danger">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_2.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Wiltor Delton
	                </a>
	                <p class="kt-widget4__text">
	                  Project Manager, Amazon Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-success">Follow</a>
	            </div>
	            <div class="kt-widget4__item">
	              <div class="kt-widget4__pic kt-widget4__pic--pic">
	                <img src="./assets/media/users/100_8.jpg" alt="">
	              </div>
	              <div class="kt-widget4__info">
	                <a href="#" class="kt-widget4__username">
	                  Nick Bold
	                </a>
	                <p class="kt-widget4__text">
	                  Web Developer, Facebook Inc
	                </p>
	              </div>
	              <a href="#" class="btn btn-sm btn-label-info">Follow</a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>

	  <!--end:: Widgets/New Users-->
	</div>
</div>
	<!--End::Row-->

	<!--End::Dashboard 1-->
	</div>

	<!-- end:: Content -->
	</div>
	@stop
	@section('script')

	<script>

	function deleteThis(obj, id)
	{
		swal.fire({
			buttonsStyling: false,

			text: "Are you sure to delete this user?",
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
					url: "<?php echo url('users/delete-single-user'); ?>",
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


	function blockThis(obj, id, status)
	{
		var msg = '';
		if(status ==  1) {
			status = 0;
			msg = 'Are you sure to block this user?';

		} else {
			status = 1;
			msg = 'Are you sure to un-block this user?';

		}
		swal.fire({
			buttonsStyling: false,

			text: msg,
			type: "danger",

			confirmButtonText: "Yes",
			confirmButtonClass: "btn btn-sm btn-bold btn-danger",

			showCancelButton: true,
			cancelButtonText: "No, cancel",
			cancelButtonClass: "btn btn-sm btn-bold btn-brand"
		}).then(function(result) {
			if (result.value) {
				$('.pageloader').show();
				$.ajax({
					url: "<?php echo url('users/change-status'); ?>",
					type: 'POST',
					data: {'_token' : '{{ csrf_token() }}', id:id, status:status},
					success: function(result) {
						$('.pageloader').hide();
						var newResult = JSON.parse(result);

						swal.fire({
							title: 'Success!',
							text: newResult.message,
							type: 'success',
							buttonsStyling: false,
							confirmButtonText: "OK",
							confirmButtonClass: "btn btn-sm btn-bold btn-brand",
						}).then(function(result) {
							location.reload();
						});
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

	$(document).ready(function() {
		$(document).on('change', '.parentChk', function(){
			var checkthis 	= $(this);

			if (checkthis.is(':checked')) {
				$('.childBox').prop('checked', true);
				checkAll();
			} else {
				$('.childBox').prop('checked', false);
				unCheckAll();
			}

		});

		$(document).on('change', '.childBox', function(){
			var checkthis 	= $(this);

			if (checkthis.is(':checked')) {
				checkAll();

				if ($('input[name="chkID[]"]').filter(':checked').length == $('input[name="chkID[]"]').length) {
					$('.parentChk').prop('checked', true);
				}
			} else {
				$('#kt_subheader_group_selected_rows').html($('input[name="chkID[]"]').filter(':checked').length);
				if ( $('input[name="chkID[]"]').filter(':checked').length == 0 ) {
					unCheckAll();
					$('.parentChk').prop('checked', false);
				}
			}
		});

		// delete all users from this section
		$('#kt_subheader_group_actions_delete_all').on('click', function() {
			// fetch selected IDs
			var ids = [];

			$('input[name="chkID[]"]').filter(':checked').map(function(i, chk) {
				ids.push($(chk).val());
			});

			if (ids.length > 0) {
				// learn more: https://sweetalert2.github.io/
				swal.fire({
					buttonsStyling: false,

					text: "Are you sure to delete " + ids.length + " selected users?",
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
							url: "<?php echo url('users'); ?>" + '/delete-multiple-users',
							type: 'POST',
							data: {'_token' : '{{ csrf_token() }}', ids:ids},
							success: function(result) {
								$('.pageloader').hide();
								var newResult = JSON.parse(result);

								swal.fire({
									title: 'Deleted!',
									text: newResult.message,
									type: 'success',
								})
								setTimeout(function() {
									 window.location.reload();
								}, 1500);
							}
						});
					}
				});
			}
		});

	});

	// change status for all users from here
	function changeStatus(status) {

	var ids = [];

	$('input[name="chkID[]"]').filter(':checked').map(function(i, chk) {
		ids.push($(chk).val());
	});

	if (ids.length > 0) {

		var msg = '';
		if(status ==  1) {
				msg = 'Are you sure to activate these user(s)?';

		} else {
			msg = 'Are you sure to block these user(s)?';

		}
		swal.fire({
					buttonsStyling: false,

					text: msg,
					type: "danger",

					confirmButtonText: "Yes!",
					confirmButtonClass: "btn btn-sm btn-bold btn-danger",

					showCancelButton: true,
					cancelButtonText: "No, cancel",
					cancelButtonClass: "btn btn-sm btn-bold btn-brand"
				}).then(function(result) {
					if (result.value) {
						$('.pageloader').show();
						$.ajax({
							url: "<?php echo url('users'); ?>" + '/update-multi-users-status',
							type: 'POST',
							data: {'_token' : '{{ csrf_token() }}', ids:ids, status:status},
							success: function(result) {
								$('.pageloader').hide();
								var newResult = JSON.parse(result);

								swal.fire({
									title: 'Success!',
									text: newResult.message,
									type: 'success',
								})
								setTimeout(function() {
									 window.location.reload();
								}, 1500);
							}
						});
					}
				});
		}
	}

	function getDropdownval(obj) {

			var $url = $(location). attr("href");
			if($url.indexOf("key") != -1 || $url.indexOf("page") != -1) { // if url is working with keys

				if($url.indexOf("recordvalue") != -1) {

					$url = updateQueryStringParameter($url, 'recordvalue', obj.value);
				}

				if($url.indexOf("recordvalue") == -1) { // if record value is not available in url
					$url = $url + '&recordvalue=' + obj.value;
				}

			} else {

				if($url.indexOf("recordvalue") != -1) {
					$url = updateQueryStringParameter($url, 'recordvalue', obj.value);
				}

				if($url.indexOf("recordvalue") == -1) { // if record value is not available in url
					$url = $url + '?recordvalue=' + obj.value;
				}

			}

			window.location.href =  $url;
	}

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

	 </script>
	@stop
