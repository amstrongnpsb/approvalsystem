<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    public function filterOnDataTable(Request $request)
    {
        if ($request['filter']) {
            $results = Data::search($request['filter'])
                ->take(20)->get()->pluck($request['column_name'])->unique()->map(function ($value) use ($request) {
                    return [$request['column_name'] => $value];
                })->values();
        } else {
            $results = Data::take(20)->select($request['column_name'])->distinct()->get();
        }
        return response()->json($results, 200);

    }
}
