<?php
require_once __DIR__ . '/../models/BirthRecordModel.php';

class BirthRecordController {
    private $model;

    public function __construct() {
        $this->model = new BirthRecordModel();
    }

    public function listAll() {
        try {
            return $this->model->getAllBirthRecords();
        } catch (Exception $e) {
            return ["error" => "Failed to fetch records: " . $e->getMessage()];
        }
    }

    public function getById($id) {
        if (!is_numeric($id)) {
            return ["error" => "Invalid ID format."];
        }

        try {
            return $this->model->getBirthRecordById($id);
        } catch (Exception $e) {
            return ["error" => "Failed to fetch record: " . $e->getMessage()];
        }
    }

    public function addRecord($data) {
        if (empty($data['Birth_Record_Id']) || empty($data['DateOfBirth']) || empty($data['TimeOfBirth']) ||
            empty($data['Child_Id']) || empty($data['Doctor_Id']) || empty($data['Hospital_Id']) || empty($data['Staff_Id'])) {
            return ["error" => "Missing required fields."];
        }

        $data['Birth_Record_Id'] = filter_var($data['Birth_Record_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['DateOfBirth'] = filter_var($data['DateOfBirth'], FILTER_SANITIZE_STRING);
        $data['TimeOfBirth'] = filter_var($data['TimeOfBirth'], FILTER_SANITIZE_STRING);
        $data['Child_Id'] = filter_var($data['Child_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['Doctor_Id'] = filter_var($data['Doctor_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['Hospital_Id'] = filter_var($data['Hospital_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['Staff_Id'] = filter_var($data['Staff_Id'], FILTER_SANITIZE_NUMBER_INT);

        try {
            $result = $this->model->addBirthRecord($data);
            if ($result) {
                header("Location:list.php?success=Record Updated Successfully");
                
                exit();
            } else {
                return ["error" => "Failed to add birth record."];
            }
        } catch (Exception $e) {
            return ["error" => "Error occurred: " . $e->getMessage()];
        }
    }

    public function updateRecord($data) {
        if (empty($data['Birth_Record_Id']) || empty($data['DateOfBirth']) || empty($data['TimeOfBirth']) ||
            empty($data['Child_Id']) || empty($data['Doctor_Id']) || empty($data['Hospital_Id']) || empty($data['Staff_Id'])) {
            return ["error" => "Missing required fields."];
        }

        $data['Birth_Record_Id'] = filter_var($data['Birth_Record_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['DateOfBirth'] = filter_var($data['DateOfBirth'], FILTER_SANITIZE_STRING);
        $data['TimeOfBirth'] = filter_var($data['TimeOfBirth'], FILTER_SANITIZE_STRING);
        $data['Child_Id'] = filter_var($data['Child_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['Doctor_Id'] = filter_var($data['Doctor_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['Hospital_Id'] = filter_var($data['Hospital_Id'], FILTER_SANITIZE_NUMBER_INT);
        $data['Staff_Id'] = filter_var($data['Staff_Id'], FILTER_SANITIZE_NUMBER_INT);

        try {
            $result = $this->model->updateBirthRecord($data);
            if ($result) {
                header("Location:list.php?success=Record Updated Successfully");
                
                exit();
            } else {
                return ["error" => "Failed to update birth record."];
            }
        } catch (Exception $e) {
            return ["error" => "Error occurred: " . $e->getMessage()];
        }
    }

    public function deleteRecord($id) {
        if (!is_numeric($id)) {
            return ["error" => "Invalid ID format."];
        }

        try {
            $result = $this->model->deleteBirthRecord($id);
            if ($result) {
                header("Location:list.php?success=Record Updated Successfully");
                
                exit();
            } else {
                return ["error" => "Failed to delete birth record."];
            }
        } catch (Exception $e) {
            return ["error" => "Error occurred: " . $e->getMessage()];
        }
    }

    public function searchByDate($date) {
        try {
            return $this->model->searchByDate($date);
        } catch (Exception $e) {
            return ["error" => "Failed to search records by date: " . $e->getMessage()];
        }
    }

    public function searchByHospital($hospitalId) {
        if (!is_numeric($hospitalId)) {
            return ["error" => "Invalid Hospital ID format."];
        }

        try {
            return $this->model->searchByHospital($hospitalId);
        } catch (Exception $e) {
            return ["error" => "Failed to search records by hospital: " . $e->getMessage()];
        }
    }
}
?>
