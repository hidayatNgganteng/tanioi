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
    <style type="text/css">
    body{
        background:#efefef;
        background-image:url("<?php echo base_url(); ?>assets/img/grass1.jpg");
            background-attachment:fixed;}
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
        width:auto;},
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
                <div id="wrapshopcart">
                    <center>
                        <h2>Terima Kasih</h2>
                        <h3>
                            <p>Telah Melakukan Pembelian di TaniOl</p>
                        </h3>
                        <p>Produk Akan Dikirim Setelah Dikonfirmasi Via TaniOl Express Dengan Estimasi 2-3 Hari Kerja</p>
                    </center>
                    <h3>Produk Yang Anda Beli : </h3>
                    <table>
                        <tr>
                            <th width="50%">Produk</th>
                            <th width="10%">Quantity</th>
                            <th width="20%">Harga</th>
                            <th width="20%">Subharga</th>
                        </tr>
                        <?php
                        $total = 0;
                        $id_produk_flag = 011;
                        $no = 0;
                        $arrData = array();
                        foreach($payment->result() as $k => $v){
                            
                            $total = $total + ($v->jumlah * $v->harga);

                            if($id_produk_flag != $v->id_produk){
                                $no++;
                                $arrData[$no]['nama_produk'] = $v->nama_produk;
                                $arrData[$no]['jumlah'] = $v->jumlah;
                                $arrData[$no]['harga'] = $v->harga;
                            }else{
                                $arrData[$no]['jumlah'] = $arrData[$no]['jumlah'] + $v->jumlah;
                            }
                            $id_produk_flag = $v->id_produk;
                        }
                        
                        foreach($arrData as $v){ ?>
                            <tr>
                                <td><?php echo $v['nama_produk']?></td>
                                <td><?php echo $v['jumlah']?></td>
                                <td>Rp. <?php echo number_format($v['harga'])?></td>
                                <td>Rp. <?php echo number_format($v['jumlah'] * $v['harga'])?></td>
                            </tr> <?php
                        } ?>

                        <tr class="total">
                            <td></td>
                            <td><b>Total</b></td>
                            <td><b>Rp. <?php echo number_format($total); ?></b></td>
                        </tr>
                    </table>
                    <a href="<?php echo base_url(); ?>product#product" class="btn btn-primary">Belanja Lagi <?php unset($_SESSION['keranjang']); ?></a>   	
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