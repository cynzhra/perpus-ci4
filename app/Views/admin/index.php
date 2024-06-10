<?= $this->extend('template/layout'); ?>

<?= $this->section('page-content'); ?>

<div class="tabular--wrapper">
    <h3 class="main--title">User List</h3>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($users as $user): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->name ?></td>
                        <td>
                            <a class="btn submit" href="<?= base_url('admin/' . $user->userid)?>">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
</div>
<?= $this->endSection(); ?>