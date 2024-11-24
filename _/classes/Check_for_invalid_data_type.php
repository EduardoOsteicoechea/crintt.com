<?php
	include_once "Error_generic.php";
	function Check_for_invalid_data_type
	(
		$value,
		$type,
		$name,
		$row,
		$column
	)
	{
		$allowed_numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
		$allowed_letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
		$allowed_especial_characters = ['-', '_', '.', '/'];
		$especial_characters = "-_./";

		if ($type == "al")
		{
			for ($i=0; $i < strlen($value); $i++) 
			{ 
				$character = $value[$i];
				if (!(in_array($character, $allowed_letters)))
				{
					$message = "";
					$message .= "<b>Error en la fila " .$row. " columna " .$column. ".</b>";
					$message .= " El campo ".$name." solo admite letras.";
					$message .= " El valor que ingresó fue: \"" .$value. "\".";
					$message .= " Ingrese un valor que solo contenga letras.";
					$message .= "<br>";
					return $message;
				};
			};
		}
		else if ( $type == "an" )
		{
			for ($i=0; $i < strlen($value); $i++) 
			{ 
				$character = $value[$i];
				if (!(in_array($character, $allowed_numbers)) && !(in_array($character, $allowed_letters)) && !(in_array($character, $allowed_especial_characters)))
				{
					$message = "";
					$message .= "<b>Error en la fila " .$row. " columna " .$column. ".</b>";
					$message .= " El campo ".$name." solo admite letras y estos caracteres especiales: ".$especial_characters.".";
					$message .= " El valor que ingresó fue: \"" .$value. "\".";
					$message .= " Ingrese un valor que solo contenga letras o alguno de estos caracteres especiales: ".$especial_characters.".";
					$message .= "<br>";
					return $message;
				};
			};
		}
		else if ($type == "nu")
		{
			for ($i=0; $i < strlen($value); $i++) 
			{ 
				$character = $value[$i];
				if (!(in_array($character, $allowed_numbers)))
				{
					$message = "";
					$message .= "<b>Error en la fila " .$row. " columna " .$column. ".</b>";
					$message .= " El campo ".$name." solo admite números.";
					$message .= " El valor que ingresó fue: \"" .$value. "\".";
					$message .= " Ingrese un valor que solo contenga numeros.";
					$message .= "<br>";
					return $message;
				};
			};
		};
	}
?>