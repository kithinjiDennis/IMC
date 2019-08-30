<div class="footer-area white">
        <div class="footer-top-area padding-100-50 dark-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="footer-social-bookmark text-center wow fadeIn">
                            <h2>IMC</h2>
                            <ul id="nav" class="nav navbar-nav" style="float:left">
                             @foreach($getFooterMenus as $getMenu)
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area deep-dark-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="footer-copyright text-center wow fadeIn">
                            <p>

                            Copyright &copy; {{date('Y')}} All rights reserved

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>