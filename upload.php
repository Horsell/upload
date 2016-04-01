
<?php
// Test si le fichier a été envoyer + test si erreur lors de l'envoi du fichier.
if (isset($_FILES['upload']) and $_FILES['upload'][error] == 0)
{
	//Test que la taille du fichier ne dépasse pas 1mo.
	if ($_FILES['upload'][size] = 2000000)
	{
		// Test que l'extension du fichier est conforme a nos attentes.
		$infosFichier = pathinfo($_FILES['upload']['name']);
		$extension_upload = $infosFichier['extension'];
		$extension_autorise = array('gif', 'jpeg', 'png', 'jpg');

		if (in_array($extension_upload, $extension_autorise))
		{
			move_uploaded_file($_FILES['upload']['tmp_name'], 'uploads/' . basename($_FILES['upload']['name']));
			echo "Envoyé !";
		}
		else echo "Erreur, Merci de recommencer ...";
	}
	else
		echo "Taille du fichier trop grand.";
}
else
echo "Aucun fichier choisis !";
?>
<?php include ('footer.php'); ?>