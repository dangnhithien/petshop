<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaivatdung extends Model
{
    use HasFactory;
    protected $table = 'loaivatdung';
    protected $primaryKey = 'maloaivatdung';
    protected $fillable = 
                        [
                            'maloaivatdung',
                            'maloaisanpham',
                            'tenloaivatdung',
                            'hinhanh'
                        ];

    public function vatdung(){
        return $this->hasMany('App\Models\VatdungModel','mavatdung');
    }
}
