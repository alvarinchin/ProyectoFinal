<?php $this->load->view("templates/admin/head");?>
<?php 
if (!empty($_REQUEST["_activo"])){
	$this->load->view("templates/admin/nav");
}
?>	
<div id="contents"><?= $contents ?></div>
<?php $this->load->view("templates/admin/footer");?>
<?php $this->load->view("templates/admin/end");?>