<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaniOl</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
</head>
<body background="<?php echo base_url(); ?>assets/img/grass1.jpg">
    
    <div class="container" style="width:900px; padding-top: 15px;">
        <div class="jumbotron" style="background-color:#000; opacity:0.8; filter:alpha(opacity=40);">
            <div class="panel-body">
                <div class="container">
                    <table class="jumbotron">
                    <font color="#FFFFFF">
                        <center>
                            <h4>Detail Data Produk</h4>
                        </center>
                        <br>
                        <?php
                        if(isset($productById)){ ?>
                            <table class="table">
                                <div class="col-md-8 col-md-offset-2">
                                    <img src="<?php echo base_url(); ?>assets/img/<?php echo $productById->foto ?>" width="50%" align="right">			    
                                    <form method="post" action="tampilproduk.php" class="form-horizotal">
                                    <label for="kategori">Kategori: </label>
                                    <p for="kategori"><?php echo $productById->kategori ?></p>
                                    <label for="nama">Nama Produk: </label>
                                    <p for="nama"><?php echo $productById->nama ?></p>
                                    <label for="berat">Berat : </label>
                                    <p for="berat"><?php echo $productById->berat ?> kg </p>
                                    <label for="harga">Harga: </label>
                                    <p for="harga"><?php echo $productById->harga ?></p>
                                    <label for="stok">Stok: </label>
                                    <p for="stok"><?php echo $productById->stok ?></p>
                                    <label for="deskripsi">Deskripsi: </label>
                                    <p for="deskripsi"><?php echo $productById->deskripsi ?></p>
                                    <div class="form-group">
                                        <a href="<?php echo base_url(); ?>product" class="btn btn-danger">Kembali</a>
                                        <a href="#" class="btn btn-success" role="button">Beli Sekarang</a> 
                                    </div>
                                    </form>
                                </div>
                            </table>
                        <?php
                        }else{ ?>

                            <h4>Empty data</h4>
                        
                        <?php
                        }
                        ?>
                        
                    </table>
                    </font>
                </div>
            </div>
        </div>
    </div>

    <!-- the best position for javascript library load -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="<?php echo base_url(); ?>assets/ItemSlider/js/jquery.catslider.js"></script>
</body>
</html>