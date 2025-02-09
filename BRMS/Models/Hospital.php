<?php
require_once __DIR__ . "/../config/database.php";

class Hospital {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function createHospital($name, $address, $ward) {
        $sql = "INSERT INTO Hospitals (Hospital_Id, Hospital_Name, Hospital_Address, Hospital_Ward) 
                VALUES (HOSPITAL_SEQ.NEXTVAL, :name, :address, :ward) 
                RETURNING Hospital_Id INTO :id";
    
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':name', $name);
        oci_bind_by_name($stmt, ':address', $address);
        oci_bind_by_name($stmt, ':ward', $ward);
        oci_bind_by_name($stmt, ':id', $hospital_id, -1, SQLT_INT);
    
        $result = oci_execute($stmt);
    
        if (!$result) {
            $error = oci_error($stmt);
            die("Error executing query: " . $error['message']);
        }
    
        oci_free_statement($stmt);
        return $hospital_id;
    }
    
    

    public function getAllHospitals() {
        $query = "SELECT * FROM Hospitals";
        $stmt = oci_parse($this->db, $query);
        oci_execute($stmt);

        $hospitals = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $hospitals[] = $row;
        }

        oci_free_statement($stmt);
        return $hospitals;
    }

    public function getHospitalById($hospital_id) {
        $sql = "SELECT * FROM Hospitals WHERE Hospital_Id = :hospital_id";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':hospital_id', $hospital_id);
        oci_execute($stmt);

        $result = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);
        return $result;
    }

    public function updateHospital($id, $name, $address, $ward) {
        $query = "UPDATE hospitals SET Hospital_Name = :name, Hospital_Address = :address, Hospital_Ward = :ward WHERE Hospital_Id = :id";
        
        $stmt = oci_parse($this->db, $query);
    
        oci_bind_by_name($stmt, ':name', $name);
        oci_bind_by_name($stmt, ':address', $address);
        oci_bind_by_name($stmt, ':ward', $ward);
        oci_bind_by_name($stmt, ':id', $id);
    
        $result = oci_execute($stmt);
    
        if (!$result) {
            $error = oci_error($stmt);
            oci_free_statement($stmt);
            return ['error' => 'Failed to update hospital: ' . $error['message']];
        }
    
        oci_free_statement($stmt);
        return ['success' => 'Hospital updated successfully'];
    }
    
    

    public function deleteHospital($hospital_id) {
        $sql = "DELETE FROM Hospitals WHERE Hospital_Id = :hospital_id";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':hospital_id', $hospital_id);

        $result = oci_execute($stmt);

        if (!$result) {
            $error = oci_error($stmt);
            die("Error executing query: " . $error['message']);
        }

        oci_free_statement($stmt);
        return $result;
    }
}
?>
