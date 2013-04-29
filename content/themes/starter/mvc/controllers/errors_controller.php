<?php

class ErrorsController extends ChesterBaseController {

	public function show404Page(){

		$page = (object) array(
			'title' => 'Looks like something went wrong',
			'content' => 'We couldn\'t find what you were looking for.'
		);

		// Render the page
		echo $this->renderPage('404', array(
	    	'page' => $page
	  	));
	}

}

?>
