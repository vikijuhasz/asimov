<?php use Core\{FH,Session}; ?>
<?php $this->start('body'); ?> 
    <h1 class="text-center text-danger font-weight-bold">Contact Us</h1>
    <?= Session::displayMsg();?>
    <div class="row mx-auto">
        <div class="col-md-3 contact">
            <p><i class="far fa-building"></i> Issac Asimov's Books</p>
            <p><i class="far fa-envelope"></i> email@email.com</p>
            <p><i class="fas fa-mobile-alt"></i> 06-30-333-3333</p>
            <p><i class="fas fa-globe"></i> <a href="<?=PROOT?>home">http://</a></p>
        </div>
        <div class="col-md-6 theme_border pt-4 px-4 pb-2">
            <form class="form" method="POST" action="<?=PROOT?>contact">
                <div class="row">
                <?= FH::csrfInput() ?>
                <?= FH::inputBlock('text', 'First Name', 'first_name', $this->email->first_name, ['class' => 'form-control'], ['class' => 'form-group col-md-6'], $this->displayErrors) ?>
                <?= FH::inputBlock('text', 'Last Name', 'last_name', $this->email->last_name, ['class' => 'form-control'], ['class' => 'form-group col-md-6'], $this->displayErrors) ?> 
                   <?= FH::inputBlock('text', 'Email', 'email', $this->email->email, ['class' => 'form-control'], ['class' => 'form-group col-md-6'], $this->displayErrors) ?>
                <?= FH::inputBlock('text', 'Phone Number', 'phone', $this->email->phone, ['class' => 'form-control'], ['class' => 'form-group col-md-6'], $this->displayErrors) ?> 
                    <?=FH::textareaBlock('Your Message', 'message', $this->email->message, ['class' => 'form-control',  'rows' => 8], ['class' => 'form-group col-md-12'], $this->displayErrors) ?>
                    <?=FH::submitBlock('Send Email', ['class' => 'form-control btn-danger'], ['class' => 'form-group col-md-8 mx-auto']) ?>                
                </div>
            </form>
        </div>
    </div>
<?php $this->end(); ?>




