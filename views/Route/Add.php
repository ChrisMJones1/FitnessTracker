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

//Check to see if form is submitted
if (isset($_POST['addRoute'])) {
    //get the data from the form
    $name = $_POST['name'];
    $startAddress = $_POST['startAddress'];
    $endAddress = $_POST['endAddress'];

    //Check the validation
    $r = new Route();
    $errorMessages = Validator::ValidateRouteForm($name, $startAddress, $endAddress);
    if (Validator::IsFormValid($errorMessages)) {
        $r->Add(Database::getDb(), ["name" => $name, "startAddress" => $startAddress, "endAddress" => $endAddress]);
    }
}

?>

<div>
    <!-- Form to Add Route -->
    <form action="" method="post">
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
        <button type="submit" name="addRoute"
                class="btn btn-primary float-right" id="btn-submit">
            Add Route
        </button>
    </form>
</div>


<?php
//Master Layout Footer
require_once "../Master/footer.php";
?>