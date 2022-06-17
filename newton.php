<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWTON RAPHSON</title>
</head>
<style>
    body {
        font-family: consolas;
    }

    .center-justified {
        margin: 0 auto;
        text-align: justify;
        width: 43em;
    }
</style>
<body>
    <center>
    <h1>Metode Newton Raphson</h1>
        <table border="1" width="55%" style="border-collapse:collapse">
            <tr>
                <td colspan="6">
                    <b>Soal Nomor 3:</b>
					<p>f(x) = x<sup>3</sup> + 5x<sup>2</sup> - 10x - 4
					<p>Gunakan metode newton raphson untuk menentukan akar dari 
                    persamaan tersebut dengan nilai awal = 1.3 dengan &#949; = 0.0001
					<p>Penyelesaian :
					<p>X<sub>0</sub>= 1.3<br>
                    f(x) = x<sup>3</sup> + 5x<sup>2</sup> - 10x - 4<br>
                    f'(x) = 3x<sup>2</sup> + 10x - 10<br>
                </td>
            </tr>
           
            <?php 
            // Deklarasi Nilai Galat dan Nilai X0
            $galat = 0.0001;
            $x = 1.3;
            $datax = array();

            

            echo "<tr>
                <th>Iterasi<br>(n)</th>
                <th>X<sub>n</sub></th>
                <th>f(X<sub>n</sub>)</th>
                <th>f'(X<sub>n</sub>)</th>
                <th>|X<sub>n</sub> - X<sub>n-1</sub>|</th>
                <th>|X<sub>n</sub> - X<sub>n-1</sub>| &lt; &#949;</th>
            </tr>";

            // Iterasi sampai Xn < galat
            $i = 0;
            do {
                $datax[] = $x;

                // Fungsi untuk mensubstitusikan nilai ke dalam persamaan
                $fx = pow($x, 3) + 5 * pow($x, 2) - (10 * $x) - 4;
                // Fungsi turunan pertama untuk mensubstitusikan nilai ke dalam persamaan
                $f1x = 3 * pow($x, 2) + (10 * $x) - 10;
                // Fungsi untuk pemberhentian iterasi apabila nilai Xn < galat
                $berhenti = ($datax[$i] - $datax[$i-1]); 
                // Fungsi untuk pembulatan nilai dengan 6 angka desimal
                $berhenti = round($berhenti, 6);
                // Fungsi untuk nilai mutlak
                $berhenti = abs($berhenti);         

                echo "<tr align='center'>
                        <td>".($i)."</td>
                        <td>".substr($x, 0, 8)."</td>
                        <td>".substr($fx, 0, 8)."</td>
                        <td>".substr($f1x, 0, 8)."</td>
                        <td>".($i == 0 ? '' : substr($berhenti, 0, 8))."</td>
                        <td>".($i == 0 ? '' : ($berhenti < $galat == 0 ? 'False' : 'True'))."</td>
                    </tr>";
                
                // Formula  untuk Xn+1 
                $x = ($datax[$i] - ($fx / $f1x));  
                $i++;
            } while ($berhenti < $galat == 0);

			
			// No iterasi yang terambil
			$i = $i - 1;
			
			echo "<tr><td colspan='10'><br>
					Pada iterasi ke ".$i." memenuhi kondisi |X<sub>n</sub> - X<sub>n-1</sub>| &lt; &#949;
					, maka iterasi terhenti, dan diperoleh akar hampiran x = ".substr($x, 0, 8).
				"<p></td></tr>";
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
