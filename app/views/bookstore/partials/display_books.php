 <div class="col-md-10">
    <div class="row d-flex justify-content-between mr-1">            
        <?php foreach ($this->books as $book) : ?>
            <div class="card mb-5">
               <img src="<?=PROOT.$book->image_url?>" alt="<?=$book->title?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><a href="<?=PROOT?>bookstore/details/<?=$book->id?>"><?=$book->title;?></a></h5>
                    <p class="card-text">$<?=$book->price;?></p>
                    <div class="d-flex justify-content-end">
                        <div class="flex-grow-1"><a href="<?=PROOT?>bookstore/details/<?=$book->id?>" class="btn btn-danger">See Details</a></div>
                        <div><a href="<?=PROOT?>cart/<?=$book->id?>" class="btn btn-danger">Add to Cart</a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

