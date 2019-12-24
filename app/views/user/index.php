<?php $this->start('body'); ?>
    <h1 class="text-center text-danger font-weight-bold mb-5"><?=$this->name?>'s account</h1>
    <div class="row">
        <div class="col-md-3">
            <?=$this->partial('user', 'side_nav');?>
        </div>
        <div class="col-md-9">            
           Ide jönnek majd a felhasználó által utoljára megtekintett könyvek 
        </div>
    </div>
<?php $this->end(); ?>

    
