@extends('layouts.app')

@section('title-block', 'Cabinet')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm d-flex">
                <h1>{{ __('Особистий кабінет') }}</h1>
            </div>
            <div class="col-sm text-end">
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Вихід') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <h4 class="mb-0"><i class="fa-solid fa-rocket me-2 text-secondary"></i>{{ __('Ваші палкі побажання русні') }}</h4>
                            <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#addPurchase">
                                {{__('Підписати снаряд')}}</i></button>
                        </div>
                        @if(count($purchases) === 0)
                            <div class="alert alert-success my-2 mx-1" role="alert">
                                <h4>{{ __('Ви ще не створили жодного палкого побажання русні') }}</h4>
                                {{ __('Підпишіть свій перший снаряд та чекайте сетифікат з передової') }}
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-3 px-0">
                                    <div class="card pb-0 mx-1">
                                        <div class="card-header text-bg-secondary">
                                            <h5 class="step mb-0"><strong>{{ __('Створено заявку') }}</strong></h5>
                                        </div>
                                    </div>
                                    @foreach($purchases as $purchase)
                                        <div class="rocketContainer d-flex justify-content-center align-items-center border-end">
                                            @if($purchase->status == 1)
                                                <div class="rocketBackground d-flex align-items-center justify-content-center">
                                                    <div class="rocketTitle">
                                                        {{ mb_substr($purchase->title, 0, 30) . "..."  }}
                                                    </div>
                                                    <div class="rocketButtons d-flex justify-content-end">
                                                        @if($purchase->status < 3)
                                                            <button class="editButton btn btn-sm btn-primary me-1 px-1 py-1" data-id="{{ $purchase->id }}" data-bs-toggle="modal" data-bs-target="#editPurchase"><i class="fa-solid fa-gear"></i></button>
                                                        @endif
                                                        <form class="my-0" method="post" action="{{ route('purchase.destroy', $purchase->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm btn-danger px-1 py-1"><i class="fa-solid fa-trash-can"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <hr class="my-0">
                                    @endforeach
                                </div>
                                <div class="col-md-3 px-0">
                                    <div class="card pb-0 mx-1">
                                        <div class="card-header text-bg-info">
                                            <h5 class="step mb-0"><strong>{{ __('Передано волонтерам') }}</strong></h5>
                                        </div>
                                    </div>
                                    @foreach($purchases as $purchase)
                                        <div class="rocketContainer d-flex justify-content-center align-items-center border-end">
                                            @if($purchase->status == 2)
                                                <div class="rocketBackground d-flex align-items-center justify-content-center">
                                                    <div class="rocketTitle">
                                                        {{ mb_substr($purchase->title, 0, 30) . "..."  }}
                                                    </div>
                                                    <div class="rocketButtons d-flex justify-content-end">
                                                        @if($purchase->status < 3)
                                                            <button class="editButton btn btn-sm btn-primary me-1 px-1 py-1" data-id="{{ $purchase->id }}" data-bs-toggle="modal" data-bs-target="#editPurchase"><i class="fa-solid fa-gear"></i></button>
                                                        @endif
                                                        <form class="my-0" method="post" action="{{ route('purchase.destroy', $purchase->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="place" value="cabinet">
                                                            <button type="submit" class="btn btn-sm btn-danger px-1 py-1"><i class="fa-solid fa-trash-can"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <hr class="my-0">
                                    @endforeach
                                </div>
                                <div class="col-md-3 px-0">
                                    <div class="card pb-0 mx-1">
                                        <div class="card-header text-bg-primary">
                                            <h5 class="step mb-0"><strong>{{ __('Відправлено ЗСУ') }}</strong></h5>
                                        </div>
                                    </div>
                                    @foreach($purchases as $purchase)
                                        <div class="rocketContainer d-flex justify-content-center align-items-center border-end">
                                            @if($purchase->status == 3)
                                                <div class="rocketBackground d-flex align-items-center justify-content-center">
                                                    <div class="rocketTitle">
                                                        {{ mb_substr($purchase->title, 0, 30) . "..."  }}
                                                    </div>
                                                    <div class="rocketButtons d-flex justify-content-end">
                                                        @if($purchase->status < 3)
                                                            <button class="editButton btn btn-sm btn-primary me-1 px-1 py-1" data-id="{{ $purchase->id }}" data-bs-toggle="modal" data-bs-target="#editPurchase"><i class="fa-solid fa-gear"></i></button>
                                                        @endif
                                                        <form class="my-0" method="post" action="{{ route('purchase.destroy', $purchase->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="place" value="cabinet">
                                                            <button type="submit" class="btn btn-sm btn-danger px-1 py-1"><i class="fa-solid fa-trash-can"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <hr class="my-0">
                                    @endforeach
                                </div>
                                <div class="col-md-3 px-0">
                                    <div class="card pb-0 mx-1">
                                        <div class="card-header text-bg-warning">
                                            <h5 class="step mb-0"><strong>{{ __('Отримано руснею') }}</strong></h5>
                                        </div>
                                    </div>
                                    @foreach($purchases as $purchase)
                                        <div class="rocketContainer d-flex justify-content-center align-items-center">
                                            @if($purchase->status == 4)
                                                <div class="rocketBackground d-flex align-items-center justify-content-center">
                                                    <div class="rocketTitle">
                                                        {{ mb_substr($purchase->title, 0, 30) . "..."  }}
                                                    </div>
                                                    <div class="rocketButtons d-flex justify-content-end">
                                                        @if($purchase->status < 3)
                                                            <button class="editButton btn btn-sm btn-primary me-1 px-1 py-1" data-id="{{ $purchase->id }}" data-bs-toggle="modal" data-bs-target="#editPurchase"><i class="fa-solid fa-gear"></i></button>
                                                        @endif
                                                        <form class="my-0" method="post" action="{{ route('purchase.destroy', $purchase->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="hidden" name="place" value="cabinet">
                                                            <button type="submit" class="btn btn-sm btn-danger px-1 py-1"><i class="fa-solid fa-trash-can"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <hr class="my-0">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('notSuccess'))
                    <div class="alert alert-danger">
                        {{ session('notSuccess') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h4><i class="fa-solid fa-file-invoice me-2 text-secondary"></i>{{ __('Ваші сертифікати:') }}</h4>
                        <div class="scrollbar pe-2">
                            @if($sertificateCount === 0)
                                <p>{{ __('У вас поки що немає сертифікатів') }}</p>
                            @else
                                @foreach($purchases as $purchase)
                                    @if($purchase->status == 4)
                                        <div class="">
                                            <form action="{{ route('certificate.show') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $purchase->id }}">
                                                <button type="submit" class="certificateButton rounded text-start pt-1">
                                                    <h5 class="mb-1 ps-1">{{ $purchase->title }}</h5>
                                                    <p class="mb-0 ps-1">{{ $purchase->updated_at }}</p>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-3">
                <div class="card h-100 ">
                    <div class="card-body pb-0">
                        <h4><i class="fa-solid fa-clock-rotate-left me-2 text-secondary"></i>{{ __('Історія') }}</h4>
                        <div class="scrollbar pe-2">
                            @forelse($histories as $history)
                                <div class="mb-1">
                                    <strong>{{ $history->created_at }}</strong>
                                </div>
                                <div>
                                    {{ __('Повідомлення') }} "{{ $history->purchase_title }}"
                                    @switch($history->type)
                                        @case($history->type == 4)
                                        {{ __('було передано русні від ЗСУ') }}
                                        @break
                                        @case($history->type == 3)
                                        {{ __('було відправлено ЗСУ') }}
                                        @break
                                        @case($history->type == 2)
                                        {{ __('було передано волонтерам. Чекайте на його відправку ЗСУ') }}
                                        @break
                                        @case($history->type == 1)
                                        {{ __('було створено. Воно буде відправлено ЗСУ після внесення даних') }}
                                    @endswitch
                                </div>
                                <hr class="my-1">
                            @empty
                                <p>{{ __('У вас поки що немає створених послань') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm">
                <div class="card">
                    <div class="card-body table-donations">
                        <h4><i class="fa-solid fa-hand-holding-medical me-2 text-secondary"></i>{{ __('Донати направлені на наступні потреби ЗСУ:') }}</h4>
                        @if(count($purchases) === 0)
                        <p>{{ __('У вас поки що немає створених та оплачених послань') }}</p>
                        @else
                            <table class="table table-bordered border-secondary table-sm">
                                <thead class="table-success border-secondary">
                                <tr>
                                    <th scope="col">{{ __('Повідомлення') }}</th>
                                    <th scope="col">{{ __('Сума') }}</th>
                                    <th scope="col">{{ __('Направлено на заявку') }}</th>
                                </tr>
                                </thead>
                                @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->title }}</td>
                                        <td>{{ $purchase->sum }}</td>
                                        @if($purchase->sum > 0)
                                            @if($purchase->send_to !== null)
                                                <td id="sendToTitle_{{ $purchase->id }}" class="sendToTitle" data-send_to_id="{{ $purchase->send_to }}">
                                                    <strong class="placeholder col-6"></strong><br>
                                                    <p class="placeholder-glow">
                                                        <span class="placeholder col-4"></span>
                                                        <span class="placeholder col-3"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-3"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-3"></span>
                                                        <span class="placeholder col-4"></span>
                                                        <span class="placeholder col-3"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-3"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-3"></span>
                                                    </p>

                                                </td>
                                            @else
                                                <td>({{ __('Ще не розподілено') }})</td>
                                            @endif
                                        @else
                                            <td>({{ __('Ще не оплачено') }})</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    let purchases = {{ Js::from($purchases) }};
</script>

@vite('resources/js/editModal.js')
@vite('resources/js/letterCounter.js')
@vite('resources/js/cabinetStepsHeight.js')
@vite('resources/js/fillPurposeContainers.js')
@vite('resources/js/selectMessage.js')


@include('inc.modalPurchaseCreateByUser')
@include('inc.modalPurchaseEditUser')
