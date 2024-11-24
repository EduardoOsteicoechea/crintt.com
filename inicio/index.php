<?php include '../_/global.php'; ?>
<?php include '../_/component/f001/f001.php'; ?>

<?php echo page_top($root_folder, "INTTS", "Registro de motos"); ?>
<?php echo page_body($root_folder, "INTTS", $_SESSION); ?>
	<?php 
		new f001("inicio",$root_folder, $_SESSION); 
	?>
	<?php
		if(isset($_SESSION['error']))
		{
			echo '<p class="error">' . $_SESSION['error'] . '</p>';
			unset($_SESSION['error']);
		}
	?>
<?php echo page_bottom($root_folder, "INTTS", $_SESSION); ?>