<?php

class Migrate extends MY_Controller
{

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() === FALSE)
        {
                show_error($this->migration->error_string());
        }
        else
        {
            echo '<body style="background-color: #565656"> <center><div style="width:400px;border-radius:5px;margin-top:200px; background-color: #3a3a3a; padding:10px;"><h1 style="color:#e1e1e1" >Successfully Migrated!</h1><div></center></body>';
        }
    }

}

?>