<?php
require_once __DIR__ . '/../Models/ChildModel.php';

class ChildController {
    private $childModel;

    public function __construct() {
        $this->childModel = new ChildModel();
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $full_name = $_POST['full_name'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $birth_time = $_POST['birth_time'];
            $parent_id = $_POST['parent_id'];

            $this->childModel->createChild($full_name, $gender, $dob, $birth_time, $parent_id);
            header("Location: index.php"); 
            exit();
        }
    }

    public function index() {
        return $this->childModel->getAllChildren();
    }

    public function show($child_id) {
        return $this->childModel->getChildById($child_id);
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $child_id = $_POST['child_id'];
            $full_name = $_POST['full_name'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $birth_time = $_POST['birth_time'];
            $parent_id = $_POST['parent_id'];

            $this->childModel->updateChild($child_id, $full_name, $gender, $dob, $birth_time, $parent_id);
            header("Location: index.php");
            exit();
        }
    }

    public function delete($child_id) {
        $this->childModel->deleteChild($child_id);
        header("Location: index.php");
        exit();
    }
}
?>
