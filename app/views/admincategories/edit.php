<?php use Core\FH; ?>
<?php $this->start('body'); ?> 
    <h1 class="text-center text-danger font-weight-bold mb-4"><i class="fas fa-folder"></i> Edit Category</h1>
        <div class="col-md-5 mx-auto">
            <?= FH::displayErrors($this->displayErrors, true) ?>
            <form class="form" action="" method="POST">
            <?= FH::csrfInput(); ?>
            <div class="form-group">
               <label class="control-label mr-3" for="name">Category Name</label>
               <input type="text" name="name" value="<?=$this->category->name?>" class="form-control bg-light">
            </div>
            <div class="form-group">
               <label class="control-label mr-3" for="url">Url</label>               
               <input type="text" name="url" value="<?=$this->category->url?>" class="form-control bg-light">
            </div>
            <div class="text-right mt-5">
              <a href="<?=PROOT?>admincategories" class="btn btn-large btn-secondary mr-2">Cancel</a>
              <?= FH::submitTag('Save Changes',['class'=>'btn btn-large btn-danger']); ?>
            </div>                          
            </form>
        </div>
<?php $this->end(); ?>