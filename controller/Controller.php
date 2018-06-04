<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    } 
	
	public function invoke()
	{
		if (!isset($_GET['Automobili']))
		{
			
			$automobilis = $this->model->getAutomobili();
			include 'view/Automobili.php';
		}
		else
		{
			
			$automobili = $this->model->getAutomobili($_GET['Automobili']);
			include 'view/viewnek.php';
		}
	}
}

?>