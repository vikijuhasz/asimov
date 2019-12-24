<?php use Core\{FH,H,Session}; ?>
<?php $this->start('body'); ?>
    <h1 class="text-center text-danger font-weight-bold mb-4"><i class="far fa-comment"></i> Reviews</h1>
        <main class="col-md-6 mx-auto">
            <?= Session::displayMsg() ?>
            <table class="table table-bordered table-hover table-sm reviews-table">
                <thead>
                    <tr>
                        <th>Date (updated at)</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>User</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->reviews as $review) : ?>
                    <tr>
                        <td><?=$review->updated_at?></td>
                        <td><?=$review->body?></td>
                        <td><?=$review->rating?></td>
                        <td><?=$review->username?></td>
                        <td><div class="text-right"><button onclick="confirmDelete('<?=PROOT?>adminreviews/delete/<?=$review->id?>', 'review')" class="btn btn-danger btn-sm">Delete</button></div></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </main>

    <script src="<?=PROOT?>js/my.js"></script>
<?php $this->end(); ?>
