<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Pet;
use App\Models\Consultation;
use App\Models\Disease;


class ChartController extends Controller
{
    public function index()
{
    $chart_options = [
        'chart_title' => 'Number of Pets with Disease/Injury Suffered',
        'report_type' => 'group_by_relationship',
        'model' => 'App\Models\Consultation',

        'relationship_name' => 'disease', 
        'group_by_field' => 'disease_name', 

        'chart_type' => 'bar',

        'filter_field' => 'created_at',
        'filter_period' => 'month', // show users only registered this month
        
    ];

    $chart1 = new LaravelChart($chart_options);

    //dd($chart2);
    return view('chart.pet', compact('chart1'));
}

public function cindex()
{
    $chart_options = [
        'chart_title' => 'Number of Pets Groomed',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Orderline',

        'group_by_field' => 'created_at', 
        'group_by_period' => 'month', 


        'chart_type' => 'line',
        
    ];

    $chart1 = new LaravelChart($chart_options);

    //dd($chart2);
    return view('chart.customer', compact('chart1'));
}


}
