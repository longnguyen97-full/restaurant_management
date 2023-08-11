<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportUsers;
use App\Imports\ImportItems;
use App\Imports\ImportBlogs;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function index()
    {
        return view('admin.settings.import');
    }

    public function import(Request $request)
    {
        $method = $request->input('method') ?? '';
        switch ($method) {
            case 'users':
                return Excel::download(new ImportUsers, 'users.xlsx');
                break;

            case 'items':
                return Excel::download(new ImportItems, 'items.xlsx');
                break;

            case 'blogs':
                return Excel::download(new ImportBlogs, 'blogs.xlsx');
                break;
        }
    }
}
