<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'sale_details';
    protected $guarded  = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }    

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }    

    public function sale()
    {
        return $this->belongsTo(Sale::class,'sale_id');
    }    

}