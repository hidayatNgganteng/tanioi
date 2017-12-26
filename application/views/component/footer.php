<div class="col-md-12 download-app-box text-center" style="background-color:#000; border: solid #000; opacity:0.9; filter:alpha(opacity=40);">

    <span class="glyphicon glyphicon-download-alt"></span> Gratis Ongkir setiap pembelian minimal Rp. 50000.

</div>
<div class="container col-md-12" style="background-color:#000; border: solid #000; opacity:0.9; filter:alpha(opacity=40);">
    <div class="col-md-12" style="margin-left: 450px;">
        <div class="col-md-3" style="color: white;">
            <h3>Tentang TaniOl</h3>
            <ul>
                TaniOl adalah Toko Online yang menyediakan berbagai produk peningkat kualitas hasil tani. Setiap pembelian akan dikonfirmasi oleh Penjual. Produk akan dikirim ke tujuan via TaniOl Express
            </ul>
        </div>
        <div class="col-md-3" style="color: white;">
            <h3>Kategori</h3>
            <ul>
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
                        <li><a href="<?php echo base_url() ?>product/index/<?php echo $item['category'] ?>" style="color: white;"><?php echo $item['category'] ?></a></li>
                    <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-12 end-box ">
    &copy; 2017 | &nbsp; All Rights Reserved | &nbsp; www.taniol.com | &nbsp; PHP support | &nbsp; Email us: taniol@tokol.com
</div>