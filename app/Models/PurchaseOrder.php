<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Purchase;
use App\Models\Product;


class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'total_quantity',
        'total_price',
        'purchase_id',
        'supplier_id',
        'date',
    ];
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

}
