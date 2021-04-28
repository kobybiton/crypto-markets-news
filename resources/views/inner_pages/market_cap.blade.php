@extends('inner_pages.master')
@section('dinamic_content')

    @section('title')
        <title>Market Cap</title>
    @endsection

    <div class="heading-divider">
        <h2>Market Cap</h2>
    </div>
    <div class="market-cap inner-page">
        @include('components.market_cap')
    </div>

@endsection
