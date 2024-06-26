<?php
	include_once "Error_generic.php";
	class Field_model
	{
		public $root_folder;
		public $field_name;
		public $field_value;
		public $field_length;
		public $field_type;
		public $field_replacement_character;
		public $field_replacement_character_position;
		public $field_missing_character_number;
		public $field_spare_character_number;
		public $row;
		public $column;
		public $character_overflow_error;
		public $invalid_data_type_error;
		public $movement_type_error;

		public function __construct 
		(
			$root_folder,
			$field_name,
			$field_value,
			$field_length,
			$field_type,
			$field_replacement_character,
			$field_replacement_character_position,
			$field_missing_character_number,
			$field_spare_character_number,
			$row,
			$column
		)
		{
			$this->root_folder = $root_folder;
			$this->field_name = $field_name;
			$this->field_value = $field_value;
			$this->field_length = $field_length;
			$this->field_type = $field_type;
			$this->field_replacement_character = $field_replacement_character;
			$this->field_replacement_character_position = $field_replacement_character_position;
			$this->field_missing_character_number = $field_missing_character_number;
			$this->field_spare_character_number = $field_spare_character_number;
			$this->row = $row;
			$this->column = $column;
			$this->character_overflow_error = "";
			$this->invalid_data_type_error = "";
			$this->movement_type_error = "";
			// $this->complete_field_lenght();
		}
		
		public function complete_field_lenght()
		{
			$new_value = "";
			while (strlen($this->field_value) < $this->field_length) 
			{
				if ($this->field_replacement_character_position == "pre")
				{
					$new_value = $this->field_replacement_character . $this->field_value;
				}
				else
				{
					$new_value = $this->field_value . $this->field_replacement_character;
				};
				$this->field_value = $new_value;
			};
		}

		public function print_errors()
		{
			$errors = "";
			if ($this->character_overflow_error != "") 
			{
				$errors .= $this->character_overflow_error;
			};
			if ($this->invalid_data_type_error != "") 
			{
				$errors .= $this->invalid_data_type_error;
			};
			if ($this->movement_type_error != "") 
			{
				$errors .= $this->movement_type_error;
			};
			
			return $errors;
		}

		public function set_character_overflow_error($message)
		{
			$this->character_overflow_error = $message;
		}

		public function set_invalid_data_type_error($message)
		{
			$this->invalid_data_type_error = $message;
		}

		public function set_movement_type_error($message)
		{
			$this->movement_type_error = $message;
		}
	};
?>