<?php
namespace Classes;
use Controllers;

class Navigation extends Controllers\baseController{
    
    public function __construct() {
        \Loader::loadModel($this, 'navigation');
        \Loader::loadModel($this, 'products','products');
    }
    
    public function index() {}
    
    public function renderNav() {
            $navigationModel = $this->models['navigation'];
            $parents = $navigationModel->getAll('*', 'WHERE parent = 1 order by sort asc');

            $string = '';
             foreach($parents as $parent){
                 $string .="<li>
                <a href='"._WEB_PATH."products/allProductsByCategory/".$parent->ID."/1/".$this->url_friendly($parent->name)."'>{$parent->name}</a>";
                 $children = $navigationModel->getAll('*', 'WHERE id_parent ='.$parent->ID." AND id_subparent=0 order by sort asc");
                 if(count($children) > 0){
                   $string .='<ul class="clearfix sub-menu menu-three">';
                   $string .='<li class="clearfix">';
                   $string .='<div class="links">';
                   $i = 0;
                   foreach ($children as $child){
                    if($i%7 == 0) $string .='<p>';
                     $subChildren = $navigationModel->getAll('*', 'WHERE id_subparent ='.$child->ID.' order by sort asc');
                      /* if($child->id_subparent > 0){
                           $string .='<a href="'._WEB_PATH."products/allProductsSubCatChild/".$child->ID."/".$child->id_subparent."/".$child->id_parent."/1/".$this->url_friendly($child->name).'" style="text-transform: capitalize;"> >'. $child->name.'</a>';

                       }else*/
                           
                            $string .="<a href='"._WEB_PATH."products/allProductsBySubCategory/".$child->ID."/".$child->id_parent."/1/".$this->url_friendly($child->name)."'>".$child->name."</a>";
                          
                            foreach($subChildren as $sub)
                            {
                                $string .='<a href="'._WEB_PATH."products/allProductsSubCatChild/".$sub->ID."/".$sub->id_subparent."/".$sub->id_parent."/1/".$this->url_friendly($sub->name).'" style="text-transform: capitalize;"> >'. $sub->name.'</a>';
                            }
                           
                           
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
        public function renderSideBar()
        {
            $navigationModel = $this->models['navigation'];
            $productsModel = $this->models['products'];
            $parents = $navigationModel->getAll('*', 'WHERE parent = 1');
           $string='<div id="accordion">';
           foreach($parents as $parent){
               $children = $navigationModel->getAll('*', 'WHERE id_parent ='.$parent->ID);
              $string.='<h5><a href="'._WEB_PATH."products/allProductsByCategory/".$parent->ID."/1/".$this->url_friendly($parent->name).'">'.$parent->name.'('.sizeof($children).')</a></h5>';
              $string.="<div><ul>";
              
                 if(count($children) > 0){
                   foreach ($children as $child){
                       $products = $productsModel->getAll('count(ID) as "productNumber"' ,'WHERE product_subcategory='.$child->ID);
                       
                       if($child->id_subparent > 0){
                           $products_sub_subcategory_number = $productsModel->getAll('count(ID) as "productNumber"' ,'WHERE product_sub_subcategory='.$child->ID);
                           $string.= '<li> &nbsp;&nbsp; <a href="'._WEB_PATH."products/allProductsSubCatChild/".$child->ID."/".$child->id_subparent."/".$child->id_parent."/1/".$this->url_friendly($child->name).'"> '.$child->name.' ('.$products_sub_subcategory_number[0]->productNumber.')</a></li>';
                       }else
                         $string.='<li><a href="'._WEB_PATH."products/allProductsBySubCategory/".$child->ID."/".$child->id_parent."/1/".$this->url_friendly($child->name).'">'.$child->name.' ('.$products[0]->productNumber.')</a></li>';
                   }
                 }
                  $string.="</ul></div>";
           }
           $string.="</div>";
           return $string;
           
        }
}
