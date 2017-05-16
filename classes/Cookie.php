<?php
namespace Classes;
/**
 * @author Dragan Savic <savicdragan2707@gmail.com>
 */
class Cookie{
    
    /**
     * 
     * @param type $cookie_name
     * @param type $cookie_value
     * @param type $days
     * @param type $path
     * @param type $domain
     * @param type $secure
     * @param type $http_only
     */
    public static function set($cookie_name, $cookie_value, $days, $path = "", $domain = "", $secure = false, $http_only = false) {
        setcookie($cookie_name, $cookie_value, time() + (86400 * $days), $path, $domain, $secure, $http_only); // 86400 = 1 day
    }
    
    /**
     * 
     * @param type $cookie_name
     * @return boolean
     */
    public static function get($cookie_name){
        if(isset($_COOKIE[$cookie_name])) return $_COOKIE[$cookie_name];
         else return false;
    }
    
    /**
     * 
     * @param type $cookie_name
     * @return boolean
     */
    public static function delete($cookie_name) {
        if (isset($_COOKIE[$cookie_name])) {
            foreach ($_COOKIE as $name => $value)
                if ($cookie_name == $name) {
                    setcookie($name, $value, time() - (86400 * 30), "/");
                    return true;
                }
        } else
            return false;
    }

}

