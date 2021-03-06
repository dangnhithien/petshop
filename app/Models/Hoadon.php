<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    protected $primaryKey = 'mahoadon';
    protected $fillable=[
        'mahoadon',
        'idUser',
        'tongtien',
        'ngaytaohoadon',
        'trangthaithanhtoan',
    ];
}
