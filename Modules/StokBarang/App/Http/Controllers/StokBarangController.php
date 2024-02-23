<?php

namespace Modules\StokBarang\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\ClientHttp;

class StokBarangController extends Controller
{
    public function __construct(
        private ClientHttp $clientHttp,
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->clientHttp->get('v1/goods');
        return view('stokbarang::index', ['data' => $data['data']]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('stokbarang::show');
    }
}
