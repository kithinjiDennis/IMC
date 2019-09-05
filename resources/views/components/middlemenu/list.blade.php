@extends('layouts.app')

@section('title', 'Middle Menu')

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
                Middle Menu
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
				{{$menus->total()}} Total</span>
                <!-- <form class="kt-margin-l-20" id="kt_subheader_search_form" action="{{url('/admin/middlemenu/list')}}" method="GET" role="search">
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">

							<span>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect id="bound" x="0" y="0" width="24" height="24"></rect>
										<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
										<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero"></path>
									</g>
								</svg>

							</span>
						</span>
					</div>
                </form> -->
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
			<?php if(!empty($editmenu->id)){ ?>
            <a href="{{ url('admin/middlemenu/list') }}" class="btn btn-label-brand btn-bold">
				Add Menu </a>
				<?php  }?>
        </div>
    </div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
	<div class="row">
	<div class="col-md-6">
   <!--begin::Portlet-->
   <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__body kt-portlet__body--fit">
         <!--begin: Datatable -->
         <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
            <table class="kt-datatable__table" style="display: block;">
               <thead class="kt-datatable__head">
			   <tr class="kt-datatable__row" style="left: 0px;">

			   <th data-field="MenuIcon" class="kt-datatable__cell kt-datatable__cell--sort " style="background-color:#ecebeb;text-align: center;width:20%;padding-left: 0;">
					<span>
					<a href="javascript:;">
						<b>Icon</b>
						</a>
					<span>
				</th>
				<th data-field="MenuLink" class="kt-datatable__cell kt-datatable__cell--sort "  style="background-color:#ecebeb;text-align: center;width:20%;">
					<span>
						<a href="javascript:;">
							<b>Link<b>
						</a>
					<span>
				</th>
				<th  style="background-color:#ecebeb;text-align: center;width:20%;" data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span><a href="javascript:;"><b>Actions</b></a></span></th>
				</tr>
               </thead>
               <tbody class="kt-datatable__body tbody_sortable" style="">
				   @foreach($menus as $menu)
					  <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
					  <input type="hidden" name="chkID[]" class="childBox" value="{{$menu->id}}">
					  <td style="text-align: center;width:20%;">
							<span>
								  <span>
								  	<?php
										if(!empty($menu->type) && $menu->type=='facebook'){
											echo '<a class="socialmiddlemenuicons" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
										}elseif(!empty($menu->type) && $menu->type=='twitter'){
											echo '<a class="socialmiddlemenuicons" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
										}elseif(!empty($menu->type) && $menu->type=='instagram'){
											echo '<a class="socialmiddlemenuicons" href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
										}elseif(!empty($menu->type) && $menu->type=='linkedin'){
											echo '<a class="socialmiddlemenuicons" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
										}elseif(!empty($menu->type) && $menu->type=='youtube'){
											echo '<a class="socialmiddlemenuicons" href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>';
										}elseif(!empty($menu->type) && $menu->type=='custom'){
											echo '<img width="32"  height="32" src="'.$menu->icon.'">';
										}
									?>
								  </span>
							</span>
						 </td>

						 <td style="text-align: center;width:20%;">
							<span>
							<?php
								echo '<a target="_blank" href="'.$menu->link.'"><span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">Link</span></a>';
							?>
							</span>
						 </td>

						 <td style="text-align: center;width:20%;" data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
							<span style="overflow: visible; position: relative; ">
							   <div class="dropdown">
								  <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="flaticon-more-1"></i></a>
								  <div class="dropdown-menu dropdown-menu-right">
									 <ul class="kt-nav">
										<li class="kt-nav__item"><a class="kt-nav__link" href="{{url('admin/middlemenu/list', $menu->id)}}"><i class="kt-nav__link-icon flaticon2-contract"></i><span class="kt-nav__link-text">Edit</span></a></li>
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
   <div class="col-md-6">
	   <!--begin::Portlet-->
	   <div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
												<?php if(!empty($editmenu->id)){ echo 'Edit Menu'; }else{ echo 'Add Menu'; }?>
												</h3>
											</div>
										</div>

										<!--begin::Form-->
										<form class="kt-form" method="POST" enctype="multipart/form-data" action="{{ url('admin/middlemenu/create') }}" >
										@csrf

										<input type="hidden" name="id" value="<?php if(!empty($editmenu->id)){ echo $editmenu->id; }?>" >
											<div class="kt-portlet__body">
												<div class="form-group"  >
													<label>Type</label>
													<div></div>
													<select class="custom-select form-control" name="type">
														<option value="">Open to select icon</option>
														<option <?php if(!empty($editmenu->type) && $editmenu->type=="facebook"){ echo "selected"; } ?> value="facebook">Facebook</option>
														<option <?php if(!empty($editmenu->type) && $editmenu->type=="twitter"){ echo "selected"; } ?> value="twitter">Twitter</option>
														<option <?php if(!empty($editmenu->type) && $editmenu->type=="instagram"){ echo "selected"; } ?> value="instagram">Instagram</option>
														<option <?php if(!empty($editmenu->type) && $editmenu->type=="linkedin"){ echo "selected"; } ?> value="linkedin">Linkedin</option>
														<option <?php if(!empty($editmenu->type) && $editmenu->type=="youtube"){ echo "selected"; } ?> value="youtube">Youtube</option>
														<option <?php if(!empty($editmenu->type) && $editmenu->type=="custom"){ echo "selected"; } ?> value="custom">Custom</option>

													</select>
                          <?php
                          if(isset($errors)){
                            ?>
                            <span class="invalid-feed" role="alert">
                              <strong>{{ $errors->getBag('default')->first('type') }}</strong>
                            </span>
                          <?php
                          }
                           ?>
												</div>
												<div class="form-group selectcustomicon" <?php if(empty($editmenu->id) || (!empty($editmenu->type) && $editmenu->type=="1")){ echo "style='display:none;'"; }elseif(!empty($editmenu->type) && $editmenu->type=="custom"){ echo "style='display:block;'"; }?>>
													<label>Icon</label>
													<div></div>
													<div class="row">
														<div class="col-md-10">
															<div class="custom-file">
																<input  accept="image/*" type="file" class="custom-file-input" id="iconFile"  name="icon">
																<label class="custom-file-label LabeliconFile" for="iconFile">Choose image</label>
															</div>
														</div>
														<div class="col-md-2" style="text-align: center;margin-top: 5px;">
															<span><img style="<?php if(empty($editmenu->icon)){ ?>display:none;<?php } ?>" id="iconPreview" width="32"  height="32" src="<?php if(!empty($editmenu->icon)){ ?>{{$editmenu->icon}}<?php } ?>"></span>
														</div>
													</div>
												</div>
												<div class="form-group" >
													<label>Sequence</label>
													<div></div>
													<select class="custom-select form-control" name="order">
														<option value="" >Select</option>
														<?php
															if(!empty($order)){
																for($i=1;$i<=$order;$i++){
																	?>
															<option <?php if(!empty($editmenu->order) && $editmenu->order==$i){ echo "selected"; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
														<?php
																}
															}
														?>
													</select>
                          <?php
                          if(isset($errors)){
                            ?>
                            <span class="invalid-feed" role="alert">
                              <strong>{{ $errors->getBag('default')->first('order') }}</strong>
                            </span>
                          <?php
                          }
                           ?>
												</div>
												<div class="form-group customlink">
													<label>Custom Link</label>
													<input type="text" name="link" value="<?php if(!empty($editmenu->link)){ echo $editmenu->link; }?>" class="form-control" aria-describedby="emailHelp" placeholder="Enter link">
												</div>

                        <div class="form-group">
                          <label>Status</label>
                          <div class="kt-radio-inline">
                            <label class="kt-radio">
                              <input type="radio" value="1" name="is_active" <?php if(empty($editmenu->id)){ echo "checked"; }?> <?php if(!empty($editmenu->is_active) && $editmenu->is_active=="1"){ echo "checked"; }?>>Active
                              <span></span>
                            </label>
                            <label class="kt-radio">
                              <input type="radio" value="2" name="is_active" <?php if(!empty($editmenu->is_active) && $editmenu->is_active=="2"){ echo "checked"; }?>> Inactive
                              <span></span>
                            </label>
                          </div>
                        </div>


											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-primary">Save</button>
													<a href="{{ url('admin/middlemenu/list') }}" class="btn btn-secondary" >Cancel</a>
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
