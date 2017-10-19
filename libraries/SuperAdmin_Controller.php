<?php
/**
* MY Base Controller Class
*/
class SuperAdmin_Controller extends FSMIS_Controller
{

    function __construct()
    {
        parent::__construct();

        /* Security Condations */
        if (!$this->session->userdata('user_type')) {
            redirect('login/logout');
        }
        if ($this->session->userdata('user_type') != 'SuperAdmin') {
           redirect('login/logout');
        }
    }
}
 ?>