<?php
require_once __DIR__ . '/../config/Database.php';

class DoctorModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection(); 
    }

    public function getAllDoctors() {
        $sql = "SELECT * FROM Doctors";
        $stmt = oci_parse($this->conn, $sql); 

        if (!$stmt) {
            $error = oci_error($this->conn);
            throw new Exception("SQL Parse Error: " . htmlentities($error['message'], ENT_QUOTES));
        }

        oci_execute($stmt); 

        $doctors = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $doctors[] = $row;
        }

        oci_free_statement($stmt);
        return $doctors;
    }

    public function getDoctorById($id) {
        $sql = "SELECT * FROM Doctors WHERE Doctor_Id = :id";
        $stmt = oci_parse($this->conn, $sql);

        oci_bind_by_name($stmt, ':id', $id);
        oci_execute($stmt);

        return oci_fetch_assoc($stmt);
    }

    public function addDoctor($data) {
        $sql = "INSERT INTO Doctors (Doctor_Id, Doctor_FullName, Doctor_Qualification, Doctor_Specification, Doctor_Contact, Doctor_Department, Hospital_Id) 
                VALUES (:DOCTOR_ID, :DOCTOR_FULLNAME, :DOCTOR_QUALIFICATION, :DOCTOR_SPECIFICATION, :DOCTOR_CONTACT, :DOCTOR_DEPARTMENT, :HOSPITAL_ID)";
        
        $stmt = oci_parse($this->conn, $sql);
    
        oci_bind_by_name($stmt, ':DOCTOR_ID', $data['DOCTOR_ID']);
        oci_bind_by_name($stmt, ':DOCTOR_FULLNAME', $data['DOCTOR_FULLNAME']);
        oci_bind_by_name($stmt, ':DOCTOR_QUALIFICATION', $data['DOCTOR_QUALIFICATION']);
        oci_bind_by_name($stmt, ':DOCTOR_SPECIFICATION', $data['DOCTOR_SPECIFICATION']);
        oci_bind_by_name($stmt, ':DOCTOR_CONTACT', $data['DOCTOR_CONTACT']);
        oci_bind_by_name($stmt, ':DOCTOR_DEPARTMENT', $data['DOCTOR_DEPARTMENT']);
        oci_bind_by_name($stmt, ':HOSPITAL_ID', $data['HOSPITAL_ID']);
    
        if (oci_execute($stmt)) {
            oci_free_statement($stmt);
            return true;
        } else {
            $error = oci_error($stmt);
            die("Error inserting doctor: " . htmlentities($error['message']));
        }
    }
    

    public function updateDoctor($data) {
        $sql = "UPDATE Doctors SET 
                    Doctor_FullName = :DOCTOR_FULLNAME, 
                    Doctor_Qualification = :DOCTOR_QUALIFICATION, 
                    Doctor_Specification = :DOCTOR_SPECIFICATION, 
                    Doctor_Contact = :DOCTOR_CONTACT, 
                    Doctor_Department = :DOCTOR_DEPARTMENT, 
                    Hospital_Id = :HOSPITAL_ID
                WHERE Doctor_Id = :DOCTOR_ID";
    
        $stmt = oci_parse($this->conn, $sql);
    
        oci_bind_by_name($stmt, ':DOCTOR_ID', $data['DOCTOR_ID']);
        oci_bind_by_name($stmt, ':DOCTOR_FULLNAME', $data['DOCTOR_FULLNAME']);
        oci_bind_by_name($stmt, ':DOCTOR_QUALIFICATION', $data['DOCTOR_QUALIFICATION']);
        oci_bind_by_name($stmt, ':DOCTOR_SPECIFICATION', $data['DOCTOR_SPECIFICATION']);
        oci_bind_by_name($stmt, ':DOCTOR_CONTACT', $data['DOCTOR_CONTACT']);
        oci_bind_by_name($stmt, ':DOCTOR_DEPARTMENT', $data['DOCTOR_DEPARTMENT']);
        oci_bind_by_name($stmt, ':HOSPITAL_ID', $data['HOSPITAL_ID']);
    
        if (oci_execute($stmt)) {
            oci_free_statement($stmt);
            return true;
        } else {
            $error = oci_error($stmt);
            die("Error updating doctor: " . htmlentities($error['message']));
        }
    }
    
}
?>
