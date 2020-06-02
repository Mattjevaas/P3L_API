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
            <h3 style="text-align: center;">Laporan Pengadaan Tahunan</h3>
            <br>
            <p>Tahun : <?php echo $thn ?></p>

            <div>
                <table class="th-special">
                    <tr>
                        <th>No</th>
                        <th class="th-special">Bulan</th>
                        <th class="th-special">Jumlah Pengeluaran</th>
                    </tr>
                    <?php  $tot=0; $x = 1; foreach($obj as $key=>$value)
                    {
                        var_dump($key);
                        var_dump($value);
                        echo "<tr>
                        <td>$x</td>
                        <td>$key</td>
                        <td>Rp. $value,-</td>
                        </tr>";

                        $tot += $value;
                        $x++;
                    }
                    ?>
                </table>
            </div>

            <h3 style="text-align: center;">Total Rp. <?php echo $tot ?>,-</h3>
        </div>

        <footer>
            <p style=" text-align: right; bottom: 0; position: fixed;">Dicetak tanggal <?php echo date('d F Y'); ?></p>
        </footer>
    </body>
</html>'
