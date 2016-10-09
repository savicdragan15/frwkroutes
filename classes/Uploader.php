<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Class for upload file to the server
 *
 * @author Draga Savic <savicdragan2707@gmail.com>
 */
Loader::loadClass("SimpleImage");
use Image\SimpleImage as SimpleImageClass;

class Uploader extends SimpleImageClass{

    /**
     *
     * @var type 
     */
    private $file_to_upload;

    /**
     *
     * @var type 
     */
    private $path;

    /**
     *
     * @var type 
     */
    private $file_name;

    /**
     * Max file size to upload 
     * 1048576 = 1MB
     * @var type 
     */
    private $size = 1048576;

    /**
     * Array of available upload formats
     * @var type 
     */
    private $valid_formats = array("jpg", "png", "gif", "bmp");
    
    private $select_file_message = "Please select file..!";
    private $invalid_format_message = "Invalid file format..";
    private $failed_upload_message = "An error occurred, the file is not uploaded";
    private $file_size_message = "File size max 1 MB";
    
    public $message;
    
    public function __construct($file_to_upload = null, $path = null) {
        $this->file_to_upload = $file_to_upload;
        $this->path = $path;
    }

    /**
     * 
     * @return boolean|string
     */
    public function upload() {
        if ($this->path != '' && $this->file_to_upload['name'] != '') {
            list($name, $extension) = explode(".", $this->file_to_upload['name']);
            if (in_array($extension, $this->valid_formats)) {
                if ($this->file_to_upload['size'] < $this->size) {
                    $file_name = isset($this->file_name) ? $this->file_name . "." . $extension : $this->file_to_upload['name'];
                    if (move_uploaded_file($this->file_to_upload['tmp_name'], $this->path . $file_name)) {
                        return true;
                    } else {
                        $this->message = $this->failed_upload_message;
                        return false;
                    }
                }else{
                    $this->message = $this->file_size_message;
                    return false;      
                }
            } else {
                $this->message = $this->invalid_format_message;
                return false;
            }
        } else {
            $this->message = $this->select_file_message;
            return false;
        }
    }
    
    /**
     * This method used for upload only image file
     * @param type $image
     * @return boolean
     */
    public function uploadImage($image) {
        $this->_setFileToUpload($image);

        if ($this->path != '' && $this->file_to_upload['name'] != '') {
            try {
                $this->load($this->file_to_upload['tmp_name']);
                list($name, $extension) = explode(".", $this->file_to_upload['name']);
                if (in_array($extension, $this->valid_formats)) {
                    if ($this->get_original_info()['exif']['FileSize'] < $this->size) {
                        $file_name = isset($this->file_name) ? $this->file_name . "." . $extension : $this->file_to_upload['name'];
                        $this->save($this->path . $file_name);
                        return true;
                    } else {
                        $this->message = $this->file_size_message;
                        return false;
                    }
                } else {
                    $this->message = $this->invalid_format_message;
                    return false;
                }
            } catch (Exception $e) {
                $this->message = $e->getMessage();
                return false;
            }
        } else {
            $this->message = $this->select_file_message;
            return false;
        }
    }
    
    /**
     * 
     * @param type $files
     * @return boolean
     */
    public function multipleUpload($files){
        $files_arr = $this->_reArrayFiles($files);
        
        foreach($files_arr as $file){
            if($file['name'] != ''){
            list($name, $extension) = explode(".", $file['name']);
            if (in_array($extension, $this->valid_formats)) {
                if ($file['size'] < $this->size) {
                    $file_name = str_replace(" ", "_", uniqid().date('Y-m-d-h-i-s').$file['name']);
                    if (move_uploaded_file($file['tmp_name'], $this->path . $file_name)) {
                        $names[] = $file_name;
                    } else {
                        $this->message = $this->failed_upload_message;
                        return false;
                    }
                }else{
                   $this->message = $this->file_size_message;
                   return false; 
                }
            }else{
               $this->message = $this->invalid_format_message;
               return false; 
            }
            }else{
                $this->message = $this->select_file_message;
                return false;
            }
        }
        
       return $names; 
    }
   
   /**
    * 
    * @param type $file_post
    * @return type
    */
   private function _reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    /**
     * 
     * @param type $path
     */
    public function setPath($path){
        $this->path = $path;
    }
    
    /**
     * 
     * @param array $file
     */
    private function _setFileToUpload($file){
         $this->file_to_upload = $file;
    }
    /**
     * Set filename
     * @param string $name
     */
    public function setFileName($name) {
        $this->file_name = $name;
    }
    
    /**
     * Set your custom message for Invalid format file error
     * @param string $message
     */
    public function setIvalidformatMessage($message) {
        $this->invalid_format_message = $message;
    }

    /**
     * Set your custom message when file not found
     * @param string $message
     */
    public function setSelecFileMessage($message) {
        $this->select_file_message = $message;
    }

    /**
     * Set your custom message for upload failed
     * @param string $message
     */
    public function setFailedUploadMessage($message) {
        $this->failed_upload_message = $message;
    }
    
    /**
     * Set your custom message for max file size error
     * @param string $message
     */
    public function setMaxFileSizeMessage($message){
        $this->file_size_message = $message;
    }

}
