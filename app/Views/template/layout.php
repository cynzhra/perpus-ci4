<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>/asset/style.css">
  <title><?= $title; ?></title>
</head>

<body>
    <!-- Begin sidebar-->
    <?= $this->include('template/sidebar'); ?>
    <!-- End of Sidebar-->

    <!-- Begin Topbar-->
    <?= $this->include('template/topbar'); ?>
    <!-- End of TopBar-->

    <!-- Begin Page Content-->
    <?= $this->renderSection('page-content'); ?>
    <!-- End ofMain Content-->

    <!-- Begin Page Footer-->
    <?= $this->include('template/footer'); ?>
    <!-- End ofMain Footer-->
  
    <script>
      function previewImg(){
        const cover = document.querySelector('#cover_path');
        const imgPreview = document.querySelector('.img-preview');

        const fileCover = new FileReader();
        fileCover.readAsDataURL(cover.files[0]);
        
        fileCover.onload = function(e){
          imgPreview.src = e.target.result;
        }
      }
    </script>
</body>

</html>