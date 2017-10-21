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
</head>
<body>

<div id="container">
	<h1>Tambah lahir</h1>

	<div id="body">
		<?php echo validation_errors(); ?>
		<?php echo form_open('lahir/tambah_lahir') ?>

		<table>
			<tr>
			       <td>Nomor</td>
			       <td>:</td>
			       <td><?php echo form_input('nomor', set_value('nomor')); ?></td>
			</tr>
			<tr>
			       <td>Tempat Lahir</td>
			       <td>:</td>
			       <td><?php echo form_input('tempat', set_value('tempat')); ?></td>
			</tr>
			<tr>
			       <td>Jam</td>
			       <td>:</td>
			       <td><?php echo form_input('jam', set_value('jam')); ?></td>
			</tr>
			<tr>
			       <td>Tanggal</td>
			       <td>:</td>
			       <td><?php echo form_input('tanggal', set_value('tanggal')); ?></td>
			</tr>
			<tr>
			      <td>Nama</td>
			      <td>:</td>
			      <td><?php echo form_input('nama', set_value('nama')); ?> </td>
			</tr>
			<tr>
			      <td>Nama Ayah</td>
			      <td>:</td>
			      <td><?php echo form_input('ayah', set_value('ayah')); ?> </td>
			</tr>
			<tr>
			      <td>Nama Ibu</td>
			      <td>:</td>
			      <td><?php echo form_input('ibu', set_value('ibu')); ?> </td>
			</tr>
			<tr>
			      <td>Diterbitkan</td>
			      <td>:</td>
			      <td><?php echo form_input('diterbitkan', set_value('diterbitkan')); ?> </td>
			</tr>
						
			<tr>
				<td colspan="3"><?php echo form_submit('mysubmit', 'Simpan'); ?></td>
			</tr>
		</table>

		<?php echo form_close() ?>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>

