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
                        <h1><?=lang('Auth.loginTitle')?></h1>
                    </div>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']): ?>
                        <div class="mb-3">
							<label for="login"><?=lang('Auth.email')?></label>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
                        </div>
                        <?php else: ?>
                        <div class="mb-3">
							<label for="login"><?=lang('Auth.emailOrUsername')?></label>
							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="mb-3">
                            <label for="password"><?=lang('Auth.password')?></label>
							<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
                        </div>

                        <?php if ($config->allowRemembering): ?>
						<div class="mb-3">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
								<?=lang('Auth.rememberMe')?>
							</label>
						</div>
                        <?php endif; ?>

						<button type="submit" class="submit"><?=lang('Auth.loginAction')?></button>
                    </form>
                    <div class="row">
                    <?php if ($config->allowRegistration) : ?>
					    <p><a href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>