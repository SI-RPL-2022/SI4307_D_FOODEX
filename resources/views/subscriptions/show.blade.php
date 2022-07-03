@extends('layouts.main')
@section('title', $subscription->title)
@section('content')
<section id="banner">
    <img class="img-banner" src="{{ asset('assets/images/banner.png') }}" alt="" style="width:100%">
</section>
<section id="menuhariini">
    <p class="h2 text-center mt-5 mb-4">{{ $subscription->title }}</p>
    <div class="row d-flex justify-content-center">
        <div class="col-6 mb-3">
            <div class="h-100 text-white rounded-3 d-block text-center w-100">
                <div class="table-responsive">
                    <table class="table" style="border:1px solid black;">
                        <tbody>
                            <tr>
                                <th>Senin</th>>
                            </tr>
                            <tr>
                                <td>Lunch : {{ $subscription->monday_lunch }}</td>
                            </tr>
                            <tr>
                                <td>Dinner : {{ $subscription->monday_dinner }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" style="border:1px solid black;">
                        <tbody>
                            <tr>
                                <th>Selasa</th>>
                            </tr>
                            <tr>
                                <td>Lunch : {{ $subscription->tuesday_lunch }}</td>
                            </tr>
                            <tr>
                                <td>Dinner : {{ $subscription->tuesday_dinner }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" style="border:1px solid black;">
                        <tbody>
                            <tr>
                                <th>Rabu</th>>
                            </tr>
                            <tr>
                                <td>Lunch : {{ $subscription->wednesday_lunch }}</td>
                            </tr>
                            <tr>
                                <td>Dinner : {{ $subscription->wednesday_dinner }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" style="border:1px solid black;">
                        <tbody>
                            <tr>
                                <th>Kamis</th>>
                            </tr>
                            <tr>
                                <td>Lunch : {{ $subscription->thursday_lunch }}</td>
                            </tr>
                            <tr>
                                <td>Dinner : {{ $subscription->thursday_dinner }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" style="border:1px solid black;">
                        <tbody>
                            <tr>
                                <th>Jum'at</th>>
                            </tr>
                            <tr>
                                <td>Lunch : {{ $subscription->friday_lunch }}</td>
                            </tr>
                            <tr>
                                <td>Dinner : {{ $subscription->friday_dinner }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" style="border:1px solid black;">
                        <tbody>
                            <tr>
                                <th>Sabtu</th>>
                            </tr>
                            <tr>
                                <td>Lunch : {{ $subscription->saturday_lunch }}</td>
                            </tr>
                            <tr>
                                <td>Dinner : {{ $subscription->saturday_dinner }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" style="border:1px solid black;">
                        <tbody>
                            <tr>
                                <th>Minggu</th>>
                            </tr>
                            <tr>
                                <td>Lunch : {{ $subscription->sunday_lunch }}</td>
                            </tr>
                            <tr>
                                <td>Dinner : {{ $subscription->sunday_dinner }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="{{ route('subscription.store', $subscription->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-themed">Berlangganan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
