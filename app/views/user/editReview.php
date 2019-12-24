<?php use Core\{FH,H}; ?>
<?php $this->start('body'); ?>
<header>
    <div class="row mb-4">
        <div class="col-md-3 ml-3">
            <a class="btn btn-danger" href="<?=PROOT?>user/reviews"><i class="fas fa-backward"></i> Back to Reviews</a>
        </div>
        <div class="col-md-8">
             <h1 class="offset-3 text-danger font-weight-bold">Edit Review</h1>
        </div>
</header> 

<section class="row">
     <div class="col-md-6 mx-auto">
        <div class="text-center">
            <h5><?=$this->book->title?></h5>
            <img src="<?=PROOT.$this->book->image_url?>" alt="book" class="thumbnail">
        </div>
        <?= FH::displayErrors($this->errors) ?>
        <div class="review">            
            <h5>Your Rating</h5>
            <form action="" method="post">
               <div class="mb-4">
               <?= FH::csrfInput(); ?>    
               <?php for ($i=1; $i<=$this->review->rating; $i++) : ?>  
                    <input type="radio" name="rating" value="<?=$i?>" id="rating_<?=$i?>"><label for="rating_<?=$i?>"><i class="fas fa-star text-danger" id="<?=$i?>" onclick="toggle(<?=$i?>)"></i></label>
                <?php endfor; ?>
                <?php for ($i=($this->review->rating+1); $i<=5; $i++) : ?>  
                    <input type="radio" name="rating" value="<?=$i?>" id="rating_<?=$i?>"><label for="rating_<?=$i?>"><i class="far fa-star text-danger" id="<?=$i?>" onclick="toggle(<?=$i?>)"></i></label>
                <?php endfor; ?>    
                </div>  
                <h5>Write Your Review</h5>
                <textarea class="form-control" rows="10" name="body"><?=$this->review->body?></textarea>
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-danger" value="Submit">
                </div>
            </form>
        </div>
     </div>
</section>       
        
    <script>
        function toggle(id) {            
            if ($('#'+id).attr('class') === 'far fa-star text-danger') {
                for (i=1;i<=id;i++) {
                    $('#'+i).removeClass('far fa-star text-danger');
                    $('#'+i).addClass('fas fa-star text-danger');
                }
            } else if ($('#'+id).attr('class') === 'fas fa-star text-danger') {
                for (i=5;i>id;i--) {
                    $('#'+i).removeClass('fas fa-star text-danger');
                    $('#'+i).addClass('far fa-star text-danger');
                }
            }
        }
    </script>
<?php $this->end(); ?>
