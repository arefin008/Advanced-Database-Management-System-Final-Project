<?php
require_once __DIR__ . '/../Models/Hospital.php';

class HospitalController {
    private $hospitalModel;

    public function __construct() {
        $this->hospitalModel = new Hospital();
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $ward = trim($_POST['ward']);

            if (empty($name) || empty($address) || empty($ward)) {
                echo "All fields are required!";
                return;
            }

            $result = $this->hospitalModel->createHospital($name, $address, $ward);

            if (isset($result['error'])) {
                echo "Error: " . $result['error'];
            } else {
                header("Location: index.php?success=Hospital added successfully!");
                exit();
            }
        }
    }

    public function index() {
        return $this->hospitalModel->getAllHospitals();
    }

    public function show($id) {
        $hospital = $this->hospitalModel->getHospitalById($id);
        if (!$hospital) {
            echo "Hospital not found!";
            return null;
        }
        return $hospital;
    }
    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $ward = trim($_POST['ward']);
            
            $name = htmlspecialchars($name);
            $address = htmlspecialchars($address);
            $ward = htmlspecialchars($ward);
    
            if (empty($name) || empty($address) || empty($ward)) {
                echo "All fields are required!";
                return;
            }
    
            $result = $this->hospitalModel->updateHospital($id, $name, $address, $ward);
    
            if (isset($result['error'])) {
                echo "Error: " . $result['error'];
            } else {
                header("Location: index.php?success=Hospital updated successfully!");
                exit();
            }
        }
    }
    
    
    

    public function delete($id) {
        $result = $this->hospitalModel->deleteHospital($id);

        if (isset($result['error'])) {
            echo "Error: " . $result['error'];
        } else {
            header("Location: index.php?success=Hospital deleted successfully!");
            exit();
        }
    }
}
?>
