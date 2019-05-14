@extends('layouts.backend')
@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header"> 
                    <i class="zmdi zmdi-badge-check zmdi-hc-fw"></i> 
                    {{ $artikel->judul }} - <b>
                        {{ $artikel->user->name }}
                    </b>
                </h5>
                <div class="card-body">
                    <img src="{{ asset('assets/img/artikel/'.$artikel->foto.'') }}" 
                    style="width:300px;" class="float-left rounded m-r-30 m-b-30">
                    <p>{!! $artikel->konten !!}</p>
                    <br>
                    <p>
                        Kategori :
                        <button class="btn btn-sm btn-rounded btn-info">
                            {{ $artikel->kategori->nama_kategori }}
                        </button>
                    </p>
                    <p> Tag :
                        @foreach($artikel->tag as $data)
                        <button class="btn btn-sm btn-rounded btn-success">
                            #{{ $data->nama_tag }}
                        </button>
                        @endforeach
                    </p>
                    <p>
                        Tanggal : {{ ($artikel->created_at->formatLocalized('%A, %d %B %Y %H:%I')) }} WIB
                    </p>
                    <p>
                        <a href="#" 
                        class="btn btn-outline btn-block btn-rounded btn-info ">
                            <i class="la la-paper-plane"></i> Lihat Artikel <i
                                class="zmdi zmdi-airplane zmdi-hc-fw"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
