<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Param;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PurchasesFunctionsController extends Controller
{
    public function addOrder($thisPurchase, $orderId){
        $isAdd = Param::firstWhere('param','add_order');
//        $settingsOrderParam = Param::firstWhere('param','order_by_default');

        if ($isAdd->value==="on"){
            $thisUser = User::find($thisPurchase->user_id);
            $currency = Param::firstWhere('param','currency');
            $sum = (int)$thisPurchase->sum * (int)$currency->value;

            $options = [
                'date' => $thisPurchase->created_at,
                'donater' => $thisUser->name,
                'sum' => $sum,
                'method' => 'Bullets',
                'order' => (int)$orderId . "."
            ];

            $response = Http::post('https://all4ukraine.org/sync/post.php',
                [$options]
            );
//                dd($response->body());

            $thisPurchase->update(['send_to' => (int)$orderId]);
        }
    }

    public function sendMessage(){
        // send a message if quantity of messages is equal quantity in params
        $currentPurchases = Purchase::where('status', 2)->get();

        $currentQuantity = count($currentPurchases);
        $settingsQuantityParam = Param::firstWhere('param','quantity_in_package');
        $settingsQuantity = +$settingsQuantityParam->value;
        $issend = Param::firstWhere('param','send_message');

        if ($currentQuantity>=$settingsQuantity && $issend->value==="on"){
            // create message and add history
            $message = "";
            foreach ($currentPurchases as $purchase){
                $message = $message . "%0A - " . $purchase->title;

                $history = [
                    "user_id" => $purchase->user_id,
                    "type" => 3,
                    "purchase_id" => $purchase->id
                ];
                History::create($history);
            }

            // send message
            $chatId = Param::firstWhere('param','telegram_id');
            $messageText = "https://api.telegram.org/bot6043610429:AAG-2tMcIm3HeXGANda506QKd4rTD3hHFYQ/sendMessage?chat_id=" . $chatId->value . "&text=Привіт! Нові повідомлення:" . $message;
            $url = str_replace(" ", "%20", $messageText);
            fopen($url, "r");

            // update status for all sended messages
            Purchase::where('status', 2)->update(['status' => 3]);

        }
    }
}
