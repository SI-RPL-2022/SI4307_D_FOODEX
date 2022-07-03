@extends('layouts.main')
@section('title', 'Paket')
@section('content')
<section id="banner">
    <img class="img-banner" src="{{ asset('assets/images/banner.png') }}" alt="" style="width:100%">
</section>
<section id="menuhariini">
    <p class="h2 text-center mt-5 mb-4">Pilihan Paket</p>
        @foreach ($subscriptions as $subscription)
        <div class="row d-flex justify-content-center mb-3">
            <div class="col-6">
                <div class="card tablepaket br-10">
                    <div class="card-header p-3 text-center br-10"><a href="{{ route('subscription.show', $subscription->id) }}" class="mb-0 fw-bolder text-dark h5 text-decoration-none">{{ $subscription->title }}</a></div>
                </div>
            </div>
        </div>
        @endforeach
</section>
@endsection
