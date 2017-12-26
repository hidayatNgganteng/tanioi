<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
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

    <div class="container">
        <div class="col-md-12 download-app-box text-left" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">
            <div class="col-md-6">
                    <h2>Halaman Administrator </h2>
                    <p>Selamat Mengelola Toko Anda.</p>
                </div>
            <div class="col-md-6">
                <img src="<?php echo base_url(); ?>assets/img/admin.png" style="width: 200px; float: right; margin-right: 50px;">
            </div>
            </div>
        </div>
    <div class="container" style="height: 330px;"></div>

    <!-- footer -->
    <?php $this->load->view('admin/component/footer'); ?>

    <!-- modal message -->
    <?php
    if(!empty($this->session->flashdata('message'))){ ?>
        <div id="indicator_modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p><?php echo $this->session->flashdata('message') ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div> <?php
    }
    ?>

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            if($("#indicator_modal").length){
                $("#indicator_modal").modal('show');
            }
        });
    </script>
</body>
</html>