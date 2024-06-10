<?= $this->extend('auth/template/index'); ?>

<?= $this->section('content'); ?>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image">
                    <img src="<?= base_url(); ?>/asset/poster.png" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text">
                        <h2><?=lang('Auth.register')?></h2>
                    </div>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>
                        <!-- <div class="mb-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div> -->
                        <div class="mb-3">
                            <label for="email"><?=lang('Auth.email')?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp"  value="<?= old('email') ?>">
                            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                        </div>
                        <div class="mb-3">
                        <label for="username"><?=lang('Auth.username')?></label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>">
                        </div>
                        <div class="mb-3">
                        <label for="password"><?=lang('Auth.password')?></label>
                            <input type="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off">
                        </div>
                        <button type="submit" class="submit"><?=lang('Auth.register')?></button>
                    </form>
                    <div class="row">
                        <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= url_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>