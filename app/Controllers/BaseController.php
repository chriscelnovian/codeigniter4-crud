<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	/*
    |-------------------------------------------------------------------
    | Feedback Modal Template
    |-------------------------------------------------------------------
    |
    | @param $type      Feedback Type (Success atau Error)
    | @param $title     Feedback Title
    | @param $content   Feedback Message
    | @param $button    Feedback Button Text
    |
    */
    function modal_feedback($type, $title, $desc, $button)
    {
        $message = '
        <div id="modalFeedback" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-confirm">
                <div class="modal-content">
        
                    <!-- Modal Header -->
                    <div class="modal-header-'.$type.'">
                        <div class="icon-box">
                            <i class="material-icons">'. ($type == "success" ? "&#xE876;" : "&#xE5CD;") .'</i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    
                    <!-- Modal Body -->
                    <div class="modal-body text-center">
                        <h4>'.$title.'</h4>	
                        <p>'.$desc.'</p>
                        <button class="btn" data-dismiss="modal">'.$button.'</button>
                    </div>
                    
                </div>
            </div>
        </div>  
        ';

        session()->setFlashdata('modal_message', $message);
    }

}
