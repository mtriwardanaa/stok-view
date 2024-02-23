<?php

namespace Modules\Role\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lib\ClientHttp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $data = $this->clientHttp->get('v1/roles');
        return view('role::index', ['data' => $data['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->clientHttp->get('v1/permissions');
        return view('role::create', ['data' => $data['data']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');

        try {
            $create = $this->clientHttp->post('v1/roles', $post);

            if (isset($create['status']) && $create['status']) {
                return redirect()->back()
                    ->with('success', ['Role berhasil dibuat']);
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
        return view('role::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $permissions = $this->clientHttp->get('v1/permissions');
        $role = $this->clientHttp->get('v1/roles/' . $id);
        return view('role::edit', [
            'data' => $permissions['data'],
            'role' => $role['data'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = $request->except('_token');

        try {
            $update = $this->clientHttp->put('v1/roles/' . $id, $post);

            if (isset($update['status']) && $update['status']) {
                return redirect()->back()
                    ->with('success', ['Role berhasil diupdate']);
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

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $delete = $this->clientHttp->delete('v1/roles/' . $id);

            if (isset($delete['status']) && $delete['status']) {
                return redirect()->back()
                    ->with('success', ['Role berhasil dihapus']);
            } elseif (isset($delete['status']) && !$delete['status']) {
                return redirect()->back()
                    ->with('error', $delete['messages']);
            }

            return redirect()->back()
                ->with('error', ['Something went wrong']);
        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()]);
        }
    }
}
