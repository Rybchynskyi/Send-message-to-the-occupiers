<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Models\History;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Collection;

class CabinetController extends Controller
{

    /**
     * @OA\PathItem(path="/api")
     */

    public function index(){
        /**
         * @SWG\Get(
         *     path="/posts/{post_id}",
         *     summary="Get blog post by id",
         *     tags={"Posts"},
         *     description="Get blog post by id",
         *     @SWG\Parameter(
         *         name="post_id",
         *         in="path",
         *         description="Post id",
         *         required=true,
         *         type="integer",
         *     ),
         *     @SWG\Response(
         *         response=200,
         *         description="successful operation",
         *         @SWG\Schema(ref="#/definitions/Post"),
         *     ),
         *     @SWG\Response(
         *         response="401",
         *         description="Unauthorized user",
         *     ),
         *     @SWG\Response(
         *         response="404",
         *         description="Post is not found",
         *     @OA\JsonContent(
         *             type="array",
         *             @OA\Items(ref="#/components/schemas/Purchase")
         *         ),
         *     )
         * )
         */

        if (Auth::check() == true) {
            $userId = Auth::user()->id;
            $userName = Auth::user()->name;
            $purchases = Purchase::where('user_id', '=', $userId)->orderBy('created_at', 'desc')->get();
            $histories = History::where('user_id', '=', $userId)->orderBy('created_at', 'desc')->get();
            foreach ($histories as $history){
                $thisPurchase = Purchase::find($history->purchase_id);
                $history->purchase_title = $thisPurchase->title;
            }

            $sertificateCount = count(Purchase::where('user_id', $userId)->where('status', 4)->get());

            return view('cabinet', compact('purchases', 'histories', 'sertificateCount', 'userName'));
        }
        else {
            return redirect()->route('home')->with('notSuccess', 'Спочатку увійдіть в свій обліковий запис');;
        }
    }

    public function generateCertificate(PurchaseRequest $request){
        $thisPurchase = Purchase::find($request->validated(['id']));
        if ($thisPurchase->user_id == Auth::user()->id || Auth::user()->name == "SuperAdmin"){
            return view('mySertificate', compact('thisPurchase'));
        }
        else {
            return redirect()->route('cabinet.view')->with('notSuccess', 'Ви не можете відкрити даний сертифікат');
        }
    }
}
