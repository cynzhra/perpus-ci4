<div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
        <span>Primary</span>
        <h2>Dashboard</h2>
        </div>
        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown" aria-expanded="true">
            <strong><?= user()->username; ?> </strong>
            <img src="<?= base_url('/asset/img/' .user()->user_image); ?>" alt="<?= user()->username; ?>" width="27" height="27" class="rounded-circle">
            </a>
            <ul class="dropdown-menu" data-popper-placement="bottom-start">
            <li><a class="dropdown-item" href="<?= base_url('user'); ?>">My Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">Sign out</a></li>
        </ul>
    </div>
</div>