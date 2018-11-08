<?php include('inc/head.php'); ?>

<?php require 'scanFunction.php'; ?>

<h1>Liste des dossiers et fichiers</h1>

<?php
$dir = 'files';
$test = scan($dir);

if (isset($_POST['modifier']) == "Modifier")
{
    $file = $_POST['truc'];
    $modif = fopen($file, "w");
    fwrite($modif, $_POST['contenu']);
    fclose($modif);
}
if (isset($_GET['supFic']))
{
    unlink($_GET['supFic']);
    header('Location: index.php');
}
if (isset($_GET['supDos']))
{
    $objets = scandir($_GET['supDos']); // on scan le dossier pour récupérer ses objets

    foreach ($objets as $objet)
        {
            if ($objet != "." && $objet != "..")
            {
                unlink($_GET['supDos'] . DIRECTORY_SEPARATOR . $objet); // on supprime l'objet
            }
        }
    rmdir($_GET['supDos']); // on supprime le dossier
    header('Location: index.php');
}
if (isset($_GET['modFic']))
{
    $contenu = file_get_contents($_GET['modFic']);
?>

<h1>Modifier un fichier</h1>
     <form method="POST" action="index.php">
         <textarea class="textarea" name="contenu" id="contenu" ><?php if (isset($_GET['modFic'])) {echo $contenu;} ?></textarea>
         <input type="hidden" value="<?php echo $_GET['modFic'] ?>" name="truc"/>
         <input type="submit" value="Modifier" name="modifier" id="modifier"/>
    </form>

<?php } ?>
<?php include('inc/foot.php'); ?>