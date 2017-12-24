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
                        <li class="active">Produk Terbaru</li>
                    </ol>
                </div>
                <div class="row">
                    <?php
                    if($allProducts->num_rows() == 0){

                        echo "<h4>Data is empty</h4>";

                    }else{

                        foreach($allProducts->result() as $item){ ?>
                            
                            <div class="col-md-4 text-center col-sm-6 col-xs-6">
                                <div class="thumbnail product-box">
                                    <img src="<?php echo base_url(); ?>assets/img/<?php echo $item->foto ?>" style="height: 125px">
                                    <div class="caption">
                                    <h3>
                                        <a href="#">
                                            <?php echo $item->nama ?>
                                        </a>
                                    </h3>
                                    <p>Harga : <strong>Rp. <?php echo $item->harga ?>  </p>
                                    <p>Berat : <?php echo $item->berat ?> kg   </p>
                                    <p>Stok : <?php echo $item->stok ?>   </p>
                                    <p>
                                        <a href="<?php echo base_url(); ?>product/buy/<?php echo $item->id ?>" class="btn btn-success" role="button">Beli Sekarang</a> 
                                        <a href='<?php echo base_url(); ?>product/details/<?php echo $item->id ?>' class='btn btn-primary' role='button'>Lihat Detail</a>
                                    </p>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
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