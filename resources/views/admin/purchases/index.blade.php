@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header"><strong class="mr-auto">Успіх</strong><small>Закрити</small>
                    <button data-bs-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">{{ session('success') }}</div>
            </div>
        </div>
    @elseif(session('notSuccess'))
        <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header"><strong class="mr-auto">Не успіх</strong><small>Закрити</small>
                    <button data-bs-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">{{ session('notSuccess') }}</div>
            </div>
        </div>
    @endif

    <div class="row mx-2">
        <div class="col-sm">
            <div class="d-flex my-2 align-items-center">
                <h3 class="my-0">Замовлення</h3>
                <button class="btn btn-success btn-sm ml-2" data-bs-toggle="modal" data-bs-target="#addPurchase">+</button>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-sm">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Послання</th>
                        <th scope="col">Аккаунт</th>
                        <th scope="col">На імя</th>
                        <th scope="col">Сума донату</th>
                        <th scope="col">Етап</th>
                        <th scope="col">Дії</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->title }}</td>
                        <td>{{ $purchase->username }}</td>
                        <td>{{ $purchase->full_name }}</td>
                        <td>{{ $purchase->sum }}</td>
                        <td>
                            <div class="d-inline-flex">
                                <form action="{{ route('purchase.update', $purchase->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class="btn btn{{ ($purchase->status == 1)?"":"-outline" }}-warning btn-sm mr-1">Створений</button>
                                </form>

                                <form action="{{ route('purchase.update', $purchase->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="2">
                                    <button type="submit" class="btn btn{{ ($purchase->status == 2)?"":"-outline" }}-warning btn-sm mr-1">Оплачений</button>
                                </form>

                                <form action="{{ route('purchase.update', $purchase->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="hidden" name="status" value="3">
                                    <button type="submit" class="btn btn{{ ($purchase->status == 3)?"":"-outline" }}-warning btn-sm mr-1">Відправлений</button>
                                </form>

                                <button class="uploadButton btn btn{{ ($purchase->status == 4)?"":"-outline" }}-warning btn-sm mr-1" data-id="{{ $purchase->id }}" data-bs-toggle="modal" data-bs-target="#successModal">Завершений</button>

                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                @if(isset($purchase->sertificate_img))
                                    <a href="../storage/{{ $purchase->sertificate_img }}" class="btn btn-light btn-sm mr-1"><i class="nav-icon fas fa-image"></i></a>
                                @endif
                                <button class="btn btn-success btn-sm mr-1"><i class="nav-icon fas fa-info mx-1"></i></button>
                                <button class="editButton btn btn-info btn-sm mr-1" data-id="{{ $purchase->id }}" data-bs-toggle="modal" data-bs-target="#editPurchase"><i class="nav-icon fas fa-pen"></i></button>
                                <button class="addOrderButton btn btn-warning btn-sm mr-1" data-id="{{ $purchase->id }}" data-bs-toggle="modal" data-bs-target="#addOrder"><i class="nav-icon fas fa-bullseye"></i></button>
                                <form class="my-0" method="post" action="{{ route('purchase.destroy', $purchase->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm mr-1"><i class="nav-icon fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        let purchases = {{ Js::from($purchases) }};
    </script>

    @include('inc.modalPurchaseCreateByAdmin')
    @include('inc.modalPurchaseAddOrder')
    @include('inc.modalPurchaseEditAdmin')
    @include('inc.modalPurchaseSuccess')
    @vite('resources/js/editModal.js')
    @vite('resources/js/uploadImage.js')
    @vite('resources/js/orderListFromMainSite.js')
@endsection

