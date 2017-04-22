<?php $this->load->view("templates/head");?>
<?php 
if (!empty($_REQUEST["_activo"])){
	$this->load->view("templates/nav");
}
?>	
<div id="contents"><?= $contents ?></div>
<?php $this->load->view("templates/footer");?>
<?php $this->load->view("templates/end");?>