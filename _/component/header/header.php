<?php
	function page_header
	(
		string $root_folder, 
		string $id, 
		string $page_name
	) 
	{
		$brand_folder = $root_folder . "_/media/image/brand/";

		function anchors_string
		(
			string $root_folder,
			string $page_name,
			string $containing_component_id,
			array  $anchor_name_array
		)
    	{
			$anchors_string = '';

			for ($i=0; $i < count($anchor_name_array); $i++) 
			{ 
				$name = $anchor_name_array[$i];
				if ($name == $page_name) 
				{
					$anchors_string .= '
						<a 
						class="'. $containing_component_id .'_anchor_tag current_location_anchor"
						href="' . $root_folder . $name . '"
						>
							'. ucfirst($name) .'
						</a>
					';
				}
				else if ($name == "contacto") 
				{
					$anchors_string .= '
						<a 
						class="'. $containing_component_id .'_anchor_tag"
						href="#footer"
						>
							'. ucfirst($name) .'
						</a>
					';
				}
				else
				{
					$anchors_string .= '
						<a 
						class="'. $containing_component_id .'_anchor_tag"
						href="' . $root_folder . $name . '"
						>
							'. ucfirst($name) .'
						</a>
					';
				};
			};
				return $anchors_string;
		};
			
		$header = '
			<div
			id="'.$id.'_header"
			class="header"
			>
					<a 
					href="'.$root_folder.'inicio" 
					id="'.$id.'_header_logo_link"
					class="header_logo_link"
					>
						<img 
						src="'.$brand_folder.'logo.webp" 
						id="header_logo_image"
						alt="Logo de Hotel Belensate"
						height="50%"
						>
					</a>
					<div
					id="'.$id.'_header_menu_button"
					class="header_menu_button"
					>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<nav
					id="'.$id.'_header_navigation"
					class="header_navigation"
					>
						'.anchors_string
						(
							$root_folder, 
							$page_name, 
							"header",
							["inicio"]
						).'
					</nav>
					<script>
						const header_style_tag = document.createElement("link");
						header_style_tag.setAttribute("rel","stylesheet");
						header_style_tag.setAttribute("href","'.$root_folder.'_/component/header/style.css");
						document.head.appendChild(header_style_tag);	
					</script>
			</div>
		';

		return $header;
	};
?>