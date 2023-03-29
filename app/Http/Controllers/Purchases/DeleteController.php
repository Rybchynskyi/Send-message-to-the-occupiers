<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(Purchase $purchase){
        try {
            DB::beginTransaction();
            $data = request()->validate([
                'place' => 'string',
            ]);

            $histories = History::where('purchase_id', '=', $purchase->id)->get();

            foreach ($histories as $history){
                $history->delete();
            }
            $purchase->delete();

            DB::commit();
        } catch (\Exception $exception) {
            return back()->with('notSuccess', $exception->getMessage());
        }

        return back()->with('notSuccess', 'Замовлення видалено');
    }
}
