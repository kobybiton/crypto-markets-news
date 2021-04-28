@php($currencies = \App\Models\Currencies\Currencies::all())
@if(!empty($currencies[0]))
    @if(count($currencies) > 0)
        <div class="table-container currencies">
            <form class="select" method="GET">
                <select id="select" name="coin">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
                <input type="search" class="search" placeholder="Search Currency...">
            </form>
            <table class="market-cap table">
                <thead>
                    <tr>
                        <th scope="col">Symbol</th>
                        <th scope="col">Name</th>
                        <th scope="col">Market Cap</th>
                        <th scope="col">Price</th>
                        <th scope="col">Volume (24)</th>
                        <th scope="col">Circulation Supply</th>
                        <th scope="col">Change (24)</th>
                    </tr>
                </thead>
                <tbody class="tbody-currencies">
                    @foreach($currencies as $currency)
                        <tr>
                            <td class="rank">{{ $currency->symbol }}</td>
                            <td class="name">{{ $currency->name }}</td>
                            <td class="marketcap">${{ number_format($currency->quotes['USD']->marketcap) }}</td>
                            <td class="price">${{ number_format($currency->quotes['USD']->price, 2) }}</td>
                            <td class="volume">${{ number_format($currency->quotes['USD']->volume24h) }}</td>
                            <td class="circulation-supply">{{ number_format($currency->supply->current) }}</td>
                            <td class="change {{ $currency->quotes['USD']->change24h > 0? 'green' : 'red' }}">
                                {{ number_format($currency->quotes['USD']->change24h, 2) }}%
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endif
@push('script')
    <script>

        Update.initialize('.currencies');
      	Update.listenTo('{{ route('ticker.updates') }}', {rate: 5000});

		$('body').on('change','#select', function(e){

			let coin = $(this).val();
			let symbol;
		    switch(coin){
			    case "USD":
			      symbol = '$';
			    break;
			    case "EUR":
			    symbol = '€';
			    break;
/*			    case "GBP":
			    symbol = '£';
			    break;
			    case "AUD":
			    symbol = '$';
			    break;
			    case "JPY":
			    symbol = '¥';
			    break;*/
			    default:
			    symbol = "$";
		    }
			$.ajax({
				url: BaseUrl + '/currency',
				data:{
					coin: coin,
					symbol: symbol
				},
				success: function(result){

					$('.tbody-currencies').empty();
					$.each(result, function(i, objects){

	                    let rows = `<tr>
						                <td class="rank">${objects.symbol}</td>
						                <td class="name">${objects.name}</td>
						                <td class="marketcap">${symbol}${objects.quotes[coin].marketcap.toLocaleString()}</td>
						                <td class="price">
						                	${symbol}${objects.quotes[coin].price.toLocaleString(undefined, {maximumFractionDigits: 2})}
						                </td>
						                <td class="volume">
						                	${symbol}${objects.quotes[coin].volume24h.toLocaleString(undefined, {maximumFractionDigits: 0})}
						                </td>
						                <td class="circulation-supply">
						                	${objects.supply.current.toLocaleString()}
						                </td>
						                <td class="change ${ objects.quotes[coin].change24h > 0? 'green' : 'red' }">
						                	${objects.quotes[coin].change24h}%
						                </td>
				                    </tr>
	                    `;

						$('.tbody-currencies').append(rows);
					});
					Update.listenTo('{{ route('interval-currency') }}', {rate: 5000});
			}});
		});

		$('body').on('input','.search', function(e){

			let regex = /^[a-zA-Z]+$/;
		    let value = $.trim($(this).val());
		    let selectVal = $('#select').val();

		    if(value.length > 0){

				if(regex.test(value)){

			    	Update.listenTo('nothing', {rate: 5000});
				    $(".currencies table tbody tr").each(function(index){

			            $row = $(this);
			            let uppercase = $row.find('.name').text();
			            let lowercase = $row.find('.name').text().toLowerCase();

			            if(uppercase.indexOf(value) !== 0 && lowercase.indexOf(value) !== 0){
			                $row.hide();
			            }
			            else{
			                $row.show();
			            }
				    });
				}
				else{
					$(this).val('');
				}
			}
			else{
				if(selectVal !== 'USD'){
					Update.listenTo('{{ route('interval-currency') }}', {rate: 5000});
				}else{
					Update.listenTo('{{ route('ticker.updates') }}', {rate: 5000});
				}
				$('table tr').show();
			}
		});

    </script>
@endpush
