<?php
	include_once "Error_generic.php";
	function Check_for_repeated_cell_data
	(
		$rows
	)
	{
			$row_array = [];
			$fields_with_unique_values = [1,7,8,9,29,31,32,42];
			$fields_with_unique_values_names = [
				"Número de registro correlativo de la empresa",
				"Serial de carrocería",
				"Serial del motor",
				"Placa",
				"Número del certificado de origen",
				"Serial N.I.V.",
				"Serial del chasis",
				"Serial carrozado"
			];
			// echo count($rows);

			for ($i=0; $i < count($fields_with_unique_values); $i++) 
			{ 
				$column_array = [];
				for ($j=0; $j < count($rows); $j++) 
				{ 
					array_push($column_array, $rows[$j][$fields_with_unique_values[$i]]);
				};
				array_push($row_array, $column_array);
			};

			// print_r($row_array);
			// echo "<br><br>";

			$repetition_array = [];
			$repetition_rows_and_columns = [];

			$error_inicial = "";

			for ($i=0; $i < count($row_array); $i++) 
			{ 
				$array = $row_array[$i];
				$counts = array_count_values($array);
				$repeated_value = [];
				$repetition_row_and_column = [];
				for ($j=0; $j < count($array); $j++) 
				{
					if($counts[$array[$j]] > 1) 
					{
						$error_inicial .= "<b>Error en " . $fields_with_unique_values_names[$i] . ": </b>";
						$error_inicial .= "El valor \"".$array[$j]."\" se repite " . ($counts[$array[$j]] - 1) . " veces. ( ";
						$error_inicial .= "Fila: " . ($j + 1) . ", " . "Celda: " . ($fields_with_unique_values[$i] + 1) . ". ) <br>";
						
						$repetition_location = "Fila: " . $j . ", " . "Celda: " . ($fields_with_unique_values[$i] + 1) . ". ";
						// echo "<br>";
						// echo  "Fila: " . $j . ", " . "Celda: " . ($fields_with_unique_values[$i] + 1) . ".";
						// echo "El valor ".$array[$j]." se repite " . ($counts[$array[$j]] - 1) . " veces\n";
						array_push( $repeated_value, $array[$j]);
						array_push( $repetition_row_and_column, $repetition_location);
					};
				};

				if(count($repeated_value) > 0)
				{
					array_push($repetition_array, $repeated_value);	
					array_push($repetition_rows_and_columns, $repetition_row_and_column);		
					$error_inicial .= "<br>";
				};	
			};

			
			if ($error_inicial != "")
			{
				return $error_inicial;
				// new Error_generic($root_folder, "", $error_inicial);
			};
			// echo "<br><br>";
			// print_r($repetition_array);

			// echo "<br><br>";
			// print_r($repetition_rows_and_columns);

			// if (count($repetition_array) > 0)
			// {
			// 	$element_and_locations_array = array();

			// 	for ($i=0; $i < count($repetition_array); $i++) 
			// 	{ 
			// 		for ($j=0; $j < count($repetition_array[$i]); $j++) 
			// 		{ 
			// 			$new_associative_array = [];
			// 			$new_associative_array[$repetition_array[$i][$j]] = $repetition_rows_and_columns[$i][$j];
			// 			array_push($element_and_locations_array,$new_associative_array);
			// 		};
			// 	};

				// echo "<br><br>";
				// print_r($element_and_locations_array);

				// $result = array();
				// foreach($element_and_locations_array as $sub_array) 
				// {
				// 	foreach($sub_array as $key => $value) 
				// 	{
				// 		$result[$key][] = $value;
				// 	};
				// };
				// echo "<br><br>";
				// print_r($result);

				// $error = "";

				// echo "<br><br>";
				// print_r($repetition_array);

				// for ($i=0; $i < count($repetition_array); $i++) 
				// {
				// // echo "<br><br>";
				// 	$repeated_elements = array_count_values($repetition_array[$i]);
				// 	print_r($repeated_elements);

				// 	$keys = array_keys($repeated_elements);	
				// 	echo "<br><br>";
				// 	print_r($keys);

				// 	echo "<br><br>";
				// 	for($i = 0; $i < count($keys); $i++) 
				// 	{
				// 		$location = "";
				// 		$counter = 1;
				// 		foreach ($result[$keys[$i]] as $key => $value) 
				// 		{
				// 			$location .= " (" . $counter . ") " . $value . " ";
				// 			$counter++;
				// 		};
						
				// 		$error .= "El valor: <span><b>\"" . $keys[$i] . "\" se repite " . $repeated_elements[$keys[$i]] . " veces</b></span> (".$location.").<br><br>";
				// 	};
				// };

				// echo "<br><br>";
				// echo $error;
				// new Error_generic($root_folder, "", $error);
			// };

		
	}
?>