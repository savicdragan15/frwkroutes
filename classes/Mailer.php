<?php
/**
 * @author Dragan Savic <savicdragan2707@gmail.com>
 */
class Mailer{
    
    /**
     * Method send mail 
     * @param string $from
     * @param string $to
     * @param string $message
     * @param string $subject
     * @return boolean on success true or false
     */
    public static function sendMail($from, $to, $message, $subject){
        $headers  = "From:".$from."" . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=utf-8';
        
        if(mail($to, $subject, $message, $headers))
            return true;
        else
            return false;
    }
}