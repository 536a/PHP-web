<?php include 'header.php'; ?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Alışveriş Sepeti</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">


                <div class="single-sidebar">
                    <h2 class="sidebar-title">En Çok Bakılan Ürünler</h2>


                    <?php 

                    $tk3sor=$db->prepare("SELECT * FROM tiklanmasayisi order by tiklanmasayisi_sayi DESC limit 5");
                    $tk3sor->execute();

                    while ($tk3cek=$tk3sor->fetch(PDO::FETCH_ASSOC)) {


                        $urun5sor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
                        $urun5sor->execute(array(

                            'urun_id' => $tk3cek['urun_id']

                        ));

                        $urun5cek=$urun5sor->fetch(PDO::FETCH_ASSOC); 

                        $foto3sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
                        $foto3sor->execute(array(

                            'urun_id' => $urun5cek['urun_id'],
                            'ilk' => 1

                        ));

                        $foto3cek=$foto3sor->fetch(PDO::FETCH_ASSOC);


                        ?>







                        <div class="thubmnail-recent">
                            <img src="<?php echo $foto3cek['urunfoto_resimyol'] ?>" class="recent-thumb" alt="">
                            <h2><a href=""><?php echo $urun5cek['urun_ad'] ?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $urun5cek['urun_fiyat'] ?> tl</ins>
                            </div>                             
                        </div>

                    <?php   }

                    ?>
                </div>


            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Ürün</th>
                                        <th class="product-price">Fiyat</th>
                                        <th class="product-quantity">Adet</th>
                                        <th class="product-subtotal">Toplam</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    $toplam = 0;
                                    $sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:kullanici_id
                                        ");
                                    $sepetsor->execute(array(

                                        'kullanici_id' => $kullanicicek['kullanici_id']
                                    ));  


                                    while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) { 


                                        $urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id
                                            ");
                                        $urunsor->execute(array(

                                            'id' => $sepetcek['urun_id']
                                        ));


                                        while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
                                            $urun_id2 = $uruncek['kategori_id'];
                                            $i = 0;
                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Bu ürünü kaldır" class="remove" href="nedmin/netting/islem.php?sepetsil=ok&sepet_id=<?php echo $sepetcek['sepet_id']; ?>">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="urun-detay.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/product-thumb-2.jpg"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="urun-detay.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><?php echo $uruncek['urun_ad']; ?></a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount"><?php echo $uruncek['urun_fiyat']; ?> tl</span> 
                                            </td>


                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <form method="POST" action="nedmin/netting/islem.php">
                                                    <button style="padding: 5px 10px;" type="submit"  name="islem" class="minus" value="-">-</button>
                                                    <input style="width: 45px" type="text" readonly size="4" value="<?php echo $sepetcek['sepet_adet']; ?>" min="0" step="1">
                                                    <input type="hidden" name="sepet_id" value="<?php echo $sepetcek['sepet_id']; ?>">
                                                    <button style="padding: 5px 10px;" type="submit" name="islem" class="plus" value="+">+</button>

                                                    </form>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount"><?php echo ($uruncek['urun_fiyat']*$sepetcek['sepet_adet']); ?> tl</span> 
                                            </td>
                                        </tr>

                                    <?php


                                    $toplam += $uruncek['urun_fiyat']*$sepetcek['sepet_adet'];

                                     }} ?>

                                    <tr>
                                        <td class="actions" colspan="6">


                                            <a href="odeme.php"><input type="submit" value="Alışverişi Tamamla" name="proceed" class="checkout-button button alt wc-forward"></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                       

                        <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>İlginizi Çekebilecek Ürünler</h2>
                                <ul class="products">

                                    <?php 

                                    $urunsor2=$db->prepare("SELECT * FROM urun where kategori_id=:id limit 2
                                            ");
                                        $urunsor2->execute(array(

                                            'id' => $urun_id2
                                        ));


                                        while($uruncek2=$urunsor2->fetch(PDO::FETCH_ASSOC)) {

                                     ?>

                                    <li class="product">
                                        <a href="urun-detay.php?urun_id=<?php echo $uruncek2['urun_id']; ?>">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                            <h3><?php echo $uruncek2['urun_ad']; ?></h3>
                                            <span class="price"><span class="amount"><?php echo $uruncek2['urun_fiyat']; ?> tl</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="urun-detay.php?urun_id=<?php echo $uruncek2['urun_id']; ?>">Ürüne Git</a>
                                    </li>
                                <?php } ?>

                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>Sepet Toplamı</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Sepet Toplamı</th>
                                            <td><span class="amount"><?php echo $toplam ?> tl</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Kargo Ücreti</th>
                                            <td>Ücretsiz</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Toplam Fiyat</th>
                                            <td><strong><span class="amount"><?php echo $toplam ?> tl</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>





                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>