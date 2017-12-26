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
    <style>
        body{
            background:url("<?php echo base_url(); ?>assets/img/grass1.jpg");
            background-attachment:fixed;
        },
        #wrapshopcart{
            width:auto;
            margin: auto;
            padding:30px;
            background:#fff;}
        table{
            margin:auto; 
            border:1px solid #eee;
            width:auto; 
            border-collapse: separate;
            border-spacing:0;}
        table th{
            background:#fafafa; 
            border:none; 
            padding:20px ; 
            font-weight:normal;
            text-align:left;}
        table td{
            background:#fff; 
            border:none; 
            padding:12px  20px; 
            font-weight:normal;
            text-align:left; 
            border-top:1px solid #eee;}
        table tr.total td{
            font-size:1.5em;}
        .btnsubmit{
            display:inline-block;
            padding:10px;
            border:1px solid #ddd;
            background:#eee;
            color:#000;
            text-decoration:none;
            margin:2em 0;}
        form{
            margin:2em 0 0 0;}
        label{
            display:inline-block;
            width:auto;}
        .kosong{
            position: absolute; left:0; top: 0; width: 100%; height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- header -->
    <?php $this->load->view('component/header'); ?>

    <div class="container" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-3">

                <!-- left side -->
                <?php $this->load->view('component/left_side'); ?>

            </div>
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Data Pembelian</li>
                    </ol>
                    </div>
                    <div class="row"> <?php
                    if($getAllTransaction->num_rows() == 0){ ?>
                        <div style="padding: 0 15px">
                            <h3 style="background: #ffffff; padding: 15px 15px">Transaction empty</h3>
                        </div> <?php
                    }else{ ?>
                    <table class="table table-striped" align="center">
                        <tr bgcolor="#FFFFFF">
                            <td>
                                <center>
                                <font color="#000000" size="2">
                                <b>
                                    <h3>Data Pembelian</h3>
                                </b>
                                </center>
                                <br>
                                <table class="table table-striped" align="center">
                                <tr>
                                    <td><font color="black"><b>ID Transaksi</b></font></td>
                                    <td><font color="black"><b>Nama Pembeli</b></font></td>
                                    <td><font color="black"><b>Nama Produk</b></font></td>
                                    <td><font color="black"><b>Tanggal Beli</b></font></td>
                                    <td><font color="black"><b>Tanggal Sampai</b></font></td>
                                    <td><font color="black"><b>Jumlah Produk</b></font></td>
                                    <td><font color="black"><b>Total Harga</b></font></td>
                                    <td><font color="black"><b>Status</b></font></td>
                                    <td><font color="black"><b>Batal</b></font></td>
                                    <td><font color="black"><b>Selesai</b></font></td>
                                </tr>
                                <?php
                                foreach($getAllTransaction->result() as $v){ ?>
                                    <tr>
                                        <td><?php echo $v->id_transaksi ?></td>
                                        <td><?php echo $v->nama_pembeli ?></td>
                                        <td><?php echo $v->nama_produk ?></td>
                                        <td><?php echo $v->tgl_beli ?></td>
                                        <td><?php echo $v->tgl_sampai ?></td>
                                        <td><?php echo $v->jumlah ?></td>
                                        <td><?php echo ($v->jumlah * $v->harga) ?></td>
                                        <td><?php echo $v->status ?></td> <?php
                                    
                                    if($v->status == 'Menunggu Konfirmasi'){ ?>
                                        <td><a href='<?php echo base_url(); ?>product/cancel/<?php echo $v->id_transaksi ?>' class='btn btn-danger btn-xs'>Batal</a></td>
                                        <td><a href='<?php echo base_url(); ?>product/done/<?php echo $v->id_transaksi ?>' class='btn btn-success btn-xs'>Selesai</a></td> <?php
                                    }else if($v->status == 'Barang Sedang Dikirim'){ ?>
                                        <td></td>
                                        <td><a href='<?php echo base_url(); ?>product/done/<?php echo $v->id_transaksi ?>' class='btn btn-success btn-xs'>Selesai</a></td> <?php
                                    }else{ ?>
                                        <td></td>
                                        <td></td> <?php
                                    } ?>

                                    </tr> <?php
                                }
                                ?>

                                </table>
                            </td>
                        </tr>
                    </table><?php
                    } ?>
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
    
    <!-- footer -->
    <?php $this->load->view('component/footer'); ?>

    <!-- the best position for javascript library load -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="<?php echo base_url(); ?>assets/ItemSlider/js/jquery.catslider.js"></script>
    <script>
        $(document).ready(function(){
            if($("#indicator_modal").length){
                $("#indicator_modal").modal('show');
            }
        });
    </script>
</body>
</html>