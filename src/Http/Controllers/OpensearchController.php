<?php

namespace Matthewbdaly\LaravelOpensearch\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OpensearchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $content = view('opensearch::xml', config('opensearch'))->render();
        return response($content, 200)->header('Content-Type', 'text/xml');
    }
}
