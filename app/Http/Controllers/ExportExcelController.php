<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Exports\ExportItems;
use App\Exports\ExportBlogs;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function index()
    {
        return view('admin.settings.export');
    }

    public function export(Request $request)
    {
        $method = $request->input('method') ?? '';
        switch ($method) {
            case 'users':
                return Excel::download(new ExportUsers, 'users.xlsx');
                break;

            case 'items':
                return Excel::download(new ExportItems, 'items.xlsx');
                break;

            case 'blogs':
                return Excel::download(new ExportBlogs, 'blogs.xlsx');
                break;
        }
    }
}
