<?php
require_once __DIR__ . "/../config/database.php";

class ParentModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function checkContactExists($contact) {
        $sql = "SELECT COUNT(*) AS count FROM Parents WHERE Parent_Contact = :contact";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':contact', $contact);
        oci_execute($stmt);

        $row = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);

        return ($row['COUNT'] > 0);
    }

    public function createParent($name, $address, $house_no, $city, $postal_code, $contact) {
        try {
            if ($this->checkContactExists($contact)) {
                throw new Exception("Error: The contact number already exists.");
            }

            $sql = "INSERT INTO Parents (Parent_Id, Parent_Full_Name, Parent_Address, House_no, City, Postal_Code, Parent_Contact) 
                    VALUES (PARENT_SEQ.NEXTVAL, :name, :address, :house_no, :city, :postal_code, :contact)";
            
            $stmt = oci_parse($this->db, $sql);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':address', $address);
            oci_bind_by_name($stmt, ':house_no', $house_no);
            oci_bind_by_name($stmt, ':city', $city);
            oci_bind_by_name($stmt, ':postal_code', $postal_code);
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

    public function getAllParents() {
        $query = "SELECT * FROM Parents";
        $stmt = oci_parse($this->db, $query);
        oci_execute($stmt);

        $parents = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $parents[] = $row;
        }

        oci_free_statement($stmt);
        return $parents;
    }

    public function getParentById($id) {
        $sql = "SELECT * FROM Parents WHERE Parent_Id = :id";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':id', $id);
        oci_execute($stmt);

        $result = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);
        return $result;
    }

    public function updateParent($id, $name, $address, $house_no, $city, $postal_code, $contact) {
        try {
            $sql = "UPDATE Parents 
                    SET Parent_Full_Name = :name, Parent_Address = :address, House_no = :house_no, 
                        City = :city, Postal_Code = :postal_code, Parent_Contact = :contact 
                    WHERE Parent_Id = :id";
            
            $stmt = oci_parse($this->db, $sql);
            
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':address', $address);
            oci_bind_by_name($stmt, ':house_no', $house_no);
            oci_bind_by_name($stmt, ':city', $city);
            oci_bind_by_name($stmt, ':postal_code', $postal_code);
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

    public function deleteParent($id) {
        try {
            $sql = "DELETE FROM Parents WHERE Parent_Id = :id";
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
