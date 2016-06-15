<?php
class Checkin_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM checkin");
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $checkins[] = $row;
            }
            return $checkins;
        }
    }

    function getCheckin($idUser, $idTruck) {
      $query = $this->db->query("SELECT * FROM checkin WHERE cliente_id = '$idUser'");
      
         return $query->result();
      
    }

    function createCheckin($new_emp) {

       $idUser   = $new_emp['idUser'];
       $idTruck  = $new_emp['idTruck'];
       $data     = $new_emp['data'];

       $query = "INSERT INTO checkin (cliente_id, food_truck_id, data) VALUES ('$idUser', '$idTruck', '$data')";

       if(!$this->db->query($query)){
          return $this->db->error();
        } else {
          return true;
        }
    }

    function deleteCheckin($idUser, $idTruck) {
        if (!$this->db->query("DELETE FROM checkin WHERE cliente_id='$idUser' and food_truck_id = '$idTruck'")) {
            return $this->db->error();
        } else {
            return true;
        }
    }
} 