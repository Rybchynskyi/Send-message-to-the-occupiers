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
                <h3 class="my-0">Користувачі</h3>
                <button class="btn btn-success btn-sm ml-2" data-bs-toggle="modal" data-bs-target="#addUser">+</button>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-sm">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Соцсітка</th>
                        <th scope="col">Ім‘я</th>
                        <th scope="col">Пошта</th>
                        <th scope="col">Дата реєстрації</th>
                        <th scope="col">Адмінправа</th>
                        <th scope="col">Дії</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="text-center pt-3">
                            @if($user->google_id !== null)
                                <i class="fa-brands fa-google fa-xl"></i>
                            @elseif($user->facebook_id !== null)
                                <i class="fa-brands fa-facebook fa-xl"></i>
                            @elseif($user->github_id !== null)
                                <i class="fa-brands fa-github fa-xl"></i>
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-center pt-3">
                            @if($user->is_admin === 1)
                                <i class="fa-solid fa-user-check"></i>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <button class="editUserButton btn btn-info btn-sm mr-1" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#editUser"><i class="nav-icon fas fa-pen"></i></button>
                                <form class="my-0" method="post" action="{{ route('admin.user.destroy', $user->id) }}">
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
        let users = {{ Js::from($users) }};
    </script>

    @include('inc.modalUserCreateByAdmin')
    @include('inc.modalUserEditAdmin')
    @vite('resources/js/editUserModal.js')
@endsection

