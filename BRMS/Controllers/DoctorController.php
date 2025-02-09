<?php
require_once __DIR__ . '/../models/DoctorModel.php';

class DoctorController {
    private $doctorModel;

    public function __construct() {
        $this->doctorModel = new DoctorModel();
    }

    public function getDoctorModel() {
        return $this->doctorModel;
    }
    public function index() {
        $doctors = $this->doctorModel->getAllDoctors();
        include __DIR__ . '/../views/doctors/index.php';
    }

    public function view($id) {
        $doctor = $this->doctorModel->getDoctorById($id);
        include __DIR__ . '/../views/doctors/view.php';
    }

    public function create() {
        include __DIR__ . '/../views/doctors/create.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'id' => $_POST['Doctor_Id'],
                'name' => $_POST['Doctor_FullName'],
                'qualification' => $_POST['Doctor_Qualification'],
                'specification' => $_POST['Doctor_Specification'],
                'contact' => $_POST['Doctor_Contact'],
                'department' => $_POST['Doctor_Department'],
                'hospital_id' => $_POST['Hospital_Id']
            ];
            $this->doctorModel->addDoctor($data);
            header("Location: index.php");
        }
    }

    public function edit($id) {
        $doctor = $this->doctorModel->getDoctorById($id);
        include __DIR__ . '/../views/doctors/edit.php';
    }

    public function update() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'id' => $_POST['Doctor_Id'],
                'name' => $_POST['Doctor_FullName'],
                'qualification' => $_POST['Doctor_Qualification'],
                'specification' => $_POST['Doctor_Specification'],
                'contact' => $_POST['Doctor_Contact'],
                'department' => $_POST['Doctor_Department'],
                'hospital_id' => $_POST['Hospital_Id']
            ];
            $this->doctorModel->updateDoctor($data);
            header("Location: index.php");
        }
    }

    public function delete($id) {
        $this->doctorModel->deleteDoctor($id);
        header("Location: index.php");
    }
}
?>
