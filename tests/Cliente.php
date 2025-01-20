<?php

namespace Tests;

use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;

class Cliente extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testIndexRoute(): void
    {
        $result = $this->get('/cliente');
        $result->assertStatus(200); // Verifica se a rota responde com status 200
        $result->assertSee('Cadastro de Cliente Bancário'); // Verifica se o texto esperado está na resposta
    }

    public function testSalvarRoute(): void
    {
        $postData = [
            'nome'     => 'Teste Cliente',
            'email'    => 'teste@email.com',
            'telefone' => '123456789',
            'endereco' => 'Rua Teste, 123',
            'cpf'      => '123.456.789-00',
        ];

        $result = $this->post('/cliente/salvar', $postData);
        $result->assertRedirect('/cliente/sucesso'); // Verifica se há redirecionamento para a rota de sucesso
    }

    public function testSucessoRoute(): void
    {
        $result = $this->get('/cliente/sucesso');
        $result->assertStatus(200); // Verifica se a rota responde com status 200
        $result->assertSee('Cliente cadastrado com sucesso!'); // Verifica o texto da tela de sucesso
    }
}
