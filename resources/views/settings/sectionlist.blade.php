@extends('layouts.app')

@section('title', 'SECTIONS')

@section('content')


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?php
$base = url('/');
?>
<input type ="hidden" value=<?php echo $base;?> class="base">
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Section (s)
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
				{{$pages->total()}} Total</span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
                <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
                <div class="btn-toolbar kt-margin-l-20">
                    <button class="btn btn-label-success btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
                        Enable All
                    </button>
                    <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_disable_all">
                        Disable All
                    </button>
                </div>
            </div>
        </div>

    </div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
   <!--begin::Portlet-->
   <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__body kt-portlet__body--fit">
         <!--begin: Datatable -->
         <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
            <table class="kt-datatable__table" style="display: block; min-height: 500px;">
               <thead class="kt-datatable__head">
			   <tr class="kt-datatable__row" style="background-color:#ecebeb;left: 0px;">
				<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort ">
					<span>
							Name
					<span>
				</th>
					<th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="">Actions</span></th>

      	</tr>
               </thead>
               <tbody class="kt-datatable__body" style="">

				   @foreach($pages as $page)
					  <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					  <!-- <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="RecordID"><span style="width: 20px;"><label class="kt-checkbox kt-checkbox--single kt-checkbox--solid"><input type="checkbox" name="chkID[]" class="childBox" value="{{$page->id}}">&nbsp;<span></span></label></span></td> -->

             <td class="kt-datatable__cell--sorted kt-datatable__cell" data-field="AgentName">
							<span style="width: 100px;">
							 <span style="width: 100px;"><b>{{ucfirst($page->name)}}</b></span>
							</span>
						 </td>
						 <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
							<span style="overflow: visible; position: relative; width: 120px;">

                <!-- <label class="switch">
                  <input type="checkbox">
                  <span class="slider round" ></span>
                 </label> -->

 <input data-id="{{$page->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" {{ $page->is_enable ? 'checked' : '' }}>

							</span>
						 </td>
					  </tr>
				 @endforeach

				 @if(count($pages) == 0)
				 <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					<td data-field="Country" class="kt-datatable__cell" colspan="4" align="center"><span style="width: 206px;">No records found</span>
					</td>
				 </tr>
				 @endif


               </tbody>
            </table>
            <div class="kt-datatable__pager kt-datatable--paging-loaded">

				{{ $pages->links() }}

				@if($pages->total() > $pages->lastItem() )

				<div class="kt-datatable__pager-info">
					<div class="dropdown bootstrap-select kt-datatable__pager-size" style="width: 80px;">
						<select  onchange="getDropdownval(this);" class="selectpicker kt-datatable__pager-size" data-width="80px" data-selected="10" tabindex="-98">
							<option value=""> Select</option>
							<option value="10" {{(session()->get( 'recordvalue' ) == 10) ? 'selected' : ''}}>10</option>
							<option value="20" {{(session()->get( 'recordvalue' ) == 20) ? 'selected' : ''}}>20</option>
							<option value="30" {{(session()->get( 'recordvalue' ) == 30) ? 'selected' : ''}}>30</option>
							<option value="50" {{(session()->get( 'recordvalue' ) == 50) ? 'selected' : ''}}>50</option>
							<option value="100" {{(session()->get( 'recordvalue' ) == 100) ? 'selected' : ''}}>100</option>
						</select>
					</div>
					<span class="kt-datatable__pager-detail">Showing {{$pages->firstItem()}} - {{$pages->lastItem()}} of {{$pages->total()}}</span>
				</div>

				@endif

			</div>
         </div>
         <!--end: Datatable -->
      </div>
   </div>
   <!--end::Portlet-->

</div>
@stop
@section('script')

<script>




  $('.toggle-class').change(function() {
          var base = $(document).find('.base').val();
      var status = $(this).prop('checked') == true ? 1 : 0;
      var id = $(this).data('id');
      $.ajax({
          type: "POST",

          dataType: "json",

          url: base+'/sections/updatesingle',

          data: {'status': status, 'id': id},

          success: function(data){

            console.log(data.status);

          }

      });

  })





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

		// delete all pages from this section
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

					text: "Are you sure to update " + ids.length + " selected pages?",
					type: "danger",

					confirmButtonText: "Yes, Enable!",
					confirmButtonClass: "btn btn-sm btn-bold btn-danger",

					showCancelButton: true,
					cancelButtonText: "No, cancel",
					cancelButtonClass: "btn btn-sm btn-bold btn-brand"
				}).then(function(result) {
					if (result.value) {
						$('.pageloader').show();
						$.ajax({
							url: "<?php echo url('sections'); ?>" + '/updatemultiplee',
							type: 'POST',
							data: {'_token' : '{{ csrf_token() }}', ids:ids},
							success: function(result) {
								$('.pageloader').hide();
								var newResult = JSON.parse(result);

								swal.fire({
									title: 'Updated!',
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

// diable the


// delete all pages from this section
$('#kt_subheader_group_actions_disable_all').on('click', function() {
  // fetch selected IDs
  var ids = [];

  $('input[name="chkID[]"]').filter(':checked').map(function(i, chk) {
    ids.push($(chk).val());
  });

  if (ids.length > 0) {
    // learn more: https://sweetalert2.github.io/
    swal.fire({
      buttonsStyling: false,

      text: "Are you sure to disable " + ids.length + " selected pages?",
      type: "danger",

      confirmButtonText: "Yes, Disable!",
      confirmButtonClass: "btn btn-sm btn-bold btn-danger",

      showCancelButton: true,
      cancelButtonText: "No, cancel",
      cancelButtonClass: "btn btn-sm btn-bold btn-brand"
    }).then(function(result) {
      if (result.value) {
        $('.pageloader').show();
        $.ajax({
          url: "<?php echo url('sections'); ?>" + '/disablemultiple',
          type: 'POST',
          data: {'_token' : '{{ csrf_token() }}', ids:ids},
          success: function(result) {
            $('.pageloader').hide();
            var newResult = JSON.parse(result);

            swal.fire({
              title: 'Updated!',
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


	function getDropdownval(obj) {

			var $url = $(location). attr("href");
			if($url.indexOf("key") != -1 || $url.indexOf("?page") != -1) { // if url is working with keys

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
