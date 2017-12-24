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
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="active">Keranjang Belanja</li>
                    </ol>
                </div>
                <section class="konten">
                <div class="container">
                    <h1 style="color: white;">Keranjang Belanja</h1>
                    <hr>
                    <?php
                    if($product_cart == null){

                        echo "<h4>Empty data</H4>";

                    }else{ ?>

                        <table class="table table-bordered" style="width: auto; background-color: white;">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>SubHarga</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($product_cart->result() as $item){ ?>
                                <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $item->nama ?></td>
                                <td>Rp. <?php echo number_format($item->harga); ?></td>
                                    
                                <?php
                                foreach($this->session->userdata() as $k => $v){
                                    if(ltrim($k, 'k') == $item->id){ ?>
                                        <td><?php echo $v; ?></td>
                                        <td>Rp. <?php echo number_format(($v * $item->harga)); ?></td> <?php
                                    }
                                }
                                ?>
                                <td>
                                    <a href="<?php echo base_url(); ?>product/cart_delete/<?php echo $item->id ?>" class="btn btn-danger btn-xs">Hapus</a>
                                </td>
                                </tr>

                            <?php $no++;
                            }
                            ?>
                        </tbody>
                        </table>

                        <a href="<?php echo base_url(); ?>product" class="btn btn-default">Lanjutkan Belanja</a>
                        <?php
                        if(empty($this->session->userdata('username'))){ ?>

                            <a href="<?php echo base_url(); ?>user" class="btn btn-primary">Checkout</a>

                        <?php }else{ ?>

                            <a href="<?php echo base_url(); ?>product/checkout" class="btn btn-primary">Checkout</a> <?php
                            
                        } ?>
                        
                    
                    <?php
                    }
                    ?>
                </div>   
                </section>
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