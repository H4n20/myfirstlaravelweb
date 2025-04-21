<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Constructor code can be added here if needed
    }

    public function index()
    {
        $config = $this->config();

        $template = 'backend.dashboard.home.index';
        return view(
            "backend.dashboard.layout",
            compact('template', 'config')
        );
    }

    private function config()
    {
        return [
            'js' => [
                'js/plugins/flot/jquery.flot.js',
                'js/plugins/flot/jquery.flot.tooltip.min.js',
                'js/plugins/flot/jquery.flot.spline.js',
                'js/plugins/flot/jquery.flot.resize.js',
                'js/plugins/flot/jquery.flot.pie.js',
                'js/plugins/flot/jquery.flot.symbol.js',
                'js/plugins/flot/curvedLines.js',
                'js/plugins/peity/jquery.peity.min.js',
                'js/demo/peity-demo.js',
                'js/inspinia.js',
                'js/plugins/pace/pace.min.js',
                'js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'js/plugins/sparkline/jquery.sparkline.min.js',
                'js/demo/sparkline-demo.js',
                'js/plugins/chartJs/Chart.min.js',
            ]
        ];
    }
}
