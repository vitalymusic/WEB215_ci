<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('content') ?>

    <div class="container" id="content">
        <h1>Admin panel</h1>

        <div class="row">
            <div class="col-md-9">
                  <h3>News</h3> 
                  <table class="table">
                         <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">News</th>
                                <!-- <th scope="col">User</th> -->
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table data from database -->
                             <?php //dd($news);?>

                             <?php foreach($news as $item):?>
                                <tr>
                                    <td><?=$item->id?></td>
                                    <td><?=$item->news_title?></td>
                                    <td>
                                        <a class="btn btn-primary mt-5" href="<?=base_url('edit_news/'. $item->id)?>"> Edit</a>
                                    </td>

                                </tr>
                                
                             <?php endforeach;?>   
                        </tbody>

                </table> 
            </div>
            <div class="col-md-3">
                    <h3>Actions</h3>
                    <div class="container">
                        <a class="btn btn-primary mt-5" href="<?=base_url('add_news')?>">+ Add News</a>
                        <a class="btn btn-primary mt-5" href="<?=base_url('add_user')?>">+ Add User</a>
                    </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
    
                         

