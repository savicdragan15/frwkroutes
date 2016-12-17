<?php
/**
 * Description of productsModuleController
 *
 * @author Dragan
 */

class profileModuleController extends baseController
{
    private $productsModel, $navigationModel;
    public function __construct() {
      Loader::loadModel($this, "products", "products");
      Loader::loadModel($this, "navigation");
      $this->productsModel = $this->models['products'];
      $this->navigationModel = $this->models['navigation'];
      $this->_callMdl('users', "register");
    }
    /**
     * 
     */
    public function index(){
        $this->template['scenarion'] = $scenario;
        Loader::loadView("profile", "profile", false, $this->template);
    }
    
    public function edit($scenario){
        $this->_isUserLogin();
        $user = $this->_usersMdl->getAll("*","WHERE ID='".Session::get('user')['user_id']."' AND active=1");
        if(!empty($user))
            $user = $user[0];
        $this->template['user'] = $user;
        $this->template['scenario'] = $scenario;
        Loader::loadView("profile", "profile", false, $this->template);
    }
    

}