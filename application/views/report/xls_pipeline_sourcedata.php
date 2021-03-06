<?php $this->load->view('default/excel_header'); ?>

<!-- Content -->

<table width='700' cellpadding='5' cellspacing='1' border="0">
<?php 
	
	$bulan = array(	'1'=>'Januari', '2'=>'Februari', '3'=>'Maret', '4'=>'April',
                                        '5'=>'Mei', '6'=>'Juni', '7'=>'Juli', '8'=>'Agustus',
                                        '9'=>'September', '10'=>'Oktober', '11'=>'November', '12'=>'Desember');
	
	if(isset($user))
	{
		echo "<tr><td colspan='5'><h3>REPORT WORKSHEET SALES PIPELINE - ";
		if(isset($month))
		{
			echo strtoupper($bulan[$month]);
		}
		if(isset($year))
		{
			echo " ".$year."</h3></td></tr>";
		}
		echo "<tr><td colspan='5'>&nbsp;</td></tr>";
		echo "<tr><td colspan='5'><b>".$user[0]->ID;
		echo " ".strtoupper($user[0]->USER_NAME)." ";
		echo "(".$user[0]->SALES_TYPE.")</b></td></tr>";
	}
	echo "<tr><td>&nbsp;</td></tr>";
	
?>
</table>

<table width='900' cellpadding='5' cellspacing='1' border="1">
<tr>
<th bgcolor="#FFCC00">No.</th>
	<th bgcolor="#FFCC00">SUMBER LEADS</th>
	<th bgcolor="#FFCC00">LEADS</th>
	<th bgcolor="#FFCC00">CALLS</th>
	<th bgcolor="#FFCC00">OPPORTUNITY</th>
	<th bgcolor="#FFCC00">APPOINTMENT</th>
	<th bgcolor="#FFCC00">APPLICATION</th>
	<th bgcolor="#FFCC00">APPROVAL</th>
	<th bgcolor="#FFCC00">ACCEPTANCE</th>
	<th bgcolor="#FFCC00">DRAWDOWN</th>
</tr>
<?php 

if(isset($data)){
	$i = 1;
	$color = '#ffffff';
	foreach($data as $row){
		$color = ($i%2)?"#eeeeee":"#ffffff";
		echo "
		<tr>
			<td align='center' width='40' bgcolor='$color'>".$i++."</td>
			<td align='center' width='40' bgcolor='$color'>".$row->SOURCE_DATA."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->LEADS."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->CALLS."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->OPPORTUNITY."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->APPOINTMENT."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->APPLICATION."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->APPROVAL."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->ACCEPTANCE."</td>
			<td align='center' width='60' bgcolor='$color'>".$row->DRAWDOWN."</td>
		</tr>";
	}
}
?>
</table>
