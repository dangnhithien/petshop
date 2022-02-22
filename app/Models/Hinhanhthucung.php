<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinhanhthucung extends Model
{
    use HasFactory;
    protected $table = 'hinhanhthucung';
    protected $primaryKey = 'mahinhanh';
    protected $fillable=[
        'mahinhanh',
        'mathucung',
        'hinhanh',
        'anhdaidien',
    ];
    public $timestamps = false;
    

    public function thucung(){
        return $this->belongsTo('App\Models\Thucung','mathucung');
    }
}
