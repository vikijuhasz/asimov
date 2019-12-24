<?php use Core\Session; ?>
<?php $this->start('body'); ?>
    <h1 class="text-center text-danger font-weight-bold mb-4"><i class="fas fa-book-open"></i> Books</h1>
    <div class="col-md-8 mx-auto">
        <?= Session::displayMsg() ?>
        <table class="table table-bordered table-hover table-striped table-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Inventory</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->books as $book) : ?>
                <tr>
                    <td><?=$book->title?></td>
                    <td><?=$book->inventory?></td>
                    <td class="text-right">
                        <a class="btn btn-danger btn-sm" href="<?=PROOT?>adminbooks/edit/<?=$book->id?>">Edit</a>
                        <button onclick="confirmDelete('<?=PROOT?>adminbooks/delete/<?=$book->id?>', 'book')" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
    </div>
    <script src="<?=PROOT?>js/my.js"></script>
<?php $this->end(); ?>



