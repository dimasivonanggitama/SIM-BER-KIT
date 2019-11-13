<?php 
	$needle = "Kasi";
	$haystack = "Kasi KI/Kasubsi KI";
	if (strpos(strtolower($haystack), strtolower($needle)) !== false) echo "Work!";
?>
<html>
<!--
<table align="center" >
 <tr>
 <td>
						<table align="center" cellspacing="10" cellpadding="1">
							<tr>
								<td>
									<input type="checkbox">KSBU<br>
								</td>
								<td>
									<input type="checkbox">KASI PKC 4<br>
								</td>
								<td>
									<input type="checkbox">KASI PKC 4,5<br>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox">KASI PLI<br>
								</td>
								<td>
									<input type="checkbox">KASIE P2<br>
								</td>
								<td>
									<input type="checkbox">KASI PKC 2<br>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox">KASI PKC 5<br>
								</td>
								<td>
									<input type="checkbox">KASI KI<br>
								</td>
								<td>
									<input type="checkbox">KASI PERBEND<br>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox">KASI PKC 3<br>
								</td>
								<td>
									<input type="checkbox">KASI PKC 6<br>
								</td>
								<td>
									<input type="checkbox">KASI PDAD<br>
								</td>
							</tr>
						</table> 
 </td>
 <td>
						<table align="center" cellspacing="10" cellpadding="1">
							<tr>
								<td>
									<input type="checkbox">A<br>
								</td>
								<td>
									<input type="checkbox">B<br>
								</td>
								<td>
									<input type="checkbox">C<br>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox">D<br>
								</td>
								<td>
									<input type="checkbox">E<br>
								</td>
								<td>
									<input type="checkbox">F<br>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox">G<br>
								</td>
								<td>
									<input type="checkbox">H<br>
								</td>
								<td>
									<input type="checkbox">I<br>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox">J<br>
								</td>
								<td>
									<input type="checkbox">K<br>
								</td>
								<td>
									<input type="checkbox">L<br>
								</td>
							</tr>
						</table>
 </td>
 </tr>
</table>
-->
</html>

<!--
	<?php 
		// $count = 1;
		// $data_perkolom = 3;
		// $i = 1; 
		
		// foreach ($induk_jabatan as $res) : 
			// $id_jabatan_array[$i] = $res->id_jabatan;
			// $uraian_jabatan_array[$i] = $res->uraian_jabatan;
			// $i++;
		// endforeach;
	?>
	while (true) {
		if ($count == 1) {
			<tr>
		}
		
		if ($count <= hasil count dari mysql) {
			<td>
				<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[$count] ?>">
			</td>
			$count = $count + $data_perkolom;
		} else {
			$count = $count - hasil count dari mysql + 1;
			if ($count > $data_perkolom) {
				break;
				</tr>
			} else {
				</tr>
				<tr>
			}
		}
	}
	
	- - - Output untuk #jabatan:
	count	results
	1		<tr>
				<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[1] ?>">
				</td>
				$count = 4
	4			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[4] ?>">
				</td>
				$count = 7
	7			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[7] ?>">
				</td>
				$count = 10
	10			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[10] ?>">
				</td>
				$count = 13
	13			$count = 2
			</tr>
			<tr>
	2			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[2] ?>">
				</td>
				$count = 5
	5			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[5] ?>">
				</td>
				$count = 8
	8			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[8] ?>">
				</td>
				$count = 11
	11			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[11] ?>">
				</td>
				$count = 14
	14			$count = 3
			</tr>
			<tr>
	3			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[3] ?>">
				</td>
				$count = 6
	6			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[6] ?>">
				</td>
				$count = 9
	9			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[9] ?>">
				</td>
				$count = 12
	12			<td>
					<input type="checkbox" name="id_jabatan" value="<?php //$id_jabatan_array[12] ?>">
				</td>
				$count = 15
	15			$count = 4
				break ~> karena 4 > 3
			</tr>
				
				
	- - - Output untuk #wajib jawab:
	count	results
	1		<tr>
				<td>
					<input>
				</td>
				
					
	
-->