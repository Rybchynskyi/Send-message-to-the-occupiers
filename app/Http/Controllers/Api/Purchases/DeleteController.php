<?php

namespace App\Http\Controllers\Api\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Models\History;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Delete(
 *     path="/purchases/{id}",
 *     operationId="purchaseDelete",
 *     tags={"Purchases"},
 *     summary="Delete purchase",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Purchase ID",
 *         required=true,
 *         @OA\Schema(
 *             type="array",
 *             @OA\Items(type="integer"),
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

class DeleteController extends Controller
{
    public function __invoke(Purchase $purchase){
        try {
            DB::beginTransaction();
            $histories = History::where('purchase_id', '=', $purchase->id)->get();

            foreach ($histories as $history){
                $history->delete();
            }
            $purchase->delete();

            DB::commit();
        } catch (\Exception $exception){
            return response($exception->getMessage(), 500)->header('Content-Type', 'text/plain');
        }
        return response("Deleting successfully", 200)->header('Content-Type', 'text/plain');
    }
}
