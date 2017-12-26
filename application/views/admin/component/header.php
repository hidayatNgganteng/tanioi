<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navigasi</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>admin/home"><strong>TaniOl</strong> Shop</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                <li class="pull-left"><a href="<?php echo base_url(); ?>admin/product_view">Data Produk</a></li>
                <li class="pull-left"><a href="<?php echo base_url(); ?>admin/product_add">Tambah Produk</a></li>
                <li class="pull-left"><a href="<?php echo base_url(); ?>admin/purchase">Data Pembelian</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>admin/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
</div>
<br>