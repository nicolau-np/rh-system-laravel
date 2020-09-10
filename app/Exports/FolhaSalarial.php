<?php

namespace App\Exports;

use App\Funcionario;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FolhaSalarial implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        return view('relatorio.exports.folha_salarial', ['getFuncionarios'=>Funcionario::all()]);
    }
}
