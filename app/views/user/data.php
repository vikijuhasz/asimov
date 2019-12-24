<?php
use Core\FH;
?>
<?php $this->start('body'); ?>
  <h1 class="text-center text-danger font-weight-bold mb-5">Your personal data</h1>
    <div class="row">
        <div class="col-md-3">
             <?=$this->partial('user', 'side_nav');?>
        </div>
        <div class="col-md-8 bg-light p-3">      
            <form class="form" action="" method="post">
            <?= FH::csrfInput() ?>
                <div class="row">
                    <?= FH::inputBlock('text','First Name','fname',$this->user->fname,['class'=>'form-control input-sm'],['class'=>'form-group col-md-6'],$this->displayErrors) ?>
                    <?= FH::inputBlock('text','Last Name','lname',$this->user->lname,['class'=>'form-control input-sm'],['class'=>'form-group col-md-6'],$this->displayErrors) ?>
                    <?= FH::inputBlock('text','Email','email',$this->user->email,['class'=>'form-control input-sm'],['class'=>'form-group col-md-6'],$this->displayErrors) ?>
                    <?= FH::inputBlock('text','Username','username',$this->user->username,['class'=>'form-control input-sm'],['class'=>'form-group col-md-6'],$this->displayErrors) ?>
                </div>
                <div class="d-flex justify-content-end">
                      <?= FH::submitTag('Update',['class'=>'btn btn-danger']) ?>
                </div>
          </form>
        </div>
    </div>  
  
<?php $this->end(); ?>
