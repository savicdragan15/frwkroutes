<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;
use azi\Arguments;
use azi\Rules\Contracts\RuleInterface;
/**
 * Description of AlphaUtf8
 *
 * @author Sonor Smart Force
 */
class AlphaUtf8 implements RuleInterface
{
    public function validate( $field, $value, Arguments $args )
    {
       
        if(preg_match('/^\p{L}[\p{L} _.-]+$/u', $value)) {
            return true;
        } 
            return false; 
    }

    /**
     * @return mixed
     */
    public function message()
    {
        return '{field} must be alpha';
    }
}
