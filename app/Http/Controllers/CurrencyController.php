<?php

namespace App\Http\Controllers;
use App\Models\Currencies\Currencies;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function updateCurrenciesBySelectedCoin(Request $request){

    	$coin_request = $request->input('coin');
    	$symbol_request = $request->input('symbol');
		$coin = $coin_request;
		$symbol = $symbol_request;
		$coin_value = var_export($coin, true);
		$symbol_value = var_export($symbol, true);
		$coins = "<?php\n\n\$coin = $coin_value;\n\$symbol = $symbol_value;\n\n?>";
		file_put_contents('coins.php', $coins);
		    	
    	$currencies = Currencies::currenciesFromUrl($coin);
    	return $currencies;
    }

    public function updateCurrenciesByCoin(){
    	
    	include 'coins.php';
    	$currencies = Currencies::currenciesFromUrl($coin);

		$table = 
		"<div class='table-container currencies'>
			<form class='select' method='GET'>
				<select id='select' name='coin'>
					<option class='defalt-option'>$coin</option>
					<option value='USD'>USD</option>
					<option value='EUR'>EUR</option>
					<option value='GBP'>GBP</option>
					<option value='AUD'>AUD</option>
					<option value='JPY'>JPY</option>
				</select>	
				<input type='search' class='search' placeholder='Search Currency'>
			</form>				
			<table class='table'>
			    <thead>
				    <tr>
				    	<th scope='col'>Symbol</th>
				        <th scope='col'>Name</th>
				        <th scope='col'>Market Cap</th>
				        <th scope='col'>Price</th>
				        <th scope='col'>Volume (24)</th>
				        <th scope='col'>Circulation Supply</th>
				        <th scope='col'>Change (24)</th>
				    </tr>
			    </thead>
			    <tbody class='tbody-currencies'>";

		        foreach($currencies as $currency){

		        	$rank = $currency->rank;
		        	$name = $currency->name;
		        	$crypto_symbol = $currency->symbol;
		        	$marketcap = $symbol . number_format($currency->quotes[$coin]->marketcap);
		        	$price = $symbol . number_format($currency->quotes[$coin]->price, 2);
		        	$volume = $symbol . number_format($currency->quotes[$coin]->volume24h); 
		        	$circulation_supply = number_format($currency->supply->current); 
		        	$change24h = $currency->quotes[$coin]->change24h;
		        	$change24hClass = $change24h > 0? 'green' : 'red';

		            $table .= "<tr>
				                  <td class='rank'>$crypto_symbol</td>
				                  <td class='name'>$name</td>
								  <td class='marketcap'>$marketcap</td>	
								  <td class='price'>$price</td>
								  <td class='volume'>$volume</td>
								  <td class='circulation-supply'>$circulation_supply</td>
					              <td class='change  $change24hClass'>
					                  $change24h%
					              </td>						  
					          </tr>
				   ";  	
				}
		$table .= "</tbody>
			</table>	
		</div>";	
		echo $table;    	
    }
}
