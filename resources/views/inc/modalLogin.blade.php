<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">{{__('Підписати снаряд в особистому кабінеті')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <h5 class="text-center mt-3 mb-3">{{ __('Увійти через соціальні мережі:') }}</h5>
                    <div class="text-center">
                        <a href="{{ route('socialite.google') }}" class="loginButton loginGoogle btn btn-primary px-2 py-2 mx-2">
                            <div><i class="fa-brands fa-google fa-xl"></i></div>
                        </a>
                        <a href="{{ route('socialite.facebook') }}" class="loginButton loginFacebook btn btn-primary px-2 py-2 mx-2">
                            <div><i class="fa-brands fa-facebook fa-xl"></i></div>
                        </a>
                        <a href="{{ route('socialite.github') }}" class="loginButton loginGithub btn btn-primary px-2 py-2 mx-2">
                            <div><i class="fa-brands fa-github fa-xl"></i></div>
                        </a>
                    </div>
                </div>
                <div class="accordion accordion-flush pt-4" id="loginViaMail">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#loginViaMailBody" aria-expanded="false" aria-controls="flush-collapseOne">
                                {{__('Або увійдіть/зареєструйтесь через пошту')}}
                            </button>
                        </h2>
                        <div id="loginViaMailBody" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#loginViaMail">
                            <div class="accordion-body">
                                <ul class="nav nav-tabs nav-fill">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#login" data-bs-toggle="tab" aria-current="page"><h5>{{ __('Вхід') }}</h5></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#registration" data-bs-toggle="tab"><h5>{{ __('Реєстрація') }}</h5></a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active mt-4" id="login" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <h5 class="text-center mb-3">{{ __('Увійти через пошту') }}</h5>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Електронна пошта') }}</label>

                                                <div class="col-md-6">
                                                    <input id="loginEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                                <div class="col-md-6">
                                                    <input id="loginPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Запам‘ятати мене') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Вхід') }}
                                                    </button>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Забули пароль?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade show mt-4" id="registration" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <h5 class="text-center mb-3">{{ __('Зареєструватися через пошту') }}</h5>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ім‘я') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Електронна пошта') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Підтвердити пароль') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Зареєструватися') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
