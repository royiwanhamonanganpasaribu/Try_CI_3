<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>

</head>
<body>

<div id="container">
	<h1>IMB</h1>

	<div id="body">
	<?php echo $this->session->flashdata('pesan'); ?>
	<input type="text" name="keyword" nomor="search-box" size="50" placeholder="ketik nama yang ingin dicari" >   
	<table border="1">
			<thead>
				<tr>
					<th>Tanggal</th>
					<th>Nomor</th>
					<th>Nama Pemilik</th>
					<th>Alamat</th>
					<th>Lokasi</th>
					<th>Luas</th>
					<th>Fungsi Bangunan</th>
					<th>Status</th>
					<th><?php echo anchor('imb/tambah_imb','Tambah') ?></th>
				</tr>
			</thead>
			<tbody id="search-result">
				<?php $i=0; foreach($imb as $row){ $i++;?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $row->tanggal ?></td>
					<td><?php echo $row->nomor ?></td>
					<td><?php echo $row->nama ?></td>
					<td><?php echo $row->alamat ?></td>
					<td><?php echo $row->lokasi ?></td>
					<td><?php echo $row->luas ?></td>
					<td><?php echo $row->fungsi ?></td>
					<td><?php echo $row->status ?></td>
					<td><?php echo anchor('imb/edit_imb/'. $row->nomor, 'Update') ?>
					<?php echo anchor('imb/delete_imb/'.$row->nomor,'Hapus',array('onclick'=>'return confirm(\'Apakah anda yakin ingin hapus\')')) ?>
					</td>
				
				<?php } ?>
			</tbody>
		</table>

		<!--Pagination-->
		<?php echo $this->pagination->create_links(); ?> 

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<script type="text/javascript" >

	$(function () {
		$('#search-box').keyup(function () {
				//alert('key up : ' + $(this).val());
				var $keyword = $(this).val();
				
				$.ajax({
					
					type	: "POST",
					url 	:"<?php echo base_url(); ?>imb/do_search",
					data	:  {
									keyword: $keyword   
								},
					dataType: 'json',		
					complete: function(data) {
									$('#search-result').html(data.responseText);
									///alert(data.responseText);
								}	
							
				});
				
		});
	});
	
</script>

</body>
</html>

