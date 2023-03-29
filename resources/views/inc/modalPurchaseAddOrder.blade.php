<div class="modal fade" id="addOrder" tabindex="-1" aria-labelledby="addOrder" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Призначити заявці</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <div class="modal-body pb-4">
                <form id="addOrderForm" action="{{ route('purchase.update', 1) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-floating mb-3">
                        <p>Виберіть заявку:</p>
                        <select class="send_to form-select" name="send_to" aria-label="send_to">
                            {{--data from js--}}
                        </select>
                    </div>
                    <input type="hidden" name="place" value="purchases">
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-success">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
