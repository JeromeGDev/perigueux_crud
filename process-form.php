<?php
if ( $_SERVER["REQUEST_METHOD"] !== "POST" ){
    exit( "POST request method required" );
}
if ( empty($_FILES) ) {
    exit( "$_FILES is empty - is file_uploads enabled in php.ini?" );
}
if ( $_FILES["imageUploaded"]["error"] !== UPLOAD_ERR_OK ) {
    switch ( $_FILES["image"]["error"] ){
        case UPLOAD_ERR_INI_SIZE:
            exit( "The uploaded file exceeds the upload_max_filesize directive in php.ini" );
            break;
        case UPLOAD_ERR_FORM_SIZE:
            exit( "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTMLform" );
            break;
        case UPLOAD_ERR_PARTIAL:
            exit( "The uploaded file was only partially uploaded" );
            break;
        case UPLOAD_ERR_NO_FILE:
            exit( "No file was uploaded" );
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            exit( "Temporary folder not found" );
            break;
        case UPLOAD_ERR_CANT_WRITE:
            exit( "Failed to write file to disk" );
            break;
        case UPLOAD_ERR_EXTENSION:
            exit( "File upload stopped by PHP extension" );
            break;
        default:
            exit( "Unknown upload error" );
            break;
    }
}

// pour limiter la taille des fichiers téléchargés
if ( $_FILES["imageUploaded"]["size"] > 6048576 ){ // 1045876 = 1Mb
    exit( "The uploaded file exceeds the upload_max_filesize directive that was specified in the HTMLform" );
}

////// Pour limiter les formats autorisés en téléchargement
// construit un nouvel objet pour obtenir le flag mime_type
$finfo = new finfo(FILEINFO_MIME_TYPE);
// on applique la méthode pour récupérer le type du fichier en passant la variable dans le dossier temporaire (tableau temp_name (obtenu avec var_dump))
$mime_type = $finfo->file( $_FILES["imageUploaded"]["tmp_name"] );

if ( $finfo->file( $_FILES["imageUploaded"]["tmp_name"]) ){
}
//Définit les types autorisés
$mime_type = ["image/gif","image/png","image/jpeg"];
// Vérifie le respect des types de fichiers
if ( !in_array($_FILES["imageUploaded"]["type"], $mime_type) ){
    exit( "The uploaded file is not of a supported image type" );
}

//// transfert du fichier dans le bon répertoire : ici dans le répartoir assets/img
// récupération du nom du fichier du dossier temporaire, dans une variable
//$filename = $_FILES["imageUploaded"]["name"]; // problème de sécurité à cause des caractères possibles, par exemple avec un / qui changerait le dossier de destination
// il faut donc modifier le comportement de manière à supprimer les "mauvais caractères" pour les remplace par des caractères autorisés comme le _
/// Sécuriser : Etape 1 spliter le $_FILES["imageUploaded"]["name"]
$pathinfo = pathinfo( $_FILES["imageUploaded"]["name"] ); // split le filename en plusieurs parties
$base = $pathinfo["filename"]; // renvoie le nom du fichier sans son extension
//$base = preg_replace( "/[^\w]/" , "_" , $base); // remplace tous les caractères non alphanumériques par un _ // OU VOIR EN BAS DEPAGE POUR CREER UN NOM UNIQUE

$filename = $base. "." .time() . rand(1,1000). "." . $pathinfo["extension"];
// récupération du répertoire de destination dans une variable
$destination = __DIR__ . "/assets/img/" . $filename;

$filename = $base . "." . $pathinfo["extension"];
// déplacement du fichier du dossier temporaire dans le dossier de destination
/* ATTENTION : il convient de vérifier que le dossier de destination finale est autorisé en écriture sur le serveur (chmod) & php*/
// Il faut prendre en compte que si le nom du fichier existe déjà, le nouveau fichier téléchargé remplacera celui existant
// pour éviter celà, chaque nom doit être unique, donc, le code ci-dessous devra être remplacé pour le rendre unique
/*if ( !move_uploaded_file($_FILES["imageUploaded"]["tmp_name"], $destination)){
    exit("The uploaded file could not be moved into the final destination folder");
};*/

// Rendre le nom unique (exemple d'une méthode - d'autres peuvent être applicables)
// $i=1;
// // créons une boucle qui vérifie sir le nom de destination existe
// while(file_exists($destination)){
//     // on le rend unique en ajoutant le $i
//     $filename = $base . "($i)." . $pathinfo["extension"];
//     // on défini de nouveau le répertoire de destination et le nom
//     $destination = __DIR__ . "/assets/img/" . $filename;
//     // puis on incrémente la valeur de $i pour que le fichier suivant qui aura le même nom ai un autre index
//     $i++;
// }
// Affiche le message sans redirection : echo ("File uploaded with success");
header('Location: creatures.php?success=1'); // le message de succès est affiché sur la page d'arrivé grâce au ?success=1

// ======================= AUTRE METHODE POUR NOM UNIQUE


