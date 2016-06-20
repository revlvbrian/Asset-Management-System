<?php

require_once('lib.php');

insertContent($_POST['asset_name'], $_POST['serial_no'], $_POST['asset_type']);

header("Location: add-asset.php");
exit();

?>