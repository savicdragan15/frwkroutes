<?php

class Navigation extends baseController{
    
    public function __construct() {
        Loader::loadModel($this, 'navigation');
    }
    public function index() {}
    
    public function renderNav() {
            $navigationModel = $this->models['navigation'];
            $parents = $navigationModel->getAll('*', 'WHERE parent = 1');

            $string = '';
             foreach($parents as $parent){
                 $string .="<li>
                <a href='"._WEB_PATH."products/allProductsByCategory/".$parent->ID."/1/".$this->url_friendly($parent->name)."'>{$parent->name}</a>";
                 $children = $navigationModel->getAll('*', 'WHERE id_parent ='.$parent->ID);
                 if(count($children) > 0){
                   $string .='<ul class="clearfix sub-menu menu-three">';
                   $string .='<li class="clearfix">';
                   $string .='<div class="links">';
                   $i = 0;
                   foreach ($children as $child){
                    if($i%7 == 0) $string .='<p>';
                       if($child->id_subparent > 0){
                           $string .="<a href='' style='text-transform: capitalize;'> > {$child->name}</a>";
                       }else
                            $string .="<a href='"._WEB_PATH."products/allProductsBySubCategory/".$child->ID."/".$child->id_parent."/1/".$this->url_friendly($child->name)."'>{$child->name}</a>";

                      //  if($i%14 == 0 && $i != 0) $string .='</p>';
                       $i++;
                   }
                   $string .='</div>';
                   $string .='</li></ul>';
                }
                $string .="</li>";
             }
             return $string;
        }
    
        public function renderCategory(){
            $navigationModel = $this->models['navigation'];
            $categories = $navigationModel->getAll('*','WHERE parent=1');
            $string = '';
            foreach($categories as $category){
                $string.= "<option>{$category->name}</option>";
            }
            return $string;
        }
}
