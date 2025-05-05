<?php
require __DIR__.'/../config/database.php';
require __DIR__.'/../models/SubjectModel.php';
require __DIR__.'/../models/ClaimModel.php';
require __DIR__.'/../models/ResponseModel.php';
require __DIR__.'/../controllers/SubjectController.php';
require __DIR__.'/../controllers/ClaimController.php';

// Ajouter au début de public/index.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Autoload des modèles et contrôleurs
spl_autoload_register(function ($class) {
    $file = __DIR__.'/../'.str_replace('\\', '/', $class).'.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Initialisation des modèles
$db = require __DIR__.'/../config/database.php';
$subjectModel = new SubjectModel($db);
$claimModel = new ClaimModel($db);
$responseModel = new ResponseModel($db);

// Routing basique
$url = $_GET['url'] ?? 'subjects';
$parts = explode('/', $url);

switch($parts[0]) {
    $controller = new SubjectController($subjectModel);
    if(isset($parts[1]) && $parts[1] === 'create') {
        $controller->create();
    } else if(isset($parts[1]) && is_numeric($parts[1])) 
        } else {
            $controller->index();
        }
        break;
        // Modifier le cas 'subjects' pour passer l'ID
case 'subjects':
    $controller = new SubjectController($subjectModel);
    if(isset($parts[1]) && $parts[1] === 'create') {
        $controller->create();
    } else if(isset($parts[1]) && is_numeric($parts[1])) {
        $_GET['id'] = $parts[1]; // Permet de récupérer l'ID dans le controller
        $claimController = new ClaimController($claimModel, $responseModel);
        $claimController->show($parts[1]);
    }
    ...
        case 'claims':
            $claimController = new ClaimController($claimModel, $responseModel);
            if (isset($parts[1]) && $parts[1] === 'response') {
                $claimController->addResponse();
            } else {
                $claimController->create();
            }
            break;
        
    default:
        http_response_code(404);
        echo 'Page non trouvée';
?>