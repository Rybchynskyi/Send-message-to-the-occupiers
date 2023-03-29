@extends('layouts.app')

@section('title-block')
    PPO
@endsection

@section('content')

@if($errors->any())
    @vite([
    'resources/js/bootstrap.bundle.js'
    ])
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {
            let myModal = new bootstrap.Modal(document.getElementById('loginModal'));
            myModal.show();
        })

    </script>
@endif

<div id="topBlock" class="block topImg text-center text-white">

    <div class="topMainText d-lg-inline-flex mt-4 mx-4">
            <div class="mx-4">{{ __('Передай привіт') }}</div><div class="parallelogram px-4"><div>{{ __('окупантам') }}</div></div>
    </div>

    <div class="topMessage my-3">
        {{ __('Підпиши снаряд для загарбників та допоможи нашим воїнам вигнати рашистську нечисть з українскької землі!') }}
    </div>
    @if(Config::get('app.locale') === 'ua')
        <img src="../storage/rocket_ua.png" class="img-fluid w-75 my-3">
    @else
        <img src="../storage/rocket_en.png" class="img-fluid w-75 my-3">
    @endif

    <div class="d-sm-flex justify-content-center align-items-center mx-3">
        <div class="parallelogramBorder d-flex justify-content-center align-items-center">
            <div>{{ __('Задонать на ЗСУ') }}</div>
        </div>
        <i class="headerArrow fa-solid fa-2xl fa-chevron-right mx-2"></i>
        <div class="parallelogramBorder d-flex justify-content-center align-items-center">
            <div>{{ __('Підпиши снаряд') }}</div>
        </div>
        <i class="headerArrow fa-solid fa-2xl fa-chevron-right mx-2"></i>
        <div class="parallelogramBorder d-flex justify-content-center align-items-center">
            <div>{{ __('Отримай фото з підписом та') }} <a class="text-white" href="#sertificate">{{ __('сертифікат') }}</a></div>
        </div>
    </div>
</div>

<div class="container">

