<?php
require_once __DIR__ . '/../Models/StaffModel.php';

class StaffController {
    private $staffModel;

    public function __construct() {
        $this->staffModel = new StaffModel();
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $role = trim($_POST['role']);
            $contact = trim($_POST['contact']);

            if (empty($name) || empty($role) || empty($contact)) {
                echo "All fields are required!";
                return;
            }

            $result = $this->staffModel->createStaff($name, $role, $contact);

            if (isset($result['error'])) {
                echo "Error: " . $result['error'];
            } else {
                header("Location: index.php?success=Staff added successfully!");
                exit();
            }
        }
    }

    public function index() {
        return $this->staffModel->getAllStaff();
    }

    public function show($id) {
        $staff = $this->staffModel->getStaffById($id);
        if (!$staff) {
            echo "Staff member not found!";
            return null;
        }
        return $staff;
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $role = trim($_POST['role']);
            $contact = trim($_POST['contact']);

            if (empty($name) || empty($role) || empty($contact)) {
                echo "All fields are required!";
                return;
            }

            $result = $this->staffModel->updateStaff($id, $name, $role, $contact);

            if (isset($result['error'])) {
                echo "Error: " . $result['error'];
            } else {
                header("Location: index.php?success=Staff updated successfully!");
                exit();
            }
        }
    }

    public function delete($id) {
        $result = $this->staffModel->deleteStaff($id);

        if (isset($result['error'])) {
            echo "Error: " . $result['error'];
        } else {
            header("Location: index.php?success=Staff deleted successfully!");
            exit();
        }
    }
}
?>
