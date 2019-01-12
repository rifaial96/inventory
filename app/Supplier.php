<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $guarded  = ['id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }     
}