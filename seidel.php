<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iterasi Gauss-Seidel</title>
</head>
<style>
    body {
        font-family: consolas;
    }
    .center-justified {
        margin: 0 auto;
        text-align: justify;
        width: 48em;
    }
</style>
<body>
    <center>
    <h1>Iterasi Gauss-Seidel</h1>
        <table border="1" width="70%" style="border-collapse:collapse">
            <tr>
                <td colspan="9">
                    <b>Soal Nomor 3</b>
                    <p>Diketahui terdapat persamaan berikut :</p>
                    <center>
                        10w - 2x - y - z = 3
                        <br>- 2w + 10x - y - z = 15
                        <br>- w - x + 10y - 2z = 27
                        <br>- w + x - 2y + 10z = -9
                    </center>
                    <p>Selesaikan menggunakan metode Iterasi Gauss-Seidel dengan nilai awal (0,0,0,0)<sup>T</sup> hingga kondisi berhenti dengan 𝜀 = 0.0001.</p>
                    <p style="font-size:0.8em; font-weight:bold">(hasil akhir mempertimbangkan 4 angka dibelakang koma)</p>
                </td>
            </tr>
        
        <?php

        $global_w = 3;
        $global_x = 15;
        $global_y = 27;
        $global_z = -9;
        
            // Set persamaan iterasi
            function f1($x, $y, $z){
                global $global_w;
                $result = ($global_w + (2*$x) + $y + $z) / 10;
                return $result;
            }
            function f2($w, $y, $z){
                global $global_x;
                $result = ($global_x + (2*$w) + $y + $z) / 10;
                return $result;
            }
            function f3($w, $x, $z){
                global $global_y;
                $result = ($global_y + $w + $x + (2*$z)) / 10;
                return $result;
            }
            function f4($w, $x, $y){
                global $global_z;
                $result = ($global_z + $w - $x + (2*$y)) / 10;
                return $result;
            }

            // Deklarasi nilai iterasi awal, w0, x0, y0, z0
            $w = 0; $x = 0; $y = 0; $z = 0;
            $galat = 0.0001;
            
            // Buat array hasil substitusi fungsi
            $datafw = array();
            $datafx = array();
            $datafy = array();
            $datafz = array();

            $i = 0;
            do {
                // Input nilai fungsi di iterasi awal
                $datafw[0] = $w;
                $datafx[0] = $x;
                $datafy[0] = $y;
                $datafz[0] = $z;

                // Substitusi w, x, y, z ke dalam masing2 fungsi
                $fw = f1($datafx[$i], $datafy[$i], $datafz[$i]);
                $fx = f2($fw, $datafy[$i], $datafz[$i]);
                $fy = f3($fw, $fx, $datafz[$i]);
                $fz = f4($fw, $fx, $fy);
                
                // Pembulatan hasil akhir 4 angka dibelakang koma
                $fw = round($fw, 4);
                $fx = round($fx, 4);
                $fy = round($fy, 4);
                $fz = round($fz, 4);

                // // Memasukan hasil ke array
                $datafw[] = $fw;
                $datafx[] = $fx;
                $datafy[] = $fy;
                $datafz[] = $fz;

                $berhentiw = abs((($fw - $datafw[$i])/$fw));
                $berhentix = abs((($fx - $datafx[$i])/$fx));
                $berhentiy = abs((($fy - $datafy[$i])/$fy));
                $berhentiz = abs((($fz - $datafz[$i])/$fz));

                echo "<tr align=center>
                        <td colspan=5>
                        Iterasi ke-".($i+1)."<br><br>
                            w = <span style=text-decoration:underline>$global_w + 2($datafx[$i]) + $datafy[$i] + $datafz[$i] = $fw</span><br>10<br>
                            x = <span style=text-decoration:underline>$global_x + 2($fw) + $datafy[$i] + $datafz[$i] = $fx</span><br>10<br>
                            y = <span style=text-decoration:underline>$global_y + $fw + $fx + 2($datafz[$i]) = $fy</span><br>10<br>
                            z = <span style=text-decoration:underline>$global_z + $fw - $fx + 2($fy) = $fz</span><br>10<br>
                        </td>
                        <td colspan=5>
                            𝜀<sub>RA</sub> w = <u>$fw - $datafw[$i]</u> = ".substr($berhentiw, 0, 6)."<br><span style=margin-left:30px>$fw</span><br>
                            𝜀<sub>RA</sub> x = <u>$fx - $datafx[$i]</u> = ".substr($berhentix, 0, 6)."<br><span style=margin-left:30px>$fx</span><br>
                            𝜀<sub>RA</sub> y = <u>$fy - $datafy[$i]</u> = ".substr($berhentiy, 0, 6)."<br><span style=margin-left:30px>$fy</span><br>
                            𝜀<sub>RA</sub> z = <u>$fz - $datafz[$i]</u> = ".substr($berhentiz, 0, 6)."<br><span style=margin-left:30px>$fz</span><br><br>
                        </td>
                </tr>";
                
                $i++;
            } while ($berhentiw < $galat == 0);

            echo "<tr>
                    <th style='width:10%'>Iterasi</th>
                    <th>w</th>
                    <th>x</th>
                    <th>y</th>
                    <th>z</th>
                    <th>𝜀<sub>RA</sub>(w)</th>
                    <th>𝜀<sub>RA</sub>(x)</th>
                    <th>𝜀<sub>RA</sub>(y)</th>
                    <th>𝜀<sub>RA</sub>(z)</th>
                </tr>";

            echo "<tr align='center'>
                        <td>0</td>
                        <td>".$w."</td>
                        <td>".$x."</td>
                        <td>".$y."</td>
                        <td>".$z."</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>";
            
            // Perulangan iterasi selama nilai fungsi iterasi k tidak sama dengan iterasi k-1
            $i = 0;
            do {
                // Input nilai fungsi di iterasi awal
                $datafw[0] = $w;
                $datafx[0] = $x;
                $datafy[0] = $y;
                $datafz[0] = $z;

                // Substitusi w, x, y, z ke dalam masing2 fungsi
                $fw = f1($datafx[$i], $datafy[$i], $datafz[$i]);
                $fx = f2($fw, $datafy[$i], $datafz[$i]);
                $fy = f3($fw, $fx, $datafz[$i]);
                $fz = f4($fw, $fx, $fy);
                
                // Pembulatan hasil akhir 4 angka dibelakang koma
                $fw = round($fw, 4);
                $fx = round($fx, 4);
                $fy = round($fy, 4);
                $fz = round($fz, 4);

                // // Memasukan hasil ke array
                $datafw[] = $fw;
                $datafx[] = $fx;
                $datafy[] = $fy;
                $datafz[] = $fz;

                $berhentiw = abs((($fw - $datafw[$i])/$fw));
                $berhentix = abs((($fx - $datafx[$i])/$fx));
                $berhentiy = abs((($fy - $datafy[$i])/$fy));
                $berhentiz = abs((($fz - $datafz[$i])/$fz));

                echo "<tr align='center'>
                        <td>".($i+1)."</td>
                        <td>".substr($fw, 0, 6)."</td>
                        <td>".substr($fx, 0, 6)."</td>
                        <td>".substr($fy, 0, 6)."</td>
                        <td>".substr($fz, 0, 7)."</td>
                        <td>".substr($berhentiw, 0, 7)."</td>
                        <td>".substr($berhentix, 0, 7)."</td>
                        <td>".substr($berhentiy, 0, 6)."</td>
                        <td>".substr($berhentiz, 0, 8)."</td>
                        </tr>";
                
                $i++;
            } while ($berhentiw < $galat == 0);

            echo "<tr><td colspan='10'>
                        <p align='justify' width='55em'>Pada tabel terlihat nilai galat relatif
                        pada iterasi ke 7 lebih kecil galat toleransi 𝜀 = $galat. Maka iterasi
                        dapat dihentikan dan didapat w = $fw, x = $fx, y = $fy, dan z = $fz</p>
                        </td>
                    </tr>";
				echo "</table>";
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