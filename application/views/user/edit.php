<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/signup/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/signup/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/signup/assets/css/form-elements.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/signup/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/signup/assets/css/media-queries.css">
    <style>
        body{
            background:url("<?php echo base_url(); ?>assets/img/grass1.jpg");
            background-attachment:fixed;
        }
    </style>
</head>
<body>
    
    <!-- Description -->
    <div class="description-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 description-title">
                    <h2>Edit Profil</h2>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Multi Step Form -->
    <div class="msf-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 msf-title">
                    <h3>Isi Formulir</h3>
                    <p>Mohon isi form berikut :</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 msf-form">
                    
                    <form action="<?php echo base_url(); ?>user/edit_proccess/<?php echo $currentUser->row()->id ?>" method="POST" class="form-inline" enctype="multipart/form-data">
                        
                        <fieldset>
                            <h4>Data Diri <span class="step">(Step 1 / 2)</span></h4>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap:</label><br>
                                <input type="text" name="nama" class="nama form-control" id="nama" value="<?php echo $currentUser->row()->nama ?>" required> 
                            </div>
                            <div class="form-group">
                                <p>Jenis Kelamin:</p>
                                <select class="form-control" name="jenkel" required>
                                    <?php
                                    if ($currentUser->row()->jenkel == "Laki-Laki") echo "<option value='Laki-Laki' selected>Laki-Laki</option>";
                                    else echo "<option value='Laki-Laki'>Laki-Laki</option>";

                                    if ($currentUser->row()->jenkel == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                                    else echo "<option value='Perempuan'>Perempuan</option>";	   
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Nomor Telepon:</label><br>
                                <input type="number" name="telepon" class="telepon form-control" id="telepon" style="width: 400px" value="<?php echo $currentUser->row()->telepon ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label><br>
                                <input type="email" name="email" class="email form-control" id="email" style="width: 400px" value="<?php echo $currentUser->row()->email ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label><br>
                                <input type="text" name="username" class="username form-control" id="username" value="<?php echo $currentUser->row()->username ?>" required>
                            </div>
                            <div class="form-group" style="position: relative">
                                <label for="password">Kata Sandi:</label><br>
                                <input type="password" name="password" class="password form-control" id="password" style="width: 400px">
                                <div style="position: absolute;right: 0;top: 100%; color: yellow">Kosongkan bila tidak ingin diubah</div>
                            </div>
                            <div class="form-group unique">
                                <label for="foto">Foto:</label><br>
                                <div style="padding-bottom: 5px">
                                <img src="<?php echo base_url(); ?>assets/img/<?php echo $currentUser->row()->foto ?>" width="50%" id="foto">
                                </div>
                                <input type="file" name="foto" class="form-control" style="width: 400px">
                            </div>
                            <br>
                            <p>Sudah Memiliki Akun ? <a href="<?php echo base_url(); ?>user" style="color: white;"><b>Login</b></a></p>
                            <a href="<?php echo base_url() ?>"><button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Kembali</button></a>
                            <button type="button" class="btn btn-next">Berikutnya <i class="fa fa-angle-right"></i></button>
                        </fieldset>
                        
                        <fieldset>
                            <h4>Alamat <span class="step">(Step 2 / 2)</span></h4>
                            <div class="form-group">
                                <label for="kota">Kota:</label><br>
                                <input type="text" name="kota" class="kota form-control" id="kota" value="<?php echo $currentUser->row()->kota ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi:</label><br>
                                <input type="text" name="provinsi" class="provinsi form-control" id="provinsi" value="<?php echo $currentUser->row()->provinsi ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="negara">Negara:</label><br>
                                <input type="text" name="negara" class="negara form-control" id="negara" value="<?php echo $currentUser->row()->negara ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="kodepos">Kode Pos:</label><br>
                                <input type="number" name="kodepos" class="kodepos form-control" id="kodepos" style="width: 400px" value="<?php echo $currentUser->row()->kodepos ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pengiriman:</label><br>
                                <textarea name="alamat" class="alamat form-control" id="alamat" required><?php echo $currentUser->row()->alamat ?></textarea>
                            </div>
                            <br>
                            <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Kembali</button>
                            <button type="submit" name="simpan" class="btn">Edit</button>
                        </fieldset>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- modal message -->
    <?php
    if(!empty($this->session->flashdata('message'))){ ?>
        <div id="indicator_modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p style="color: #000000"><?php echo $this->session->flashdata('message') ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div> <?php
    }
    ?>

    <!-- Javascript -->
    <script src="<?php echo base_url(); ?>assets/signup/assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/signup/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/signup/assets/js/jquery.backstretch.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/signup/assets/js/scripts.js"></script>
    <script>
        $(document).ready(function(){
            if($("#indicator_modal").length){
                $("#indicator_modal").modal('show');
            }
        });
    </script>
</body>
</html>