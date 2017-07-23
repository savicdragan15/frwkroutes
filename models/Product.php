<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Models;


class Product extends EloquentBaseModel{

    public $primaryKey = 'ID';

    public function images()
    {
        return $this->hasMany('Models\Image', 'product_id', 'ID');
    }

    public function scopeActive($query, $param)
    {
        return $query->where('product_status', $param);
    }

    public function scopePrice($query)
    {
        return $query->where('product_price', '>=', 20.00);
    }


}
