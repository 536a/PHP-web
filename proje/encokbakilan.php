<?php 

include 'nedmin/netting/baglan.php'
                    $tk7sor=$db->prepare("SELECT * FROM tiklanmasayisi order by tiklanmasayisi_sayi DESC limit 8");
                    $tk7sor->execute();

                    while ($tk7cek=$tk7sor->fetch(PDO::FETCH_ASSOC)) {


                        $urun5sor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
                        $urun5sor->execute(array(

                            'urun_id' => $tk7cek['urun_id']

                        ));

                        $urun5cek=$urun5sor->fetch(PDO::FETCH_ASSOC); 

                        $foto7sor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id and urunfoto_ilk=:ilk");
                        $foto7sor->execute(array(

                            'urun_id' => $urun5cek['urun_id'],
                            'ilk' => 1

                        ));

                        $foto7cek=$foto7sor->fetch(PDO::FETCH_ASSOC);


                        ?>