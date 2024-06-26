<?php
	class record_data_form
	{
		public $markup;

		public function __construct
		(
			$root_folder,
			$search_bar_id,
			$search_bar_class
		)
		{
			$this->markup =  '
				<form
				action="'.$root_folder.'_/component/f001/data/form_action.php" 
				method="post" 
				enctype="multipart/form-data"
				id="'.$search_bar_id.'"
				class="'.$search_bar_class.'"
				>
					<div>
						<label for="ship_number">Número de envío</label>
						<input type="number" name="ship_number" id="ship_number">
					</div>

					<div>
						<label for="date">Fecha</label>
						<input type="number" name="date" id="date">
					</div>

					<div>
						<label for="hour">Hora</label>
						<input type="number" name="hour" id="hour">
					</div>

					<div>
						<label for="file">Archivo .xlsx</label>
						<input type="file" name="file" id="file">
					</div>

					<div>
						<label for="">Enviar</label>
						<input type="submit" name="submit" value="Procesar archivo">
					</div>
				</form>
				
				<script>
					const '.$search_bar_id.' = document.getElementById("'.$search_bar_id.'");
					console.log('.$search_bar_id.')
				</script>
			';
		}

		public function get_markup_string() 
		{
			return $this->markup;
		}
	}	
?>