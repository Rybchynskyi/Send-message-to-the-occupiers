<header class="site-header sticky-md-top py-1">
    <nav class="navbar navbar-expand-md py-0">
        <div class="container-fluid">
            <a class="navbar-brand py-2 h-75" href="{{ route('home') }}">
                <img style="max-height: 50px" src="../storage/logo_ppo.svg" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-4">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}#topBlock">{{ __('Головна') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}#about">{{ __('Про проект') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}#conditions">{{ __('Умови') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}#faq">{{ __('FAQ') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-earth-americas text-white"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (config('app.available_locales') as $locale)
                                <li class="ms-2"><a class="dropdown-item text-black" href="{{ route('changeLang', ['lang' => $locale]) }}"><img src="../storage/lang/{{$locale}}.svg" class="img-fluid rounded border me-2">{{ strtoupper($locale) }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @can('viewAdminPage')
                    <li class="nav-item">
                        <a class="py-2 d-none d-md-inline-block" href="{{ route('admin.purchases.index') }}">{{ __('Панель адміністратора') }}</a>
                    </li>
                    @endcan
                </ul>
                @guest
                    <button id="loginButton" type="button" class="bgYellow mb-3 mb-md-0" data-bs-toggle="modal" data-bs-target="#loginModal">
                        {{ __('Особистий кабінет') }}
                    </button>
                @else
                    <div class="mb-3 mb-md-0">
                        <a class="bgYellow py-2 mb-3" href="{{ route('cabinet.view') }}">
                            {{ __('Особистий кабінет') }}
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>
