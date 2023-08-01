<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferWallet extends Model
{
    use HasFactory;
    public $table = 'transfer_wallets';
     public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'received_from');
    }
}
