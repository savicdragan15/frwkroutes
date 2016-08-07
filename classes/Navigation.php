<?php

class Navigation extends baseController{
    
    public function __construct() {
       
    }
    public function index() {}
    
public function renderNav() {
        Loader::loadModel($this, 'kategorije');
        Loader::loadModel($this, 'podkategorije');
        $kategorijeModel = $this->models['kategorije'];
        $podkategorijeModel = $this->models['podkategorije'];
        $kategorije = $kategorijeModel->getAll('*','WHERE kategorija_status=1  ORDER BY kategorija_redosled');
        $string = '';
       $string .="<div id='main_menu'>";
            $string .= "<div class='list-group panel panel-cat'>";
                  foreach($kategorije as $kat){
                      //$string .="<a type='submit' style='width='100px;' class='btn btn-default btn-xs' href='sadsa'>Vidi sve</a>";
                      $string .="<a href='#{$kat->id}'  class='list-group-item' data-toggle='collapse' data-parent='#main_menu'>{$kat->kategorija_naziv} <i class='fa fa-caret-down pull-right'></i></a>";
                      $podkategorije = $podkategorijeModel->getAll('*', "WHERE kategorija_id='{$kat->id}'");
                      $string .="<div class='collapse list-group-sub' id='{$kat->id}'>";
                      if(empty($podkategorije)){
                         $string .= "<a href='"._WEB_PATH."kategorija/kategorija/".(int)$kat->id."/".$this->replaceYuFonts($kat->kategorija_naziv)."'  class='list-group-item'>{$kat->kategorija_naziv}</a>";
                      }else{
                         foreach($podkategorije as $podkat){
                              $string .= "<a href='"._WEB_PATH."kategorija/podkategorija/".(int)$podkat->id."/".$this->replaceYuFonts($podkat->podkategorija_naziv)."'  class='list-group-item'> - {$podkat->podkategorija_naziv}</a>";
                        }   
                      }
                      
                     $string .="</div>";
                  }
                 $string .= '</div></div>';
       return $string;
    }
    
}
