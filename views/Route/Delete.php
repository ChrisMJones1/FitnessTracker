<?php
//Master Layout Header
require_once "../Master/header.php";
?>

<?php
use fitnessTracker\includes\Database;
use fitnessTracker\models\Route\Route;

require_once '../../includes/Database.php';
require_once '../../models/Route.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $r = new Route();
    $r->Delete(Database::getDb(), $id);
}

?>

<?php
//Master Layout Footer
require_once "../Master/footer.php";
?>