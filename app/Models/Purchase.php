<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseOrder;
use App\Models\Product;

class Purchase extends Model
{
    use HasFactory;

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function suppliers(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
//
//
//    public function products()
//    {
//        return $this->belongsToMany(Product::class)->withPivot('price', 'quantity', 'total_price');
//    }


}
