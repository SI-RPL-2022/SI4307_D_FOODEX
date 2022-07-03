@extends('layouts.main')
@section('title', $article->title)
@section('content')
<section id="title">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ $article->title }}</h1>
                <hr>
            </div>
        </div>
    </div>
</section>
<section id="banner">
    <img class="img-article-thumbnail" src="{{ asset($article->image) }}" alt="" style="width:100%">
</section>
<section id="menu">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                {!! $article->content !!}
            </div>
        </div>
    </div>
</section>
@endsection