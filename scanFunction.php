<?php
/**
 * Created by PhpStorm.
 * User: worti
 * Date: 07/11/18
 * Time: 11:20
 */

function scan($dir){

    $fichiers = array_values(array_diff(scandir($dir), array('..', '.')));


    foreach ($fichiers as $fichier)
    { ?><ul><?php
        if (is_dir($dir . DIRECTORY_SEPARATOR . $fichier))
        {
            echo "<li class='dir'>" . $fichier . " <a class='supDos' href='?supDos=" . $dir . DIRECTORY_SEPARATOR . $fichier . "'> Supprimer</a> </li>";
            scan($dir . DIRECTORY_SEPARATOR . $fichier);
        }
        else
            {
                if (pathinfo($fichier, PATHINFO_EXTENSION) == "jpg" )
                {
                    echo "<li>" . $fichier . " <a class='supFic' href='?supFic=" . $dir . DIRECTORY_SEPARATOR . $fichier . "'> Supprimer</a> </li>";
                }
                else
                {
                    echo "<li>" . $fichier . " <a  href='?modFic=" . $dir . DIRECTORY_SEPARATOR . $fichier . "'> Modifier</a> <a class='supFic' href='?supFic=" . $dir . DIRECTORY_SEPARATOR . $fichier . "'> Supprimer</a> </li>";
                }

            }
    ?></ul><?php
    }

}
