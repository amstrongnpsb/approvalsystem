<?php

namespace App\Exports;

use App\Models\Data;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;

    function __construct($request) {
        $this->request = $request;
    }
    public function view(): View
    {
        $data = Data::latest()->filter(request(['search','severity_filter']))->get();
        return view('preview.excel.index', [
            'data' => $data,
        ]);
    }
}
