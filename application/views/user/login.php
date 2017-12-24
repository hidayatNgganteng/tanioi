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
        @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);
        body{
        margin: 0;
        padding: 0;
        background: #fff;
        color: #fff;
        font-family: Arial;
        font-size: 12px;
        }
        .body{
        position: absolute;
        top: -20px;
        left: -20px;
        right: -40px;
        bottom: -40px;
        width: auto;
        height: auto;
        background-image: url("<?php echo base_url(); ?>assets/img/grass1.jpg");
        background-size: cover;
        -webkit-filter: blur(5px);
        z-index: 0;
        }
        .grad{
        position: absolute;
        top: -20px;
        left: -20px;
        right: -40px;
        bottom: -40px;
        width: auto;
        height: auto;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
        z-index: 1;
        opacity: 0.7;
        }
        .header{
        position: absolute;
        top: calc(50% - 35px);
        left: calc(50% - 255px);
        z-index: 2;
        }
        .header div{
        float: left;
        color: #fff;
        font-family: 'Exo', sans-serif;
        font-size: 35px;
        font-weight: 200;
        }
        .header div span{
        color: #5379fa !important;
        }
        .login{
        position: absolute;
        top: calc(50% - 75px);
        left: calc(50% - 50px);
        height: 150px;
        width: 350px;
        padding: 10px;
        z-index: 2;
        }
        .login input[type=text]{
        width: 250px;
        height: 30px;
        background: transparent;
        border: 1px solid rgba(255,255,255,0.6);
        border-radius: 2px;
        color: #fff;
        font-family: 'Exo', sans-serif;
        font-size: 16px;
        font-weight: 400;
        padding: 4px;
        }
        .login input[type=password]{
        width: 250px;
        height: 30px;
        background: transparent;
        border: 1px solid rgba(255,255,255,0.6);
        border-radius: 2px;
        color: #fff;
        font-family: 'Exo', sans-serif;
        font-size: 16px;
        font-weight: 400;
        padding: 4px;
        margin-top: 10px;
        }
        .login input[type=button]{
        width: 260px;
        height: 35px;
        background: #fff;
        border: 1px solid #fff;
        cursor: pointer;
        border-radius: 2px;
        color: #a18d6c;
        font-family: 'Exo', sans-serif;
        font-size: 16px;
        font-weight: 400;
        padding: 6px;
        margin-top: 10px;
        }
        .login input[type=button]:hover{
        opacity: 0.8;
        }
        .login input[type=button]:active{
        opacity: 0.6;
        }
        .login input[type=text]:focus{
        outline: none;
        border: 1px solid rgba(255,255,255,0.9);
        }
        .login input[type=password]:focus{
        outline: none;
        border: 1px solid rgba(255,255,255,0.9);
        }
        .login input[type=button]:focus{
        outline: none;
        }
        ::-webkit-input-placeholder{
        color: rgba(255,255,255,0.6);
        }
        ::-moz-input-placeholder{
        color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>

    <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>TaniOl<span>Shop</span></div>
		</div>
		<br>
		<div class="login">
			<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>user/login_proccess">	
				<input type="text" placeholder="username" name="username" required><br>
				<input type="password" placeholder="password" name="password" required><br>
				<p></p>
				<p>Belum Memiliki Akun ? <a href="<?php echo base_url(); ?>user/signup"><b>Signup</b></a></p>
				<button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
				<a href="<?php echo base_url(); ?>" class="btn btn-danger">Kembali</a>
			</form>
		</div>
	</div>

    <!-- modal message -->
    <?php
    if(!empty($this->session->flashdata('message'))){ ?>
        <div id="indicator_modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p style="color: #000000; font-size: 20px; color: red"><?php echo $this->session->flashdata('message') ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div> <?php
    }
    ?>
    
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