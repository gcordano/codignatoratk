<?php

namespace App\Controllers;

use App\Models\UserModel;
use Elastic\Elasticsearch\ClientBuilder;

class Login extends BaseController {

protected $client;

public function __construct() {
$this->userModel = new UserModel();
$this->session = session();
$this->client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();
}

public function index() {
$data['session'] = $this->session;
return view('login_view', $data);
}

public function authenticate() {
$username = $this->request->getPost('username');
$password = $this->request->getPost('password');

$user = $this->userModel->where('username', $username)->where('password', $password)->first();

$attempt = [
'username' => $username,
'timestamp' => date('Y-m-d H:i:s'),
'success' => false,
'error' => 'Invalid credentials'
];

if ($user) {
$this->session->set('user_id', $user['id']);
$this->session->set('username', $user['username']);
$attempt['success'] = true;
unset($attempt['error']);
$this->client->index([
'index' => 'login_attempts',
'body' => $attempt
]);
return redirect()->to('/dashboard');
} else {
$this->session->setFlashdata('error', 'Credenciais inválidas. Tente novamente.');
$this->client->index([
'index' => 'login_attempts',
'body' => $attempt
]);
return redirect()->to('/login');
}
}

public function logout() {
$this->session->destroy();
return redirect()->to('/login');
}
}