<?php
	class styles
	{
		public $markup;

		public function __construct
		(
			$css_file_name_array,
			$component_id,
			$component_folder
		)
		{
			$this->markup =  '';
			for ($i=0; $i < count($css_file_name_array); $i++) 
			{ 
				$file_name = $css_file_name_array[$i];
				$tag_name = $component_id .'_'.$file_name.'_style_tag';
				
				$this->markup .= '
					<script>
						const '. $tag_name .' = document.createElement("link");
						'. $tag_name .'.setAttribute("rel","stylesheet");
						'. $tag_name .'.setAttribute("href","'. $component_folder .'css/'. $file_name .'.css");
						document.head.appendChild('. $tag_name .');	
					</script>
				';
			};
		}

		public function get_markup_string() 
		{
			return $this->markup;
		}
	}	
?>