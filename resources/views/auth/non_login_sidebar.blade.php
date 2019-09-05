<style>
.kt-login__title {
    margin-left: 87px;
    margin-top: -88px;
}
img {
    margin-left: 117px;
}
</style>
<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url({{ asset('assets/media//bg/bg-4.jpg') }});">
    <div class="kt-grid__item">
        <a href="{{url('/login')}}" class="kt-login__logo">
            <img src="{{ asset('images/logo/logo.png') }}">
        </a>
    </div>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
        <div class="kt-grid__item kt-grid__item--middle">
            <h3 class="kt-login__title">Welcome to IMC!</h3>
            <!-- <h4 class="kt-login__subtitle">The ultimate Bootstrap &amp; Angular 6 admin theme framework for next generation web apps.</h4> -->
        </div>
    </div>
    <div class="kt-grid__item">
        <div class="kt-login__info">
            <!-- <div class="kt-login__copyright">
                © {{date('Y')}} IMC
            </div> -->
            <!-- <div class="kt-login__menu">
                <a href="#" class="kt-link">Privacy</a>
                <a href="#" class="kt-link">Legal</a>
                <a href="#" class="kt-link">Contact</a>
            </div> -->
        </div>
    </div>
</div>
