<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminasi Gauss</title>
</head>
<style>
    body {
        font-family: consolas;
    }
    .center-justified {
        margin: 0 auto;
        text-align: justify;
        width: 58em;
    }
</style>
<body>
    <center>
    <h1>Eliminasi Gauss</h1>
        <table border="1" width="70%" style="border-collapse:collapse">
            <tr>
                <td colspan="5">
                    <b>Soal Nomor 1</b>
                    <p>Diketahui terdapat persamaan berikut :</p>
                    <center>
                        10w - 2x - y - z = 3
                        <br>- 2w + 10x - y - z = 15
                        <br>- w - x + 10y - 2z = 27
                        <br>- w + x - 2y + 10z = -9
                    </center>
                    <p>Selesaikan menggunakan metode Eliminasi Gauss</p>
                    <p style="font-size:0.8em; font-weight:bold">(hasil akhir mempertimbangkan 4 angka dibelakang koma, menggunakan pecahan)</p>
                </td>
            </tr>
        <?php
        $n = -8.5;
        $k = -2.5;
        echo dec2frac($n);
        echo dec2frac($k);
            $persamaan1 = array(10, -2, -1, -1, 3);
            $persamaan2 = array(-2, 10, -1, 1, 15);
            $persamaan3 = array(-1, -1, 10, -2, 27);
            $persamaan4 = array(-1, 1, -2, 10, -9);

            // Merubah persamaan ke dalam bentuk matriks
            echo "<tr>";
                echo "<td>";
                echo "<p>Tampilan Matriks</p>";
                echo "<p style='margin-left:480px;margin-top:0px;position:absolute;'><sup>1</sup>&frasl;<sub>10.B1</sub></p>";
                    echo "<table width='50%' border='1' style='border-collapse:collapse;text-align:center'>";
                        echo "<tr>";
                        foreach($persamaan1 as $p1) {
                            echo "<td>".$p1."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        foreach($persamaan2 as $p2) {
                            echo "<td>".$p2."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        foreach($persamaan3 as $p3) {
                            echo "<td>".$p3."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        foreach($persamaan4 as $p4) {
                            echo "<td>".$p4."</td>";
                        }
                        echo "</tr>";

                        
                    echo "</table><br>";
                    
                    echo "<table width='50%' border='1' style='border-collapse:collapse;text-align:center'>";
                    echo "<p style='margin-left:480px;margin-top:33px;position:absolute;'>B2+2B1</p>";
                    echo "<p style='margin-left:480px;margin-top:53px;position:absolute;'>B3+B1</p>";
                    echo "<p style='margin-left:480px;margin-top:73px;position:absolute;'>B4+B1</p>";
                        // PERUBAHAN NILAI PADA BARIS 1
                    echo "<tr>";
                    for ($i = 0; $i < 5; $i++) {
                        $hasil[$i] = ((1/10) * $persamaan1[$i]);
                        echo "<td>".dec2frac($hasil[$i])."</td>";

                        foreach($persamaan1 as $p1) {
                            $persamaan1[$i] = $hasil[$i];
                        }
                    }
                    echo "</tr>";      
                    echo "<tr>";
                        foreach($persamaan2 as $p2) {
                            echo "<td>".$p2."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        foreach($persamaan3 as $p3) {
                            echo "<td>".$p3."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        foreach($persamaan4 as $p4) {
                            echo "<td>".$p4."</td>";
                        }
                        echo "</tr>";               
                    echo "</table><br>";
                    
                    echo "<table width='50%' border='1' style='border-collapse:collapse;text-align:center'>";
                    echo "<p style='margin-left:480px;margin-top:60px;position:absolute;'>B3+<sup>1</sup>&frasl;<sub>8</sub>.B2</p>";
                    echo "<p style='margin-left:480px;margin-top:90px;position:absolute;'>B4-<sup>1</sup>&frasl;<sub>12</sub>.B2</p>";
                    // PERUBAHAN NILAI PADA BARIS 2, 3, 4
                    echo "<tr>";
                        foreach($persamaan1 as $p1) {
                            echo "<td>".dec2frac($p1)."</td>";
                        }
                    echo "</tr>";      
                    echo "<tr>";
                        for ($i = 0; $i < 5; $i++) {
                            $hasilp2[$i] = $persamaan2[$i] + (2 * $persamaan1[$i]);
                            echo "<td>".dec2frac($hasilp2[$i])."</td>";

                            foreach($persamaan2 as $p2) {
                                $persamaan2[$i] = $hasilp2[$i];
                            }
                        }
                        echo "</tr>";
                        echo "<tr>";
                        for ($i = 0; $i < 5; $i++) {
                            $hasilp3[$i] = ($persamaan3[$i] + $persamaan1[$i]);
                            echo "<td>".dec2frac($hasilp3[$i])."</td>";

                            foreach($persamaan3 as $p3) {
                                $persamaan3[$i] = $hasilp3[$i];
                            }
                        }
                        echo "</tr>";
                        echo "<tr>";
                        for ($i = 0; $i < 5; $i++) {
                            $hasilp4[$i] = ($persamaan4[$i] + $persamaan1[$i]);
                            echo "<td>".dec2frac($hasilp4[$i])."</td>";

                            foreach($persamaan4 as $p4) {
                                $persamaan4[$i] = $hasilp4[$i];
                            }
                        }
                        echo "</tr>";               
                    echo "</table><br>";

                    echo "<table width='50%' border='1' style='border-collapse:collapse;text-align:center'>";
                    echo "<p style='margin-left:480px;margin-top:90px;position:absolute;'>B4+<sup>8</sup>&frasl;<sub>39</sub>.B3</p>";
                
                    // PERUBAHAN NILAI PADA BARIS 2, 3, 4
                    echo "<tr>";
                        foreach($persamaan1 as $p1) {
                            echo "<td>".dec2frac($p1)."</td>";
                        }
                    echo "</tr>";      
                    echo "<tr>";
                        foreach($persamaan2 as $p2) {
                            echo "<td>".dec2frac($p2)."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        for ($i = 0; $i < 5; $i++) {
                            $hasilp3[$i] = ($persamaan3[$i] + (1/8 * $persamaan2[$i]));
                            echo "<td>".dec2frac($hasilp3[$i])."</td>";

                            foreach($persamaan3 as $p3) {
                                $persamaan3[$i] = $hasilp3[$i];
                            }
                        }
                        echo "</tr>";
                        echo "<tr>";
                        for ($i = 0; $i < 5; $i++) {
                            $hasilp4[$i] = $persamaan4[$i] - (round(1/12 * $persamaan2[$i], 2));
            
                            echo "<td>".dec2frac($hasilp4[$i])."</td>";

                            foreach($persamaan4 as $p4) {
                                $persamaan4[$i] = $hasilp4[$i];
                            }
                        }
                        echo "</tr>";               
                    echo "</table><br>";

                    echo "<table width='50%' border='1' style='border-collapse:collapse;text-align:center'>";
                    echo "<tr>";
                        foreach($persamaan1 as $p1) {
                            echo "<td>".dec2frac($p1)."</td>";
                        }
                    echo "</tr>";      
                    echo "<tr>";
                        foreach($persamaan2 as $p2) {
                            echo "<td>".dec2frac($p2)."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        foreach($persamaan3 as $p3) {
                            echo "<td>".dec2frac($p3)."</td>";
                        }
                        echo "</tr>";
                        echo "<tr>";
                        for ($i = 0; $i < 5; $i++) {
                            $hasilp4[$i] = $persamaan4[$i] + ((8/39) * $persamaan3[$i]);
            
                            echo "<td>".dec2frac($hasilp4[$i])."</td>";

                            foreach($persamaan4 as $p4) {
                                $persamaan4[$i] = $hasilp4[$i];
                            }
                        }
                        echo "</tr>";               
                    echo "</table><br>";
                    
                    echo "Substitusi Mundur<br>";
                    echo "<tr>
                        <td>
                            <table border='1' width='100%' style='border-collapse:collapse'>
                                <tr>
                                    <td>
                                        ".dec2frac($persamaan4[3])."z = ".$persamaan4[4]."<br>";
                                        $z = $persamaan4[4] / $persamaan4[3];
                                        echo "z = ".dec2frac($z)."
                                    </td>
                                    <td>
                                        ".dec2frac($persamaan3[2])."y".dec2frac($persamaan3[3])."z = ".dec2frac($persamaan3[4])."<br>
                                        ".dec2frac($persamaan3[2])."y".dec2frac($persamaan3[3])."(".dec2frac($z).") = ".dec2frac($persamaan3[4])."<br>";
                                        $y1 = $persamaan3[3] * $z;
                                        $y2 = $persamaan3[4] - $y1;
                                        $y = $y2/$persamaan3[2];
                                        echo "y = ".dec2frac($y)."
                                        
                                    </td>
                                   <td>
                                        ".dec2frac($persamaan2[1])."x".dec2frac($persamaan2[2])."y+".dec2frac($persamaan2[3])."z = ".dec2frac($persamaan2[4])."<br>
                                        ".dec2frac($persamaan2[1])."x".dec2frac($persamaan2[2])."(".dec2frac($y).")+".dec2frac($persamaan2[3])."(".dec2frac($z).") = ".dec2frac($persamaan2[4])."<br>";
                                        $x1 = $persamaan2[2] * $y;
                                        $x2 = $persamaan2[3] * $z;
                                        $x3 = $x1 + $x2;
                                        $x4 = $persamaan2[4] + $x3;
                                        $x = $x4 / $persamaan2[1];               
                                        echo "x = ".dec2frac($x)."    
                                   </td>
                                   <td>
                                        w ".dec2frac($persamaan1[1])."x".dec2frac($persamaan1[2])."y".dec2frac($persamaan1[3])."z = ".dec2frac($persamaan1[4])."<br>
                                        w ".dec2frac($persamaan1[1])."(".dec2frac($x).")".dec2frac($persamaan1[2])."(".dec2frac($y).")".dec2frac($persamaan1[3])."(".dec2frac($z).") = ".dec2frac($persamaan1[4])."<br>";
                                        $w1 = ($persamaan1[1] * $x) - ($persamaan1[2] * $y) - ($persamaan1[3] * $z);
                                        $w2 = $persamaan1[4] - $w1;
                                        $w = $w2 / $persamaan1[1];
                                        echo "w = ".dec2frac($w)."
                                   </td> 
                                </tr>
                            </table><br>
                            Solusinya Adalah
                            <tr>
                                <td>
                                    <table border=1 width=10% style=border-collapse:collapse>
                                        <tr>
                                            <td>w</td>
                                            <td>".dec2frac($w)."</td>
                                        </tr>
                                        <tr>
                                            <td>x</td>
                                            <td>".dec2frac($x)."</td>
                                        </tr>
                                        <tr>
                                            <td>y</td>
                                            <td>".dec2frac($y)."</td>
                                        </tr>
                                        <tr>
                                            <td>z</td>
                                            <td>".dec2frac($z)."</td>
                                        </tr>
                                    </table>
                                    Atau bisa ditulis (w, x, y, z) = (".dec2frac($w).",".dec2frac($x).",".dec2frac($y).",".dec2frac($z).")
                                </td>
                            </tr>
                        </td>
                    </tr>";
                echo "</tr>";
                echo "</td>";
            echo "</tr>";
            

            // FUNGSI MENGUBAH DESIMAL KEDALAM PECAHAN
            function dec2frac($num = 0.0, $err = 0.001)
            {
                if ($err <= 0.0 || $err >= 1.0)
                {
                    $err = 0.001;
                }
            
                $sign = ($num > 0) ? 1 : (($num < 0) ? - 1 : 0);
            
                if ($sign === - 1)
                {
                    $num = abs($num);
                }
            
                if ($sign !== 0)
                {
                    // $err is the maximum relative $err; convert to absolute
                    $err *= $num;
                }
            
                $n = (int) floor($num);
                $num -= $n;
            
                if ($num < $err)
                {
                    return (string) ($sign * $n);
                }
            
                if (1 - $err < $num)
                {
                    return (string) ($sign * ($n + 1));
                }
            
                // The lower fraction is 0/1
                $lower_n = 0;
                $lower_d = 1;
            
                // The upper fraction is 1/1
                $upper_n = 1;
                $upper_d = 1;
            
                while (true)
                {
                    // The middle fraction is ($lower_n + $upper_n) / (lower_d + $upper_d)
                    $middle_n = $lower_n + $upper_n;
                    $middle_d = $lower_d + $upper_d;
            
                    if ($middle_d * ($num + $err) < $middle_n)
                    {
                        // real + $err < middle : middle is our new upper
                        $upper_n = $middle_n;
                        $upper_d = $middle_d;
                    }
                    elseif ($middle_n < ($num - $err) * $middle_d)
                    {
                        // middle < real - $err : middle is our new lower
                        $lower_n = $middle_n;
                        $lower_d = $middle_d;
                    }
                    else
                    {
                        // Middle is our best fraction
                        return (string) "<sup>". (($n * $middle_d + $middle_n) * $sign). "</sup>" . '&frasl;' . (string) "<sub>". $middle_d ."</sub>";
                    }
                }
            
                return '???'; // should be unreachable.
            }

        ?>
        </table>
        <br>
        <p class="center-justified" style="font-weight:bold">
            Dibuat oleh Kelompok 11 - IF6 :<br>
            &copy;10120227 - Salma Wafa Sa'diyah<br>
            &copy;10120234 - Agustiar Fajar Abdillah
        </p>
    </center>
</body>
</html>