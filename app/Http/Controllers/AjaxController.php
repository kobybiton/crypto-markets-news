<?php

namespace App\Http\Controllers;

use App\Comments;
use App\DeliveryMail;
use Illuminate\Http\Request;
use App\Models\Currencies\Currencies;

use DB;

class AjaxController extends Controller
{
    public function storeComment(Request $request) {
        Comments::validator($request);
    }

    public function storeDeliveryMail(Request $request) {
        DeliveryMail::Validator($request);
    }

    public function cionListDetails() {
        $currencies = Currencies::currenciesFromUrl();
        return $currencies;
    }
}
