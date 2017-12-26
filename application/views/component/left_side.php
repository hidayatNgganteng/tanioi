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
            <?php
            if(empty($this->session->userdata('username'))){ ?>
                <a href="<?php echo base_url(); ?>user/index/alert">Keranjang Belanja</a>
            <?php }else{ ?>
                <a href="<?php echo base_url(); ?>product/cart">Keranjang Belanja</a> <?php
            } ?>
        </li>
        <li class="list-group-item">
            <?php
            if(empty($this->session->userdata('username'))){ ?>
                <a href="<?php echo base_url(); ?>user/index/alert">Transaksi Anda</a>
            <?php }else{ ?>
                <a href="<?php echo base_url(); ?>product/transaction">Transaksi Anda</a> <?php
            } ?>
        </li>
    </ul>
</div>