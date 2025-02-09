<?php
require_once __DIR__ . '/../Models/ParentModel.php';

class ParentController {
    private $parentModel;

    public function __construct() {
        $this->parentModel = new ParentModel();
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $house_no = trim($_POST['house_no']);
            $city = trim($_POST['city']);
            $postal_code = trim($_POST['postal_code']);
            $contact = trim($_POST['contact']);

            if (empty($name) || empty($address) || empty($house_no) || empty($city) || empty($postal_code) || empty($contact)) {
                echo "All fields are required!";
                return;
            }

            $result = $this->parentModel->createParent($name, $address, $house_no, $city, $postal_code, $contact);

            if (isset($result['error'])) {
                echo "Error: " . $result['error'];
            } else {
                header("Location: index.php?success=Parent added successfully!");
                exit();
            }
        }
    }

    public function index() {
        $parents = $this->parentModel->getAllParents();
        return $parents;
    }

    public function show($id) {
        $parent = $this->parentModel->getParentById($id);
        if (!$parent) {
            echo "Parent not found!";
            return null;
        }
        return $parent;
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $house_no = trim($_POST['house_no']);
            $city = trim($_POST['city']);
            $postal_code = trim($_POST['postal_code']);
            $contact = trim($_POST['contact']);

            if (empty($name) || empty($address) || empty($house_no) || empty($city) || empty($postal_code) || empty($contact)) {
                echo "All fields are required!";
                return;
            }

            $result = $this->parentModel->updateParent($id, $name, $address, $house_no, $city, $postal_code, $contact);

            if (isset($result['error'])) {
                echo "Error: " . $result['error'];
            } else {
                header("Location: index.php?success=Parent updated successfully!");
                exit();
            }
        }
    }

    public function delete($id) {
        $result = $this->parentModel->deleteParent($id);

        if (isset($result['error'])) {
            echo "Error: " . $result['error'];
        } else {
            header("Location: index.php?success=Parent deleted successfully!");
            exit();
        }
    }
}
?>
