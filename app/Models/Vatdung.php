<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vatdung extends Model
{
    use HasFactory;
    protected $table = 'vatdung';
    protected $primaryKey = 'mavatdung';
    protected $fillable = 
                        [
                            'mavatdung',
                            'tenvatdung',
                            'maloaivatdung',
                            'maloaithucung',
                            'giaban',
                            'slug',
                            'tieude',
                            'noidung',
                            'ngaydang'   
                        ];
    public $timestamps = false;
    

    public function loaivatdung(){
        return $this->belongsTo('App\Models\Loaivatdung','maloaivatdung');
    }
    public function hinhanhvatdung(){
        return $this->hasMany('App\Models\Hinhanhvatdung','mavatdung','mavatdung');
    }
    
    
}
