<?php
	function page_top($root_folder, $page_name, $description)
	{		
		$style_folder = $root_folder . '_/css/';
		$brand_folder = $root_folder . '_/media/image/brand/';

		return '
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta charset="utf-8">
				<link rel="icon" type="image/x-icon" href="'. $brand_folder .'favicon.webp">

				<title>'. $page_name .'</title>

				<link rel="stylesheet" href="'.$style_folder.'global.css">
				<link rel="stylesheet" href="'.$style_folder.'global_desktop.css">
				<link rel="stylesheet" href="'.$style_folder.'global_tablet.css">
				<link rel="stylesheet" href="'.$style_folder.'global_mobile.css">
				<link rel="stylesheet" href="'.$style_folder.'fonts.css">

				<script src="'.$root_folder.'_/global.js"></script>
				
				<meta name="viewport" content="width=device-width, initial-scale=1.0">

				<meta name="description" content="'.$description.'">
				<meta name="keywords" content="Registros, INTT, Venezuela, Vehículos, Importación">

				<meta name="theme-color" content="#fff">
				<meta name="author" content="Eduardo Osteicoechea">
		';
	};
?>
