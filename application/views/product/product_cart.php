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
                        <li class="active">Keranjang Belanja</li>
                    </ol>
                </div>
                <div id="wrapshopcart" style="background: #ffffff; padding: 30px 30px">
                    <?php
                    if($product_cart == null){

                        echo "<h4>Empty data</H4>";

                    }else{ ?>
                        <h3>Berikut adalah data lengkap Anda : </h3>
                        <label>Nama Lengkap : <?php echo $currentUser->row()->nama; ?> </label>
                        <p></p>
                        <label>Email : <?php echo $currentUser->row()->email; ?> </label>
                        <p></p>
                        <label>No Telepon : <?php echo $currentUser->row()->telepon; ?></label>
                        <p></p>
                        <label>Alamat : <?php echo $currentUser->row()->alamat; ?></label>
                        <h3>Produk Yang Anda Beli : </h3>
                        <table>
                            <form action="<?php echo base_url(); ?>product/checkout" method="POST" class="form-inline" enctype="multipart/form-data">
                            <tr>
                                <th>Produk</th>
                                <th>Stok</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            foreach($product_cart->result() as $i => $item){ ?>
                                <tr style="position: relative">
                                    <td>
                                        <?php echo $item->nama ?>
                                        <input name="nama_produk<?php echo $i+1 ?>" type="hidden" value="<?php echo $item->nama ?>" />
                                        <input name="id_produk<?php echo $i+1 ?>" type="hidden" value="<?php echo $item->id ?>" />
                                        <input name="stok_sekarang<?php echo $i+1 ?>" type="hidden" value="<?php echo $item->stok ?>" />
                                    </td>
                                    <td><?php echo $item->stok ?></td>
                                    <?php
                                    if($item->stok == 0){ ?>
                                        <select name="jumlah<?php echo $i+1 ?>" required style="display: none">
                                            <option value="0">0</option>
                                        </select>
                                        <td style="position: relative; background: rgba(0,0,0,0.5)">
                                            <div class="kosong">Stok kosong</div>
                                        </td> <?php
                                    }else{ ?>
                                        <td>
                                            <select name="jumlah<?php echo $i+1 ?>" required>
                                                <?php
                                                for($stock = 1; $stock <= $item->stok; $stock++){ ?>
                                                    <option value="<?php echo $stock ?>"><?php echo $stock ?></option> <?php
                                                } ?>
                                            </select>
                                        </td> <?php
                                    } ?>
                                    <td>
                                        Rp. <?php echo number_format($item->harga); ?>
                                        <input name="harga<?php echo $i+1 ?>" type="hidden" value="<?php echo $item->harga ?>" />
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>product/cart_delete/<?php echo $item->id ?>" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr> <?php
                            }
                            ?>
                        </table>
                        <table>
                        <h3>Metode Pembayaran Yang Dipilih :</h3>
                        <select class="form-control" name="metode" required>
                        <option value="BRI">Transfer Bank BRI</option>
                        <option value="Mandiri">Transfer Bank Mandiri</option>
                        </select>
                        <hr>
                        <a href="<?php echo base_url(); ?>product" class="btn btn-default">Lanjutkan Belanja</a>
                        <button type="submit" class="btn btn-primary" name="lanjut" value="Lanjutkan">Checkout</button>
                        </form>
                        </table> <?php
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