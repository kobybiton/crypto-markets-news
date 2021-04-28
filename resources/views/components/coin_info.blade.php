@php($currencies = \App\Models\Currencies\Currencies::all())

<div id="coins_info_container" class="desk">
    <section id="coins_info">
        <div class="box-wrapper">
            <div class="coin-list">
                <div class="boxes">
                    @if(count($currencies) > 0)
                        @foreach($currencies as $currency)
                            @if(file_exists(public_path('images/coins/'. $currency->symbol . '.png')))
                                <div class="box">
                                    <p>{{ $currency->name }}</p>
                                    <img data-id="{{ $currency->rank }}" data-coin="{{ $currency->symbol }}" class="coin" src="{{ asset('images/coins/'. $currency->symbol . '.png') }}" alt="{{ $currency->symbol }}" title="{{ $currency->symbol }}">
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@push('script')
    <script>
        $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box table').hide();

        var currencies;

        let json = $.getJSON(BaseUrl + "/coin-list", function(data, status){
            currencies = data;
        });

        //Coin Description
        $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box img').on('click', function(){

            $(this).parent().toggleClass('active');
            $(this).toggleClass('active');
            $(this).next().toggleClass('active');
            $(this).parent().find('table').toggle();

            let symbol = $(this).data('coin');
            let coin = getObjects(currencies, 'symbol', symbol);
            let bitcoin = getObjects(currencies, 'symbol', 'BTC');
            let priceInBitcoin = coin[0].quotes['USD'].price / bitcoin[0].quotes['USD'].price;
            priceInBitcoin = priceInBitcoin.toLocaleString(undefined, {maximumFractionDigits: 4})
            let price = coin[0].quotes['USD'].price.toLocaleString(undefined, {maximumFractionDigits: 4})
            let table =

                `
                <table class="table">
                    <thead>
                    <tr>
                        <th class="th" colspan="2">
                            $ ${price} <span>USD (${coin[0].quotes['USD'].change24h}) <br> ${priceInBitcoin} BTC</span>
                        </th>
                        <th>
                            ${coin[0].name} <br><span>About the Coin…</span><span class="close">X</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Market CAP <br> <span>$${coin[0].quotes['USD'].marketcap}</span></td>
                        <td class="td">Volume (24h) <br> <span>$${coin[0].quotes['USD'].volume24h.toLocaleString(undefined, {maximumFractionDigits: 2})}</span></td>
                        <td rowspan="2" class="rowspan">
                            ${coin[0].description}
                        </td>
                    </tr>
                    <tr>
                        <td>Current Supply <br> <span>${coin[0].supply.current}</span></td>
                        <td class="td">Max Supply <br> <span>${coin[0].supply.max ? coin[0].supply.max : 'N/A'}</span></td>
                    </tr>
                    </tbody>
                </table>

                `;

            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box.active').append(table);
            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box .table').not($(this).parent().find('table')).remove();
            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box').not($(this).parent()).removeClass('active');
            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box img').not($(this)).removeClass('active');
            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box img').not($(this)).next().removeClass('active');

        });

        // Search coin in json
        function getObjects(obj, key, val) {
            var objects = [];
            for (var i in obj) {
                if (!obj.hasOwnProperty(i)) continue;
                    if (typeof obj[i] == 'object') {
                        objects = objects.concat(getObjects(obj[i], key, val));
                    } else if (i == key && obj[key] == val) {
                        objects.push(obj);
                    }
            }
            return objects;
        }

        // Close coin description
        $('body').on('click', 'span.close', function(){
            $('table').fadeOut();
            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box').not($(this).parent()).removeClass('active');
            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box img').removeClass('active');
            $('#coins_info_container #coins_info .box-wrapper .coin-list .boxes .box p').removeClass('active');
        });
    </script>
@endpush
