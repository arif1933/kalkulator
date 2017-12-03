<?php
	$soal = "4-6+5x9:5x(2x(3+5))+(2+4x10)";
	$indexAwal = $indexAkhir = $indexOperatorTerakhir = $indexOperator = $operand1 = $operand2 = 0;
	$kiri = $kanan = $proses = $sementara = $operator = "";
	$kurung = $kali = $bagi = $tambah = $kurang = True;
	
	function CariKurung()
	{
		//Cari Kurung Buka
		for ($index=0; $index < strlen($GLOBALS['soal']) ; $index++) {
			if (substr($GLOBALS['soal'], $index, 1) == "(" ) {
				$GLOBALS['kiri'] = substr($GLOBALS['soal'], 0, $index);
				$GLOBALS['indexAwal'] = $index;
				$GLOBALS['kurung'] = True;
			}
		}
		//Cari Kurung Tutup
		for ($index=$GLOBALS['indexAwal']; $index < strlen($GLOBALS['soal']) ; $index++) {
			if (substr($GLOBALS['soal'], $index, 1) == ")" ) {
				$GLOBALS['kanan'] = substr($GLOBALS['soal'], $index, strlen($GLOBALS['soal']) - $index);
				$GLOBALS['indexAkhir'] = $index;
				break;
			}
		}
		if($GLOBALS['kurung'] == True){
			for ($i=$GLOBALS['indexAwal']+1; $i < $GLOBALS['indexAkhir']; $i++) {
				if(substr($GLOBALS['soal'], $i, 1) == "x"){
						$GLOBALS['kali'] = True;
						//Cari Operand1
						for($j=$i-1;$j>=$GLOBALS['indexAwal'];$j--){
						if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == "("){
							$GLOBALS['operand1'] = substr($GLOBALS['soal'], $j + 1, $i - ($j + 1));
							$GLOBALS['kiri'] = substr($GLOBALS['soal'], 0, $j+1);
							break;
						}
						}
						//Cari Operand2
						for($j=$i+1;$j<=$GLOBALS['indexAkhir'];$j++){
						if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == ")"){
							$GLOBALS['operand2'] = substr($GLOBALS['soal'], $i + 1, $j - ($i + 1));
							$GLOBALS['kanan'] = substr($GLOBALS['soal'], $i + 1 + $j - ($i + 1), $GLOBALS['indexAkhir'] - $i + 1 + $j - ($i + 1));
							$GLOBALS['sementara'] = $GLOBALS['operand1'] * $GLOBALS['operand2'];
							$GLOBALS['soal'] = $GLOBALS['kiri'].$GLOBALS['sementara'].$GLOBALS['kanan'];
							break;
						}
						}
						break;
				}else if(substr($GLOBALS['soal'], $i, 1) == ":"){
						$GLOBALS['bagi'] = True;
						//Cari Operand1
						for($j=$i-1;$j>=$GLOBALS['indexAwal'];$j--){
							if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == "("){
								$GLOBALS['operand1'] = substr($GLOBALS['soal'], $j + 1, $i - ($j + 1));
								$GLOBALS['kiri'] = substr($GLOBALS['soal'], 0, $j+1);
								break;
							}
						}
						//Cari Operand2
						for($j=$i+1;$j<=$GLOBALS['indexAkhir'];$j++){
							if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == ")"){
								$GLOBALS['operand2'] = substr($GLOBALS['soal'], $i + 1, $j - ($i + 1));
								$GLOBALS['kanan'] = substr($GLOBALS['soal'], $i + 1 + $j - ($i + 1), $GLOBALS['indexAkhir'] - $i + 1 + $j - ($i + 1));
								$GLOBALS['sementara'] = $GLOBALS['operand1'] / $GLOBALS['operand2'];
								$GLOBALS['soal'] = $GLOBALS['kiri'].$GLOBALS['sementara'].$GLOBALS['kanan'];
								break;
							}
						}
						break;
				}
			}
			for ($i=$GLOBALS['indexAwal']+1; $i < $GLOBALS['indexAkhir']; $i++) {
					if(substr($GLOBALS['soal'], $i, 1) == "+"){
						$GLOBALS['tambah'] == True;
						//Cari Operand1
						for($j=$i-1;$j>=$GLOBALS['indexAwal'];$j--){
						if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == "("){
							$GLOBALS['operand1'] = substr($GLOBALS['soal'], $j + 1, $i - ($j + 1));
							$GLOBALS['kiri'] = substr($GLOBALS['soal'], 0, $j+1);
							break;
						}
						}
						//Cari Operand2
						for($j=$i+1;$j<=$GLOBALS['indexAkhir'];$j++){
						if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == ")"){
							$GLOBALS['operand2'] = substr($GLOBALS['soal'], $i + 1, $j - ($i + 1));
							$GLOBALS['kanan'] = substr($GLOBALS['soal'], $i + 1 + $j - ($i + 1), $GLOBALS['indexAkhir'] - $i + 1 + $j - ($i + 1));
							$GLOBALS['sementara'] = $GLOBALS['operand1'] + $GLOBALS['operand2'];
							$GLOBALS['soal'] = $GLOBALS['kiri'].$GLOBALS['sementara'].$GLOBALS['kanan'];
							break;
						}
						}
						break;
					}
					else if(substr($GLOBALS['soal'], $i, 1) == "-"){
						//Cari Operand1
						for($j=$i-1;$j>=$GLOBALS['indexAwal'];$j--){
						if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == "("){
							$GLOBALS['operand1'] = substr($GLOBALS['soal'], $j + 1, $i - ($j + 1));
							$GLOBALS['kiri'] = substr($GLOBALS['soal'], 0, $j+1);
							break;
						}
						}
						//Cari Operand2
						for($j=$i+1;$j<=$GLOBALS['indexAkhir'];$j++){
							if(substr($GLOBALS['soal'], $j, 1) == "x" || substr($GLOBALS['soal'], $j, 1) == ":" || substr($GLOBALS['soal'], $j, 1) == "+" || substr($GLOBALS['soal'], $j, 1) == "-" || substr($GLOBALS['soal'], $j, 1) == ")"){
								$GLOBALS['operand2'] = substr($GLOBALS['soal'], $i + 1, $j - ($i + 1));
								$GLOBALS['kanan'] = substr($soal, $i + 1 + $j - ($i + 1), $GLOBALS['indexAkhir'] - $i + 1 + $j - ($i + 1));
								$GLOBALS['sementara'] = $GLOBALS['operand1'] - $GLOBALS['operand2'];
								$GLOBALS['soal'] = $GLOBALS['kiri'].$GLOBALS['sementara'].$GLOBALS['kanan'];
								break;
							}
						}
						break;
					}
			}
		}
	}
	while ($kurung == True) {
		CariKurung($soal);
		echo $soal;
		$kurung = False;
	}

	while ($kali = False) {
		# code...
	}

	while ($bagi = False) {
		# code...
	}

	while ($tambah = False) {
		# code...
	}

	while ($kurang = False) {
		# code...
	}


	
?>
