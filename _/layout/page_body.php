<?php
   function page_body($root_folder,$page_name, $session)
   {
		include $root_folder . '_/component/header/header.php';
	   return '
			</head>
			<body>
		 	'.page_header($root_folder, "inicio", "inicio", $session).'
		';
   };
?>