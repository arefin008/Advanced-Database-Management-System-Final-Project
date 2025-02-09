<?php
require_once __DIR__ . "/../config/database.php";

class ChildModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function createChild($full_name, $gender, $dob, $birth_time, $parent_id) {
        $seq_sql = "SELECT CHILD_SEQ.NEXTVAL FROM DUAL";
        $seq_stmt = oci_parse($this->db, $seq_sql);
        oci_execute($seq_stmt);
        $seq_row = oci_fetch_assoc($seq_stmt);
        $child_id = $seq_row['NEXTVAL']; 
        oci_free_statement($seq_stmt);
    
        $sql = "INSERT INTO Childs (Child_Id, Child_Full_Name, Child_Gender, Child_Dob, Child_BirthTime, Parent_Id) 
                VALUES (:child_id, :full_name, :gender, TO_DATE(:dob, 'YYYY-MM-DD'), :birth_time, :parent_id)";
    
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':child_id', $child_id);
        oci_bind_by_name($stmt, ':full_name', $full_name);
        oci_bind_by_name($stmt, ':gender', $gender);
        oci_bind_by_name($stmt, ':dob', $dob);
        oci_bind_by_name($stmt, ':birth_time', $birth_time);
        oci_bind_by_name($stmt, ':parent_id', $parent_id);
    
        $result = oci_execute($stmt);
    
        if (!$result) {
            $error = oci_error($stmt);
            die("Error executing query: " . $error['message']);
        }
    
        oci_free_statement($stmt);
        return $result;
    }
    
    
    

    public function getAllChildren() {
        $query = "SELECT * FROM Childs";
        $stmt = oci_parse($this->db, $query);
        oci_execute($stmt);

        $children = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $children[] = $row;
        }

        oci_free_statement($stmt);
        return $children;
    }

    public function getChildById($child_id) {
        $sql = "SELECT * FROM Childs WHERE Child_Id = :child_id";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':child_id', $child_id);
        oci_execute($stmt);

        $result = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);
        return $result;
    }

    public function updateChild($child_id, $full_name, $gender, $dob, $birth_time, $parent_id) {
        $sql = "UPDATE Childs SET 
                    Child_Full_Name = :full_name, 
                    Child_Gender = :gender, 
                    Child_Dob = TO_DATE(:dob, 'YYYY-MM-DD'), 
                    Child_BirthTime = :birth_time, 
                    Parent_Id = :parent_id
                WHERE Child_Id = :child_id";

        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':child_id', $child_id);
        oci_bind_by_name($stmt, ':full_name', $full_name);
        oci_bind_by_name($stmt, ':gender', $gender);
        oci_bind_by_name($stmt, ':dob', $dob);
        oci_bind_by_name($stmt, ':birth_time', $birth_time);
        oci_bind_by_name($stmt, ':parent_id', $parent_id);

        $result = oci_execute($stmt);

        if (!$result) {
            $error = oci_error($stmt);
            die("Error executing query: " . $error['message']);
        }

        oci_free_statement($stmt);
        return $result;
    }

    public function deleteChild($child_id) {
        $sql = "DELETE FROM Childs WHERE Child_Id = :child_id";
        $stmt = oci_parse($this->db, $sql);
        oci_bind_by_name($stmt, ':child_id', $child_id);

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
