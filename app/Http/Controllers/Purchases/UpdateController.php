<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\History;
use App\Models\Param;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(PurchaseRequest $request, $purchase){
        try {
            DB::beginTransaction();
            $thisPurchase = Purchase::find($purchase);
            $previousStatus = $thisPurchase->status;

            $data = $request->validated();
            $thisPurchase->update($data);

            // if request was from user - change status
            if(!isset($request->status) && $thisPurchase->status !== 2){
                $thisPurchase->update(['status'=>2]);
            }

            // if we vave particular order in request
            if(isset($request->send_to)){
                app('App\Http\Controllers\Purchases\PurchasesFunctionsController')->addOrder($thisPurchase, $request->send_to);
            }

            // send message to group for signature
            app('App\Http\Controllers\Purchases\PurchasesFunctionsController')->sendMessage();

            $thisPurchase->refresh();

            // send message to All4Ukraine group
            $isSendToGroup = Param::firstWhere('param','send_message_to_group');
            if ($isSendToGroup->value == "on" && $thisPurchase->status == 2){
                $groupСhatId = Param::firstWhere('param','telegram_group');
                $message = "https://api.telegram.org/bot5476468086:AAHGcMnLexL9eSPgAtsjYuElYzPkm75R6RA/sendMessage?chat_id=" . $groupСhatId->value . "&text=Новий підпис на снаряді: '" . $thisPurchase->title . "' на суму " . $thisPurchase->sum . " USD";
                $url = str_replace(" ", "%20", $message);
                fopen($url, 'r');
            }

            if((int)$previousStatus !== $thisPurchase->status){

                $history = [
                "user_id" => $thisPurchase->user_id,
                "type" => $thisPurchase->status,
                "purchase_id" => $purchase
                ];

                History::create($history);
            }

            DB::commit();
        } catch (\Exception $exception) {
            return back()->with('notSuccess', $exception->getMessage());
        }

        return back()->with('success', 'Замовлення відредаговано');
    }
}
