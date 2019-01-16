<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
       $binding = [
            'title' => '首頁'
       ];
       return view('index',$binding);
    }
}