<?php

namespace App\Http\Controllers\Api\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\History;
use App\Models\Param;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Post(
 *     path="/purchases",
 *     operationId="purchaseAdd",
 *     tags={"Purchases"},
 *     summary="Add new purchase",
 *     @OA\Parameter(
 *         name="title",
 *         in="query",
 *         description="title for rocket",
 *         required=true,
 *         @OA\Schema(
 *             type="array",
 *             @OA\Items(type="string"),
 *         ),
 *         style="form"
 *     ),
 *     @OA\Parameter(
 *         name="sum",
 *         in="query",
 *         description="Donation amount (hrn)",
 *         required=true,
 *         @OA\Schema(
 *             type="array",
 *             @OA\Items(type="integer"),
 *         ),
 *         style="form"
 *     ),
 *     @OA\Parameter(
 *         name="status",
 *         in="query",
 *         description="1-created; 2-payed; 3-sended; 4-successfully closed",
 *         required=true,
 *         @OA\Schema(
 *             type="array",
 *             @OA\Items(type="integer"),
 *         ),
 *         style="form"
 *     ),
 *     @OA\Parameter(
 *         name="full_name",
 *         in="query",
 *         description="Full Name for the sertificate",
 *         required=true,
 *         @OA\Schema(
 *             type="array",
 *             @OA\Items(type="string"),
 *         ),
 *         style="form"
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="Sussesfull response",
 *     @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Purchase")
 *         ),
 *     ),
 *     @OA\Response(
 *          response=401,
 *          description="Not authorized",
 *     ),
 *     @OA\Response(
 *          response="default",
 *          description="Other errors",
 *     @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Error")
 *         ),
 *     ),
 * )
 */

class StoreController extends Controller
{
    public function __invoke(PurchaseRequest $request){
        try {
            DB::beginTransaction();
            $request['user_id'] = Auth::user()->id;

            $purchase = Purchase::create($request->validated());
            $purchase->refresh();

            // Add default order if isset
            $settingsOrderParam = Param::firstWhere('param','order_by_default');
            app('App\Http\Controllers\Purchases\PurchasesFunctionsController')->addOrder($purchase, $settingsOrderParam->value);

            $history = [
                "user_id" => $request['user_id'],
                "type" => 1,
                "purchase_id" => $purchase->id
            ];

            History::create($history);

            DB::commit();
        } catch (\Exception $exception){
            return response($exception->getMessage(), 500)->header('Content-Type', 'text/plain');
        }
        return $purchase;
    }
}
