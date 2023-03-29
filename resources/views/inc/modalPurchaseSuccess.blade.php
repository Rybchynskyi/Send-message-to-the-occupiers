<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Закрити заявку</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
            </div>
            <form id="uploadForm" method="post" action="{{ route('purchase.uploadImage', 1) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="uploadBullet">Добавте фото підписаного знаряду</label>
                        <input type="file" class="form-control-file" id="uploadBullet" name="uploadBullet">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відмінити</button>
                    <button type="submit" class="btn btn-primary">Закрити заявку</button>
                </div>
            </form>
        </div>
    </div>
</div>
