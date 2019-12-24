<?php $this->start('body'); ?>
    <h1 class="text-center text-danger font-weight-bold mb-5"><?=$this->category->name?></h1>
    <section class="row mx-auto">
        <div class="col-md-2">
            <nav class="side_nav">
            <h5 class="font-weight-bold">Other Categories</h5>
            <ul class="nav flex-column"> 
                <?php foreach ($this->otherCategories as $category) : ?>
                    <li><a href="<?=PROOT?>bookstore/categories/<?=$category->url?>"><?=$category->name?></a></li>
                <?php endforeach; ?>
            </ul>
            </nav>
        </div>
        <?=$this->partial('bookstore', 'display_books');?>         
    </section>
<?php $this->end(); ?>
