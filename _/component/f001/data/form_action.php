<?php
	$root_folder = "../../../";
	require '../../../../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\IOFactory;
	require_once "../../../classes/Check_for_empty_xlsx.php";
	require_once "../../../classes/Check_for_invalid_column_number.php";
	require_once "../../../classes/Check_for_repeated_cell_data.php";
	require_once "../../../classes/Convert_cell_values_to_uppercase_string.php";
	require_once "../../../classes/Capture_row_data_as_field_model_array.php";

	session_start();
	$rows = [];

	$file_name = $_FILES['file']['name'];
	$file_path = $_FILES['file']['full_path'];
	$file_temporary_storage = $_FILES['file']['tmp_name'];

	if(strpos($file_path, ".xlsx"))
	{
		$spreadsheet = IOFactory::load($file_temporary_storage);
		$worksheet = $spreadsheet->getActiveSheet();

		foreach ($worksheet->getRowIterator() as $row) 
		{
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false); 
			$cells = [];
			foreach ($cellIterator as $cell) 
			{
				$cells[] = $cell->getValue();
			}
			$rows[] = $cells;
		};
	}
	else
	{
		$_SESSION['error'] = "El archivo que seleccionó no tenía una extensión .xlsx. seleccione un archivo de extensión .xlsx que posea las características requeridas por esta aplicación.";

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;
	};

	////////////////////////////////////////////////
	////////////////////////////////////////////////
	// Convert all cell data to uppercase strings.
	////////////////////////////////////////////////
	////////////////////////////////////////////////

	$convert_cell_values_to_uppercase_string = new Convert_cell_values_to_uppercase_string($rows);
	$rows = $convert_cell_values_to_uppercase_string->return_new_row_array();

	////////////////////////////////////////////////
	////////////////////////////////////////////////
	// Extensive verification of each cell data
	////////////////////////////////////////////////
	////////////////////////////////////////////////

	new Check_for_empty_xlsx($root_folder, $rows);
	new Check_for_invalid_column_number($root_folder, $rows);

	////////////////////////////////////////////////
	////////////////////////////////////////////////
	// Model all rows and capture character_overflow, 
	// unallowed_character and movement_type errors
	// inside that model
	////////////////////////////////////////////////
	////////////////////////////////////////////////

	$modeled_fields = new Capture_row_data_as_field_model_array($root_folder, $rows);
	$modeled_fields->check_for_errors();
	$modeled_fields->calcute_movement_type_records();	

	////////////////////////////////////////////////
	////////////////////////////////////////////////
	// Generate .txt lines
	////////////////////////////////////////////////
	////////////////////////////////////////////////

	function pad_value($value, $character_quantity) 
	{
		while (strlen($value) < $character_quantity) 
		{
				$value = '0' . $value;
		};
		return $value;
	};

	$ship_number = pad_value($_POST["ship_number"],7);
	$date = $_POST["date"];
	$hour = $_POST["hour"];

	$first_line = "RE";
	$first_line .= "LU";
	$first_line .= $ship_number;
	$first_line .= $date;
	$first_line .= $hour;
	$first_line .= "CSK MOTOS IMPORT C.A.-----------------------------";
	$first_line .= "MDMVP122";
	// $first_line .= "20231231"; // Original value
	// $first_line .= "20241231"; // change requested on 2024-06-26
	$first_line .= "20251231"; // change requested on 2025-01-18
	$first_line .= "--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
	$first_line .= "*\n";
	$first_line = str_replace("-", " ", $first_line);
	
	$file_body = $modeled_fields->records;

	$last_line = "RC" . $modeled_fields->ma_count . $modeled_fields->mv_count . $modeled_fields->me_count;

	$content = $first_line . $file_body . $last_line;

	////////////////////////////////////////////////
	////////////////////////////////////////////////
	// .txt file creation
	////////////////////////////////////////////////
	////////////////////////////////////////////////

	//Create a new file with a unique name in the system's temporary directory
	$temp_file = tempnam(sys_get_temp_dir(), 'txt');
	file_put_contents($temp_file, $content);

	//Set headers to prompt the download
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename('registros.txt').'"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($temp_file));

	// Clear output buffer
	ob_clean();

	// Flush the output buffer
	flush();

	// Read the file and send it to the user
	readfile($temp_file);

	// Delete the temporary file
	unlink($temp_file);

	// End the script to prevent sending any additional data
	exit;
?>