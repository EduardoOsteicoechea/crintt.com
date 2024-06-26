<?php
	include_once "Error_generic.php";
	class Convert_cell_values_to_uppercase_string
	{
		private $new_array;

		public function __construct
		(
			$rows
		)
		{
			$this->new_array = [];

			$row_counter = 0;
			foreach ($rows as $row)
			{
				$cell_counter = 0;
				$new_row_content = [];

				foreach ($row as $cell) 
				{
					array_push($new_row_content, strtoupper((string)$cell));
					// echo "<br>";
					// echo "Row: " . $row_counter . " Cell: " . $cell_counter . ".";
					// echo gettype((string)$cell);
					$cell_counter++;
				};

				array_push($this->new_array, $new_row_content);
				$row_counter++;
			};
		}

		function return_new_row_array()
		{
			return $this->new_array;
		}
	}
?>