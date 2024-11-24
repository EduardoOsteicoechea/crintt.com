<?php
	include_once "Error_generic.php";
	include_once "Numeral_5_fields.php";
	include_once "Field_model.php";
	include_once "Check_for_repeated_cell_data.php";
	include_once "Check_for_character_overflow.php";
	include_once "Check_for_invalid_data_type.php";
	include_once "Check_for_invalid_movement_type.php";

	class Capture_row_data_as_field_model_array
	{
		public $root_folder;
		public $row_field_model_array = [];
		public $error_compilation_string;
		public $ma_count = "0000000";
		public $mv_count = "0000000";
		public $me_count = "0000000";
		public $records;

		public function __construct 
		(
			$root_folder,
			$rows
		)
		{
			$this->error_compilation_string .= Check_for_repeated_cell_data($rows);
			for ( $i=0; $i < count($rows); $i++ ) 
			{ 
				$row = $rows[$i];
				$row_array = [];
				
				for ( $j=0; $j < count($row); $j++ ) 
				{
					$row_number = $i;
					$column_number = $j;
					$value = $row[$column_number];
					$field = new Numeral_5_fields($root_folder);
					$current_field = $field->fields[$column_number];

					$lenght_evaluation = $current_field[1] - strlen($value);
					$field_missing_character_number = ($lenght_evaluation > 0) ? $lenght_evaluation : 0;
					$field_spare_character_number = ($lenght_evaluation < 0) ? abs($lenght_evaluation) : 0;

					$modeled_field = new Field_model
					(
						$root_folder,
						$current_field[0],
						$value,
						$current_field[1],
						$current_field[2],
						$current_field[3],
						$current_field[4],
						$field_missing_character_number,
						$field_spare_character_number,
						$row_number + 1,
						$column_number + 1
					);

					array_push($row_array, $modeled_field);
				};

				array_push($this->row_field_model_array, $row_array);
			};

			$this->capture_fields_errors();
		}	

		public function capture_fields_errors()
		{
			for ( $i=0; $i < count($this->row_field_model_array); $i++ ) 
			{ 
				$row = $this->row_field_model_array[$i];
				for ( $j=0; $j < count($row); $j++ ) 
				{
					$field = $row[$j];
					$field->set_character_overflow_error(
						Check_for_character_overflow
						(
							$field->field_spare_character_number,
							$field->field_value,
							$field->field_name,
							$field->row,
							$field->column,
						)
					);
					$field->set_invalid_data_type_error(
						Check_for_invalid_data_type
						(
							$field->field_value,
							$field->field_type,
							$field->field_name,
							$field->row,
							$field->column,
						)
					);
					if ($j == 0)
					{		
						$field->set_movement_type_error(
							Check_for_invalid_movement_type
							(
								$field->field_value,
								$field->field_name,
								$field->row,
								$field->column,
							)
						);
					};
				};
			};
		}

		public function check_for_errors()
		{
			for ( $i=0; $i < count($this->row_field_model_array); $i++ ) 
			{ 
				$row = $this->row_field_model_array[$i];
				for ( $j=0; $j < count($row); $j++ ) 
				{
					$field = $row[$j];
					if ($field->print_errors() != "")
					{
						$this->error_compilation_string .= $field->print_errors() . "<br>";
					};
				};
			};

			if ($this->error_compilation_string != "") 
			{
				new Error_generic($this->root_folder, "", $this->error_compilation_string);
			};
		}

		public function calcute_movement_type_records()
		{
			$movement_type_values = [];
			for ( $i=0; $i < count($this->row_field_model_array); $i++ ) 
			{ 
				$row = $this->row_field_model_array[$i];
				$movement_type = $row[0]->field_value;
				array_push($movement_type_values, $movement_type);
			};
			
			$movement_type_count = array_count_values($movement_type_values);
			
			$this->ma_count = isset($movement_type_count["MA"]) ? (string)$movement_type_count["MA"] : "0000000";
			// $this->mv_count = isset($movement_type_count["MV"]) ? (string)$movement_type_count["MV"] : "0000000";
			$this->mv_count = isset($movement_type_count["MM"]) ? (string)$movement_type_count["MM"] : "0000000";
			$this->me_count = isset($movement_type_count["ME"]) ? (string)$movement_type_count["ME"] : "0000000";
			
			$this->ma_count = $this->pad_movement_type_value($this->ma_count);
			$this->mv_count = $this->pad_movement_type_value($this->mv_count);
			$this->me_count = $this->pad_movement_type_value($this->me_count);
			
			$this->generate_records();

		}

		private function pad_movement_type_value($value) 
		{
			while (strlen($value) < 7) 
			{
				 $value = '0' . $value;
			};
			return $value;
	  	}

		private function generate_records() 
		{
			$this->records = "";
			for ( $i=0; $i < count($this->row_field_model_array); $i++ ) 
			{ 
				$row = $this->row_field_model_array[$i];
				$line = "";
				for ( $j=0; $j < count($row); $j++ ) 
				{
					$field = $row[$j];
					$field->complete_field_lenght();
					$line .= $field->field_value;
				};
				$line .= "\n";
				$this->records .= $line;
			};
	  	}
	};
?>