<?php

namespace Modules\AmbilBarang\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\ClientHttp;
use Illuminate\Http\Request;

class AmbilBarangController extends Controller
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
        $data = $this->clientHttp->get('v1/taking-goods');
        return view('ambilbarang::index', ['data' => $data['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $goods = $this->clientHttp->get('v1/goods');
        return view('ambilbarang::create', ['goods' => $goods['data']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');

        try {
            $create = $this->clientHttp->post('v1/taking-goods', $post);

            if (isset($create['status']) && $create['status']) {
                return redirect()->back()
                    ->with('success', ['Form Masuk berhasil dibuat']);
            } elseif (isset($create['status']) && !$create['status']) {
                return redirect()->back()
                    ->with('error', $create['messages']);
            }

            return redirect()->back()
                ->with('error', ['Something went wrong']);
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
