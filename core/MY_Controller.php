<?php
/**
* MY Base Controller Class
*/
class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        /*load language file*/
        $this->lang->load('dari_lang', 'dari');


    }
}
 ?>