{{--    Numbers--}}
    <div class="row mt-4 ">
        <div class="col-sm text-center px-4">
            <div class="d-flex justify-content-center align-items-center">
                <img class="numbersImg img-fluid" src="../storage/numbers_1.svg">
                <p class="numbersText ps-2"><strong>{{ 100 + $purchasesCount }}</strong></p>
            </div>
            <div class="px-4">
                {{ __('Снарядів') }}<br>{{ __('вже підписано') }}
            </div>
        </div>
        <div class="col-sm text-center px-4">
            <div class="d-flex justify-content-center align-items-center">
                <img class="numbersImg img-fluid" src="../storage/numbers_2.svg">
                <p class="numbersText ps-2"><strong>{{ 70 + $usersCount }}</strong></p>
            </div>
            <div class="px-4">
                {{ __('Добродіїв долучилось до “гарячого прийому” окупантів') }}
            </div>
        </div>
        <div class="col-sm text-center px-4">
            <div class="d-flex justify-content-center align-items-center">
                <img class="numbersImg img-fluid" src="../storage/numbers_3.svg">
                <p class="numbersText ps-2"><strong>{{ 2000 + $sum }}</strong></p>
            </div>
            <div class="px-4">
                {{ __('Передано фонду All4Ukraine для закриття потреб ЗСУ') }}
            </div>
        </div>
    </div>
    <div class="divider text-center">
        @guest
            <button type="button" class="yellowButton btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                <div>{{ __('Підписати снаряд') }}</div>
            </button>
        @else
            <a type="button" class="yellowButton btn btn-primary" href="{{ route('cabinet.view') }}">
                <div>{{ __('Підписати снаряд') }}</div>
            </a>
        @endguest
        <hr>
    </div>
{{--About--}}
    <div id="about" class="block sectionName">
        {{ __('Про проект') }}
    </div>
    <div class="row d-flex align-items-center mb-4">
        <div class="contentText col-sm-7 pe-4">
            <p>{{ __('Мир на нашій землі можливий лише за умови тотального знищення світового зла під назвою «Русскіє».') }}</p>
            <p>{{ __('А для цього, в свою чергу, потрібна фінансова допомога для закриття потреб наших захисників.') }}</p>
            <p>{{ __('Тому ми організували оригінальний спосіб допомоги ЗСУ, і одночасно долучитись до знизення рашистів на нашій землі.') }}</p>
            <p>{{ __('Всі залучені від проекту кошти відразу поступають на рахунок волонтерського фонду All4Ukraine, який з перших днів повномасштабної війни допомагає ЗСУ, закриваючи їх матеріальні потреби.') }}</p>
        </div>
        <div class="col-sm-5">
            <img class="img-fluid rounded mb-3" src="../storage/photo1s.png">
            <img class="img-fluid rounded" src="../storage/photo2s.png">
        </div>
    </div>
    <div class="row d-flex align-items-center">
        <div class="contentText col-sm-7 pe-4">
            <iframe class="rounded" width="100%" height="315" src="https://www.youtube.com/embed/7B-vINgOa2U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="col-sm-5">
            <h4>{{ __('Це війна кожного з нас') }}</h4>
            <h4>{{ __('І кожен може внести свій вклад в перемогу!') }}</h4>
        </div>
    </div>
    <div class="divider text-center">
        @guest
            <button type="button" class="yellowButton btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                <div>{{ __('Підписати снаряд') }}</div>
            </button>
        @else
            <a type="button" class="yellowButton btn btn-primary" href="{{ route('cabinet.view') }}">
                <div>{{ __('Підписати снаряд') }}</div>
            </a>
        @endguest
        <hr>
    </div>
{{--    conditions--}}
    <div id="conditions" class="block conditions">
        <div class="conditionsTitle">
            {{ __('Умови участі') }}
        </div>
        <div class="d-flex flex-row-reverse">
            <div class="conditionsBlock">
                {{ __('Створіть заявку на підпис на снаряді в особистому кабінеті на даному сайті') }}
            <div class="conditionsNumberBlock"><div>1</div></div>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="conditionsBlock">
                {{ __('Внесіть донат на рахунок волонтерського фонду All4Ukraine') }}
            <div class="conditionsNumberBlock"><div>2</div></div>
            </div>
        </div>
        <div class="d-flex flex-row-reverse">
            <div class="conditionsBlock">
                {{ __('По мірі готовності снаряду військові зроблять для вас фото') }}
            <div class="conditionsNumberBlock"><div>3</div></div>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="conditionsBlock">
                {{ __('Отримайте фото підписаного снаряду та ') }}<a href="#sertificate" target="_blank">{{ __('сертифікат') }}</a> {{ __('в особистому кабінеті') }}
            <div class="conditionsNumberBlock"><div>4</div></div>
            </div>
        </div>
    </div>
    <div class="divider text-center">
        @guest
            <button type="button" class="yellowButton btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                <div>{{ __('Підписати снаряд') }}</div>
            </button>
        @else
            <a type="button" class="yellowButton btn btn-primary" href="{{ route('cabinet.view') }}">
                <div>{{ __('Підписати снаряд') }}</div>
            </a>
        @endguest
        <hr>
    </div>
{{--Sertificate--}}
    <div id="sertificate" class="block sectionName">
        {{ __('Приклад сертифікату') }}
    </div>
    <p class="contentText">{{ __('Після запуску снаряду з Вашим посланням ми відправимо Вам на пошту фото з підписаним снарядом, а також підготуємо для Вас сертифікат наступного зразка:') }}</p>
    <div class="row">
        <div class="col-sm mb-3 text-center">
            <img src="../storage/certificate_{{Config::get('app.locale')}}.png" class="sertificateExample img-fluid w-75">
        </div>
    </div>
    <div class="divider text-center">
        @guest
            <button type="button" class="yellowButton btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                <div>{{ __('Підписати снаряд') }}</div>
            </button>
        @else
            <a type="button" class="yellowButton btn btn-primary" href="{{ route('cabinet.view') }}">
                <div>{{ __('Підписати снаряд') }}</div>
            </a>
        @endguest
        <hr>
    </div>
{{--    FAQ--}}
    <div id="faq" class="block sectionName">
        {{ __('Відповіді на часті запитання') }}
    </div>
    <div class="row">
        <div class="contentText col-sm-8 rounded px-4">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <strong class="h5">{{ __('“Вы в своем уме? Там же наши дети!!!”') }}</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>{{ __('Если в Украине ваши слабоумные дети - то сделайте все от вас зависящее для того, чтобы они убрались с территории чужой для вас и беспощадной для них страны. Иначе - ваши дети-окупанты преврятятся в удобрение на нашей земле. И мы будем этому безумно рады.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong class="h5">{{ __('“Як я можу бути впевнений що гроші пішли за призначенням”') }}</strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>{{ __('В особистому кабінеті, в розділі «Донати направлені на наступні потреби ЗСУ» ви побачите на яку саме заявку волонтерського фонду') }} <a target="_blank" href="https://all4ukraine.org">All4Ukraine</a> {{ __('перерахований ваш донат. З часом заявка буде закрита, а ви будете причасним до її закриття.') }}</p>
                            <p><a target="_blank" href="https://all4ukraine.org">All4Ukraine</a> - {{ __('відомий та авторитетний серед військових волонтерський фонд, який допомагає Збройним Силам України з перших днів повномасштабного вторгнення') }}</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong class="h5">{{ __('“Я задонатив більше тижня тому, а фото так і не прийшло”') }}</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>{{ __('Розуміємо. Хочеться вже побачити вашу особисту помсту рашистам. Проте не забувайте що в Україні йде війна. І наші захисники професійно роблять свою роботу на фронті. Майте терпіння. Вони зроблять фото, коли буде нагода і коли це буде безпечно.') }}</p>
                            <p>{{ __('При Вашому бажанні - ми повернемо Вам кошти.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
{{--            <img class="img-fluid rounded mb-3" src="../storage/photo3s.png">--}}
            <img class="img-fluid rounded" src="../storage/photo4s.png">
        </div>
    </div>
    <div class="divider text-center">
        @guest
            <button type="button" class="yellowButton btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                <div>{{ __('Підписати снаряд') }}</div>
            </button>
        @else
            <a type="button" class="yellowButton btn btn-primary" href="{{ route('cabinet.view') }}">
                <div>{{ __('Підписати снаряд') }}</div>
            </a>
        @endguest
        <hr>
    </div>
    <div class="row text-center mb-4">
        <p class="h4">{{ __('Війна не закінчується, а лише набирає обертів') }}</p>
        <p class="h4">{{ __('І нажаль, кількість заявок від військових які отримує волонтерський фонд All4Ukraine, набагато більша ніж кількість донатів, які приходять від добродіїв на їх закриття.') }}</p>
        <p class="h4">{{ __('Даний проект - це ще один з багатьох наших способів підтримати ЗСУ та наблизити нашу Перемогу') }}</p>
    </div>
</div>
@include('inc.modalLogin')


@endsection


