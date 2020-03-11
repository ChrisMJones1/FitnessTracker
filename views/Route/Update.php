<?php
//Master Layout Header
require_once "../Master/header.php";
?>

<?php
use fitnessTracker\includes\Database;
use fitnessTracker\includes\Validator;
use fitnessTracker\models\Route\Route;

require_once '../../includes/Database.php';
require_once '../../includes/Validator.php';
require_once '../../models/Route.php';

$errorMessages = ["", "", ""];
$name = "";
$startAddress = "";
$endAddress = "";

//When user lands on this page (refresh or load)
if(isset($_POST['updateRoute'])){
    $id= $_POST['id'];

    //Get the data from the database
    $r = new Route();
    $route = $r->GetById($id);

    //Show the data on the form as default value
    $name =  $route->name;
    $startAddress = $route->start_address;
    $endAddress = $route->end_address;
}

//When the user submits to Update the Route
if (isset($_POST['updRoute'])) {
    $id = $_POST['sid'];
    $name = $_POST['name'];
    $startAddress = $_POST['startAddress'];
    $endAddress = $_POST['endAddress'];

    //Validate the data
    $r = new Route();
    $errorMessages = Validator::ValidateRouteForm($name, $startAddress, $endAddress);
    if ($rt->IsFormValid($errorMessages)) {
        //Update the data on the database
        $r->Update(Database::getDb(), ["name" => $name, "startAddress" => $startAddress, "endAddress" => $endAddress]);
    }
}

?>

<div>
    <!-- Form to Update Route -->
    <form action="" method="post">
        <input type="hidden" name="sid" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>"
                   placeholder="Enter name">
            <div style="color: red">
                <?= $errorMessages[0] ?>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Start Address :</label>
            <input type="text" class="form-control" id="startAddress" name="startAddress"
                   value="<?= $startAddress ?>" placeholder="Enter start address">
            <div style="color: red">
                <?= $errorMessages[1] ?>
            </div>
        </div>
        <div class="form-group">
            <label for="program">End Address :</label>
            <input type="text" class="form-control" id="endAddress" name="endAddress"
                   value="<?= $endAddress ?>" placeholder="Enter end address">
            <div style="color: red">
                <?= $errorMessages[2] ?>
            </div>
        </div>
        <a href="List.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updRoute"
                class="btn btn-primary float-right" id="btn-submit">
            Update Student
        </button>
    </form>
</div>

<?php
//Master Layout Footer
require_once "../Master/footer.php";
?>