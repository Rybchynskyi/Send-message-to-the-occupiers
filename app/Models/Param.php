<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use HasFactory;
    protected $table = "params";
    protected $fillable = [
        'param',
        'value'];
    protected $guarded = [];
}
