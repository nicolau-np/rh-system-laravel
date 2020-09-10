<?php

namespace App\Exports;

use App\Funcionario;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IbansExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $funcionarios = Funcionario::all();
        return view('relatorio.exports.ibans', ['getFuncionarios'=>$funcionarios]);
        
    }
}
