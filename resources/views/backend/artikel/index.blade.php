@extends('layouts.backend')
@section('css')
<link rel="stylesheet"
    href="{{  asset('assets/backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">

@endsection

@section('js')
<script src="{{ asset('assets/backend/assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('assets/backend/assets/js/components/datatables-init.js')}}"></script>
@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <h5 class="card-header"><i class="la la-desktop"></i> Kategori Artikel</h5>
                <div class="card-body">
                    <center>
                        <a href="{{ route('artikel.create') }}" class="btn btn-info btn-sm btn-rounded btn-outline"
                            title="Tambah"><i class="zmdi zmdi-plus-circle-o zmdi-hc-fw"></i> </a>
                    </center>
                    <br>
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($artikel as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->slug }}</td>
                                <td>{{ $data->kategori->nama_kategori }}</td>
                                <td>{{ $data->user->name }}</td>
                                <td>
                                    <img src="{{ asset('assets/img/artikel/'.$data->foto.'') }}"
                                        style="width:250px;" alt="Foto"></td>
                                <td>
                                    <form action="{{ route('artikel.destroy',$data->id) }}" method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                                        <a href="{{ route('artikel.edit',$data->id) }}"
                                            class="btn btn-rounded btn-sm btn-outline-warning" title="Edit">
                                            <i class="la la-pencil"></i>
                                        </a>
                                        <a href="{{ route('artikel.show',$data->id) }}"
                                            class="btn btn-rounded btn-sm btn-outline-primary" title="Lihat">
                                            <i class="la la-pencil"></i>
                                        </a>
                                        <button type="submit" title="Hapus"
                                            class="btn btn-sm btn-rounded btn-outline-danger">
                                            <i class=" zmdi zmdi-delete zmdi-hc-fw"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
