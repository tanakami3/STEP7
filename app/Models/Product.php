<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = 
    [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
    ];

    public function sales()
    {
    return $this->hasMany('App\Models\Sale');
    }

    public function companies()
    {
    return $this->belongsTo('App\Models\Company');
    }
    
    public function list() {
        $list  = \DB::table('products');
        $list->select('products.id', 'products.image', 'products.product_name', 'products.stock', 'companies.company_name');
        $list->join('companies', 'products.company_id', '=', 'companies.id');
                //  ->get();
        return $list;
    }
}
