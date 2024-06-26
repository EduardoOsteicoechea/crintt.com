<?php
	class f001
	{
		public $id;
		public $component_name;
		public $root_folder;
		public $component_folder;
		public $session;
		public $component_id;
		public $component_class;
		public $record_data_form_id;
		public $record_data_form_class;
		public $css_file_name_array;

		public function __construct
		(
			$id,
			$root_folder,
			$session
		)
		{
			include_once "markup/javascript.php";
			include_once "markup/styles.php";
			include_once "markup/record_data_form.php";

			$this->id = $id;
			$this->component_name =      "f001";
			$this->root_folder =         $root_folder;
			$this->component_folder =    $this->root_folder . "_/component/f001/";
			$this->session =             $session;
			$this->component_id =        $this->id . '_' . $this->component_name;
			$this->record_data_form_id =          $this->id . '_' . $this->component_name . '_record_data_form';
			$this->record_data_form_class =       $this->component_name . '_record_data_form';
			$this->css_file_name_array = ["layout"];

			$record_data_form =  new record_data_form ( $root_folder, $this->record_data_form_id, $this->record_data_form_class);
			$styles = 	   new styles     ( $this->css_file_name_array, $this->component_id, $this->component_folder );
			$javascript = 	new javascript ( 
				$this->id,
				$this->component_name,
				$this->root_folder,
				$this->component_folder,
				$this->session,
				$this->component_id,
				$this->record_data_form_id
			);

			echo '
			<div
				id="'. $this->id . '_' . $this->component_name .'"
				class="'.$this->component_name.'"
				>'.
					$record_data_form->get_markup_string().
					$styles    ->get_markup_string().
					$javascript->get_markup_string()
				.'</div>
			';
		}
	}

?>