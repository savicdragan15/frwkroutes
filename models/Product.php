<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Models;
use Illuminate\Database\Eloquent\Model;
/**
 * Description of Product
 *
 * @author WIN 7 PRO
 */

/**
 * @Entity @Table(name="products")
 */
class Product extends Model{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name'];
}
