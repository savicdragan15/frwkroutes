<?php 
define("_MODULE_MODE_", true);
$modules = ['products','register','login','users','admin','cart'];
if(_MODULE_MODE_){
    function autoload_module($className) {
        global $modules;
        foreach ($modules as $module) {
            if (file_exists(realpath("modules/" . $module . "/controllers/" . $className . ".php"))) {
                require_once realpath("modules/" . $module . "/controllers/" . $className . ".php");
            }
        }
    }
spl_autoload_register("autoload_module");
}
