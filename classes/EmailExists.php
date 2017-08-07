<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;
use azi\Arguments;
use azi\Rules\Contracts\RuleInterface;
use Models\Student;
/**
 * Description of EmailExists
 *
 * @author Sonor Smart Force
 */
class EmailExists implements RuleInterface

{
    public function validate( $field, $value, Arguments $args )
    {
           $this->value=$value;
           $studentsWithMail =  Student::Email($value)->get();
       
            if(count($studentsWithMail)==0)
            {
                return true;
            }
              return false; 
    }

    /**
     * @return mixed
     */
    public function message()
    {
        return "Student with email address {$this->value} already exists";
    } //put your code here
}
