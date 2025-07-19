<?php
	include_once "Error_generic.php";
	class Numeral_5_fields
	{ 
		public $root_folder;
		public $fields= 
		[
			["Tipo de movimiento"                                  , 2,  "an", " ", "pos"], // 1
			["Número de registro correlativo de la empresa"        , 7,  "nu", "0", "pre"], // 2
			["Número de modificación"                              , 2,  "nu", "0", "pre"], // 3
			["Marca"                                               , 3,  "an", " ", "pos"], // 4
			["Serie"                                               , 15, "an", " ", "pos"], // 5
			["Modelo"                                              , 15, "an", " ", "pos"], // 6
			["Año modelo"                                          , 4,  "nu", "0", "pre"], // 7
			["Serial de la carrocería"                             , 18, "an", " ", "pos"], // 8
			["Serial del motor"                                    , 18, "an", " ", "pos"], // 9
			["Placa"                                               , 7,  "an", " ", "pos"], // 10
			["Color 1"                                             , 2,  "al", " ", "pos"], // 11
			["Color 2"                                             , 2,  "al", " ", "pos"], // 12
			["Peso tara"                                           , 5,  "nu", "0", "pre"], // 13

			["Tipo de capacidad"                                   , 1,  "nu", "0", "pre"], // 14
			["Capacidad de carga"                                  , 5,  "nu", "0", "pre"], // 15
			["Número de ejes"                                      , 1,  "nu", "0", "pre"], // 16
			["Diámetro de rueda"                                   , 3,  "nu", "0", "pre"], // 17
			["Clase"                                               , 3,  "al", " ", "pos"], // 18
			["Tipo"                                                , 3,  "al", " ", "pos"], // 19
			["Uso"                                                 , 3,  "al", " ", "pos"], // 20
			["Fecha de emisión del certificado"                    , 8,  "nu", "0", "pre"], // 21
			["Código del rif"                                      , 1,  "al", " ", "pos"], // 22
			["Número del rif"                                      , 8,  "nu", "0", "pre"], // 23
			["Dígito del rif"                                      , 1,  "nu", "0", "pre"], // 24
			["Puerto de entrada"                                   , 2,  "al", " ", "pos"], // 25
			["Número de la planilla de liquidación de gravamenes"  , 15, "an", " ", "pos"], // 26
			["Fecha de la planilla de liquidación de gravamenes"   , 8,  "nu", "0", "pre"], // 27

			["Número de la factura de adquisición"                 , 15, "an", " ", "pos"], // 28
			["Fecha de la factura de adquisición"                  , 8,  "nu", "0", "pre"], // 29
			["Número del certificado de origen preimpreso"         , 9,  "an", " ", "pos"], // 30
			["Año de fabricación"                                  , 4,  "nu", "0", "pre"], // 31
			["Serial niv número de identificación vehicular"       , 17, "an", " ", "pos"], // 32
			["Serial del chasis"                                   , 17, "an", " ", "pos"], // 33
			["Número de la factura 1"                              , 15, "an", " ", "pos"], // 34
			["Fecha de la factura 1"                               , 8,  "nu", "0", "pre"], // 35

			["Número de la homologación intt"                      , 15, "an", " ", "pos"], // 36
			["Fecha de la homologación intt"                       , 8,  "nu", "0", "pre"], // 37
			["Servicio"                                            , 3,  "an", " ", "pos"], // 38
			["Número de puestos"                                   , 3,  "nu", "0", "pre"], // 39
			["Número de la ráfaga de la placa refeciv"             , 8,  "an", " ", "pos"], // 40
			["Fecha de la ráfaga"                                  , 8,  "nu", "0", "pre"], // 41
			["Número de secuencia de ráfaga"                       , 2,  "nu", "0", "pre"], // 42
			["Serial carrozado"                                    , 17, "an", " ", "pos"], // 43
			["Tipo de combustible"                                 , 3,  "an", "0", "pre"]  // 44
		];

		public function __construct ( string $root_folder)
		{
			$this->root_folder = $root_folder;
		}
	};
?>