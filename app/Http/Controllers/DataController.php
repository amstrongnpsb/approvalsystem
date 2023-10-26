<?php

namespace App\Http\Controllers;
Use \Carbon\Carbon;
use App\Models\Data;
use App\Exports\DataExport;
use App\Imports\DataImport;
use App\Jobs\importExcelJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){
        $user = Auth::user();
        return view('index', [
            'title' => 'HomePage',
            'user' => $user
        ]);
     }
    public function importExcel(Request $request)
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
     public function exportExcel(Request $request)
     {
        return Excel::download(new DataExport($request), 'data.xlsx');
     }
     public function exportPdf()
     {
         @dd("hello");
      
     }
    public function datatable()
    {
         @dd("hello");
        $user = Auth::user();
        $data = Data::latest()->filter(request(['search','severity_filter']))->paginate(10);
        return view('data.index', [
            "title" => "Data List",
            "data" => $data,
            'user' => $user
        ]);
    }
    public function index()
    {
        $user = Auth::user();
        $data = Data::latest()->filter(request(['search','severity_filter']))->paginate(10);
        return view('data.index', [
            "title" => "Data List",
            "data" => $data,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('index', [
            "title" => "Create Data",
            "user" => $user
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
