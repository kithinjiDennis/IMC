<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
   <!-- begin:: Aside -->
   <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand" kt-hidden-height="65" style="">
      <div class="kt-aside__brand-logo">
         <a href="{{url('/')}}" style="font-size:40px;">
<?php
use App\Helpers;
$helper = new Helpers();
 $logo =$helper->getlogo();
?>

	<img height = "46" width ="170" src="{{$logo}}" />
         </a>
      </div>
      <div class="kt-aside__brand-tools">
         <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
            <span>
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                     <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "></path>
                     <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "></path>
                  </g>
               </svg>
            </span>
            <span>
               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                     <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                     <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero"></path>
                     <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                  </g>
               </svg>
            </span>
         </button>
         <!--
            <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
            -->
      </div>
   </div>
   <!-- end:: Aside -->
   <!-- begin:: Aside Menu -->
   <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu kt-scroll ps ps--active-y" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" style="height: 260px; overflow: hidden;">
         <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
               <a href="{{ url('/admin/dashboard') }}" class="kt-menu__link ">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                           <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                           <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Dashboard</span>
               </a>
            </li>
            <li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Custom</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
                        <?php $parent_id = (!empty($parentId)?$parentId:0); ?>
                        <li class="kt-menu__item  kt-menu__item--submenu <?php if( Request::url() == url('admin/footer2/list/1')  || Request::url() == url('admin/footer1/list')  || Request::url() == url('admin/topmenu/list') || Request::url() == url('admin/middlemenu/list') || Request::url() == url('admin/mainmenu/list') || Request::url() == url('admin/mainmenu/list/'.$parent_id.'/submenu')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect id="bound" x="0" y="0" width="24" height="24" />
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000" />
												</g>
											</svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">Components</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">Components</span></span></li>
											<li class="kt-menu__item {{ (Request::url() == url('admin/topmenu/list') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('/admin/topmenu/list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Top Menu</span></a></li>
											<li class="kt-menu__item {{ (Request::url() == url('admin/middlemenu/list') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('/admin/middlemenu/list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Middle Menu</span></a></li>
											<li class="kt-menu__item  <?php if(Request::url() == url('admin/mainmenu/list') || Request::url() == url('admin/mainmenu/list/'.$parent_id.'/submenu')){ echo 'kt-menu__item--active'; } ?>" aria-haspopup="true"><a href="{{ url('/admin/mainmenu/list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Main Menu</span></a></li>
											<li class="kt-menu__item {{ (Request::url() == url('admin/footer1/list') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('admin/footer1/list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Footer 1</span></a></li>
											<li class="kt-menu__item {{ (Request::url() == url('admin/footer2/list/1') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('admin/footer2/list/1') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Footer 2</span></a></li>
										</ul>
									</div>
                        </li>







    <li class="kt-menu__item  kt-menu__item--submenu <?php if(Request::url() == url('sections/list') || Request::url() == url('settings/logo/1') || Request::url() == url('follow/list/1') || Request::url() == url('pages/listing') ||  Request::url() == url('contact/list/1')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
         <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
         <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
         <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
      </g>
  </svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">Settings</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
  <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
  <ul class="kt-menu__subnav">
  <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">Settings</span></span></li>
  <li class="kt-menu__item {{ (Request::url() == url('follow/list/1') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('follow/list/1') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Follow Us</span></a></li>
  <li class="kt-menu__item {{ (Request::url() == url('contact/list/1') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('contact/list/1') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Contact Us</span></a></li>
  <li class="kt-menu__item {{ (Request::url() == url('pages/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('pages/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pages</span></a></li>
