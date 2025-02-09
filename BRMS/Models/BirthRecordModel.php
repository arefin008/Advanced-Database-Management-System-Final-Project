<?php
require_once __DIR__ . '/../config/Database.php';

class BirthRecordModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllBirthRecords() {
        $sql = "SELECT * FROM Birth_Records";
        $stmt = oci_parse($this->conn, $sql);
        oci_execute($stmt);

        $records = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $records[] = $row;
        }

        oci_free_statement($stmt);
        return $records;
    }

    public function getBirthRecordById($id) {
        $sql = "SELECT * FROM Birth_Records WHERE Birth_Record_Id = :id";
        $stmt = oci_parse($this->conn, $sql);
        oci_bind_by_name($stmt, ":id", $id);
        oci_execute($stmt);

        return oci_fetch_assoc($stmt);
    }

    public function addBirthRecord($data) {
        $conn = Database::getConnection();
    
        if (empty($data['Birth_Record_Id']) || empty($data['DateOfBirth']) || empty($data['TimeOfBirth']) ||
            empty($data['Child_Id']) || empty($data['Doctor_Id']) || empty($data['Hospital_Id']) || empty($data['Staff_Id'])) {
            echo "Error: Missing required fields.";
            return false;
        }
    
        $date = DateTime::createFromFormat('Y-m-d', $data['DateOfBirth']);
        if (!$date) {
            echo "Error: Invalid date format for DateOfBirth.";
            return false;
        }
        $formattedDate = $date->format('d-M-Y'); 
    
        $sql = "INSERT INTO Birth_Records (Birth_Record_Id, DateOfBirth, TimeOfBirth, Child_Id, Doctor_Id, Hospital_Id, Staff_Id) 
                VALUES (:birth_record_id, TO_DATE(:date_of_birth, 'DD-MON-YYYY'), :time_of_birth, :child_id, :doctor_id, :hospital_id, :staff_id)";
    
        $stmt = oci_parse($conn, $sql);
    
        oci_bind_by_name($stmt, ":birth_record_id", $data['Birth_Record_Id']);
        oci_bind_by_name($stmt, ":date_of_birth", $formattedDate); 
        oci_bind_by_name($stmt, ":time_of_birth", $data['TimeOfBirth']);
        oci_bind_by_name($stmt, ":child_id", $data['Child_Id']);
        oci_bind_by_name($stmt, ":doctor_id", $data['Doctor_Id']);
        oci_bind_by_name($stmt, ":hospital_id", $data['Hospital_Id']);
        oci_bind_by_name($stmt, ":staff_id", $data['Staff_Id']);
    
        $result = oci_execute($stmt);
    
        if (!$result) {
            $e = oci_error($stmt);
            echo "Error: " . $e['message'] . " - SQL Error code: " . $e['code'];
        }
    
        oci_free_statement($stmt);
        oci_close($conn);
    
        return $result;
    }
    
    public function updateBirthRecord($data) {
        $sql = "UPDATE Birth_Records 
                SET DateOfBirth = TO_DATE(:dob, 'YYYY-MM-DD'), 
                    TimeOfBirth = :tob, 
                    Child_Id = :child_id, 
                    Doctor_Id = :doctor_id, 
                    Hospital_Id = :hospital_id, 
                    Staff_Id = :staff_id 
                WHERE Birth_Record_Id = :birth_record_id";
    
        $stmt = oci_parse($this->conn, $sql);
    
        oci_bind_by_name($stmt, ":birth_record_id", $data['Birth_Record_Id']);
        oci_bind_by_name($stmt, ":dob", $data['DateOfBirth']);
        oci_bind_by_name($stmt, ":tob", $data['TimeOfBirth']);
        oci_bind_by_name($stmt, ":child_id", $data['Child_Id']);
        oci_bind_by_name($stmt, ":doctor_id", $data['Doctor_Id']);
        oci_bind_by_name($stmt, ":hospital_id", $data['Hospital_Id']);
        oci_bind_by_name($stmt, ":staff_id", $data['Staff_Id']);
    
        $result = oci_execute($stmt);
    
        if (!$result) {
            $e = oci_error($stmt);
            echo "Error: " . $e['message'] . " - SQL Error code: " . $e['code'];
        }
    
        oci_free_statement($stmt);
        return $result;
    }
    

    public function deleteBirthRecord($id) {
        $sql = "DELETE FROM Birth_Records WHERE Birth_Record_Id = :id";
        $stmt = oci_parse($this->conn, $sql);
        oci_bind_by_name($stmt, ":id", $id);

        return oci_execute($stmt);
    }

    public function searchByDate($date) {
        $conn = Database::getConnection();
    
        $formattedDate = DateTime::createFromFormat('Y-m-d', $date);
        if (!$formattedDate) {
            return ["error" => "Invalid date format. Expected format: YYYY-MM-DD."];
        }
        $oracleDate = $formattedDate->format('d-M-Y'); 
    
        $sql = "SELECT * FROM Birth_Records WHERE DateOfBirth = TO_DATE(:date_of_birth, 'DD-MON-YYYY')";
    
        $stmt = oci_parse($conn, $sql);
        oci_bind_by_name($stmt, ":date_of_birth", $oracleDate);
    
        $result = oci_execute($stmt);
    
        if (!$result) {
            $e = oci_error($stmt);
            return ["error" => "SQL Error: " . $e['message']];
        }
    
        $records = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $records[] = $row;
        }
    
        oci_free_statement($stmt);
        oci_close($conn);
    
        return $records ?: ["error" => "No records found for this date."]; 
    }
    
    

    public function searchByHospital($hospitalId) {
        $sql = "SELECT * FROM Birth_Records WHERE Hospital_Id = :hospital";
        $stmt = oci_parse($this->conn, $sql);
        oci_bind_by_name($stmt, ":hospital", $hospitalId);
        oci_execute($stmt);

        $records = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $records[] = $row;
        }
        return $records;
    }
}
?>
