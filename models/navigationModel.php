<?php

class navigationModel extends baseModel{
    public static $key = "ID";
    public static $table = "navigation";
    
    public function getCategoryName($id){
        return $this->get($id, "name")->name;
    }
    
    
}
