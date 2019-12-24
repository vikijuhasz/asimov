<?php
namespace App\Models;
use Core\{Model,H};
use Core\Validators\{RequiredValidator,EmailValidator,NumericValidator,MaxValidator};

class Email extends Model {
  public $first_name, $last_name, $email, $phone, $message;
  protected static $_table = 'tmp_fake';

  public function validator(){
    $requiredFields = ['first_name'=>"First Name",'last_name'=>'Last Name','email'=>'Email','phone'=>'Phone Number','message'=>'Message'];
    foreach($requiredFields as $field => $display){
      $this->runValidation(new RequiredValidator($this,['field'=>$field,'msg'=>$display." is required."]));
    }
    $this->runValidation(new EmailValidator($this, ['field' => 'email', 'msg' => 'Email is not correct.']));
    $this->runValidation(new NumericValidator($this, ['field' => 'phone', 'msg' => 'Phone number can only contain numeric characters.']));
    array_pop($requiredFields); 
    foreach($requiredFields as $field => $display){
      $this->runValidation(new MaxValidator($this,['field'=>$field,'rule' => '200', 'msg'=>$display.' cannot have more than 200 characters.']));
    }
    $this->runValidation(new MaxValidator($this,['field'=>'message','rule' => '1000', 'msg'=>'Message cannot have more than 1000 characters.']));
  }
}
