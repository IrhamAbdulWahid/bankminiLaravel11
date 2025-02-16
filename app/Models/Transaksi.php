<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $fillable= ['user_id', 'tabungan', 'tanggal_transaksi'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
