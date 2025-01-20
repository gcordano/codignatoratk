<?php

namespace App\Controllers;

use App\Models\ClienteModel;

class ClienteController extends BaseController
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

    // Método para exibir a tela de controle
    public function controle()
    {
        $clienteModel = new ClienteModel();
        $data['clientes'] = $clienteModel->findAll(); // Busca todos os registros
        return view('cliente_controle', $data); // Passa os dados para a view
    }
    public function editar($id)
{
    $clienteModel = new ClienteModel();

    if ($this->request->getMethod() === 'post') {
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nome'     => $this->request->getPost('nome'),
            'email'    => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'endereco' => $this->request->getPost('endereco'),
            'cpf'      => $this->request->getPost('cpf'),
        ];

        if ($clienteModel->update($id, $data)) {
            return redirect()->to('/cliente/controle')->with('success', 'Cliente atualizado com sucesso!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Falha ao atualizar o cliente.');
        }
    }

    $data['cliente'] = $clienteModel->find($id);

    if (!$data['cliente']) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Cliente com ID $id não encontrado.");
    }

    // Sanitiza os dados antes de enviá-los para a view
    foreach ($data['cliente'] as $key => $value) {
        $data['cliente'][$key] = esc($value, 'html');
    }

    return view('cliente_editar', $data);
}

public function excluir($id)
{
    $clienteModel = new ClienteModel();
    $clienteModel->delete($id);
    return redirect()->to('/cliente/controle');
}

}
