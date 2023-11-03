<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Imports\DataImport;
use App\Jobs\importExcelJob;
use App\Models\Data;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use \Carbon\Carbon;
use DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $user = Auth::user();
        return view('index', [
            'title' => 'HomePage',
            'user' => $user
        ]);
    }
    public function importExcel(Request $request)
    {
        $request->validate([
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
    public function exportPdf($id)
    {
        $data = Data::find($id);
        $pdf = PDF::loadview('preview.pdf.index', ['data' => $data]);
        return $pdf->stream('data.pdf');
    }
    public function dataTable(Request $request)
    {
        if ($request->ajax()) {
            // return Datatables::of(Data::query())->toJson();
            return Datatables::of(Data::query())->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/data/exportpdf/' . $row->id . '" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $user = Auth::user();
        return view('data.datatable', [
            "title" => "Data Table",
            'user' => $user
        ]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $data = Data::latest()->filter(request(['search', 'status']))->paginate(10);
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
