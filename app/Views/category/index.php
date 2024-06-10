<?= $this->extend('template/layout'); ?>

<?= $this->section('page-content'); ?>

<div class="tabular--wrapper">
    <h3 class="main--title">Manage Category</h3>
    <button type="button" class="button-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add Category
    </button>
    <?php if(session()->getFlashData('message')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <div class="table-container"> 
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($category as $cat):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $cat['category_name']; ?></td>
                        <td>
                            <a class="btn submit" href="<?= base_url('category/edit/' . $cat['category_id'])?>" data-bs-toggle="modal" data-bs-target="#editCategory<?= $cat['category_id'];?>">Edit</a>
                            <a class="btn submit" href="<?= base_url('category/delete/' . $cat['category_id'])?>" onclick="return confirm('Are you sure you want to delete this data?');">Delete</a>
                        </td>
                        <div class="modal fade" id="editCategory<?= $cat['category_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Start Form -->
                                    <form action="/category/update/<?= $cat['category_id']; ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-body">
                                        <div class="row edit-category">
                                            <label class="col-form-label col-sm-5">Category Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="category_name" class="form-control" value="<?= $cat['category_name']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="button-link">Save</button>
                                    </div>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Start Form -->
            <form action="/category/insert" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
				<div class="row">
					<label class="col-form-label col-sm-5">Category Name</label>
					<div class="col-sm-7">
						<input type="text" name="category_name" class="form-control" required/>
					</div>
				</div>
            <!-- End Form -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
			</form>
        </div>
    </div>
    </div>
<?= $this->endSection(); ?> 