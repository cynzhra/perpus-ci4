<?= $this->extend('template/layout'); ?>

<?= $this->section('page-content'); ?>


<div class="card--container">
    <div class="col-md ml-sm-auto col-lg px-md-4 content">
        <h3>Edit Book</h3>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan diubah -->
			<form action="/book/update/<?= $book['book_id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $book['slug']; ?>">
				<input type="hidden" name="user_id" class="form-control" value="<?= $book['user_id']; ?>">
				<input type="hidden" name="old_cover" class="form-control" value="<?= $book['cover_path']; ?>">
				<div class="form-group row mb-3">
					<label class="col-sm-2 col-form-label">Title</label>
					<div class="col-sm-5">
						<input type="text" name="title" class="form-control" value="<?= $book['title']; ?>" autofocus required/>
						<div class="invalid-feedback"></div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Category</label>
                    <div class="col-sm-5">
                        <select name="category_id" class="form-control" required>
                            <option>--Select Categories--</option>
                            <?php foreach ($category as $value) { ?>
                                <option value="<?= $value['category_id'] ?>" required><?= $value['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Quantity</label>
					<div class="col-sm-5">
						<input type="number" name="qty" class="form-control" value="<?= $book['qty']; ?>" required/>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Description</label>
					<div class="col-sm-5">
						<textarea name="desc" class="form-control" rows="5"><?= $book['desc']; ?></textarea>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Book Files <small>(*.pdf)</small></label>
					<div class="col-sm-5">
						<input type="file" name="file_path" class="form-control" id="file_path" value="<?= old('file_path'); ?>">
						<div class="invalid-feedback">
							
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Cover Book</label>
					<div class="col-sm-5">
						<input type="file" name="cover_path" class="form-control" id="cover_path" onchange="previewImg()">
						<input type="hidden" name="user_id" class="form-control" value="<?= user()->id; ?>">
						<div class="invalid-feedback">
							
						</div>
					</div>
					<div class="col-sm-2">
						<img src="/cover/<?= $book['cover_path']?>" class="img-thumbnail img-preview" width="150px">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<button type="submit" name="add" class="btn btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan"> Edit </button>
						<a href="/book" class="btn btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div>
<?= $this->endSection(); ?>