<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getIndex()
    {
        return view('admin/index');
    }
}