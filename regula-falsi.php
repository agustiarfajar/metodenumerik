<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGULA FALSI</title>
</head>
<style>
    body {
        font-family: consolas;
    }

    .center-justified {
        margin: 0 auto;
        text-align: justify;
        width: 55em;
    }
</style>
<body>
    <center>
    <h1>Metode Regula Falsi</h1>
        <table border="1" width="70%" style="border-collapse:collapse">
            <tr>
                <td colspan="10">
                    <b>Soal Nomor 2:</b>
					<p>f(x) = x<sup>3</sup> + 5x<sup>2</sup> - 10x - 4
					<p>Gunakan metode regula falsi untuk menentukan akar dari persamaan tersebut
					dalam selang [1.3, 2] dengan &#949; = 0.0001
					<p>Penyelesaian :
					<p>a = 1.3<br>b = 2<br>
                </td>
            </tr>
            <tr>
                <th>Iterasi</th>
                <th>a</th>
                <th>b</th>
                <th>c</th>
				<th>f(a)</th>
				<th>f(b)</th>
				<th>f(c)</th>
				<th>Selang Baru</th>
                <th>Selang Baru<br>|a - b|</th>
                <th>|f(c)| &lt; &#949;</th>
            </tr>
        <?php
			// Fungsi persamaan		
			function fungsi($x){
				$result = pow($x, 3) + 5 * pow($x, 2) - (10 * $x) - 4;
				return $result;
			}
			// Deklarasi nilai galat, a, b, iterasi awal, f(c) awal
            $galat = 0.0001;
            $a = 1.3;
			$b = 2;
            $i = 1;
			$fc = $galat;
			// Perulangan selama kondisi FALSE
            while (abs($fc) >= $galat) {
				// Substitusi nilai a dan b ke dalam fungsi persamaan
				$fa = fungsi($a);
				$fb = fungsi($b);
				// Rumus mencari nilai c
				$c = $b-($fb*($b-$a)/($fb-$fa));
				// Substitusi nilai c ke dalam fungsi persamaan
				$fc = fungsi($c);
                          
				echo "<tr align='center'>
						<td>".$i."</td>
                        <td>".substr($a, 0, 7)."</td>
                        <td width='40em'>".substr($b, 0, 7)."</td>
                        <td>".substr($c, 0, 7)."</td>
						<td>".substr($fa, 0, 8)."</td>
						<td>".substr($fb, 0, 8)."</td>
						<td>".substr($fc, 0, 8)."</td>";
				
				// Syarat cukup keberadaan akar
				if($fa*$fc<0){
					$sb = "[a,c]";
					$b = $c;
				} else {
					$sb = "[c,b]";
					$a = $c;
				}
				// Hitung lebar selang
				$lebar = $b-$a;
				// Pembulatan nilai lebar selang
				$lebar = round($lebar, 5);
				// Cek kondisi berhenti
				if(abs($fc)<$galat){
					$kondisi = "True";
				} else {
					$kondisi = "False";
				}
				
				echo "<td>".$sb."</td>
						<td>".substr($lebar, 0, 7)."</td>
						<td>".$kondisi."</td></tr>";

                $i++;
			}
			
			// No iterasi yang terambil
			$i = $i - 1;
			
			echo "<tr><td colspan='10'><br>
					Pada iterasi ke ".$i." memenuhi kondisi |f(c)| &lt; &#949;, maka iterasi terhenti, dan diperoleh akar hampiran 
					x = ".substr($c, 0, 7)." dengan f(x) = ".substr($fc, 0, 7).
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
