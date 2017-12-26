<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Navigasi</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong>TaniOl</strong> Shop</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!empty($this->session->userdata('username'))){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href='<?php echo base_url(); ?>user/view'>Lihat Profil</a></li>
                            <li><a href='<?php echo base_url(); ?>user/edit'>Edit Profil</a></li>
                            <li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><?php echo $currentUser->row()->nama ?></a></li><?php
                }else{ ?>
                    <li><a href="<?php echo base_url(); ?>user">Login</a></li> <?php
                }

                if(!empty($this->session->userdata('username'))){ ?>
                    <li style="padding-right: 60px;"></li> <?php
                }else{ ?>
                    <li><a href="<?php echo base_url(); ?>user/signup">Signup</a></li> <?php
                } ?>
            </ul>

            <form method="POST" action="<?php echo base_url(); ?>product/search" class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" name="keyword" placeholder="Cari nama produk..." class="form-control">
                </div>
                &nbsp; 
                <button name="klikcari" type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    <div class="col-md-12 download-app-box text-left" style="background-color:#000; border: solid #000; opacity:0.8; filter:alpha(opacity=40);">
        <div class="col-md-6">
                <h2>Toko Online Pertanian </h2>
                <p>Menyediakan Berbagai Produk Peningkat Kualitas Hasil Tani.</p>
                <a href="<?php echo base_url(); ?>product#product" class="btn btn-danger btn-lg">BELANJA SEKARANG</a>
            </div>
        <div class="col-md-6">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="float: right; margin-right: 50px">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo base_url(); ?>assets/img/hay.png" alt="" style="height: 200px;">
                </div>
                <div class="item">
                    <img src="<?php echo base_url(); ?>assets/img/trac.png" alt="" style="height: 200px;">
                </div>           
            </div>
        </div>
        </div>
    </div>
</div>