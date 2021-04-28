@extends('inner_pages.master')
@section('dinamic_content')

    @section('title')
        <title>Coin Info</title>
    @endsection

    <div class="heading-divider">
        <h2>Coin Info</h2>
    </div>
    @include('components.coin_info')

@endsection
