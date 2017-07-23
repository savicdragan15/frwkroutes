<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Models;


class Image extends EloquentBaseModel{

    public $primaryKey = 'ID';
    public $table = 'images';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'image_name'];

    protected $guarded = ['product_id', 'image_name'];


}
