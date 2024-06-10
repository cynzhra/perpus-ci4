<?= $this->extend('template/layout'); ?>

<?= $this->section('page-content'); ?>

<div class="tabular--wrapper">
    <h3 class="main--title">User Detail</h3>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="<?= base_url('/asset/img/' .$user->user_image); ?>" class="img-fluid rounded-start" alt="<?= $user->username; ?>">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h5><?= $user->username; ?></h5></li>
                    <?php if($user->fullname): ?>
                    <li class="list-group-item"><?= $user->username; ?></li>
                    <?php endif; ?>
                    <li class="list-group-item"><?= $user->email; ?></li>
                    <li class="list-group-item">
                        <span class="badge bg-<?= ($user->name == 'admin') ? 'success' : 'warning'; ?> rounded-pill"><?= $user->name; ?></span>
                    </li>
                    <li class="list-group-item">
                        <a href="<?= base_url('admin'); ?>">&laquo; back to users list</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>