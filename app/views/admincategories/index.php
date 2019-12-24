<?php use Core\{FH,H,Session}; ?>
<?php $this->start('body'); ?>
    <h1 class="text-center text-danger font-weight-bold mb-4"><i class="fas fa-folder"></i> Categories</h1>
        <main class="col-md-6 mx-auto">
            <?= Session::displayMsg() ?>
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Url</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->categories as $category) : ?>
                    <tr>
                        <td><?=$category->name?></td>
                        <td><?=$category->url?></td>
                        <td class="text-right">
                            <a class="btn btn-danger btn-sm" href="<?=PROOT?>admincategories/edit/<?=$category->id?>">Edit</a>
                            <button onclick="confirmDelete('<?=PROOT?>admincategories/delete/<?=$category->id?>', 'category')" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
            <h1 class="text-center text-danger font-weight-bold mt-4">Add New Category</h1>
             <?= FH::displayErrors($this->displayErrors, true) ?>
            <form class="form-inline justify-content-end" action="" method="POST">
            <?= FH::csrfInput(); ?>
            <div class="form-group text-dk flex-grow-1">
               <label class="control-label mr-3 font-weight-bold" for="name">Category Name</label>
               <input type="text" name="name" value="" class="form-control col-md-9 bg-light">
            </div>               
            <input type="submit" value="Submit" class="btn btn-danger">                
            </form>
        </main>

    <script src="<?=PROOT?>js/my.js"></script>
<?php $this->end(); ?>
