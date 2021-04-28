<?php

$url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&convert=USD&CMC_PRO_API_KEY=eebf0389-c031-4903-bd14-a71550fe8bb4";

$json = json_decode(file_get_contents($url), true)['data'];

if(is_array($json) && count($json) > 50) {
    $parse_data = var_export($json, true);
    $backup_data = "<?php\n\n\$currencies_backup = $parse_data;\n\n?>";
    file_put_contents('currencies_backup.php', $backup_data);
}

?>
