<?php
	include_once "Error_generic.php";
	class Numeral_5_fields
	{
		public $root_folder;
		public $fields= 
		[
			["Tipo de movimiento"                                  , 2,  "an", " ", "pos"],
			["Número de registro correlativo de la empresa"        , 7,  "nu", "0", "pre"],
			["Número de modificación"                              , 2,  "nu", "0", "pre"],
			["Marca"                                               , 3,  "an", " ", "pos"],
			["Serie"                                               , 15, "an", " ", "pos"],
			["Modelo"                                              , 15, "an", " ", "pos"],
			["Año modelo"                                          , 4,  "nu", "0", "pre"],
			["Serial de la carrocería"                             , 18, "an", " ", "pos"],
			["Serial del motor"                                    , 18, "an", " ", "pos"],
			["Placa"                                               , 7,  "an", " ", "pos"],
			["Color 1"                                             , 2,  "al", " ", "pos"],
			["Color 2"                                             , 2,  "al", " ", "pos"],
			["Peso tara"                                           , 5,  "nu", "0", "pre"],

			["Tipo de capacidad"                                   , 1,  "nu", "0", "pre"],
			["Capacidad de carga"                                  , 5,  "nu", "0", "pre"],
			["Número de ejes"                                      , 1,  "nu", "0", "pre"],
			["Diámetro de rueda"                                   , 3,  "nu", "0", "pre"],
			["Clase"                                               , 3,  "al", " ", "pos"],
			["Tipo"                                                , 3,  "al", " ", "pos"],
			["Uso"                                                 , 3,  "al", " ", "pos"],
			["Fecha de emisión del certificado"                    , 8,  "nu", "0", "pre"],
			["Código del rif"                                      , 1,  "al", " ", "pos"],
			["Número del rif"                                      , 8,  "nu", "0", "pre"],
			["Dígito del rif"                                      , 1,  "nu", "0", "pre"],
			["Puerto de entrada"                                   , 2,  "al", " ", "pos"],
			["Número de la planilla de liquidación de gravamenes"  , 15, "an", " ", "pos"],
			["Fecha de la planilla de liquidación de gravamenes"   , 8,  "nu", "0", "pre"],

			["Número de la factura de adquisición"                 , 15, "an", " ", "pos"],
			["Fecha de la factura de adquisición"                  , 8,  "nu", "0", "pre"],
			["Número del certificado de origen preimpreso"         , 9,  "an", " ", "pos"],
			["Año de fabricación"                                  , 4,  "nu", "0", "pre"],
			["Serial niv número de identificación vehicular"       , 17, "an", " ", "pos"],
			["Serial del chasis"                                   , 17, "an", " ", "pos"],
			["Número de la factura 1"                              , 15, "an", " ", "pos"],
			["Fecha de la factura 1"                               , 8,  "nu", "0", "pre"],

			["Número de la homologación intt"                      , 15, "an", " ", "pos"],
			["Fecha de la homologación intt"                       , 8,  "nu", "0", "pre"],
			["Servicio"                                            , 3,  "an", " ", "pos"],
			["Número de puestos"                                   , 3,  "nu", "0", "pre"],
			["Número de la ráfaga de la placa refeciv"             , 8,  "an", " ", "pos"],
			["Fecha de la ráfaga"                                  , 8,  "nu", "0", "pre"],
			["Número de secuencia de ráfaga"                       , 2,  "nu", "0", "pre"],
			["Serial carrozado"                                    , 17, "an", " ", "pos"],
			["Tipo de combustible"                                 , 3,  "an", "0", "pre"]
		];

		public function __construct ( string $root_folder)
		{
			$this->root_folder = $root_folder;
		}
	};
?>