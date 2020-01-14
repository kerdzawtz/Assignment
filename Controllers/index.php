<?php

class Index extends Controller
{

	protected $someMember = 1; 

	function __construct()
	{
		// parent::__construct();
        // $this->_someMember =   1; 
	}
	
	
	public function index(){
		try {
			//code...
			$result = $this->someMember * 5;
			print_r($result);
			die('hit');
			// return $this->_someMember * 5; 
			return $this->_someMember; 
		} catch (\Throwable $th) {
			//throw $th;
			print_r($th);
			die('hit');
		}
		//relocate to printCertificate page
		
		// $this->model->relocateToPrintCert();
		
		// $this->view->render('views/index/index.php');
	}
 
    /* public  function __construct() 
    { 
        $this->_someMember =   1; 
    }  */
 
    /* public static function getSomethingStatic() 
    { 
        return $this->_someMember * 5; 
    }  */

}

?>