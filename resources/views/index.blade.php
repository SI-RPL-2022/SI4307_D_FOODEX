@extends('layouts.main')
@section('title', 'Beranda')
@section('content')
<section id="banner">
    <img class="img-banner" src="{{ asset('assets/images/banner.png') }}" alt="" style="width:100%">
</section>
<section id="menu">
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-6 mb-3 d-flex justify-content-end">
                <div style="width: 10rem;">
                    <a href="{{ route('menus') }}">
                        <img src="{{ asset('assets/images/menu_menu.png') }}" class="card-img-top" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-6 mb-3 d-flex justify-content-start">
                <div style="width: 10rem;">
                    <a href="{{ route('subscription.index') }}">
                        <img src="{{ asset('assets/images/menu_berlangganann.png') }}" class="card-img-top" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="menuhariini">
    <p class="h2 text-center">Today’s Menu</p>
    <p class="h6 text-end"><a class="text-dark text-decoration-none" href="{{ route('menus') }}">Lihat lebih banyak <span class="fa-solid fa-arrow-right"></span></a></p>
    <div class="row">
        @forelse ($menus as $menu)
        <div class="col-12 col-lg-4 mb-3">
            <a href="{{ route('menus') }}" class="text-decoration-none post-link text-dark">
                <div class="card card-menu">
                    <img src="{{ asset($menu->image) }}" class="card-img-top" alt="Menu Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text card-description mb-0">{{ $menu->description }}</p>
                        <p class="card-text">Kalori : {{ $menu->calories }}</p>
                    </div>
                    <div class="card-footer">
                        <form action="" method="post" class="d-flex">
                            <div class="card-price">
                                <p class="card-text">@rupiah($menu->price)</p>
                            </div>
                            <div class="card-button ">
                                <button class="btn btn-themed btn-wider"><span class="fa-solid fa-cart-plus"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </a>
        </div>
        @empty
            <span class="text text-center">Belum Ada Menu</span>
        @endforelse
    </div>
</section>
<section id="artikel">
    <p class="h2 text-center">Artikel Terbaru</p>
    <div class="row">
        @forelse ($articles as $article)
        <div class="col-12 col-lg-4 mb-3">
            <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none post-link text-dark">
                <div class="card card-menu card-artikel">
                    <img src="{{ asset($article->image) }}" class="card-img-top" alt="Article">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text card-description">{{ $article->description }}</p>
                    </div>
                </div>
            </a>
        </div>
        @empty
            <span class="text text-center">Belum Ada Artikel</span>
        @endforelse
    </div>
</section>
@endsection
