<?php
       
namespace App\Lib\Utilities;
use Core\H;

class Uploads
{
    private $_errors = [], $_files = [], $_maxAllowedSize = 5242880;
    private $_allowedImageTypes = [IMAGETYPE_GIF,IMAGETYPE_JPEG,IMAGETYPE_PNG];
    
    public function __construct($files)
    {
        $this->_files = self::restructureFiles($files);
    }
    
    public function runValidation()
    {
        $this->validateImageType();
        $this->validateSize();
    }
    
    public function validates()
    {
        return (empty($this->_errors))? true : $this->_errors;
    }
    
    protected function validateImageType()
    {
        foreach($this->_files as $file){
          $name = $file['name'];
          // checking file type
          if(!in_array(exif_imagetype($file['tmp_name']),$this->_allowedImageTypes)){
            $message = $name . " is not an allowed file type. Please use a jpeg, gif, or png.";
            $this->addErrorMessage($name, $message);
          }
        }
    }
  
  protected function validateSize()
  {
      foreach ($this->_files as $file) {
         $name = $file['name'];
         if($file['size'] > $this->_maxAllowedSize){
             $message = $name . " is over the max allowed size of 5mb.";
             $this->addErrorMessage($name, $message);
          } 
      }
  }
  
  protected function addErrorMessage($name, $message)
  {
      if (array_key_exists($name, $this->_errors)) {
          $this->_errors[$name] .= '<br>' .$name . ' ' . $message;
      } else {
          $this->_errors[$name] = $message;
      }
  }
  
  public static function restructureFiles($files)
  {
        $structured = [];
        foreach($files['tmp_name'] as $key => $val){
          $structured[] = [
            'tmp_name'=>$files['tmp_name'][$key],'name'=>$files['name'][$key],
            'size'=>$files['size'][$key],'error'=>$files['error'][$key],'type'=>$files['type'][$key]
          ];
        }
        return $structured;
  }
  
  public function getFiles()
  {
      return $this->_files;
  }

// change this for production to save files uploaded by users to a place separate from your webserver
  public function upload($bucket, $name, $tmp)          // $bucket: location of files to be saved 
  {
      if (!file_exists($bucket)) {
            mkdir($bucket);
          }
        move_uploaded_file($tmp, ROOT.DS.$bucket.$name);
  }
}