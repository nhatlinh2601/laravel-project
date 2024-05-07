<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class PaginationController extends Controller
{
    function index()
    {
        $users = User::paginate(2);
        return view('pagination', compact('users'));
    }

    function paginationAjax(Request $request)
    {
        if($request->ajax())
        {
            $users = User::paginate(2);
            return view('user_pagination_data', compact('users'))->render();
        }
    }
}

?>