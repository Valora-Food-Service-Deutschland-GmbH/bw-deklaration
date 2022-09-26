<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Store;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Krizalys\Onedrive\Onedrive;
use League\Csv\Reader;
use Yajra\DataTables\DataTables;


class ArtikelController extends Controller
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
    public function index(Request $request)
    {
        #$user_id = Auth::id();
        #$user = User::findorFail($user_id);
        #$partner = $user->partner->get();
        #if ($partner->partner_id == 0){
        #    $stores = $stores::all();
        #}
        #else{
        #    #$stores = $partner->stores->get();
        #}


        $stores = $stores::all();

        return view('Artikel.index')->with('stores', $stores);

    }

    public function ajax()
    {
        $All_Artikel= Artikel::select('*');
        $dt = Datatables::of($All_Artikel)
            ->make(true);
        if (!$dt->isEmpty()) {
            return $dt;
        }
        else{
            return view('dashoard')->with($All_Artikel);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

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

    public function download_FX3()
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

    }
}
