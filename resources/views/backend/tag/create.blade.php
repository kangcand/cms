<div class="modal fade tag" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalTitle2"><i class="zmdi zmdi-badge-check zmdi-hc-fw"></i> Tambah
                    Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="zmdi zmdi-close"></span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('tag.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama Tag</label>
                        <input type="text" name="nama_tag" class="form-control @error('nama_tag') is-invalid @enderror" required>
                        @error('nama_tag')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
