<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giongthucung extends Model
{
    use HasFactory;
    protected $table = 'giongthucung';
    protected $primaryKey = 'magiongthucung';
    protected $fillable = ['magiongthucung','tengiongthucung','maloaithucung','mota','hinhanh'];
    protected $with = ['loaithucung'];
    
    public function loaithucung(){
        return $this->belongsTo('App\Models\Loaithucung','maloaithucung');
    }
    public function thucung(){
        return $this->hasMany('App\Models\Thucung','magiongthucung');
    }

}
