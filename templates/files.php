<?php
/**
* Verification params
*/

switch ($name) {
    case 'puissance4':
        getApk('p4.apk');
        break;

    case 'ruvcom':
        getApk('ruvcom.apk');
        break;


    case 'CV':
        getPdf('CV.pdf');
        break;

    default:
        die("Fichier introuvable.");
        break;
}


/**
* Fonctions
*/
function getPdf($filename) {
    // Create absolute dir
    $file = "../assets/files/".$filename;
    // Check file exist
    if (file_exists($file)) {
        // Different header
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header("Content-length: " . filesize($file));
        // The PDF source is in folder/to/file.pdf
        readfile($file);
        // End
        exit;
    } else {
        die("Fichier introuvable.");
    }
}

function getApk($filename) {
    // Create absolute dir
    $file = "../assets/files/".$filename;
    // Check file exist
    if (file_exists($file)) {
        // Different header
        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.android.package-archive');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header("Content-length: " . filesize($file));
        // This is for memory
        ob_clean();
        flush();
        // The APK source is in folder/to/file.apk
        readfile($file);
        // End
        exit;
    } else {
        die("Fichier introuvable.");
    }
}
?>