<li class="kt-menu__item {{ (Request::url() == url('settings/logo/1') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('settings/logo/1') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Logo Settings</span></a></li>
<li class="kt-menu__item {{ (Request::url() == url('sections/list') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('sections/list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Sections Settings</span></a></li>

  </ul>
  </div>
    </li>














            <li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Content</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>




                <li class="kt-menu__item  kt-menu__item--submenu <?php if(Request::url() == url('health/listing') || Request::url() == url('health/create')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                         <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                         <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                         <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                      </g>
                  </svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">Suggestions</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                  <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                  <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">Suggestions</span></span></li>
                  <li class="kt-menu__item {{ (Request::url() == url('health/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('health/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Health Tips</span></a></li>
                  </ul>
                  </div>
                    </li>



                    <li class="kt-menu__item  kt-menu__item--submenu <?php if(Request::url() == url('health/listing') || Request::url() == url('health/create')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                             <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                             <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                             <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                          </g>
                      </svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">About IMC </span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                      <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                      <ul class="kt-menu__subnav">
                      <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">About IMC</span></span></li>
                      <li class="kt-menu__item {{ (Request::url() == url('health/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('health/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Health Tips</span></a></li>
                      </ul>
                      </div>
                        </li>


                        <li class="kt-menu__item  kt-menu__item--submenu <?php if(     Request::url() == url('heading/list') || Request::url() == url('news/listing') || Request::url() == url('news/create')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                 <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                 <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                              </g>
                          </svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">News And Updates</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                          <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                          <ul class="kt-menu__subnav">
                          <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">News And Updates</span></span></li>
                          <li class="kt-menu__item {{ (Request::url() == url('heading/list') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('heading/list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">News Headline</span></a></li>

                          <li class="kt-menu__item {{ (Request::url() == url('news/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('news/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">News Blog</span></a></li>
                          </ul>
                          </div>
                            </li>

                            <li class="kt-menu__item  kt-menu__item--submenu <?php if(Request::url() == url('news/listing') || Request::url() == url('news/create')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                     <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                     <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                     <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                  </g>
                              </svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">Testimonials</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                              <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                              <ul class="kt-menu__subnav">
                              <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">Testimonials</span></span></li>
                              <li class="kt-menu__item {{ (Request::url() == url('news/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('news/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">News Blog</span></a></li>
                              </ul>
                              </div>
                                </li>





                                <li class="kt-menu__item  kt-menu__item--submenu <?php if(Request::url() == url('awards/listing') || Request::url() == url('affiliates/listing') ||  Request::url() == url('affiliates/create') || Request::url() == url('awards/create')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                         <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                         <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                         <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                      </g>
                                  </svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">Awards </span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                  <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                  <ul class="kt-menu__subnav">
                                  <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">Awards</span></span></li>
                                  <li class="kt-menu__item {{ (Request::url() == url('awards/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('awards/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Awards & Accreditations</span></a></li>
                                  <li class="kt-menu__item {{ (Request::url() == url('affiliates/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('affiliates/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Affiliates</span></a></li>

                                  </ul>
                                  </div>
                                    </li>



                                    <li class="kt-menu__item  kt-menu__item--submenu <?php if(Request::url() == url('users/listing')){ echo 'kt-menu__item--open'; } ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                             <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                             <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"></path>
                                          </g>
                                        </svg></span><span class="kt-menu__link-text cm" style="font-size: initial;">Users </span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                        <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text cm" style="font-size: initial;">Users</span></span></li>
                                        <li class="kt-menu__item {{ (Request::url() == url('users/listing') ? 'kt-menu__item--active' : '') }}" aria-haspopup="true"><a href="{{ url('users/listing') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Users Listing</span></a></li>

                                        </ul>
                                        </div>
                                          </li>


            <li class="kt-menu__item  kt-menu__item--submenu menu-toggle-class" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:void(0)" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                           <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                           <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000"></path>
                        </g>
                  </svg>
                  </span>
                  <span class="kt-menu__link-text" style="font-size: initial;">Menus</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
                  <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Applications</span></span></li>
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="{{url('menu/listing')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">View All Menu</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                     </li>
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="{{url('menu/create')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Add Menu</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <!-- <div class="kt-menu__submenu ">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/list-default.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Default</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/list-datatable.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Datatable</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/list-columns-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Columns - 1</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/list-columns-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Columns - 2</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/add-user.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add User</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/edit-user.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Edit User</span></a></li>
                              <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Profile 1</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                 <div class="kt-menu__submenu ">
                                    <span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                       <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-1/overview.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Overview</span></a></li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-1/personal-information.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Personal Information</span></a></li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-1/account-information.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Account Information</span></a></li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-1/change-password.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Change Password</span></a></li>
                                       <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-1/email-settings.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Email Settings</span></a></li>
                                    </ul>
                                 </div>
                              </li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Profile 2</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Profile 3</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/user/profile-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Profile 4</span></a></li>
                           </ul>
                        </div> -->
                     </li>
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="{{url('menu/add-sub-menu')}}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Add sub menu</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <!-- <div class="kt-menu__submenu ">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/contacts/list-columns.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Columns</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/contacts/list-datatable.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Datatable</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/contacts/view-contact.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">View Contact</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/contacts/add-contact.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Contact</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/contacts/edit-contact.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Edit Contact</span></a></li>
                           </ul>
                        </div> -->
                     </li>
                     <!-- <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Chat</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu ">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/chat/private.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Private</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/chat/group.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Group</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/custom/apps/chat/popup.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Popup</span></a></li>
                           </ul>
                        </div>
                     </li> -->
                  </ul>
               </div>
            </li>
            <!-- <li class="kt-menu__section ">
               <h4 class="kt-menu__section-text">Layout</h4>
               <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                           <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                           <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000"></path>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Subheaders</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Subheaders</span></span></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/layout/subheader/toolbar.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Toolbar Nav</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/layout/subheader/actions.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Actions Buttons</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/layout/subheader/tabbed.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tabbed Nav</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/layout/subheader/classic.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Classic</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/layout/subheader/none.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">None</span></a></li>
                  </ul>
               </div>
            </li>
            <li class="kt-menu__section ">
               <h4 class="kt-menu__section-text">Components</h4>
               <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <span class="kt-menu__link-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                           <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" id="Combined-Shape" fill="#000000"></path>
                           <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" id="Path" fill="#000000" opacity="0.3"></path>
                        </g>
                     </svg>
                  </span>
                  <span class="kt-menu__link-text">Base</span><i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Base</span></span></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/colors.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">State Colors</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/typography.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Typography</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/buttons.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Buttons</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/button-group.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Button Group</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/dropdown.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Dropdown</span></a></li>
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tabs</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu ">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/tabs/bootstrap.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Bootstrap Tabs</span></a></li>
                              <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/tabs/line.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Line Tabs</span></a></li>
                           </ul>
                        </div>
                     </li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/accordions.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Accordions</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/tables.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tables</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/progress.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Progress</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/modal.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Modal</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/alerts.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Alerts</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/popover.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Popover</span></a></li>
                     <li class="kt-menu__item " aria-haspopup="true"><a href="demo1/components/base/tooltip.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tooltip</span></a></li>
                  </ul>
               </div>
            </li> -->
         </ul>
         <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
         </div>
         <div class="ps__rail-y" style="top: 0px; height: 260px; right: 3px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 61px;"></div>
         </div>
      </div>
   </div>
   <!-- end:: Aside Menu -->
</div>

<script>

$(document).ready(function() {

   var $url = $(location). attr("href");
   if($url.includes('menu')) {
      $('.menu-toggle-class').addClass('.kt-menu__item--open');
      $('.menu-toggle-class').find('.kt-menu__submenu').css('display', 'block');
   }

   if($url.includes('listing')) {

      $('.menu-toggle-class').find('.kt-menu__submenu .kt-menu__subnav li').eq(1).addClass('kt-menu__item--active');

   } else if($url.includes('menu/create')) {

      $('.menu-toggle-class').find('.kt-menu__submenu .kt-menu__subnav li').eq(2).addClass('kt-menu__item--active');

   } else if($url.includes('add-sub-menu')) {

      $('.menu-toggle-class').find('.kt-menu__submenu .kt-menu__subnav li').eq(3).addClass('kt-menu__item--active');
   }

})
</script>
