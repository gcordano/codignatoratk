<?php

namespace App\Controllers;

class JogoDaVelhaController extends BaseController
{
    public function index()
    {
        $data['tabuleiro'] = session('tabuleiro') ?? [
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ];

        $data['jogadorAtual'] = session('jogadorAtual') ?? 'X';
        $data['vencedor'] = session('vencedor') ?? null;

        return view('jogo_da_velha', $data);
    }

    public function jogar()
    {
        $linha = $this->request->getPost('linha');
        $coluna = $this->request->getPost('coluna');

        $tabuleiro = session('tabuleiro') ?? [
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ];
        $jogadorAtual = session('jogadorAtual') ?? 'X';
        $vencedor = session('vencedor') ?? null;

        if ($vencedor || $tabuleiro[$linha][$coluna] !== '') {
            return redirect()->back();
        }

        $tabuleiro[$linha][$coluna] = $jogadorAtual;
        $vencedor = $this->verificarVencedor($tabuleiro);
        $jogadorAtual = ($jogadorAtual === 'X') ? 'O' : 'X';

        session()->set('tabuleiro', $tabuleiro);
        session()->set('jogadorAtual', $jogadorAtual);
        session()->set('vencedor', $vencedor);

        return redirect()->to('/jogo-da-velha');
    }

    public function reiniciar()
    {
        session()->remove('tabuleiro');
        session()->remove('jogadorAtual');
        session()->remove('vencedor');

        return redirect()->to('/jogo-da-velha');
    }

    private function verificarVencedor($tabuleiro)
    {
        for ($i = 0; $i < 3; $i++) {
            if ($tabuleiro[$i][0] && $tabuleiro[$i][0] === $tabuleiro[$i][1] && $tabuleiro[$i][1] === $tabuleiro[$i][2]) {
                return $tabuleiro[$i][0];
            }
            if ($tabuleiro[0][$i] && $tabuleiro[0][$i] === $tabuleiro[1][$i] && $tabuleiro[1][$i] === $tabuleiro[2][$i]) {
                return $tabuleiro[0][$i];
            }
        }

        if ($tabuleiro[0][0] && $tabuleiro[0][0] === $tabuleiro[1][1] && $tabuleiro[1][1] === $tabuleiro[2][2]) {
            return $tabuleiro[0][0];
        }
        if ($tabuleiro[0][2] && $tabuleiro[0][2] === $tabuleiro[1][1] && $tabuleiro[1][1] === $tabuleiro[2][0]) {
            return $tabuleiro[0][2];
        }

        foreach ($tabuleiro as $linha) {
            foreach ($linha as $celula) {
                if ($celula === '') {
                    return null;
                }
            }
        }

        return 'Empate';
    }
}
