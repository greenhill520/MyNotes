<?php
	include_once 'control/control.php';
	modify('topic',array('Score'=> $_REQUEST['score']), $_REQUEST['id']);
?>