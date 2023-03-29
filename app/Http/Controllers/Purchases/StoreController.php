<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\History;
use App\Models\Param;
use App\Models\Purchase;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    public function __invoke(PurchaseRequest $request){
        try {
            DB::beginTransaction();
            $purchase = Purchase::create($request->validated());
            $purchase->refresh();

            // Add default order if isset
            $settingsOrderParam = Param::firstWhere('param','order_by_default');
            app('App\Http\Controllers\Purchases\PurchasesFunctionsController')->addOrder($purchase, $settingsOrderParam->value);

            $history = [
                "user_id" => $purchase->user_id,
                "type" => 1,
                "purchase_id" => $purchase->id
            ];
            History::create($history);
            DB::commit();
        } catch (\Exception $exception){
            return back()->with('notSuccess', $exception->getMessage());
        }
        return back()->with('success', 'Замовлення збережено');
    }
}
