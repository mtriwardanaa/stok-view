<?php

namespace Modules\FormMasuk\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\ClientHttp;
use Illuminate\Http\Request;

class FormMasukController extends Controller
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
        $data = $this->clientHttp->get('v1/incoming-goods');
        return view('formmasuk::index', ['data' => $data['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $goods = $this->clientHttp->get('v1/goods');
        return view('formmasuk::create', ['goods' => $goods['data']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');

        try {
            $create = $this->clientHttp->post('v1/incoming-goods', $post);

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

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('formmasuk::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $goods = $this->clientHttp->get('v1/goods');
        $formMasuk = $this->clientHttp->get('v1/incoming-goods/' . $id);
        return view('formmasuk::edit', [
            'goods'     => $goods['data'],
            'formMasuk' => $formMasuk['data'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = $request->except('_token');

        try {
            $update = $this->clientHttp->put('v1/incoming-goods/' . $id, $post);

            if (isset($update['status']) && $update['status']) {
                return redirect()->back()
                    ->with('success', ['Form Masuk berhasil diupdate']);
            } elseif (isset($update['status']) && !$update['status']) {
                return redirect()->back()
                    ->with('error', $update['messages']);
            }

            return redirect()->back()
                ->with('error', ['Something went wrong']);
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
