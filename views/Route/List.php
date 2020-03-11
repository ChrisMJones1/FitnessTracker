<?php
//Master Layout Header
require_once "../Master/header.php";
?>

<?php
use fitnessTracker\includes\Database;
use fitnessTracker\models\Route\Route;

require_once '../../includes/Database.php';
require_once '../../models/Route.php';

$dbcon = Database::GetDb();
$r = new Route();
$routes =  $r->GetAll(Database::getDb());

?>
<div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Start Address</th>
            <th scope="col">End Address</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($routes as $route) {
            ?>
            <tr>
                <th><?= $route->name; ?></th>
                <th><?= $route->start_address; ?></th>
                <th><?= $route->end_address; ?></th>
                <td>
                    <form action="Update.php" method="post">
                        <input type="hidden" name="id" value="<?= $route->id; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateRoute" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="Delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $route->id; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteRoute" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="Add.php" id="btn_addRoute" class="btn btn-success btn-lg float-right">Add Route</a>
</div>

<div id="map">
</div>

<?php
//Master Layout Footer
require_once "../Master/footer.php";
?>