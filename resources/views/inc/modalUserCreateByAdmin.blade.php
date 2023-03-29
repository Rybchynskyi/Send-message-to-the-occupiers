<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addPurchase" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Створити користувача</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body pb-4">
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="userName">Ім`я</label>
                        <input type="text" name="userName" class="form-control" id="userName"  placeholder="userName">
                    </div>
                    <div class="form-group mb-3">
                        <label for="userEmail">Пошта</label>
                        <input type="text" name="userEmail" class="form-control" id="userEmail"  placeholder="userEmail">
                    </div>
                    <div class="form-group mb-3">
                        <label for="userPassword">Пароль</label>
                        <input type="text" name="userPassword" class="form-control" id="userPassword"  placeholder="userPassword">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="isAdmin" id="isAdmin0" value="" checked>
                        <label class="form-check-label" for="isAdmin0">
                            Не має прав адміністратора
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="isAdmin" id="isAdmin1" value="1">
                        <label class="form-check-label" for="isAdmin1">
                            Має права адміністратора
                        </label>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
