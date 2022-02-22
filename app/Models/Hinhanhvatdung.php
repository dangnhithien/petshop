<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinhanhvatdung extends Model
{
    use HasFactory;
    protected $table = 'hinhanhvatdung';
    protected $primaryKey = 'mahinhanh';
    protected $fillable=[
        'mahinhanh',
        'mavatdung',
        'hinhanh',
        'anhdaidien',
    ];
    public $timestamps = false;

    public function vatdung(){
        return $this->belongsTo('App\Models\Vatdung');
    }
}
