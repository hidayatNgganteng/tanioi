<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <style>
        body{
            background:url("<?php echo base_url(); ?>assets/img/grass2.jpg");
            background-attachment:fixed;
        }
    </style>
</head>
<body>
    
<!-- header -->
<?php $this->load->view('admin/component/header'); ?>

<div class="container" style="width:900px" >
   <div class="jumbotron" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">
      <div class="panel-body">
         <center>
            <h3><font color="#FFFFFF">Input Produk</h3>
         </center>
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-md-offset-2">
                  <form action="<?php echo base_url(); ?>admin/product_add_proccess" method="POST" class="form-horizontal" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="kategori">Kategori:</label>
                        <select name="kategori" class="form-control" required>
                           <option>Pupuk</option>
                           <option>Bibit</option>
                           <option>Alat Pertanian</option>
                           <option>Pestisida</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="nama">Nama Produk:</label>
                        <input id="nama" type="text" name="nama" placeholder="Nama Produk" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label for="berat">Berat (kg):</label>
                        <input id="berat" type="number" name="berat" placeholder="Berat Barang" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input id="harga" type="number" name="harga" placeholder="Harga Barang" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label for="stok">Stok:</label>
                        <input id="stok" type="number" name="stok" placeholder="Stok" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label for="foto">Foto Produk:</label>
                        <input id="foto" type="file"  name="foto" placeholder="Foto Barang" class="form-control" required>
                     </div>
                     <div class="form-group">
                        <label for="deskripsi">Deskripsi Produk:</label>
                        <textarea name="deskripsi" placeholder="Deskripsi Produk" class="form-control" required></textarea>
                     </div>
                     <div class="form-group">
                        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-success">
                        <input type="reset" value="RESET" class="btn btn-danger">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- footer -->
<?php $this->load->view('admin/component/footer'); ?>

</body>
</html>