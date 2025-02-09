<?php
require_once __DIR__ . "/../config/database.php";

class StaffModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function checkContactExists($contact) {
        $sql = "SELECT COUNT(*) AS count FROM Staff WHERE Staff_Contact = :contact";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':contact', $contact);
        oci_execute($stmt);

        $row = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);

        return ($row['COUNT'] > 0);
    }

    public function createStaff($name, $role, $contact) {
        try {
            if ($this->checkContactExists($contact)) {
                throw new Exception("Error: The contact number already exists.");
            }

            $sql = "INSERT INTO Staff (Staff_Id, Staff_Name, Staff_Role, Staff_Contact) 
                    VALUES (STAFF_SEQ.NEXTVAL, :name, :role, :contact)";

            $stmt = oci_parse($this->db, $sql);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':role', $role);
            oci_bind_by_name($stmt, ':contact', $contact);

            $result = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

            if (!$result) {
                $error = oci_error($stmt);
                throw new Exception("Error executing query: " . $error['message']);
            }

            oci_free_statement($stmt);
            return $result;
        } catch (Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function getAllStaff() {
        $query = "SELECT * FROM Staff ORDER BY Staff_Id ASC";
        $stmt = oci_parse($this->db, $query);
        oci_execute($stmt);

        $staffList = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $staffList[] = $row;
        }

        oci_free_statement($stmt);
        return $staffList;
    }

    public function getStaffById($id) {
        $sql = "SELECT * FROM Staff WHERE Staff_Id = :id";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':id', $id);
        oci_execute($stmt);

        $result = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);
        return $result;
    }

    public function updateStaff($id, $name, $role, $contact) {
        try {
            $sql = "UPDATE Staff 
                    SET Staff_Name = :name, Staff_Role = :role, Staff_Contact = :contact 
                    WHERE Staff_Id = :id";

            $stmt = oci_parse($this->db, $sql);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':role', $role);
            oci_bind_by_name($stmt, ':contact', $contact);

            $result = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

            if (!$result) {
                $error = oci_error($stmt);
                throw new Exception("Error executing query: " . $error['message']);
            }

            oci_free_statement($stmt);
            return $result;
        } catch (Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function deleteStaff($id) {
        try {
            $sql = "DELETE FROM Staff WHERE Staff_Id = :id";
            $stmt = oci_parse($this->db, $sql);
            oci_bind_by_name($stmt, ':id', $id);

            $result = oci_execute($stmt, OCI_COMMIT_ON_SUCCESS);

            if (!$result) {
                $error = oci_error($stmt);
                throw new Exception("Error executing query: " . $error['message']);
            }

            oci_free_statement($stmt);
            return $result;
        } catch (Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }
}
?>
