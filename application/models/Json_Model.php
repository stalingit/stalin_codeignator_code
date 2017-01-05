<?php

class Json_Model extends CI_Model {

	// Insert json data into database
	public function insert_json_in_db($json_data) {
		$this->db->insert('employee_info', $json_data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function get() {
		$query = $this->db->get('employee_info');
		return $query;
	}

}

?>

