<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SECANT</title>
</head>
<style>
    body {
        font-family: consolas;
    }

    .center-justified {
        margin: 0 auto;
        text-align: justify;
        width: 39em;
    }
</style>
<body>
    <center>
    <h1>Metode Secant</h1>
        <table border="1" width="50%" style="border-collapse:collapse;">
            <tr>
                <td colspan="6">
                    <b>Soal Nomor 4:</b>
					<p>f(x) = x<sup>3</sup> + 5x<sup>2</sup> - 10x - 4
					<p>Gunakan metode secant untuk menentukan akar dari persamaan
                    tersebut dengan nilai awal = 1.3 dan 2  dengan &#949; = 0.0001.
                    <p>Penyelesaian :
                    <p>X<sub>0</sub>= 1.3<br>
					X<sub>1</sub>= 2<br>
                </td>
            </tr>
            <tr>
                <th>Iterasi<br>(n)</th>
                <th>X<sub>n</sub></th>
                <th>f(X<sub>n</sub>)</th>
                <th>|X<sub>n</sub> - X<sub>n-1</sub>|</th>
                <th>|X<sub>n</sub> - X<sub>n-1</sub>| &lt; &#949;</th>
            </tr>
            <?php 
				// Deklarasi Nilai Galat dan Nilai X0
                $galat = 0.0001;
                $x = 1.3;
                $x1 = 2;
                $datax = array();
                $datafx = array();

                // Fungsi untuk mensubstitusikan nilai awal (x0) kedalam persamaan
                $fx = pow($x, 3) + 5 * pow($x, 2) - 10 * $x - 4;
                echo "<tr align='center'>
                        <td>0</td>
                        <td>".substr($x, 0, 8)."</td>
                        <td>".substr($fx, 0, 8)."</td>
                        <td></td>
                        <td></td>
                      </tr>";

                // Fungsi iterasi
                $i = 0;
                do {
                    $datax[] = $x1;

                    // Fungsi untuk mensubstitusikan Xn kedalam persamaan
                    $fx1 = pow($x1, 3) + 5 * pow($x1, 2) - 10 * $x1 - 4;
                    $datafx[] = $fx1;

                    
                    if ($i == 0) {
                        $berhenti = ($datax[0] - $x);
                    } else {
                        // Fungsi untuk cek berhenti iterasi ke-n apabila Xn < galat
                        $berhenti = ($datax[$i] - $datax[$i-1]);
                        // Fungsi untuk pembulatan 6 angka desimal
                        $berhenti = round($berhenti, 6);
                        // Fungsi untuk nilai mutlak
                        $berhenti = abs($berhenti);
                    }

                    echo "<tr align='center'>
                        <td>".($i+1)."</td>
                        <td>".substr($x1, 0, 8)."</td>
                        <td>".substr($fx1, 0, 8)."</td>
                        <td>".substr($berhenti, 0, 8)."</td>
                        <td>".($berhenti < $galat == 0 ? 'False' : 'True')."</td>
                      </tr>";
                
                      if ($i == 0) {
                        $x1 = $datax[$i] - (($fx1 * ($x1 - $x)) / ($fx1 - $fx));
                      } else {
                        // Formula untuk Xn+1
                        $x1 = $datax[$i] - (($datafx[$i] * ($datax[$i] - $datax[$i-1])) / ($datafx[$i] - $datafx[$i-1]));
                      }
                      $i++;
                } while ($berhenti < $galat == 0);
				
				echo "<tr><td colspan='10'><p align='justify' width='55em'>
						Pada iterasi ke ".$i." memenuhi kondisi |X<sub>n</sub> - X<sub>n-1</sub>| &lt; &#949;
						, maka iterasi terhenti, dan diperoleh akar hampiran x = ".substr($x1, 0, 8).
					"</p></td></tr>";
				echo "</table>";
            ?>
        <br>
		<p class="center-justified" style="font-weight:bold">
            Dibuat oleh Kelompok 11 - IF6 :<br>
            &copy;10120227 - Salma Wafa Sa'diyah<br>
            &copy;10120234 - Agustiar Fajar Abdillah
        </p>
    </center>
</body>
</html>
