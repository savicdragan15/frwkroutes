<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace Models;
/**
 * Description of Product
 *
 * @author WIN 7 PRO
 */

/**
 * @Entity @Table(name="products")
 */
class Product1 {
    //put your code here
    
    public function __construct() {
        global $entityManager;
        $this->entityManager = $entityManager;
    }
    
    public function find(){
        return $this->entityManager->find(static::class, 1);
    }
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $product_name;
}
