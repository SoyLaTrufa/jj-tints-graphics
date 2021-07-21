 <div id="wrapper">
    <div id="content">
		<form method="post" enctype="multipart/form-data">
			<div class="form__campo">
				<input class="form-control" style="width: 300px; margin-top: 10px;" type="file" name="spreadsheet"/>
				<button class="boton" type="submit">Cargar XLS</button>
			</div>
		</form>

		<p style="margin-top: 10px; "><a target="_blank" download href="<?= base_url().'resources/XLS-para-importación-de-ejemplo.xlsx'?>">
			<i class="fa fa-download" aria-hidden="true"></i> Descargar XLS base de ejemplo
		</a></p>

		<?= $mensaje ? '<p class="alert alert-danger">'.$mensaje.'</p>' : ''?>

	</div>
</div>