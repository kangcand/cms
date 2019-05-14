@extends('layouts.frontend')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Blog Home
                </h1>
                <p class="text-white link-nav"><a href="{{ url('/') }}">Home </a> <span
                        class="lnr lnr-arrow-right"></span>
                    <a href="{{ url('blog') }}"> Blog Home</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start blog-posts Area -->
<section class="blog-posts-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                @foreach($artikel as $data)
                <div class="single-post">
                    <img class="img-fluid" src="{{ asset('assets/img/artikel/'.$data->foto.'')}}" alt="">
                    <ul class="tags">
                        @foreach($data->tag as $key)
                        <li>
                            <a href="/blog-tag/{{ $key->slug }}">
                                #{{ $key->nama_tag }},
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <a href="/blog/{{ $data->slug }}">
                        <h1>
                            {{ $data->judul }}
                        </h1>
                    </a>
                    <p>
                        {!! str_limit($data->konten,150) !!}
                    </p>
                    <div class="bottom-meta">
                        <div class="user-details row align-items-center">
                            <div class="comment-wrap col-lg-6">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-heart">

                                            </span> 4 likes</a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                                </ul>
                            </div>
                            <div class="social-wrap col-lg-6">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="col-lg-4 sidebar">
                <div class="single-widget search-widget">
                    <form class="example" action="#" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="Search Posts" name="search2">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="single-widget protfolio-widget">
                    <img src="{{ asset('assets/img/logo1.png')}}" alt="">
                    <a href="#">
                        <h4>Assalaam</h4>
                    </a>
                    <p>
                        MCSE boot camps have its supporters and
                        its detractors. Some people do not understand why you should have to spend money
                        on boot camp when you can get.
                    </p>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>

                <div class="single-widget category-widget">
                    <h4 class="title">Kategori Artikel</h4>
                    <ul>
                        @foreach($kategori as $data)
                        <li>
                            <a href="/blog-kategori/{{ $data->slug }}"
                                class="justify-content-between align-items-center d-flex">
                                <h6>{{ $data->nama_kategori }}</h6> <span>{{ $data->artikel->count() }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>


                <div class="single-widget tags-widget">
                    <h4 class="title">Tag Artikel</h4>
                    <ul>
                        @foreach($tag as $data)
                        <li><a href="/blog-tag/{{ $data->slug }}">{{ $data->nama_tag }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End blog-posts Area -->
@endsection
