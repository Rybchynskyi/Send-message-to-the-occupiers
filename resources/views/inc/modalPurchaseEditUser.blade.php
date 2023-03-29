<div class="modal fade" id="editPurchase" tabindex="-1" aria-labelledby="editPurchase" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Відредагувати палкий привіт') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Закрити') }}"></button>
            </div>
            <div class="modal-body pb-4">
                <form id="UpdateForm" action="{{ route('purchase.update', 1) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-floating mb-3">
                        <input id="editTitle" type="text" name="title" class="form-control" placeholder="editTitle">
                        <label for="title">{{ __('Відредагуйте своє послання') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="editFullName" type="text" name="full_name" class="form-control" placeholder="editFullName" maxlength="27">
                        <label for="fullName">{{ __('Відредагуйте своє ім`я') }}</label>
                        <small>{{ __('Ім`я потрібно виключно для генерації') }} <a href="{{ route('certificate.example') }}" target="_blank">{{ __('сертифікату') }}</a></small>
                    </div>
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-success">{{ __('Зберегти') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
