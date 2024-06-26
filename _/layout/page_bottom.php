<?php
    function page_bottom($root_folder, $page_name, $description)
    {
		include $root_folder . '_/component/footer/footer.php';

		return 
			page_footer
			(
				$root_folder,
				'',
				"hero/hero_1.jpg",
				"Nos alegra verte llegar ...",
				"Contáctanos",
				"#",
				"Reserva",
				"reservar",
				"Hotelbelensate.com<sup>&copy;</sup> 2024 todos los derechos reservados",
				"No ofrecemos alojamiento para mascotas"
			).'
			</body>
			</html>
		';
    };
?>