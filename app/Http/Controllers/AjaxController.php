<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax.index');
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            // Xử lý dữ liệu từ yêu cầu AJAX và trả về kết quả
            $data = $request->all();
    
            return response()->json(['success' => true, 'data' => $data]);
        }
    
        return response()->json(['success' => false, 'message' => 'Invalid request']);
    }
}
