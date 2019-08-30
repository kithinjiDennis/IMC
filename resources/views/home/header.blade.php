<div class="top-bar-area gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="call-to-action">
                            <p><i class="fa fa-phone"></i> <a href="callto:+8801744430440">+880 1911 854 378</a></p>
                            <p><i class="fa fa-envelope-o"></i> <a href="mailto:backpiper.com@gmail.com">admin@imc.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="{{url('/')}}" class="navbar-brand">
                               <!-- <img src="{{ asset('onepro/img/logo.png') }}" alt="logo"> -->
                               <h1>IMC</h1>
                           </a>
                        </div>
                        <div id="main-nav" class="stellarnav">
                            <ul id="nav" class="nav navbar-nav">
                                @foreach($getHeaderMenus as $getMenu)
                                <li>
                                    <a href="{{($getMenu->getPage) ? url('page/'.$getMenu->getPage->slug .'/'. $lang) : '/'}}">
                                    {{($lang == 'ar') ? $getMenu->name_ar : $getMenu->name_en}}
                                    </a>
                                    @if(count($getMenu->getSubMenu) > 0)
                                    <ul> 
                                        @foreach($getMenu->getSubMenu as $getsubMenu)
                                        <li>
                                            <a href="{{($getsubMenu->getPage) ? url('page/'.$getsubMenu->getPage->slug .'/'. $lang) : 'javascript:void(0)'}}">
                                            {{($lang == 'ar') ? $getsubMenu->name_ar : $getsubMenu->name_en}}
                                            </a>
                                          
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>                              
                                @endforeach

                                <li>
                                    <a href="javascript:void(0)"> {{($lang  == 'ar') ? 'لغة' : 'Language'}}</a>                                   
                                    <ul> 
                                       <li>
                                            <!-- <a href="{{'en'}}">{{($lang  == 'ar') ? 'في' : 'En'}}</a>                                       -->
                                            <a onclick="langfn('en')">{{($lang  == 'ar') ? 'في' : 'En'}}</a> 
                                        </li>
                                        <li>
                                            <a onclick="langfn('ar')">{{($lang  == 'ar') ? 'مع' : 'Ar'}}</a>                                          
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!--END MAINMENU AREA END-->
        </div>