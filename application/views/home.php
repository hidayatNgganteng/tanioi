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
<body style="background:url(img/grass1.jpg); background-attachment:fixed;">
    
    <!-- header -->
    <?php $this->load->view('component/header'); ?>

    <div class="container" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="<?php echo base_url(); ?>product" class="list-group-item active" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">Produk
                        <span class="label label-primary pull-right" style="color: #000; background-color: white;">
                            <?php echo $allProducts->num_rows(); ?>
                        </span>
                    </a>
                    <ul class="list-group">
                        <?php
                            $no = 1;
                            $arrData = array();

                            foreach($allProducts->result() as $item){
                                $flag = true;
                                $a = array();
                                
                                // first push
                                if($no == 1){
                                    $a['category'] = $item->kategori;
                                    $a['count'] = 1;
                                    array_push($arrData, $a);

                                // checking duplicate
                                }else{
                                    foreach($arrData as $key => $arrDataItem){
                                        if($item->kategori == $arrDataItem['category']){
                                            $flag = false;
                                            $arrData[$key]['count'] = $arrDataItem['count'] += 1;
                                        }
                                    }
                                    // if nothing then
                                    if($flag == true){
                                        $a['category'] = $item->kategori;
                                        $a['count'] = 1;
                                        array_push($arrData, $a);
                                    }
                                }
                                $no++;
                            }

                            // implemented
                            foreach($arrData as $item){ ?>
                                <li class="list-group-item"><a href="<?php echo base_url() ?>product/index/<?php echo $item['category'] ?>"><?php echo $item['category'] ?></a>
                                    <span class="label label-primary pull-right" style="color: white; background-color: #000;">
                                        <?php echo $item['count'] ?>
                                    </span>
                                </li>
                            <?php
                            }
                        ?>
                    </ul>
                </div>
                <div>
                    <a href="#belanja" class="list-group-item active" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">Proses Belanja
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">
                        <a href="<?php echo base_url(); ?>product/cart">Keranjang Belanja</li></a>
                    </ul>
                </div>
                <div>
                    <a href="#" class="list-group-item active list-group-item-success" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">Profile
                    </a>
                    <ul class="list-group">

                        <li class="list-group-item">About Us</li>
                    </ul>
                </div>
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

    <!-- footer -->
    <?php $this->load->view('component/footer'); ?>

    <!-- the best position for javascript library load -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="<?php echo base_url(); ?>assets/ItemSlider/js/jquery.catslider.js"></script>
</body>
</html>