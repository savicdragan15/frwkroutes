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
class Uploader {

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
    
    public function __construct($file_to_upload, $path) {
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
                        echo $this->failed_upload_message;
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
            echo $this->select_file_message;
            return false;
        }
    }

    public function multipleUpload(){
        var_dump($this->file_to_upload);
    }
    /**
     * Set filename
     * @param type $name
     */
    public function setFileName($name) {
        $this->file_name = $name;
    }

    /**
     * Set your custom message for Invalid format file error
     * @param type $message
     */
    public function setIvalidformatMessage($message) {
        $this->invalid_format_message = $message;
    }

    /**
     * Set your custom message when file not found
     * @param type $message
     */
    public function setSelecFileMessage($message) {
        $this->select_file_message = $message;
    }

    /**
     * Set your custom message for upload failed
     * @param type $message
     */
    public function setFailedUploadMessage($message) {
        $this->failed_upload_message = $message;
    }
    
    /**
     * Set your custom message for max file size error
     * @param type $message
     */
    public function setMaxFileSizeMessage($message){
        $this->file_size_message = $message;
    }

}
