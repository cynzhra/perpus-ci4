<?= $this->extend('template/layout'); ?>

<?= $this->section('page-content'); ?>

<div class="tabular--wrapper">
<div class="card" style="align-items: center;">
  <img src="/cover/<?= $book['cover_path']; ?>" class="card-img-top mt-3" style="width: 250px;">
  <div class="card-body col-lg-8">
  <table class="table table-striped mt-3">
  <a href="/book/" class="card-link text-decoration-none mt-3">Back</a>
  <tbody>
    <tr>
      <td class="fs-6">Title </td>
      <td class="fs-6"><?= $book['title']; ?></td>
    </tr>
    <tr>
      <td class="fs-6">Category </td>
      <td class="fs-6"><?= $book['category_name']; ?></td>
    </tr>
    <tr>
      <td class="fs-6">Quantity</td>
      <td class="fs-6"><?= $book['qty']; ?></td>
    </tr>
    <tr>
      <td class="fs-6">File</td>
      <td class="fs-6"><a href="<?= base_url("file/". $book['file_path']); ?>">Pdf</td>
    </tr>
    <tr>
      <td class="fs-6">Description</td>
      <td class="fs-6"><?= $book['desc']; ?></td>
    </tr>
  </tbody>
</table>
    <a href="/book/edit/<?= $book['slug']; ?>" class="btn btn-primary">Edit</a>
    <form action="/book/<?= $book['book_id']; ?>" method="post" class="d-inline">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data?');">Delete</button>
    </form>
  </div>   

</div>

<?= $this->endSection(); ?>