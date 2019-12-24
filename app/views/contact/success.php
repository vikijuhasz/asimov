<?php use Core\{FH,Session}; ?>
<?php $this->start('body'); ?> 
    <div class="alert alert-danger"><?=Session::get('name');?>! Your email has been successfully sent. Thank you!</div> 
    <?php Session::delete('name');?>
<?php $this->end(); ?>
