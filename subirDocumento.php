<?php
if (isset($_FILES['doc'])) {
	move_uploaded_file($_FILES['doc']['tmp_name'],'Documentos/'.$_FILES['doc']['name']);
	 print $_FILES['doc']['name'];
}
?>
