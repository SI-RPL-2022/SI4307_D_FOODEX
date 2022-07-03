@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">@rupiah($income)</h2>
          <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
              <span class="fa fa-dollar"></span>
            </li>
            <li class="d-flex align-items-center me-3">
              <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
              <small>Total Pendapatan</small>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $orders }}</h2>
          <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
              <span class="fa fa-cart-shopping"></span>
            </li>
            <li class="d-flex align-items-center me-3">
              <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
              <small>Total Pesanan</small>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $users }}</h2>
          <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
              <span class="fa fa-person"></span>
            </li>
            <li class="d-flex align-items-center me-3">
              <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
              <small>Total Pelanggan</small>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
