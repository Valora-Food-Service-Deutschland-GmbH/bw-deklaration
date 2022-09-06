<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Krizalys\Onedrive\Onedrive;

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

                return view('artikel-list');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download()
    {
        $client = Onedrive::client(
            $config['ONEDRIVE_CLIENT_ID'],
            [
                // Restore the previous state while instantiating this client to proceed
                // in obtaining an access token.
                'state' => $_SESSION['onedrive.client.state'],
            ]
        );

        // Obtain the token using the code received by the OneDrive API.
        $client->obtainAccessToken($config['ONEDRIVE_CLIENT_SECRET'], $_GET['code']);

        // Persist the OneDrive client' state for next API requests.
        $_SESSION['onedrive.client.state'] = $client->getState();

        // Past this point, you can start using file/folder functions from the SDK, eg:
        $file = $client->getRoot()->upload('hello.txt', 'Hello World!');
        echo $file->download();
        // => Hello World!

        $file->delete();
    }
}
