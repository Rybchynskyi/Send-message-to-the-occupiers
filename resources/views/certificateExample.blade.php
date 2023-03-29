@extends('layouts.app')

@section('title-block')
    Main
@endsection

@section('content')
<div class="container">
    <div class="row mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../">{{ __('Головна') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Приклад сертифікату') }}</li>
            </ol>
        </nav>
    </div>

    <h4>{{ __('Після запуску ракети з Вашим посланням - ми відправимо Вам фото з підписаним снарядом, а також сформуємо для Вас сертифікат наступного зразка:') }} </h4>
    <div class="row">
        <div class="col-sm my-3 mx-4">
            <img src="../storage/certificate_{{Config::get('app.locale')}}.png" class="img-fluid">
        </div>
    </div>
</div>
@include('inc.modalLogin')
@endsection
