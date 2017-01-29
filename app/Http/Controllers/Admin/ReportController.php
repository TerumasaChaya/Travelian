<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Report;
use App\Travel;
use App\Http\Controllers\Controller;
use App\TravelDetail;
use App\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::orderBy('created_at','desc')->paginate(10);

        return view('admin.report.list')->with('reports',$reports);
    }

}
