
<div class="footer">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-3 d-none d-md-block">
                <img class="footerLogo img-fluid rounded" src="../storage/All4Ua.png">
            </div>
            <div class="col-sm text-white d-flex">
                <ul class="mb-0">
                    <li><a class="text-white" href="{{ route('home') }}/#about">{{ __('Про проект') }}</a></li>
                    <li><a class="text-white" href="{{ route('home') }}/#conditions">{{ __('Умови розіграшу') }}</a></li>
                    <li><a class="text-white" href="{{ route('home') }}/#faq">{{ __('FAQ') }}</a></li>
                </ul>
            </div>
            <div class="col-sm text-white d-flex">
                <ul>
                    <li><a class="text-white" href="{{ route('certificate.example') }}">{{ __('Приклад сертифікату') }}</a></li>
                    <li><a class="text-white" href="https://www.all4ukraine.org/view/ua/contacts.php" target="_blank">{{ __('Контакти') }}</a></li>
                </ul>
            </div>
            <div class="col-sm-5 col-md-4">
                <div class="row mx-3 mb-1">
                    @guest
                        <button id="loginButton" type="button" class="bgYellow mb-3 mb-md-0" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <div>{{ __('Особистий кабінет') }}</div>
                        </button>
                    @else
                        <a type="button" class="bgYellow mb-3 mb-md-0" href="{{ route('cabinet.view') }}">
                            <div>{{ __('Особистий кабінет') }}</div>
                        </a>
                    @endguest
                </div>
                <div class="row mt-4 mx-3">
                    <div class="d-flex justify-content-between">
                        <a href="https://www.facebook.com/all4ukraineua" class="iconsYellow iconsForSafari" target="_blank"><i class="fa-brands fa-2xl fa-facebook"></i></a>
                        <a href="https://twitter.com/all_4_ukraine" class="iconsYellow iconsForSafari" target="_blank"><i class="fa-brands fa-2xl fa-twitter"></i></a>
                        <a href="https://www.instagram.com/all4ukraine_ua/" class="iconsYellow iconsForSafari" target="_blank"><i class="fa-brands fa-2xl fa-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UC33UhCxyFSXd9KZgEoYwLUg" class="iconsYellow iconsForSafari" target="_blank"><i class="fa-brands fa-2xl fa-youtube"></i></a>
                        <a href="https://www.linkedin.com/company/86759344/" class="iconsYellow iconsForSafari" target="_blank"><i class="fa-brands fa-2xl fa-linkedin"></i></a>
                        <a href="https://www.tiktok.com/@all4ua.support" class="iconsYellow iconsForSafari" target="_blank"><i class="fa-brands fa-2xl fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
