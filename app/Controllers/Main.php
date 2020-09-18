<?php namespace App\Controllers;	

use CodeIgniter\Controller;
use App\Models\Main_model;

class Main extends BaseController
{

	private $main_model;
	protected $session;

	/*
    |-------------------------------------------------------------------
    | Construct
    |-------------------------------------------------------------------
    | 
    */
	public function __construct() {

        /* Load Model */
		$this->main_model = new Main_Model();
		
		$this->session = \Config\Services::session();
        $this->session->start();
    }

	/*
    |-------------------------------------------------------------------
    | Index
    |-------------------------------------------------------------------
    | 
    */
	function index()
	{
		$data['title'] = 'Codeigniter 4';
		$data['room_list'] = $this->main_model->get_rooms();

		echo view('header', $data);
		echo view('content', $data);
		echo view('footer');
	}

	/*
    |-------------------------------------------------------------------
    | Add Data
    |-------------------------------------------------------------------
    | 
    */
	function add()
	{
		$add = $this->main_model->insert_room();

		if($add) {
			// Success
			$this->modal_feedback('success', 'Success!', 'Data inserted', 'Back');
			return redirect()->to('/'); 
		} else {
			// Failed
			$this->modal_feedback('error', 'Error!', 'Add data failed', 'Try again');
		}
	}

	/*
    |-------------------------------------------------------------------
    | Edit Data
    |-------------------------------------------------------------------
    | 
    */
	function edit($id)
	{
		$edit = $this->main_model->update_room($id);

		if($edit) {
			// Success
			$this->modal_feedback('success', 'Success!', 'Data updated', 'Back');
			return redirect()->to('/');
		} else {
			// Failed
			$this->modal_feedback('error', 'Error!', 'Edit data failed', 'Try again');
		}
	}

	/*
    |-------------------------------------------------------------------
    | Remove Data
    |-------------------------------------------------------------------
    | 
    */
	function remove($id)
	{
		$remove = $this->main_model->delete_room($id);

		if($remove) {
			// Success
			$this->modal_feedback('success', 'Success!', 'Data deleted', 'Back');
			return redirect()->to('/');
		} else {
			// Failed
			$this->modal_feedback('error', 'Error!', 'Delete data failed', 'Try again');
		}
	}

}

