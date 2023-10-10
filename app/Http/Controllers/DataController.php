<?php

namespace App\Http\Controllers;
Use \Carbon\Carbon;
use App\Models\Data;
use App\Imports\DataImport;
use App\Jobs\importExcelJob;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function importexcel(Request $request)
     {
        $validatedData = $request->validate([
            'import_file' => 'required|mimes:xlsx|max:10000'
        ]);

        $file = $request->file('import_file');
        $fileName = $file->getClientOriginalName();
        $file->move('excelimportfolder', $fileName);
        importExcelJob::dispatch($fileName);
        return redirect('/data')->with('success', 'your import under process');
     }
     public function exportexcel()
     {
        $id = IdGenerator::generate(['table' => 'data', 'field' => 'data_number', 'length' => 9, 'prefix' => 'DOC-']);
        @dd($id);
      
     }
     public function exportpdf()
     {
         @dd("hello");
      
     }
    public function index()
    {
       $data = Data::paginate(10);
        return view('data.index', [
            "title" => "Data List",
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('index', [
            "title" => "Create Data",
            "active" => "ticketlist",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data $data)
    {
        return view('index', [
            "title" => "Edit Data",
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }
}
