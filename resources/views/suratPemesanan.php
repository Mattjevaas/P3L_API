<?php
    //$arrMonth = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
?>

<html>
    <head>
        <style>
            * {
                box-sizing: border-box;
            }

            table, td, th{
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
            }

            .th-special{
                width: 100%;
            }

            .left {
                width: 40%;
            }

            .right {
                width: 60%;
            }

            .column {
                float: left;
                padding: 5px;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
    </head>

    <body>

        <div class="row">
            <div class="column left">
                <img style="width:100%" src="../assets/logo.png" alt="">
            </div>

            <div class="column right" style="text-align: center">
                <p style="font-size: 30px; font-family: Verdana;"><b>Kouvee Pet Shop</b></p>
                <p>Jl. Moses Gatotkaca No. 22 Yogyakarta 55281</p>
                <p>Telp. (0274) 357735</p>
                <p>http://www.sayanghewan.com</p>
            </div>
        </div>

        <hr/>

        <div style="font-family: Verdana, Geneva, Tahoma, sans-serif;">
            <h2 style="text-align: center;">Surat Pemesanan</h2>
            <div style="text-align: right;">
                <p><b>
                <?php
                echo "No : PO-";
                echo $obj['tglPengadaan'];
                echo "-";

                if($obj['idPengadaanBarang'] < 10)
                {
                    echo "0";
                    echo $obj['idPengadaanBarang'];
                }
                else
                {
                    echo $obj['idPengadaanBarang'];
                }
                ?>
                </b></p>
                <p><b>Tanggal : <?php echo date('d F Y'); ?></b></p>
            </div>
            <div style="border: 1px dashed black; width: 40%;">
                <div style="padding-left: 5px;">
                    <p>Kepada Yth:</p>
                    <p><?php echo $obj->idSupplier->namaSupplier; ?></p>
                    <p><?php echo $obj->idSupplier->noTelp; ?></p>
                </div>
            </div>
            <br>
            <div>
                <p>Mohon untuk disediakan produk-produk berikut ini :</p>
                <table class="th-special">
                    <tr>
                        <th>No</th>
                        <th class="th-special">Nama Produk</th>
                        <th class="th-special">Satuan</th>
                        <th class="th-special">Jumlah</th>
                    </tr>
                    <?php $x=1; for($i = 0 ; $i < count($obj['listProduct']); $i++)
                    {
                        echo "<tr>
                        <td>$x</td>
                        <td>".$obj['listProduct'][$i]->idProduk->namaProduk."</td>
                        <td>".$obj['listProduct'][$i]->idProduk->satuan."</td>
                        <td>".$obj['listProduct'][$i]->jumlahBeli."</td>
                        </tr>";

                        $x++;
                    }
                    ?>
                </table>
            </div>
        </div>

        <footer>
            <p style=" text-align: right; bottom: 0; position: fixed;">Dicetak tanggal <?php echo date('d F Y'); ?></p>
        </footer>
    </body>
</html>'
