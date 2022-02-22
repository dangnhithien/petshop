<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHDthucung extends Model
{
    use HasFactory;
    protected $table = 'cthdthucung';
    protected $primaryKey = 'macthd';
    protected $fillable=[
        'macthd',
        'mahoadon',
        'tenloaithucung',
        'tengiongthucung',
        'giaban',
        'hinhanh',
    ];
}
