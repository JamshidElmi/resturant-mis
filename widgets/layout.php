<?php

/*
 * Demo widget
 */
class layout extends Widget {

    public function display($data) {

        if (!isset($data['items'])) {
            $data['items'] = array('Home', 'About', 'Contact', 'Maro');
        }

        $this->view('layouts/header', $data);
    }

}