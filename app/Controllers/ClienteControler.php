<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use CodeIgniter\Controller;

class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente_form');
    }

    public function salvar()
    {
        $clienteModel = new ClienteModel();

        $data = [
            'nome'     => $this->request->getPost('nome'),
            'email'    => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'endereco' => $this->request->getPost('endereco'),
            'cpf'      => $this->request->getPost('cpf'),
        ];

        $clienteModel->save($data);

        return redirect()->to('/cliente/sucesso');
    }

    public function sucesso()
    {
        return view('sucesso');
    }
}
