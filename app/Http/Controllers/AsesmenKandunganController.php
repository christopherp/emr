<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\AsesmenKandungan;
use DateTime;
use PDF;
class AsesmenKandunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pasien = Pasien::find($id);
        $jenis_kelamin = AsesmenKandunganController::determineGender($pasien->jenis_kelamin);
        $umur =  AsesmenKandunganController::calculateAge($pasien->tanggal_lahir);
        return view('asesmen_awal_kandungan.create',compact('pasien','id','jenis_kelamin','umur'));
    }

    public function determineGender($jk){

        $jenis_kelamin;
        if($jk==="Laki-laki"){
            $jenis_kelamin = "(L)";
        } else{
            $jenis_kelamin = "(P)";
        }
        return $jenis_kelamin;
    }

    public function calculateAge($birthDate){

        $date = new DateTime($birthDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'tanggal_datang'=>'required',
            'jam_datang'=>'required',
            'dokter_pj'=>'required'
        ]);
        $pasien = Pasien::find($id);;
        $nomor_rm = $pasien->nomor_rm;
        $date_created = date("dmHi");
        $nama_dokumen = $date_created."_asesmen_awal_medis_kandungan_".$nomor_rm;

        $asesmenKandungan = new AsesmenKandungan([
        'nama_dokumen' => $nama_dokumen,   
        'rm_pasien' => $nomor_rm,
        'rujukan'=> $request->get('rujukan'), 
        'tanggal_datang'=> $request->get('tanggal_datang'), 
        'jam_datang'=> $request->get('jam_datang'),
        'pendarahan'=> $request->get('pendarahan'),
        'keputihan'=> $request->get('keputihan'), 
        'nyeri'=> $request->get('nyeri'), 
        'benjolan'=> $request->get('benjolan'),
        'riwayat_haid'=> $request->get('riwayat_haid'), 
        'menars_usia'=> $request->get('menars_usia'), 
        'lama_haid'=> $request->get('lama_haid'), 
        'nyeri_haid'=> $request->get('nyeri_haid'), 
        'nyeri_haid_saat'=> serialize($request->get('nyeri_haid_saat')), 
        'jumlah_pembalut'=> $request->get('jumlah_pembalut'),
        'warna_haid'=> $request->get('warna_haid'), 
        'konsistensi_haid'=> $request->get('konsistensi_haid'),
        'gangguan_seksual'=> $request->get('gangguan_seksual'),
        'kb_jenis'=> $request->get('kb_jenis'), 
        'kb_lama'=> $request->get('kb_lama'),
        'obathormon_pernah'=> $request->get('obathormon_pernah'), 
        'penyakit_jantung'=> serialize( $request->get('penyakit_jantung')), 
        'penyakit_paru'=> serialize( $request->get('penyakit_paru')),
        'penyakit_infeksi'=> serialize( $request->get('penyakit_infeksi')),
        'penyakit_metabolik'=> serialize( $request->get('penyakit_metabolik')),
        'penyakit_operasi'=> serialize( $request->get('penyakit_operasi')),
        'faktor_lingkungan'=> $request->get('faktor_lingkungan'),
        'riwayat_pengobatan'=> $request->get('riwayat_pengobatan'), 
        'alergi'=> $request->get('alergi'), 
        'kesadaran'=> $request->get('kesadaran'), 
        'tensi'=> $request->get('tensi'), 
        'nadi'=> $request->get('nadi'), 
        'suhu_tr'=> $request->get('suhu_tr'), 
        'suhu_ta'=> $request->get('suhu_ta'), 
        'respiration_rate'=> $request->get('respiration_rate'), 
        'keadaan'=> serialize($request->get('keadaan')), 
        'keadaan_kepala'=> $request->get('keadaan_kepala'), 
        'keadaan_dada'=> $request->get('keadaan_dada'),
        'keadaan_perut'=> $request->get('keadaan_perut'), 
        'ekstremitas'=> $request->get('ekstremitas'),
        'vt_p'=> $request->get('vt_p'),
        'vt_cu'=> $request->get('vt_cu'), 
        'vt_ap_ka'=> $request->get('vt_ap_ka'), 
        'vt_ap_ki'=> $request->get('vt_ap_ki'), 
        'vt_cd'=> $request->get('vt_cd'),
        'inspekulo'=> $request->get('inspekulo'), 
        'pungsi_douglas'=> $request->get('pungsi_douglas'),
        'ct_scan'=> $request->get('ct_scan'), 
        'ultrasonografi'=> $request->get('ultrasonografi'), 
        'laboratorium'=> $request->get('laboratorium'), 
        'sketsa'=> $request->get('sketsa'), 
        'assesmen'=> $request->get('assesmen'), 
        'med_1'=> $request->get('med_1'), 
        'med_2'=> $request->get('med_2'), 
        'med_3'=> $request->get('med_3'), 
        'med_4'=> $request->get('med_4'), 
        'med_5'=> $request->get('med_5'), 
        'dokter_pj' => $request->get('dokter_pj')     
        ]);

        $asesmenKandungan->save();
        return redirect()->action('PasienController@show', $id)->with('success', 'Asesmen Medis Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , $nama_dokumen)
    {   
        //Mendapatkan data pasiend dan asesmen kandungan dari database     
        $pasien = Pasien::find($id);
        $asesmenKandungan = AsesmenKandungan::firstWhere('nama_dokumen', $nama_dokumen);
        //Mengembalikan jenis kelamin sesuai format(L/P)
        $jenis_kelamin = AsesmenKandunganController::determineGender($pasien->jenis_kelamin);
        //Menghitung umur
        $umur =  AsesmenKandunganController::calculateAge($pasien->tanggal_lahir);
        return view('asesmen_awal_kandungan.single',compact('pasien','id','jenis_kelamin','umur', 'asesmenKandungan')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $nama_dokumen)
    {
        //Mendapatkan data pasiend dan asesmen kandungan dari database     
        $pasien = Pasien::find($id);
        $asesmenKandungan = AsesmenKandungan::firstWhere('nama_dokumen', $nama_dokumen);
        //Mengembalikan jenis kelamin sesuai format(L/P)
        $jenis_kelamin = AsesmenKandunganController::determineGender($pasien->jenis_kelamin);
        //Menghitung umur
        $umur =  AsesmenKandunganController::calculateAge($pasien->tanggal_lahir);
        return view('asesmen_awal_kandungan.edit',compact('pasien','id','jenis_kelamin','umur', 'asesmenKandungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $nama_dokumen)
    {
        $asesmenKandungan = AsesmenKandungan::firstWhere('nama_dokumen', $nama_dokumen);
        $asesmenKandungan->rujukan = $request->get('rujukan');
        $asesmenKandungan->tanggal_datang = $request->get('tanggal_datang');
        $asesmenKandungan->pendarahan =  $request->get('pendarahan');
        $asesmenKandungan->keputihan =  $request->get('keputihan');
        $asesmenKandungan->nyeri =  $request->get('nyeri');
        $asesmenKandungan->benjolan =  $request->get('benjolan');
        $asesmenKandungan->riwayat_haid =  $request->get('riwayat_haid');
        $asesmenKandungan->menars_usia =  $request->get('menars_usia');
        $asesmenKandungan->lama_haid =  $request->get('lama_haid');
        $asesmenKandungan->nyeri_haid =  $request->get('nyeri_haid');
        $asesmenKandungan->nyeri_haid_saat =  serialize($request->get('nyeri_haid_saat'));
        $asesmenKandungan->jumlah_pembalut =  $request->get('jumlah_pembalut');
        $asesmenKandungan->warna_haid =  $request->get('warna_haid');
        $asesmenKandungan->konsistensi_haid =  $request->get('konsistensi_haid');
        $asesmenKandungan->gangguan_seksual =  $request->get('gangguan_seksual');
        $asesmenKandungan->kb_jenis =  $request->get('kb_jenis');
        $asesmenKandungan->kb_lama =  $request->get('kb_lama');
        $asesmenKandungan->obathormon_pernah =  $request->get('obathormon_pernah');
        $asesmenKandungan->penyakit_jantung =  serialize($request->get('penyakit_jantung'));
        $asesmenKandungan->penyakit_paru =  serialize($request->get('penyakit_paru'));
        $asesmenKandungan->penyakit_infeksi =  serialize( $request->get('penyakit_infeksi'));
        $asesmenKandungan->penyakit_metabolik =  serialize( $request->get('penyakit_metabolik'));
        $asesmenKandungan->penyakit_operasi =  serialize( $request->get('penyakit_operasi'));
        $asesmenKandungan->faktor_lingkungan =  $request->get('faktor_lingkungan');
        $asesmenKandungan->riwayat_pengobatan =  $request->get('riwayat_pengobatan');
        $asesmenKandungan->alergi =  $request->get('alergi');
        $asesmenKandungan->kesadaran =  $request->get('kesadaran');
        $asesmenKandungan->tensi =  $request->get('tensi');
        $asesmenKandungan->nadi =  $request->get('nadi');
        $asesmenKandungan->suhu_tr =  $request->get('suhu_tr');
        $asesmenKandungan->suhu_ta =  $request->get('suhu_ta');
        $asesmenKandungan->respiration_rate =  $request->get('respiration_rate');
        $asesmenKandungan->keadaan =  serialize($request->get('keadaan'));
        $asesmenKandungan->keadaan_kepala =  $request->get('keadaan_kepala');
        $asesmenKandungan->keadaan_dada =  $request->get('keadaan_dada');
        $asesmenKandungan->keadaan_perut =  $request->get('keadaan_perut');
        $asesmenKandungan->ekstremitas =  $request->get('ekstremitas');
        $asesmenKandungan->vt_p =  $request->get('vt_p');
        $asesmenKandungan->vt_cu =  $request->get('vt_cu');
        $asesmenKandungan->vt_ap_ka =  $request->get('vt_ap_ka');
        $asesmenKandungan->vt_ap_ki =  $request->get('vt_ap_ki');
        $asesmenKandungan->vt_cd =  $request->get('vt_cd');
        $asesmenKandungan->inspekulo =  $request->get('inspekulo');
        $asesmenKandungan->pungsi_douglas =  $request->get('pungsi_douglas');
        $asesmenKandungan->ct_scan =  $request->get('ct_scan');
        $asesmenKandungan->ultrasonografi =  $request->get('ultrasonografi');
        $asesmenKandungan->laboratorium =  $request->get('laboratorium');
        $asesmenKandungan->sketsa =  $request->get('sketsa');
        $asesmenKandungan->assesmen =  $request->get('assesmen');
        $asesmenKandungan->med_1 =  $request->get('med_1');
        $asesmenKandungan->med_2 =  $request->get('med_2');
        $asesmenKandungan->med_3 =  $request->get('med_3');
        $asesmenKandungan->med_4 =  $request->get('med_4');
        $asesmenKandungan->med_5 =  $request->get('med_5');
        $asesmenKandungan->dokter_pj =  $request->get('dokter_pj');

        $asesmenKandungan->save();
        return redirect()->action('AsesmenKandunganController@show',['id' => $id, 'nama_dokumen' => $nama_dokumen])->with('success', 'Dokumen Asesmen berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , $nama_dokumen)
    {
        $asesmenKandungan = AsesmenKandungan::firstWhere('nama_dokumen', $nama_dokumen);
        $asesmenKandungan->delete();

        return redirect()->action('PasienController@show', $id)->with('success', 'Asesmen Medis Berhasil dihapus!');
    }
}
