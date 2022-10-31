<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shortcut extends CI_Controller
{
    public function index()
    {
        $this->load->view('shortcut/shortcutkeys');
    }
}
