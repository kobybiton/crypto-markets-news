@php($top_coin_obj = \App\Models\Currencies\Currencies::all()->sortByDesc('change24h')->take(1))
@php($bottom_coin_obj = \App\Models\Currencies\Currencies::all()->sortBy('change24h')->take(1))
@php($bitcoin = \App\Models\Currencies\Currencies::all()->sortBy('rank')->take(1))

<div class="boxes">
	@if(count($top_coin_obj) > 0 && count($bottom_coin_obj) > 0)
        @foreach($top_coin_obj as $top_coin)
            @php($top_coin_price_in_bitcoin = $top_coin->quotes['USD']->price / $bitcoin[0]->quotes['USD']->price)
            <div class="box">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2">
                            <a href="{{ url('/coin-info') }}">
                                <div class="coin">
                                    @if(file_exists(public_path('images/coins/'. $top_coin->symbol . '.png')))
                                        <img src="{{ asset('images/coins/'. $top_coin->symbol . '.png') }}" alt="{{ $top_coin->symbol }}" title="{{ $top_coin->symbol }}">
                                    @else
                                        <div>{{ $top_coin->symbol }}</div>
                                    @endif
                                </div>
                            </a>
                            <div class="name">{{ $top_coin->name }}</div>
                            <span>
                                ${{ number_format($top_coin->quotes['USD']->price, 2) }}USD
                                ( <b class="top">{{ number_format($top_coin->quotes['USD']->change24h, 2) }}%</b> ) <br>
                                {{ rtrim(rtrim(sprintf('%.8F', $top_coin_price_in_bitcoin), '0'), ".") }} BTC
                            </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Market CAP <br> <span>${{ number_format($top_coin->quotes['USD']->marketcap) }}</span></td>
                            <td>Volume (24h) <br> <span>${{ number_format($top_coin->quotes['USD']->volume24h) }}</span></td>
                        </tr>
                        <tr>
                            <td>Current Supply <br> <span>${{ number_format($top_coin->supply->current) }}</span></td>
                            <td>Max Supply <br> <span>{{ $top_coin->supply->max ? '$' . number_format($top_coin->supply->max) : 'N/A' }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
        @foreach($bottom_coin_obj as $bottom_coin)
            @php($bottom_coin_price_in_bitcoin = $bottom_coin->quotes['USD']->price / $bitcoin[0]->quotes['USD']->price)
            <div class="box">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2">
                            <a href="{{ url('/coin-info') }}">
                                <div class="coin">
                                    @if(file_exists(public_path('images/coins/'. $bottom_coin->symbol . '.png')))

                                        <img src="{{ asset('images/coins/'. $bottom_coin->symbol . '.png') }}" alt="{{ $bottom_coin->symbol }}" title="{{ $bottom_coin->symbol }}">
                                    @else
                                        <div>{{ $bottom_coin->symbol }}</div>
                                    @endif
                                </div>
                            </a>
                            <div class="name">{{ $bottom_coin->name }}</div>
                            <span>
                                ${{ number_format($bottom_coin->quotes['USD']->price, 2) }}USD
                                ( <b class="bottom">{{ number_format($bottom_coin->quotes['USD']->change24h, 2) }}%</b> ) <br>
                                {{ rtrim(rtrim(sprintf('%.8F', $bottom_coin_price_in_bitcoin), '0'), ".") }} BTC
                            </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Market CAP <br> <span>${{ number_format($bottom_coin->quotes['USD']->marketcap) }}</span></td>
                            <td>Volume (24h) <br> <span>${{ number_format($bottom_coin->quotes['USD']->volume24h) }}</span></td>
                        </tr>
                        <tr>
                            <td>Current Supply <br> <span>${{ number_format($bottom_coin->supply->current) }}</span></td>
                            <td>Max Supply <br> <span>{{ $top_coin->supply->max ? '$' . number_format($top_coin->supply->max) : 'N/A' }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
	@endif
</div>
