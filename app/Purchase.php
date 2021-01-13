<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'purchase_date', 'tax', 'total', 'status', 'picture', 'provider_id', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function purchaseDetails(){
        return $this->HasMany(PurchaseDetails::class);
    }

}
