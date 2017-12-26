<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data transaksi</title>
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

    <div class="container" style="width:1300px">
    <div class="jumbotron" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">
        <div class="panel-body" style="background-color:#FFFFFF">
            <table>
                <td>
                <center>
                    <font color="#000000" size="2">
                    <b>
                        <h3>Data transaksi</h3>
                    </b>
                </center>
                <br>
                <table class="table table-striped" align="center">
                    <tr>
                        <td align="center"><b>ID Transaksi</b></td>
                        <td align="center"><b>Nama Pembeli</b></td>
                        <td align="center"><b>Nama Barang</b></td>
                        <td align="center"><b>Alamat</b></td>
                        <td align="center"><b>No Telepon</b></td>
                        <td align="center"><b>Tgl Beli</b></td>
                        <td align="center"><b>Tgl Sampai</b></td>
                        <td align="center"><b>Email</b></td>
                        <td align="center"><b>Harga</b></td>
                        <td align="center"><b>Jumlah</b></td>
                        <td align="center"><b>Total Harga</b></td>
                        <td align="center"><b>Status</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php 
                    foreach($getAllTransaction->result() as $v){ ?>
                        <tr>
                            <td><?php echo $v->id_transaksi ?></td>
                            <td><?php echo $v->nama_pembeli ?></td>
                            <td><?php echo $v->nama_produk ?></td>
                            <td><?php echo $v->alamat ?></td>
                            <td><?php echo $v->telepon ?></td>
                            <td><?php echo $v->tgl_beli ?></td>
                            <td><?php echo $v->tgl_sampai ?></td>
                            <td><?php echo $v->email ?></td>
                            <td><?php echo $v->harga ?></td>
                            <td><?php echo $v->jumlah ?></td>
                            <td><?php echo $v->total ?></td>
                            <td><?php echo $v->status ?></td> <?php

                        if($v->status == 'Menunggu Konfirmasi'){ ?>
                            <td><a href='<?php echo base_url(); ?>admin/cancel/<?php echo $v->id_transaksi ?>' class='btn btn-danger btn-xs'>Batal</a></td>
                            <td><a href='<?php echo base_url(); ?>admin/confirmation/<?php echo $v->id_transaksi ?>' class='btn btn-success btn-xs'>Konfirmasi</a></td> <?php
                        }else{ ?>
                            <td></td>
                            <td></td> <?php
                        } ?>
                        <tr> <?php
                    } ?>
                </table>
            </table>
        </div>
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