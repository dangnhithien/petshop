<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thucung extends Model
{
    use HasFactory;
    protected $table = 'thucung';
    protected $primaryKey = 'mathucung';
    protected $fillable = 
    [
        'mathucung',
        'magiongthucung',
        'slug',
        'tieude',
        'noidung',
        'giaban',
        'ngaydang'
    ];
    public $timestamps = false;
    
    
    public function giongthucung(){
        return $this->belongsTo('App\Models\Giongthucung','magiongthucung');
    }
    public function hinhanhthucung(){
        return $this->hasMany('App\Models\Hinhanhthucung','mathucung','mathucung');
    }
    // public function loaithucung(){
    //     return $this->hasManyThrough(
    //         'App\Models\Loaithucung',
    //         'App\Models\Giongthucung',
    //         'magiongthucung',
    //         'maloaithucung',
    //     );
    // }

    // public static function boot() {
    //     parent::boot();

    //     static::deleting(function($pet) {
    //         $pet->hinhanhthucung->delete();
          
    //     });
    // }
}


