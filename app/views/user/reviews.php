<?php use Core\{FH,H,Session}; ?>
<?php $this->start('body'); ?>
    <h1 class="text-center text-danger font-weight-bold mb-5">Your Reviews</h1>
     <div class="col-md-6 offset-3">
        <?= Session::displayMsg(); ?>
    </div> 
    <section class="row">
        <div class="col-md-3">
            <?=$this->partial('user', 'side_nav');?>
        </div>
        <div class="col-md-9"> 
          <?php foreach ($this->booksAry as $books) : ?>
            <?php foreach ($books as $book) : ?>
            <div class="col-md-10 theme_border mb-5">
                <div class="row mb-4 p-4">
                    <div class="col-md-5">
                        <h5><?=$book->title?></h5>
                        <a href="<?=PROOT?>bookstore/details/<?=$book->id?>"><img class="thumbnail" src="<?=PROOT.$book->image_url?>" alt="<?=$book->title?>"></a>
                    </div>
                    <div class="my-auto">
                        <a href="<?=PROOT?>bookstore/review/<?=$book->id?>" class="btn btn-danger btn-sm">Add Review to this Book</a>
                    </div>
                </div>
                <hr>
                 <!-- Reviews display -->
                <div class="row">
                    <div class="col">
                    <?php foreach ($this->reviews as $review) : ?>
                        <?php if ($book->id == $review->book_id) : ?>
                            <div class="col-md-9 mb-5">
                                <small class="text-secondary"><?=$review->updated_at?></small>
                                 <div class="rating">
                                     <?php for ($i=1; $i<=$review->rating; $i++) : ?>
                                         <i class="fas fa-star text-danger"></i>
                                     <?php endfor; ?>
                                     <?php for ($i=1; $i<=5-($review->rating); $i++) : ?>
                                         <i class="far fa-star text-danger"></i>
                                     <?php endfor; ?>
                                 </div>
                                <div class="mb-3">
                                    <?=$review->body?>  
                                </div>
                                <a href="<?=PROOT?>user/editReview/<?=$review->id?>" class="btn btn-danger btn-sm mr-3">Edit Review</a>
                                <button onclick="confirmDelete('<?=PROOT?>user/deleteReview/<?=$review->id?>', 'review')" class="btn btn-danger btn-sm">Delete Review</button>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </div>
    </section>
    <script src="<?=PROOT?>js/my.js"></script>
<?php $this->end(); ?>
