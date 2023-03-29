<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "histories";
    protected $fillable = [
        'user_id',
        'type',
        'purchase_id'];
    protected $guarded = [];
}
