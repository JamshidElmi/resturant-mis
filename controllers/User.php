<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->template->title = 'مدیریت کاربران';
	}

	public function index()
	{
        $this->template->description = 'ایجاد حساب کاربری جدید';

		$this->template->content->view('users/new_user_form');
        $this->template->publish();
	}
}
