@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
<style>
    #image-preview{
   
    width : 100px;
    height : auto;
    margin-top:15px;
    margin-bottom:15px;
    max-height:100px; 
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

                <h5 class="card-header"><i class="la la-desktop"></i> Kategori Artikel</h5>
                <div class="card-body">
                    <form action="{{ route('artikel.update',$artikel->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="patch" name="_method">
                        <div class="form-group">
                            <label for="Judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ $artikel->judul}}" name="judul"
                                required>
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Judul">Foto</label>
                            @if (isset($artikel) && $artikel->foto)
                                <p>
                                    <img id="image-preview" src="{{ asset('assets/img/artikel/'
                                    .$artikel->foto.'') }}" 
                                    style="margin-top:15px;margin-bottom:15px;
                                    max-height:100px; border:1px; border-color:black;">
                                </p>
                            @endif
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                                value="{{ $artikel->foto }}" id="image-source" onchange="previewImage();">
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Judul">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" name="id_kategori"
                                required>
                                @foreach($kategori as $data)
                                <option value="{{ $data->id }}" 
                                    @if($data->id == $artikel->id_kategori) selected="selected" @endif>{{ $data->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Judul">Tag</label>
                            <select class="form-control @error('tag') is-invalid @enderror" id="s2_demo3"
                                multiple="multiple" name="tag[]" required>
                                @foreach($tag as $data)
                                <option value="{{ $data->id }} "
                                    {{ (in_array($data->id, $select)) ? ' selected="selected"' : '' }}>
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
                            <label for="Judul">Konten</label>
                            <textarea id="editor1" class="form-control @error('konten') is-invalid @enderror"
                                name="konten" required>{{ $artikel->konten }}</textarea>
                            @error('konten')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-outline btn-primary btn-rounded btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
