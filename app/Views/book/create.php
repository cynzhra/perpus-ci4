<?= $this->extend('template/layout'); ?>

<?= $this->section('page-content'); ?>


<div class="card--container">
    <div class="col-md ml-sm-auto col-lg px-md-4 content">
		<?= $validation->listErrors(); ?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form action="/book/insert" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
				<input type="hidden" name="user_id" class="form-control" value="<?= user()->id; ?>">
				<div class="form-group row mb-3">
					<label class="col-sm-2 col-form-label">Title</label>
					<div class="col-sm-5">
						<input type="text" name="title" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" autofocus required/>
						<div class="invalid-feedback">
							<?= $validation->getError('title'); ?>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Category</label>
                    <div class="col-sm-5">
                        <select name="category_id" class="form-control" required/>
                            <option>--Select a Category--</option>
                            <?php foreach ($category as $value) { ?>
                                <option value="<?= $value['category_id'] ?>"><?= $value['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Quantity</label>
					<div class="col-sm-5">
						<input type="number" name="qty" class="form-control" required/>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Description</label>
					<div class="col-sm-5">
						<textarea name="desc" class="form-control" rows="3"></textarea>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Book Files <small>(*.pdf)</small></label>
					<div class="col-sm-5">
						<input type="file" name="file_path" class="form-control <?= ($validation->hasError('file_path')) ? 'is-invalid' : ''; ?>" id="file_path" value="<?= old('file_path'); ?>">
						<div class="invalid-feedback">
							<?= $validation->getError('file_path'); ?>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Cover Book</label>
					<div class="col-sm-5">
						<input type="file" name="cover_path" class="form-control <?= ($validation->hasError('cover_path')) ? 'is-invalid' : ''; ?>" id="cover_path" onchange="previewImg()">
						<div class="invalid-feedback">
							<?= $validation->getError('cover_path'); ?>
						</div>
					</div>
					
					<div class="col-sm-2">
						<img src="/cover/default.png" class="img-thumbnail img-preview">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-primary" value="Simpan"> Save </button>
						<a href="/book" class="btn btn-danger" data-toggle="tooltip" title="Batal">Cancel</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div>
<?= $this->endSection(); ?>