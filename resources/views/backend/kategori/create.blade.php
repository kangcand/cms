<div class="modal fade kategori" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle2"><i class="zmdi zmdi-badge-check zmdi-hc-fw"></i> Tambah
                    Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="zmdi zmdi-close"></span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline btn-rounded btn-danger btn-sm" data-dismiss="modal"><i
                        class="la la-close"></i>Batal</button>
                <button type="submit" class="btn btn-outline btn-rounded btn-info btn-sm"><i
                        class="zmdi zmdi-check zmdi-hc-fw"></i>Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
