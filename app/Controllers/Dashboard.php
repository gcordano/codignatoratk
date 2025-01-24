<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller {

public function __construct() {
$this->session = session();
// Verifica se o usuário está logado
if (!$this->session->get('user_id')) {
return redirect()->to('/login');
}
}

public function index() {
return view('dashboard_view');
}
}

