@extends('layouts.app')

@section('title', 'Menus')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Menu(s)
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
				{{$menus->total()}} Total</span>
                <form class="kt-margin-l-20" id="kt_subheader_search_form" action="{{url('/menu/listing')}}" method="GET" role="search">
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
						<input type="text" class="form-control" placeholder="Search..." id="generalSearch" name="q" value="{{session()->get( 'q' )}}">
						<span class="kt-input-icon__icon kt-input-icon__icon--right">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect id="bound" x="0" y="0" width="24" height="24"></rect>
										<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
										<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero"></path>
									</g>
								</svg>

								<!--<i class="flaticon2-search-1"></i>-->
							</span>
						</span>
					</div>
                </form>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
                <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
                <div class="btn-toolbar kt-margin-l-20">
                                       
                    <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
                        Delete All
                    </button>
                </div>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="#" class="">
            </a>
            <a href="{{ url('menu/create') }}" class="btn btn-label-brand btn-bold">
                Add Menu </a>          
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
			   <tr class="kt-datatable__row" style="left: 0px;">

			    <th data-field="RecordID" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
				<span style="width: 20px;">
					<label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">
					<input type="checkbox" class="parentChk">
						&nbsp;
					<span>
					</span>
					</label>
				</span>
				</th>
				
				<th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort ">
					<span style="width: 200px;">
						<a href="{{url('menu/listing?key=name&sort_by=').session()->get( 'sort_by' ).'&recordvalue=' . session()->get( 'recordvalue' ). '&page=' . $menus->currentPage()}}">
							Name
							@if( session()->get( 'key' ) == 'name' )					
							<span style="width: 200px;">
								<i class="{{(session()->get( 'sort_by' ) == 'asc') ? 'flaticon2-arrow-up' : 'flaticon2-arrow-down'}}"></i>
							</span>
							@endif
						</a>
					<span>						
				</th>
				<th data-field="MenuType" class="kt-datatable__cell kt-datatable__cell--sort ">
					<span style="width: 200px;">
						<a href="{{url('menu/listing?key=menu_type&sort_by=').session()->get( 'sort_by' ).'&recordvalue=' . session()->get( 'recordvalue' ). '&page=' . $menus->currentPage()}}">
							Menu Type
							@if( session()->get( 'key' ) == 'menu_type' )					
							<span style="width: 200px;">
								<i class="{{(session()->get( 'sort_by' ) == 'asc') ? 'flaticon2-arrow-up' : 'flaticon2-arrow-down'}}"></i>
							</span>
							@endif
						</a>
					<span>						
				</th>
				<th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort">
					<span style="width: 206px;">
						<a href="{{url('menu/listing?key=date&sort_by=').session()->get( 'sort_by' ).'&recordvalue=' . session()->get( 'recordvalue' ).'&page=' . $menus->currentPage()}}">
						Date created
						@if( session()->get( 'key' ) == 'date' )					
						<span style="width: 200px;">
							<i class="{{(session()->get( 'sort_by' ) == 'asc') ? 'flaticon2-arrow-up' : 'flaticon2-arrow-down'}}"></i>
						</span>
						@endif
						</a>
					</span>
				</th>
				<th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 80px;">Actions</span></th>
				</tr>
               </thead>
               <tbody class="kt-datatable__body tbody_sortable" style="">
				   @foreach($menus as $menu)
					  <tr data-row="0" class="kt-datatable__row" style="left: 0px;">

					  <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="RecordID"><span style="width: 20px;"><label class="kt-checkbox kt-checkbox--single kt-checkbox--solid"><input type="checkbox" name="chkID[]" class="childBox" value="{{$menu->id}}">&nbsp;<span></span></label></span></td>
						 
						 <td class="kt-datatable__cell--sorted kt-datatable__cell" data-field="AgentName">
							<span style="width: 200px;">
							   <div class="kt-user-card-v2">
							   <a href="{{url('menu/menu-details', $menu->id)}}"> 		
								  <span style="width: 206px;">{{ucfirst($menu->name_en)}}</span>
							   </a>	  
							   </div>
							</span>
						 </td>

						 <td class="kt-datatable__cell--sorted kt-datatable__cell" data-field="AgentName">
							<span style="width: 200px;">
							<span style="width: 206px;">{{$menu->MenuType->name}}</span>
							</span>
						 </td>
						 
						 <td data-field="ShipDate" class="kt-datatable__cell"><span style="width: 206px;">{{date('d M Y', $menu->created_at)}}</span></td>
						 
						 <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
							<span style="overflow: visible; position: relative; width: 80px;">
							   <div class="dropdown">
								  <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="flaticon-more-1"></i></a>								
								  <div class="dropdown-menu dropdown-menu-right">
									 <ul class="kt-nav">				
									 <li class="kt-nav__item"><a class="kt-nav__link" href="{{url('menu/menu-details', $menu->id)}}"><i class="kt-nav__link-icon flaticon2-expand"></i><span class="kt-nav__link-text">View SubMenu</span></a></li> 					   
										<li class="kt-nav__item"><a class="kt-nav__link" href="{{url('menu/edit-menu', $menu->id)}}"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text">Edit</span></a></li>
									 	<li onclick="deleteThis(this, {{$menu->id}})" class="kt-nav__item delete_user"><a class="kt-nav__link delete_user" href="javascript:void(0);"><i class="kt-nav__link-icon flaticon2-trash"></i><span class="kt-nav__link-text delete_user">Delete</span>
									 </ul>
								  </div>
							   </div>
							</span>
						 </td>
					  </tr>
				 @endforeach

				 @if($menus->total() == 0)
				 <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					<td data-field="Country" class="kt-datatable__cell" colspan="4" align="center"><span style="width: 206px;">No records found</span>
					</td>
				 </tr>
				 @endif


               </tbody>
            </table>
            <div class="kt-datatable__pager kt-datatable--paging-loaded">

				{{ $menus->links() }}

				@if($menus->total() > $menus->lastItem() )

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
					<span class="kt-datatable__pager-detail">Showing {{$menus->firstItem()}} - {{$menus->lastItem()}} of {{$menus->total()}}</span>
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
					url: "<?php echo url('menu/delete-menu'); ?>",
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

					text: "Are you sure to delete " + ids.length + " selected menus?",
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
							url: "<?php echo url('menu'); ?>" + '/delete-multiple-menu',
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
			url: "<?php echo url('menu'); ?>" + '/update-menu-order',
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
				setTimeout(function() {
					window.location.reload();
				}, 1500); 
			}
		});
	}

   </script>
@stop
