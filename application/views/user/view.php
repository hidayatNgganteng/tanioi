<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Pelanggan</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <style>
        body{
            background:url("<?php echo base_url(); ?>assets/img/grass1.jpg");
        }
    </style>
</head>
<body>
    
    <div class="container" style="width:900px; padding-top: 15px;">
        <div class="jumbotron" style="background-color:#000; opacity:0.8; filter:alpha(opacity=40);">
            <div class="panel-body">
                <div class="container">
                    <table class="jumbotron">
                    <font color="#FFFFFF">
                        <center>
                            <h4>Profil Pelanggan</h4>
                        </center>
                        <br>
                        <table class="table">
                            <div class="col-md-8 col-md-offset-2">
                                <img src="<?php echo base_url(); ?>assets/img/<?php echo $currentUser->row()->foto ?>" width="50%" align="right">			    
                                <form method="post" action="" class="form-horizotal">
                                <label for="nama">Nama pelanggan: </label>
                                <p for="nama"><?php echo $currentUser->row()->nama ?></p>
                                <label for="jenkel">Jenis Kelamin : </label>
                                <p for="jenkel"><?php echo $currentUser->row()->jenkel ?></p>
                                <label for="telepon">No. Telepon: </label>
                                <p for="telepon"><?php echo $currentUser->row()->telepon ?></p>
                                <label for="email">Email: </label>
                                <p for="email"><?php echo $currentUser->row()->email ?></p>
                                <label for="kota">Kota: </label>
                                <p for="kota"><?php echo $currentUser->row()->kota ?></p>
                                <label for="provinsi">Provinsi: </label>
                                <p for="provinsi"><?php echo $currentUser->row()->provinsi ?></p>
                                <label for="negara">Negara: </label>
                                <p for="negara"><?php echo $currentUser->row()->negara ?></p>
                                <label for="kodepos">Kode Pos: </label>
                                <p for="kodepos"><?php echo $currentUser->row()->kodepos ?></p>
                                <label for="alamat">Alamat Pengiriman: </label>
                                <p for="alamat"><?php echo $currentUser->row()->alamat ?></p>
                                <div class="form-group">
                                    <a href="<?php echo base_url(); ?>" class="btn btn-danger">Kembali</a>
                                    <a href='<?php echo base_url(); ?>user/edit' class='btn btn-success' role='button'>Edit Profil</a>
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