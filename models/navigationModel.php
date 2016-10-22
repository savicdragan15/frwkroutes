<?php

class navigationModel extends baseModel{
    public static $key = "ID";
    public static $table = "navigation";
    
    public function getCategoryName($id){
        return $this->get($id, "name")->name;
    }
    
    /**
     * Get categories
     * @return type
     */
    public function getCategories(){
        $this->where = "parent = 1";
        return $this->getAll("*");
    }
    
    /**
     * Get subcategory
     * @param type $categoryID
     * @return type
     */
    public function getSubcategory($categoryID){
        $this->where = "id_parent = {$categoryID} and id_subparent = 0";
        return $this->getAll("*");
    }
    
    /**
     * Get Sub sub categories
     * @param type $subcategoryID
     * @return type
     */
    public function getSubSubCategories($subcategoryID){
        $this->where = "id_subparent = {$subcategoryID}";
        return $this->getAll("*");
    }
    
    public function insertCategory($params)
    {
        $this->name=$params['Name'];
        $this->link=$params['Link'];
        $this->sort=(int)$params['Sort'];
        $this->parent=$params['Parent'];
        $this->subparent=(int)$params['SubParent'];
        $this->id_parent=(int)$params['IdParent'];
        $this->id_subparent=(int)$params['IdSubParent'];
        return $this->insert();
    }
}
