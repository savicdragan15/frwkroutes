<?php
class Loader
{
    /**
     * 
     * @global array $config
     * @param string $class naziv kotrolera koji se instancira
     * @param string $method metod koji se poziva
     * @param array $params parametri metode
     */
    public static function loadController($controller,$method,$params=array())
    {
        global $config;
        $path_to_controller = realpath("controllers/" . strtolower($controller) . "Controller.php");
        if (file_exists($path_to_controller)) {
            include_once $path_to_controller;
            $controller=strtolower($controller)."Controller";
            $controller_instance = new $controller();
            if (!is_subclass_of($controller_instance, 'baseController')) {
                echo $config['Poruke']['noBaseCont'];
                die;
            }
            if (method_exists($controller_instance, $method)) {
                $refl = new ReflectionMethod(get_class($controller_instance), $method);
                $numParams = $refl->getNumberOfParameters();
                if ($numParams > 0 && count($params) < $numParams) {
                    echo $config['Poruke']['noParams'];
                    die;
                }
                call_user_func_array(array($controller_instance, $method), $params);
            } else
                echo $config['Poruke']['noMethod'];
        }else
            echo $config['Poruke']['error404'];
    }
    
    /**
     * 
     * @global array $config
     * @param object $object objekat kontrolera
     * @param string $model naziv modela
     * @return \model_full_mame objekat modela
     */
    public static function loadModel($object,$model,$module="")
    {
        global $config;
        $module_folder = ($module != '')?'modules/'.$module."/":'';
        $path_to_model=realpath($module_folder."models/".strtolower($model)."Model.php");
        if (file_exists($path_to_model))
        {
            include_once  $path_to_model;
            $model_full_mame=strtolower($model)."Model";
            $model_instance=new $model_full_mame();
            if (!is_subclass_of($model_instance, 'baseModel'))
            {
            echo $config['Poruke']['noBaseMod'];
            die;
            }
            $object->setModel(strtolower($model),$model_instance);
            return $model_instance;
        }
        else 
        {
            echo $config['Poruke']['noModel'];
        }  
    }
    /**
     * 
     * @global array $config
     * @param string $view naziv view-a
     * @param array $params parametri za view
     */
    public static function loadView($view, $module="",$from_module = false, $params=array())
    {
        global $config;
        $module_folder = ($module != '')?'modules/'.$module."/":'';
        $path_to_header=($from_module===true)?realpath($module_folder."views/headerView.php"):realpath("views/headerView.php");
        $path_to_view=realpath($module_folder."views/".strtolower($view)."View.php");
        $path_to_footer=($from_module===true)?realpath($module_folder."views/footerView.php"):realpath("views/footerView.php");

        if (file_exists($path_to_view))
        {
            extract($params);
            include_once  $path_to_header;
            include_once  $path_to_view;
            include_once  $path_to_footer;
           
        }
        else 
        {
            echo $config['Poruke']['noView'];
        } 
    }
    
    public static function loadClass($className){
        global $config;
        $class_folder = "classes";
        $path_to_class = realpath($class_folder."/".$className.".php");
        if(file_exists($path_to_class)){
            include $path_to_class;
        }
        else{
            echo $config['poruke']['noClass'];
        }
    }
}