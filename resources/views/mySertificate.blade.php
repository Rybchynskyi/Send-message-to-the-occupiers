@extends('layouts.app')

@section('title-block')
    Main
@endsection

@section('content')
<div class="container">
    <div class="row mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('cabinet.view') }}">{{ __('Особистий кабінет') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Сертифікат') }} "{{ $thisPurchase->title }}"</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-sm">
            <button id="convert" class="btn btn-warning me-2">{{ __('Зберегти') }} <i class="fa-regular fa-image fa-xl ps-1"></i></button>
            <a class="btn btn-warning me-2" onclick="Share.facebook('http://127.0.0.1:8000/storage/{{ $thisPurchase->sertificate_img }}','{{ __('Мій сертифікат') }}','{{ $thisPurchase->sertificate_img }}','{{ __('Зацініть') }}')">{{ __('Поділитись') }} <i class="fa-brands fa-facebook fa-xl ps-1"></i></a>
            <a class="btn btn-warning me-2" onclick="Share.twitter('http://127.0.0.1:8000/storage/{{ $thisPurchase->sertificate_img }}','{{ __('Мій сертифікат') }}')">{{ __('Поділитись') }} <i class="fa-brands fa-twitter fa-xl ps-1"></i></a>

            <script>
                Share = {
                    facebook: function(purl, ptitle, pimg, text) {
                        url  = 'http://www.facebook.com/sharer.php?s=100';
                        url += '&p[title]='     + encodeURIComponent(ptitle);
                        url += '&p[summary]='   + encodeURIComponent(text);
                        url += '&p[url]='       + encodeURIComponent(purl);
                        url += '&p[images][0]=' + encodeURIComponent(pimg);
                        Share.popup(url);
                    },
                    twitter: function(purl, ptitle) {
                        url  = 'http://twitter.com/share?';
                        url += 'text='      + encodeURIComponent(ptitle);
                        url += '&url='      + encodeURIComponent(purl);
                        url += '&counturl=' + encodeURIComponent(purl);
                        Share.popup(url);
                    },

                    popup: function(url) {
                        window.open(url,'','toolbar=0,status=0,width=626,height=436');
                    }
                };
            </script>


        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 my-3 mx-auto d-flex justify-content-center">
            <div id="certificate" class="certificate position-relative text-center text-white ">
                <img src="../storage/sertificate_bg.png" class="img-fluid w-100">
                <div class="certificateContent">
                    <strong class="certificateBG">{{ __('СЕРТИФІКАТ') }}</strong>
                    <p class="certificateText">{{ __('Даний сертифікат являється підтвердженням факту передачі Збройними Силами України палкого привіту русні від імені') }}</p>
                    <p class="certificateName">{{ $thisPurchase->full_name }}</p>
                    <img src="../storage/{{ $thisPurchase->sertificate_img }}" class="certificateImg img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js" integrity="sha512-UcDEnmFoMh0dYHu0wGsf5SKB7z7i5j3GuXHCnb3i4s44hfctoLihr896bxM0zL7jGkcHQXXrJsFIL62ehtd6yQ==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
@vite('resources/js/downloadImage.js')



@endsection


