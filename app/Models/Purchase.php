<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "purchases";
    protected $fillable = [
        'title',
        'sum',
        'isPayed',
        'full_name',
        'status',
        'user_id',
        'send_to'];
    protected $guarded = [];

    public function histories(){
        return $this->hasMany(History::class, 'purchase_id', 'id')->orderBy('created_at', 'DESC');
    }

    public static function getName($id){
        $user = User::find($id);
        return $user->name;
    }

    public static function isOutline($correct, $thisItem){
        if($thisItem !== $correct){
            return "-outline";
        }
    }

}
