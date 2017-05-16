<?php
namespace Models;
/**
 * @property int $ID Primary key
 * @property string $name 
 * @property string $link 
 * @property string $sort 
 * @property string $parent
 * @property string $subparent
 * @property string $id_parent   
 * @property string $id_subparent 
 */
class Navigation extends baseModel{
    public static $key = "ID";
    public static $table = "navigation";
    
    public function getCategoryName($id){
        if($this->get($id, "name"))
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
    
    public function getCategory($Id){
        
        return $this->get($Id);
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
    public function updateCategory($params)
    {
        $this->ID=(int)$params['ID'];
        $this->name=$params['Name'];
        $this->link=$params['Link'];
        $this->sort=(int)$params['Sort'];
        $this->parent=$params['Parent'];
        $this->subparent=(int)$params['SubParent'];
        $this->id_parent=(int)$params['IdParent'];
        $this->id_subparent=(int)$params['IdSubParent'];
        return $this->update();
    }
}
