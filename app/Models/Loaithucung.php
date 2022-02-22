<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaithucung extends Model
{
    use HasFactory;
    protected $table = 'loaithucung';
    protected $primaryKey = 'maloaithucung';
    protected $fillable = 
                        [
                            'maloaithucung',
                            'maloaisanpham',
                            'tenloaithucung',
                            'hinhanh'
                        ];

    public function giongthucung(){
        return $this->hasMany('App\Models\Giongthucung','maloaithucung');
    }
    public function vatdung(){
        return $this->hasMany('App\Models\Vatdung', 'maloaithucung');
    }
}
