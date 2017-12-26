<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Produk</title>
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
    
    <div class="container" style="width:900px">
    <div class="jumbotron" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">
        <table class="table table-striped" align="center">
            <tr bgcolor="#FFFFFF">
                <td>
                <center>
                    <font color="#000000" size="2">
                    <b>
                        <h3>Data Produk</h3>
                    </b>
                </center>
                <br>
                <table class="table table-striped" align="center">
                    <tr>
                        <td><font color="black"><b>ID</font></td>
                        <td><font color="black"><b>Kategori</font></td>
                        <td><font color="black"><b>Nama Produk</font></td>
                        <td><font color="black"><b>Berat (kg)</font></td>
                        <td><font color="black"><b>Harga Produk</font></td>
                        <td><font color="black"><b>Stok</font></td>
                        <td><font color="black"><b>Detail</font></td>
                        <td><font color="black"><b>Ubah</font></td>
                        <td><font color="black"><b>Hapus</font></td>
                    </tr>
                    <?php
                    foreach($getAllProduct->result() as $v){ ?>
                        <tr>
                            <td><?php echo $v->id ?></td>
                            <td><?php echo $v->kategori ?></td>
                            <td><?php echo $v->nama ?></td>
                            <td><?php echo $v->berat ?></td>
                            <td><?php echo $v->harga ?></td>
                            <td><?php echo $v->stok ?></td>
                            <td><a href='<?php echo base_url(); ?>admin/product_details/<?php echo $v->id ?>' class='btn btn-success btn-xs'>Detail</a></td>
                            <td><a href='<?php echo base_url(); ?>admin/product_edit/<?php echo $v->id ?>' class='btn btn-success btn-xs'>Ubah</a></td>
                            <td><a href='<?php echo base_url(); ?>admin/product_delete/<?php echo $v->id ?>' class='btn btn-danger btn-xs'>Hapus</a></td>
                        </tr> <?php
                    } ?>
                </table>
                </td>
            </tr>
        </table>
    </div>
    </div>

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