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
 * @OA\Patch(
 *     path="/purchases/{id}",
 *     operationId="purchaseUpdate",
 *     tags={"Purchases"},
 *     summary="Update purchase",
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
 *     @OA\Parameter(
 *         name="title",
 *         in="query",
 *         description="title for rocket",
 *         required=false,
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
 *         required=false,
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
 *         required=false,
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
 *         required=false,
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

class UpdateController extends Controller
{
    public function __invoke(PurchaseRequest $request, $purchase){
        try {
            DB::beginTransaction();
            $thisPurchase = Purchase::find($purchase);
            $data = $request->validated();
            $thisPurchase->update($data);

            if($thisPurchase->status !== (int)$request['status'] && (int)$request['status'] !== 0){

                $history = [
                    "user_id" => $request['user_id'],
                    "type" => (int)$request['status'],
                    "purchase_id" => $purchase
                ];

                History::create($history);
            }

            DB::commit();
        } catch (\Exception $exception){
            return response($exception->getMessage(), 500)->header('Content-Type', 'text/plain');
        }
        return $thisPurchase->fresh();
    }
}
