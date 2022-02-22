<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHDvatdung extends Model
{
    use HasFactory;
    protected $table = 'cthdvatdung';
    protected $primaryKey = 'macthd';
    protected $fillable=[
        'macthd',
        'idUser',
        'tenloaivatdung',
        'tenvatdung',
        'giaban',
        'soluong',
        'hinhanh',
    ];
}
