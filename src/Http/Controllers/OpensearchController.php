<?php

namespace Matthewbdaly\LaravelOpensearch\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Controller for Opensearch XML file
 */
class OpensearchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return Opensearch XML file
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $xmlVersion = '<?xml version="1.0" encoding="UTF-8"?>';
        $content = view('opensearch::xml', config('opensearch'), compact('xmlVersion'))->render();
        return response($content, 200)->header('Content-Type', 'text/xml');
    }
}
