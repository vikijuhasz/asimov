<?php $this->start('body'); ?>
<?php use Core\H; ?>
<?php $reviewCount = count($this->reviews); ?>
<header>
    <div class="row mb-4">
        <div class="col-md-3 ml-3">
    <a class="btn btn-danger" href="<?=PROOT?>bookstore"><i class="fas fa-backward"></i> Back to Bookstore</a>
        </div>
        <div class="col-md-8">
            <h1 class="offset-1 text-danger font-weight-bold mb-5"><?=$this->book->title?></h1>
        </div>
    </div>
</header> 

<section class="row mx-auto">
    <div class="col-md-3">
       <nav class="side_nav">
            <h5 class="font-weight-bold">Other Books In the Same Category</h5>
            <ul class="nav flex-column">
                <?php foreach ($this->otherBooks as $book) : ?>
                    <li><a href="<?=PROOT?>bookstore/details/<?=$book->id?>"><?=$book->title?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <div class="col-md-9">
        <div class="d-flex flex-row">
            <div class="col-md-4>">
                <div class="card">
                    <img class="card-img-top" src="<?=PROOT.$this->book->image_url?>" alt="<?=$this->book->title?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$this->book->title;?></h5>
                        <p class="card-text">$<?=$this->book->price;?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 ml-4">
                <div class="mb-4">
                   <?php for ($i=1; $i<=$this->stars; $i++) : ?>
                    <i class="fas fa-star text-danger"></i>
                <?php endfor; ?>
                <?php for ($i=1; $i<=(5-$this->stars); $i++) : ?>
                    <i class="far fa-star text-danger"></i>
                <?php endfor; ?>
                <span class="ml-4 text-secondary font-weight-bold">Rating: <?=$this->roundedRating;?></span>  
                </div>
                <div>
                   <?=$this->book->description?>
                    <div class="mt-5"><a href="<?=PROOT?>addToCart/<?=$this->book->id?>" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a></div>  
                </div>
            </div>
        </div> 
    </div>
</section>
    
<!-- REVIEWS SECTION -->
<section class="row mt-5 mx-auto">
         <div class="col-md-3 mr-4">
             <h5>Review this book</h5>
                 <a href="<?=PROOT?>bookstore/review/<?=$this->book->id?>" class="btn btn-danger">Write a Customer Review</a>
         </div>
         <!-- Reviews display -->
         <div class="col-md-8">
             <h4 class="font-weight-bold text-danger">Customer Reviews</h4>
                 <?php foreach ($this->reviews as $review) : ?>
                 <div class="mb-4">
                     <div><?=$review->username?></div> 
                     <small class="text-secondary"><?=$review->updated_at?></small>
                      <div class="rating">
                          <?php for ($i=1; $i<=$review->rating; $i++) : ?>
                              <i class="fas fa-star text-danger"></i>
                          <?php endfor; ?>
                          <?php for ($i=1; $i<=5-($review->rating); $i++) : ?>
                              <i class="far fa-star text-danger"></i>
                          <?php endfor; ?>
                      </div>
                         <?=$review->body?> 
                 </div>
                 <?php endforeach; ?>
         </div>
 </section> 
   
<?php $this->end(); ?>

    
