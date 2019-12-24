<?php $this->start('body'); ?>
<h1 class="text-center text-danger font-weight-bold">Isaac Asimov</h1>
 <div class="col text-center mt-3">
        <img width="1200" src="<?=PROOT.DS?>uploads<?=DS?>cultura-isaac-asimov.jpg" class="img-fluid" alt="Issac Asimov">
 </div>
<div class="col-md-12 mt-3">
    <?= $this->partial('home', 'isaac_asimov'); ?>  
</div>
<?php $this->end(); ?>
