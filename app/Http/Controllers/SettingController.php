<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::find(1);
        return view('setting.index',compact('settings'));
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
        $settings = Settings::find(1);
        if($request->file('logo')){
            $file = $request->file('logo');

            $nama_file = time()."_".$file->getClientOriginalName();

            $tujuan_upload = 'gambar';
            $file->move($tujuan_upload,$nama_file);

        $settings->update([
            'logo' => $nama_file,
            'name_web' => $request->name_web,
        ]);
        }else{
        $settings->update([
                'name_web' => $request->name_web,
                'name_company' => $request->name_company,
                'telp_company' => $request->telp_company,
                'email_company' => $request->email_company,
                'openinghours_company' => $request->openinghours_company,
                'address_company' => $request->address_company,
            ]);
        }
            
        $settings->update();
        return redirect('/setting');
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
}
