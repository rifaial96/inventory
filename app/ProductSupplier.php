<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    protected $table = 'product_suppliers';
    protected $guarded  = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }    

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }    

}