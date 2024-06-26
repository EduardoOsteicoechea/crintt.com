<?php
	class javascript
	{
		public $markup;

		public function __construct
		(
			$id,
			$component_name,
			$root_folder,
			$component_folder,
			$session,
			$component_id,
			$record_data_form_id,
		)
		{
			$this->markup =  '
				<script type="module">
					
					import component from "'. $component_folder .'js/class.js";
					const '. $component_id .'_class = new component(
						"'.$id.'",
						"'.$component_name.'",
						"'.$root_folder.'",
						"'.$component_folder.'",
						{'.implode($session).'},
						"'.$component_id.'",
						"'.$record_data_form_id.'",
					);
				</script>
			';
		}

		public function get_markup_string() 
		{
			return $this->markup;
		}
	}	
?>