<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CalculadoraController extends Controller
{
    public function index()
    {
        return view('calculadora');
    }

    public function calcular()
    {
        $numero1 = $this->request->getPost('numero1');
        $numero2 = $this->request->getPost('numero2');
        $operacao = $this->request->getPost('operacao');

        if (!is_numeric($numero1) || !is_numeric($numero2)) {
            return redirect()->back()->with('error', 'Por favor, insira números válidos.');
        }

        $resultado = null;
        switch ($operacao) {
            case 'soma':
                $resultado = $numero1 + $numero2;
                break;
            case 'subtracao':
                $resultado = $numero1 - $numero2;
                break;
            case 'multiplicacao':
                $resultado = $numero1 * $numero2;
                break;
            case 'divisao':
                if ($numero2 == 0) {
                    return redirect()->back()->with('error', 'Não é possível dividir por zero.');
                }
                $resultado = $numero1 / $numero2;
                break;
            default:
                return redirect()->back()->with('error', 'Operação inválida.');
        }

        return view('calculadora', ['resultado' => $resultado]);
    }
}
