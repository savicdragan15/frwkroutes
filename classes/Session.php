<?php
/**
 * Class session
 */
class Session {
    /**
     * Sessio start if not isset
     */
    public static function start(){
        if(!isset($_SESSION))
            session_start();
    }
    /**
     * Destroy session
     */
    public static function stop(){
        foreach($_SESSION as $k=>$v){
            unset($_SESSION[$k]);
        }
        session_destroy();
    }
    
    public static function unsetSession($key){
        unset($_SESSION[$key]);
    }

    /**
     * Get session key
     * @param string $key
     * @param type $default
     * @return array
     */
    public static function get($key,$default=null){
        self::start();
        if(isset($_SESSION[$key])) return $_SESSION[$key];
        else return $default;
    }
    
    /**
     * Set session
     * @param string $key
     * @param string $value
     */
    public static function set($key,$value){
        self::start();
        $_SESSION[$key] = $value;
    }
}