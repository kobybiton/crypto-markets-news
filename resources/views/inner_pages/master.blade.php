@extends('layout')
@section('content')

    <section class="section-top-26">
        <div class="shell">
            <div class="range text-md-left">
                <div class="cell-lg-8">
                    @if(is_array($inner_pages_banner) || is_object($inner_pages_banner) && count($inner_pages_banner) > 0)
                        <a target="_blank" href="{{ $inner_pages_banner[0]->link }}">
                            <img class="post-image" src="{{ asset('upload/banners/' . $inner_pages_banner[0]->image) }}" alt="Banner"/>
                        </a>
                    @endif
                    @yield('dinamic_content')
                </div>
                @include('components.sidebar')
            </div>
        </div>
    </section>

@endsection
