<div class="modal fade" id="addPurchase" tabindex="-1" aria-labelledby="addPurchase" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Створити палкий привіт</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body pb-4">
                <form action="{{ route('purchase.store') }}" method="post">
                    <input type="hidden" name="place" value="admin">
                    @csrf
                    <div>
                        <label for="user_id">Виберіть користувача</label>
                    </div>
                    <div class="mb-3">
                        <select id="user_id" class="form-select" name="user_id" aria-label="user_id">
                            <option selected>Користувачі:</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="title">Напишіть послання донатера</label>
                        <input type="text" name="title" class="form-control" id="title"  placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="sum">Сума</label>
                        <input type="number" name="sum" class="form-control" id="sum"  placeholder="sum">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                        <label class="form-check-label" for="status1">
                            СФормовано
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="2">
                        <label class="form-check-label" for="status2">
                            Сплачено
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="status" id="status3" value="3">
                        <label class="form-check-label" for="status3">
                            Відправлено
                        </label>
                    </div>

                    <div class="form-group mb-3">
                        <label for="fullName">Напишіть ім`я донатера (для сертифікату)</label>
                        <input type="text" name="full_name" class="form-control" id="fullName"  placeholder="fullName">
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
