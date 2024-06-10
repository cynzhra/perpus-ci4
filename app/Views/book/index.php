<?= $this->extend('template/layout'); ?>

<?= $this->section('page-content'); ?>

    <div class="tabular--wrapper">
        <h3 class="main--title">Manage Book</h3>

        <!-- Flash Message -->
        <?php if(session()->getFlashData('message')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>
        <!-- End Flash Message -->

        <div class="row">
            <div class="col-sm-9">
                <a href="/book/add" class="button-link"> Add Book </a>
                <a href="/book/export" class="button-link"> <i class="fa fa-file-download"></i> Export File </a>
            </div>
            <div class="col-sm-3">
                <!-- Filter With Category -->
                <form action="<?= base_url('book/index') ?>" method="post">
                    <select class="form-select" name="category" id="category" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['category_id'] ?>" <?= ($selectedCategory == $category['category_id']) ? 'selected' : '' ?>>
                                <?= $category['category_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
                <!-- End Filter -->
            </div>
        </div>

        <!-- Start the Books Table -->
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <!-- Conditioning if data is not found -->
                    <?php if (empty($books)): ?>
                        <tr>
                            <td colspan="5" class="fs-4">Data not found.</td>
                        </tr>
                    <?php else: ?>
                    <?php 
                    $no = 1;
                    foreach ($books as $book):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="/cover/<?= $book['cover_path']; ?>" alt="" class="cover"></td>
                        <td><?= $book['title']; ?></td>
                        <td>
                            <?= $book['category_name'];
                            ?>
                        </td>
                        <td>
                            <a class="btn submit" href="<?= base_url('book/' . $book['slug'])?>">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            <?php endif; ?>
                </tbody>
            </table>
        <!-- End Table -->
    </div>

<?= $this->endSection(); ?>