<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
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
    <div class="container" style="width:900px; padding-top: 15px">
    <div class="jumbotron" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">
        <div class="panel-body">
            <div class="container">
                <table class="jumbotron">
                <font color="#FFFFFF">
                    <center>
                        <h4>Detail Data Produk</h4>
                    </center>
                    <br>
                    <table class="table">
                        <div class="col-md-8 col-md-offset-2">
                            <img src="<?php echo base_url(); ?>assets/img/<?php echo $productById->row()->foto ?>" width="50%" align="right">			    
                            <form method="post" action="#" class="form-horizotal">
                            <label for="kategori">Kategori: </label>
                            <p for="kategori"><?php echo $productById->row()->kategori ?> </p>
                            <label for="nama">Nama Produk: </label>
                            <p for="nama"><?php echo $productById->row()->nama?> </p>
                            <label for="berat">Berat : </label>
                            <p for="berat"><?php echo $productById->row()->berat ?> kg </p>
                            <label for="harga">Harga: </label>
                            <p for="harga"><?php echo $productById->row()->harga?></p>
                            <label for="stok">Stok: </label>
                            <p for="stok"><?php echo $productById->row()->stok?></p>
                            <label for="deskripsi">Deskripsi: </label>
                            <p for="deskripsi"><?php echo $productById->row()->deskripsi?></p>
                            <div class="form-group">
                                <a href="<?php echo base_url(); ?>admin/product_view" class="btn btn-danger">Kembali</a>
                            </div>
                            </form>
                        </div>
                    </table>
                </table>
                </font>
            </div>
        </div>
    </div>
    </div>
</body>
</html>