<?php $this->load->view('default/header') ?>	
<td  valign="top" align="left">

<script type="text/javascript">
	$(function() {
	
		//-------------------------------------
		//	Set active tabbed window
		//-------------------------------------		
		$(function() { $("#tabs").tabs(); });
		
		//-------------------------------------
		//	Set datepicker
		//-------------------------------------	
		$("#START").datepicker({
			//showOn: 'button',
			//buttonImage: '<?php echo ICONS ?>calendar.gif',
			//buttonImageOnly: true,
			changeMonth: true,
			changeYear: true
		});
		$('#START').datepicker('option', {dateFormat: 'd-M-yy'});
		
		$("#END").datepicker({
			//showOn: 'button',
			//buttonImage: '<?php echo ICONS ?>calendar.gif',
			//buttonImageOnly: true,
			changeMonth: true,
			changeYear: true
		});
		$('#END').datepicker('option', {dateFormat: 'd-M-yy'});
		
		
		//-------------------------------------
		//	Set action if submit 
		//-------------------------------------
		$('#submit').click(function(){
			getReport(0);	
		})
		
		//-------------------------------------
		//	Set action if export 
		//-------------------------------------
		$('#export').click(function(){
			getReport(1);			
		})
		
		//--------------------------------------------
		//	Function to get ajax content of report
		//--------------------------------------------
		function getReport(ex){
			var start = $('#START').val(); 
			var end = $('#END').val(); 
	
			var msg = '';
			if(start == '') {msg += 'Tanggal mulai tidak boleh kosong \n';}
			if(end == ''){msg +='Tanggal akhir tidak boleh kosong';}
								
			if(msg){alert(msg); return false;}
			else {
				//alert(start+' s/d '+end);
				if(ex == 0){
					var urls = '<?php echo site_url('/status/getstatus/')?>/'+start+'/'+end; 
					$("#report").html("<img src='<?php echo LOAD ?>'> <span style='color:#080'>loading</span>");
					$("#report").load(urls)
				} else {
					var urls = '<?php echo site_url('/status/xlsstatus/')?>/'+start+'/'+end;  
					//alert(urls);
					window.location = urls;
				}
			}
		}
		
	
	//------------------------------------------------
	//	Choose SALES ID from dialog box if clicked
	//------------------------------------------------
	<?php if(! isset($data)){ ?>
		$('#ID').click(function(){			
			$('#search').dialog('open');
			
		});	
		$('#USER_NAME').click(function(){			
			$('#search').dialog('open');
		});			
	<?php } ?>
	
	//------------------------------
	//	Search jQuery Dialog Box
	//------------------------------
	$("#search").dialog({
		width		: 500,
		height		: 550,
		modal		: true,
		autoOpen	: false,
		buttons		: {'Close'	: function(){$(this).dialog('close');} }
	});

	//------------------------------------
	//	Show all select if dialog close
	//------------------------------------
	$( "#search" ).dialog({
  	 	close: function(event, ui) { $('select').show(); }
	});
	
});


//-------------------------------------
//	Choose SALES ID from dialog box
//-------------------------------------
function pilih_data(com,grid)
	{
		if (com=='Pilih')
			{
			   if($('.trSelected',grid).length>0 && $('.trSelected',grid).length<2) {
					// to provide value in ie 6 suck
					var arrData = getSelectedRow();
					var nama = arrData[0][1].toUpperCase();
					$('#ID').val(arrData[0][0]);
					$('#USER_NAME').val(nama);
					$('#SALES_TYPE').val(arrData[0][2]);
					$('#search').dialog('close');
				}  else { alert('Pilih satu data saja !'); }	
			}          
	}

//------------------------------------------
//	Get selected row value from flexygrid
//------------------------------------------			
function getSelectedRow() {
	var arrReturn   = [];
	$('.trSelected').each(function() {
			var arrRow              = [];
			$(this).find('div').each(function() {
					arrRow.push( $(this).html() );
			});
			arrReturn.push(arrRow);
	});
	return arrReturn;
}

	
</script>


<div id='content_x'>
	<div id="tabs">
        <ul>
            <li>
            	
            	<a href="#tabs-1">REPORT STATUS NON SALES</a>
            </li>
        </ul>
        <div id="tabs-1">
            <form action="" method="post" enctype="application/x-www-form-urlencoded" name="frmReport" id="frmReport">
            <table width="" border="0" cellspacing="5" cellpadding="0">
           
              <tr>
              	<td align="left">PERIODE : </td>
                <td>&nbsp; <input name="START" id="START" type="text" size="20" readonly="readonly" class="input"></td>
                <td>to <input name="END" id="END" type="text" size="20" readonly="readonly" class="input"></td>
                <td><input name="submit" id="submit" type="button" value="Generate"></td>
                <td><input name="export" id="export" type="button" value="Export to XLS"></td>
              </tr>
            </table>
            </form>
            <br />
            <div id='report'>Silahkan isi range periode report</div>
         </div>
	</div>
    

</div><!-- close div content -->

</td>
</tr>
</table>
<script type="text/javascript">
<?php 
	$level 	= $_SESSION['USER_LEVEL'];
	$i		= 1;
	$html 	= "\$(function(){\$( '#accordion' ).accordion({ active:$i});});";
	echo $html;
?>
</script>
<?php $this->load->view('default/footer') ?>