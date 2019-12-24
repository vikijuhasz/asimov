<?php use Core\FH; ?>
<?php $this->start('body'); ?> 
    <h1 class="text-center text-danger font-weight-bold mb-4"><i class="fas fa-book-open"></i> <?=$this->header?></h1>
        <div class="col-md-8 mx-auto">
            <form action="" method="POST" enctype="multipart/form-data" class="book-form">
                <?= FH::csrfInput();?>
                <div class="row">
                    <?= FH::inputBlock('text', 'Title', 'title', $this->book->title, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], $this->displayErrors) ?>
                    <?= FH::inputBlock('text', 'Price', 'price', $this->book->price, ['class' => 'form-control'], ['class' => 'form-group col-md-2'], $this->displayErrors) ?>
                    <?= FH::selectBlock('Category', 'category', $this->book->category, $this->categories, ['class' => 'form-control'], ['class' => 'form-group col-md-4'], $this->displayErrors) ?>
                    <?= FH::inputBlock('text', 'Inventory', 'inventory', $this->book->inventory, ['class' => 'form-control'], ['class' => 'form-group col-md-2'], $this->displayErrors) ?>
                </div>
                <?=FH::textareaBlock('Description', 'description', $this->book->description, ['class' => 'form-control', 'rows' => 10], ['class' => 'form-group col-md-12 px-0'], $this->displayErrors) ?>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <?php if ($this->book->image_url != '') : ?>
                            <img src="<?=PROOT.$this->book->image_url?>" class="thumbnail">
                            <div class="mt-2">
                                <a href="<?=PROOT?>adminbooks/deleteImage/<?=$this->book->id?>" class="btn btn-sm btn-danger">Delete Image</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?=FH::inputBlock('file', 'Upload book image', 'image[]', '', ['class' => 'form-control p-0'], ['class' => 'form-group px-0 ml-5'], $this->displayErrors)?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                      <a href="<?=PROOT?>adminbooks" class="btn btn-large btn-secondary mr-2">Cancel</a>
                      <?= FH::submitTag('Save Changes',['class'=>'btn btn-large btn-danger col-md-2']); ?>
                    </div>
                </div>
            </form>
        </div>
<?php $this->end(); ?>