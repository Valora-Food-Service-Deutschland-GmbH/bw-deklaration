<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Krizalys\Onedrive\Onedrive;
use DataTables;

class Artikel extends Controller
{
    /**
     * Methods for Article Views
     *
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        {
            {
                if ($request->ajax()) {
                    $data = Artikel::latest()->get();
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger">Delete</a>';
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                $response = new \Illuminate\Http\Response(view('Artikel.index'));
                return $response;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('Artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Artikel.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Artikel.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('Artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('Artikel.index');
    }

    public function download()
    {
        $client = Onedrive::client(
            env('AZURE_CLIENT_ID', ''),
            [
                // Restore the previous state while instantiating this client to proceed
                // in obtaining an access token.
                'state' => $_SESSION['onedrive.client.state'],
            ]
        );

        // Obtain the token using the code received by the OneDrive API.
        $client->obtainAccessToken(env('AZURE_CLIENT_SECRET', ''), $_GET['code']);

        // Persist the OneDrive client' state for next API requests.
        $_SESSION['onedrive.client.state'] = $client->getState();

        // Past this point, you can start using file/folder functions from the SDK, eg:
        $file = $client->getRoot()->upload('hello.txt', 'Hello World!');
        echo $file->download();
        // => Hello World!

        $file->delete();

        return view('artikel.index');
    }

    public function makelabel()
    {
        return view('artikel.index');
    }
}
