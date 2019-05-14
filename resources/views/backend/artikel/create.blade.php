@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
<style>
    #image-preview{
    display:none;
    width : 100px;
    height : auto;
}
</style>
@endsection

@section('js')
<script src="{{ asset('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor1');

</script>
<script src="{{ asset('assets/backend/assets/js/components/select2-init.js')}}">
</script>
<script src="{{ asset('assets/backend/assets/vendor/select2/select2.min.js')}}"></script>
<script>
    function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <h5 class="card-header">
                    <i class="la la-desktop">
                    </i> Artikel</h5>
                <div class="card-body">
                    <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control 
                            @error('judul') is-invalid @enderror" name="judul" required>
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <img id="image-preview" alt="image preview"/>
                            <input type="file" class="form-control  
                            @error('foto') is-invalid @enderror" id="image-source" onchange="previewImage();" name="foto" required>
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control 
                                @error('kategori') is-invalid @enderror" name="id_kategori" required>
                                @foreach($kategori as $data)
                                <option value="{{ $data->id }}">
                                    {{ $data->nama_kategori }}
                                </option>
                                @endforeach
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tag</label>
                            <select class="form-control 
                                @error('tag') is-invalid @enderror" id="s2_demo3" multiple="multiple" name="tag[]"
                                required>
                                @foreach($tag as $data)
                                <option value="{{ $data->id }}">
                                    {{ $data->nama_tag }}
                                </option>
                                @endforeach
                            </select>
                            @error('tag')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konten</label>
                            <textarea id="editor1" class="form-control 
                                @error('konten') is-invalid @enderror" name="konten" required>
                            </textarea>
                            @error('konten')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline 
                                btn-primary btn-rounded btn-block">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
