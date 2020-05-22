<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\AsesmenKandungan;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pasiens = Pasien::all()->toArray();
        // return view('pasien.index', compact('pasiens')); 
        $pasiens = DB::table('pasiens')->paginate(5);
        return view('pasien.index', ['pasiens' => $pasiens]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'nomor_rm'=>'required | max:9 | unique:pasiens',
            'dobday'=>'required',
            'dobmonth'=>'required',
            'dobyear'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required'
        ]);
        
        $dob = $request->get('dobyear').'-'.$request->get('dobmonth').'-'.$request->get('dobday');

        $pasien = new Pasien([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'nomor_rm' => $request->get('nomor_rm'),
            'tanggal_lahir' => $dob,
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'alamat' => $request->get('alamat')       
        ]);

        $pasien->save();
        return redirect('/pasien')->with('success', 'Pasien berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::find($id);
        $dokumenasesmens = AsesmenKandungan::where('rm_pasien', $pasien->nomor_rm)
        ->orderBy('id', 'asc')        
        ->get();        
        return view('pasien.single',compact('pasien','id','dokumenasesmens')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::find($id);        
        return view('pasien.edit',compact('pasien','id')); 
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'dobday'=>'required',
            'dobmonth'=>'required',
            'dobyear'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required'
        ]);
        
        $dob = $request->get('dobyear').'-'.$request->get('dobmonth').'-'.$request->get('dobday');

        $pasien = Pasien::find($id);
        $pasien->first_name = $request->get('first_name');
        $pasien->last_name = $request->get('last_name');
        $pasien->tanggal_lahir = $dob;
        $pasien->jenis_kelamin = $request->get('jenis_kelamin');
        $pasien->alamat = $request->get('alamat'); 

        $pasien->save();
        return redirect()->action('PasienController@show', $pasien->id)->with('success', 'Data Pasien berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        return redirect('/pasien')->with('success', 'Pasien berhasil dihapus!');
    }
}
