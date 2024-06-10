<div class="sidebar">
  <div class="logo mb-5">
    <img src="<?= base_url(); ?>/asset/logo.png" alt="" srcset="">
  </div>
  <ul class="menu">
    <hr>
    <li>
      <a href="<?= base_url('user'); ?>">
        <i class="fas fa-user"></i>
        <span>My Profile</span>
      </a>
    </li>
    <hr>
    <?php if( in_groups('admin')): ?>
    <li>
      <a href="<?= base_url('admin'); ?>">
        <i class="fa fa-users-line"></i>
        <span>Manage User</span>
      </a>
    </li>
    <li>
        <a href="<?= base_url('book'); ?>">
        <i class="fa-solid fa-book"></i>
        <span>Manage Book</span>
        </a>
    </li>
    <li>
        <a href="<?= base_url('category'); ?>">
        <i class="fa-solid fa-list"></i>
        <span>Category</span>
        </a>
    </li>
    <?php endif; ?>
    <?php if( in_groups('user')): ?>
    <li>
        <a href="<?= base_url('book'); ?>">
        <i class="fas fa-book"></i>
        <span>My Book</span>
        </a>
    </li>
    <?php endif; ?>
    <li class="logout">
        <a href="<?= base_url('logout'); ?>">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
        </a>
    </li>
  </ul>
</div>
