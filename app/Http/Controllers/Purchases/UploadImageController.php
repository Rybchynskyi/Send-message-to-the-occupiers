<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadBulletRequest;
use App\Mail\PurchaseResultMail;
use App\Models\History;
use App\Models\Purchase;
//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UploadImageController extends Controller
{
    public function __invoke(UploadBulletRequest $request, $purchase){
        try {
            DB::beginTransaction();
            $image = $request->file('uploadBullet');

            $name = Str::random(12) . "." . $image->extension();
            $path = $image->storeAs('bullets', $name, 'public');

            $thisPurchase = Purchase::find($purchase);
            $thisPurchase->sertificate_img = $path;
            $thisPurchase->status = 4;
            $thisPurchase->save();

            $history = [
                "user_id" => $thisPurchase->user_id,
                "type" => 4,
                "purchase_id" => $purchase
            ];

            History::create($history);

            $user = User::find($thisPurchase->user_id);
            $email=$user->email;
            Mail::to($email)->send(new PurchaseResultMail($purchase));

            DB::commit();
        } catch (\Exception $exception) {
            return redirect()->route('admin.purchases.index')->with('notSuccess', $exception->getMessage());
        }
        return redirect()->route('admin.purchases.index')->with('success', 'Заявка закрита.<br>Повідомлення відправлено');
    }
}
