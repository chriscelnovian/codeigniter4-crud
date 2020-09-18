<?php namespace App\Models;

use CodeIgniter\Model;

class Main_model extends Model
{
    private $tbl_room;
    private $request;

    public function __construct() 
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $this->tbl_room = $this->db->table('tbl_room');
        $this->request = \Config\Services::request();
    }

    /*
    |-------------------------------------------------------------------
    | Select Data
    |-------------------------------------------------------------------
    | 
    */
	function get_rooms()
	{
        $this->tbl_room->orderBy('name', 'asc');
        $query = $this->tbl_room->get();
        return $query->getResultArray();
    }

    /*
    |-------------------------------------------------------------------
    | Insert Data
    |-------------------------------------------------------------------
    | 
    */
	function insert_room()
	{
        $data = [ 'name' => $this->request->getPost('roomName') ];

        $this->tbl_room->insert($data);
        return $this->db->affectedRows();
    }

    /*
    |-------------------------------------------------------------------
    | Update Data
    |-------------------------------------------------------------------
    | 
    */
	function update_room($id)
	{
        $data = [ 'name' => $this->request->getPost('roomName') ];

        $this->db->transStart();
        $this->tbl_room->set($data);
        $this->tbl_room->where('id', $id); 
        $this->tbl_room->update();
        $this->db->transComplete();

        if ($this->db->affectedRows()) {
            return true;
        } else {
            if ($this->db->transStatus() === false) {
                return false;
            }
            return true;
        }
    }

    /*
    |-------------------------------------------------------------------
    | Delete Data
    |-------------------------------------------------------------------
    | 
    */
	function delete_room($id)
	{
        $this->tbl_room->where('id', $id);
        $this->tbl_room->delete();
        return $this->db->affectedRows();
    }

}