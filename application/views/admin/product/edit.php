<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Produk</title>
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
                <h3><font color="#FFFFFF">Edit Data Produk</h3>
            </center>
            <br>
            <div class="container">
                <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form method="post" action="<?php echo base_url(); ?>admin/product_edit_proccess/<?php echo $productById->row()->id ?>" class="form-horizotal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">ID: </label>
                            <input type="text" readonly="readonly" name="id" class="form-control" value="<?php echo $productById->row()->id ?>">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <select name="kategori" class="form-control">
                            <?php
                            if ($productById->row()->kategori == "Pupuk") echo "<option value='Pupuk' selected>Pupuk</option>";
                            else echo "<option value='Pupuk'>Pupuk</option>";
                            
                            if ($productById->row()->kategori == "Bibit") echo "<option value='Bibit' selected>Bibit</option>";
                            else echo "<option value='Bibit'>Bibit</option>";
                            
                            if ($productById->row()->kategori == "Alat Pertanian") echo "<option value='Alat Pertanian' selected>Alat Pertanian</option>";
                            else echo "<option value='Alat Pertanian'>Alat Pertanian</option>";
                            
                            if ($productById->row()->kategori == "Pestisida") echo "<option value='Pestisida' selected>Pestisida</option>";
                            else echo "<option value='Pestisida'>Pestisida</option>";	   
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Produk:</label>
                            <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama Produk" value="<?php echo $productById->row()->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat (kg):</label>
                            <input id="berat" type="number" name="berat" class="form-control" placeholder="Berat" value="<?php echo $productById->row()->berat ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input id="harga" type="number" name="harga" class="form-control" placeholder="Harga" value="<?php echo $productById->row()->harga ?>">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok: </label>
                            <input id="stok" type="number" name="stok" class="form-control" placeholder="Stok" value="<?php echo $productById->row()->stok ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Produk: </label>
                            <div style="padding-bottom: 5px">
                            <img src="<?php echo base_url() ?>assets/img/<?php echo $productById->row()->foto ?>" width="50%" id="foto">
                            </div>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Produk: </label>
                            <textarea name="deskripsi" placeholder="Deskripsi Produk" class="form-control"><?php echo $productById->row()->deskripsi ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-success" value="Edit">
                            <a href="<?php echo base_url(); ?>admin/product_view" class="btn btn-danger">Batal</a>
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