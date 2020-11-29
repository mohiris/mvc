<?php
spl_autoload_register(function ($class) {
    // prefix du namespace
    $prefix = 'Core\\';

    // vérifie si la classe est sous le namesapce Core
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0){
        return; // si non on quitte
    }

    // on récupère le nom relatif de la classe
    // On retire le namesapce
    $className = substr($class, $len);

    // On récupère le chemin du dossier Core
    $baseDir = dirname(__DIR__ ) . '/Core/';
    // On forme le chemin du fichier
    $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

    // Si le fichier existe on l'inclue
    if (file_exists($file)) {
        include $file;
    }
});