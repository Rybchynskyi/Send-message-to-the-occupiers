<?php

namespace App\Http\Controllers\Api\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Resources\Purchase\PurchaseList;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Get(
 *     path="/purchases",
 *     operationId="purchaseList",
 *     tags={"Purchases"},
 *     summary="Get purchase list",
 *     @OA\Parameter(
 *         name="tags",
 *         in="query",
 *         description="tags to filter by",
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
 *          response=419,
 *          description="CSRF token mismatch",
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

class IndexController extends Controller
{
    public function __invoke(){
        $userId = Auth::user()->id;
//        $userId = 1;
        $purchases = Purchase::where('user_id', '=', $userId)->get();
        return PurchaseList::collection($purchases);
    }
}
