<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/output.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" 
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" 
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <!-- <script src="https://kit.fontawesome.com/9928c79811.js" crossorigin="anonymous"></script> -->
    <script>
        var nyeri_haid_saats = @json(unserialize($asesmenKandungan->nyeri_haid_saat));
        var penyakit_jantungs = @json(unserialize($asesmenKandungan->penyakit_jantung));           
        var penyakit_parus = @json(unserialize($asesmenKandungan->penyakit_paru));
        var penyakit_infeksis = @json(unserialize($asesmenKandungan->penyakit_infeksi));
        var penyakit_metaboliks = @json(unserialize($asesmenKandungan->penyakit_metabolik));
        var penyakit_operasis = @json(unserialize($asesmenKandungan->penyakit_operasi));
        var keadaans = @json(unserialize($asesmenKandungan->keadaan));       
        $(function() {
          $( "#datepicker" ).datepicker();          
        } );
    </script>
    <script src="{{ url('/js/editasesmenmedis.js') }}"></script>
    <title>RME</title>
</head>

<body>
    <div class="max-w-6xl mx-auto">
        <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
                    </svg>
                <span class="font-semibold text-xl tracking-tight">Electronic Medical Records</span>
            </div>
            <div class="block lg:hidden">
                <button
                    class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
        </nav>

        <nav class="container py-3">
            <ul class="flex text-bold">
                <li class="mr-3">
                    <a class="text-teal-500 hover:text-teal-800" href="{{url('pasien')}}">Home</a>
                </li>
                <li class="mr-3">
                    <p class="text-teal-500">></p>
                </li>
                <li class="mr-3">
                    <a class="text-teal-500 hover:text-teal-800" href="{{action('PasienController@show', $pasien->id)}}">{{ $pasien->nomor_rm }}</a>
                </li>
                <li class="mr-3">
                    <p class="text-teal-500">></p>
                </li>
                <li class="mr-3">
                    <a class="text-teal-500" href="{{action('AsesmenKandunganController@show',['id' => $pasien->id, 'nama_dokumen' => $asesmenKandungan->nama_dokumen])}}">{{ $asesmenKandungan->nama_dokumen }}</a>
                </li>
                <li class="mr-3">
                    <p class="text-teal-500">></p>
                </li>
                <li class="mr-3">
                    <p class="text-teal-500" href="{{action('PasienController@show', $pasien->id)}}">Edit</p>
                </li>                
            </ul>
        </nav>
        

        @if (\Session::has('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-8" role="alert">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif

        @if ($errors->any())
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mt-8" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        

        <div class="container mx-auto py-8 px-32 border border-gray-400">

            <div class="w-full flex">
                <div class="w-2/3 border border-black text-center items-center content-center -mr-px">
                    <div class="mx-32 flex">
                        <div class="mx-4">
                            <img src="{{ url('/img/sby.png') }}" alt="">
                        </div>
                        <div class="">
                            <p class="text-sm">PEMERINTAH KOTA SURABAYA</p>
                            <p class="text-sm">RSUD dr. MOHAMAD SOEWANDHIE SURABAYA</p>
                            <p class="text-sm">JL. TAMBAK REJO NO. 45-47</p>
                            <p class="text-sm">TELP. 031 3717141, 372905</p>
                        </div>                        
                    </div>
                    <div class="px-24">                        
                        <p class="text-xl font-bold">ASESMEN AWAL MEDIS KANDUNGAN</p>
                        <p class="text-xl font-bold">INSTALASI RAWAT JALAN</p>
                    </div>                     
                </div>
                <div class="w-1/3 border border-black p-3">
                    <p>NAMA (L/P) : 
                    <span class="font-semibold">
                    {{ $pasien->first_name }}
                    {{ $pasien->last_name }}
                    {{$jenis_kelamin}}
                    </span>
                    </p> 
                    <p >NO. RM : <span class="font-semibold">{{ $pasien->nomor_rm }}</span></p> 
                    <p>TGL. LAHIR (UMUR) : <span class="font-semibold">{{ $pasien->tanggal_lahir }} ({{$umur}})</span></p> 
                    <p>ALAMAT : <span class="font-semibold">{{ $pasien->alamat }}</span></p> 
                </div>
            </div>

            <form action="" method="post" action="{{action('AsesmenKandunganController@update',['id' => $pasien->id, 'nama_dokumen' => $asesmenKandungan->nama_dokumen])}}">
                @method('PATCH')
                @csrf        
            <div class="w-full mt-8 flex">
                <div class="w-1/2 border border-black p-3">
                    <label for="rujukan" class="block">Rujukan (Dari, Diagnosis, Obat-obatan)</label>           
                    <input type="text" name="rujukan" class="w-5/6 h-10 px-3 rounded mt-2 focus:outline-none focus:shadow-outline px-2 border border-gray-500" value="{{$asesmenKandungan->rujukan}}">                    
                </div>
                <div class="w-1/2 border border-black p-3">
                    <label for="tanggal_datang" class="">Datang tgl.</label>           
                    <input type="date" class="px-3 rounded mt-2 focus:outline-none focus:shadow-outline px-2 border border-gray-500" name="tanggal_datang" value="{{$asesmenKandungan->tanggal_datang}}">
                    <label for="jam_datang" class="">Jam</label>
                    <input type="time" class="px-3 rounded mt-2 focus:outline-none focus:shadow-outline px-2 border border-gray-500" name="jam_datang" id="" value="{{$asesmenKandungan->jam_datang}}">   
                </div>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">SUBJEKTIF/KELUHAN</span> (Kualitas Dan Kuantitas)</p>
                <ul class="list-disc list-inside">
                    <li class="mb-6">                    
                        <label for="pendarahan" class="inline-block w-32">Pendarahan</label>
                        <p class="inline-block">:</p>                          
                        <input type="text" name="pendarahan" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->pendarahan}}">
                    </li>
                    <li class="mb-6">                    
                        <label for="keputihan" class="inline-block w-32">Keputihan</label>
                        <p class="inline-block">:</p>                          
                        <input type="text" name="keputihan" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->keputihan}}">
                    </li>
                    <li class="mb-6">                    
                        <label for="nyeri" class="inline-block w-32">Nyeri</label>
                        <p class="inline-block">:</p>                          
                        <input type="text" name="nyeri" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->nyeri}}">
                    </li>
                    <li class="mb-6">                    
                        <label for="benjolan" class="inline-block w-32">Benjolan</label>
                        <p class="inline-block">:</p>                          
                        <input type="text" name="benjolan" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->benjolan}}">
                    </li>
                    <li class="mb-6">                    
                        <label for="riwayat_haid" class="inline-block w-32">Riwayat Haid</label>
                        <p class="inline-block">:</p>                          
                        <input type="text" name="riwayat_haid" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->riwayat_haid}}">
                    </li>
                    <li class="mb-6">                    
                        <label for="menars_usia" class="inline-block">Menars Usia</label>                                                  
                        <input type="number" name="menars_usia" min="0" max="99" class="w-16 px-3 ml-2 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="...." value="{{$asesmenKandungan->menars_usia}}">
                        <p class="inline-block">Th.</p>
                        <label for="lama_haid" class="inline-block ml-4">Lama Haid</label>                                                  
                        <input type="number" name="lama_haid" min="0" max="99" class="w-16 px-3 ml-2 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="...." value="{{$asesmenKandungan->lama_haid}}">
                        <p class="inline-block">Hari.</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="nyeri_haid" class="inline-block">Nyeri Haid :</label>
                        <div class="ml-4 inline-block">
                        <input type="radio" name="nyeri_haid" id="nyerihaid_ya" value="Ya" {{ ($asesmenKandungan->nyeri_haid=="Ya")? "checked" : "" }}><label for="nyerihaid_ya" class="ml-2"  >Ya</label>
                            <input type="radio" name="nyeri_haid" id="nyerihaid_tidak" value="Tidak" {{ ($asesmenKandungan->nyeri_haid=="Tidak")? "checked" : ""}} ><label for="nyerihaid_tidak" class="ml-2">Tidak</label>
                        </div> 
                        <div class="ml-4 inline-block">
                            <input type="checkbox" name="nyeri_haid_saat[]" class="nyeri_haid_saat" id="nyerihaid_sebelum" value="sebelum"><label for="nyerihaid_sebelum" class="ml-2">Sebelum</label>
                            <input type="checkbox" name="nyeri_haid_saat[]" class="nyeri_haid_saat" id="nyerihaid_selama" value="selama"><label for="nyerihaid_selama" class="ml-2">Selama</label>
                            <input type="checkbox" name="nyeri_haid_saat[]" class="nyeri_haid_saat" id="nyerihaid_mulai" value="mulai"><label for="nyerihaid_mulai" class="ml-2">Mulai</label>
                            <input type="checkbox" name="nyeri_haid_saat[]" class="nyeri_haid_saat" id="nyerihaid_akhir" value="akhir"><label for="nyerihaid_akhir" class="ml-2">Akhir</label>
                        </div>                                                                           
                        <p class="inline-block">.</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="jumlah_pembalut" class="inline-block">Jumlah Pembalut (pembalut/hari) :</label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="jumlah_pembalut" id="jumlah_pembalut_sedikit" value="sedikit" {{ ($asesmenKandungan->jumlah_pembalut=="sedikit")? "checked" : "" }}><label for="jumlah_pembalut_sedikit" class="ml-2">Sedikit (1-2 pembalut)</label>
                            <input type="radio" name="jumlah_pembalut" id="jumlah_pembalut_sedang" value="sedang"{{ ($asesmenKandungan->jumlah_pembalut=="sedang")? "checked" : "" }}><label for="jumlah_pembalut_sedang" class="ml-2">Sedang (3-4 pembalut)</label>
                            <input type="radio" name="jumlah_pembalut" id="jumlah_pembalut_banyak" value="banyak"{{ ($asesmenKandungan->jumlah_pembalut=="banyak")? "checked" : "disabled" }}><label for="jumlah_pembalut_banyak" class="ml-2">Banyak (>4 pembalut)</label>                            
                        </div>                         
                    </li>
                    <li class="mb-6">                    
                        <label for="warna_haid" class="inline-block">Warna :</label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="warna_haid" class="ml-2" id="warnahaid_kehitaman" value="kehitaman" {{ ($asesmenKandungan->warna_haid=="kehitaman")? "checked" : "" }}><label for="warnahaid_kehitaman" class="ml-2">Kehitaman</label>
                            <input type="radio" name="warna_haid" class="ml-2" id="warnahaid_merah_segar" value="merah segar" {{ ($asesmenKandungan->warna_haid=="merah segar")? "checked" : "" }}><label for="warnahaid_merah_segar" class="ml-2">Merah Segar</label>
                            <input type="radio" name="warna_haid" class="ml-2" id="warnahaid_kecoklatan" value="kecoklatan" {{ ($asesmenKandungan->warna_haid=="kecoklatan")? "checked" : "" }}><label for="warnahaid_kecoklatan" class="ml-2">Kecoklatan</label>
                        </div>                    
                        <label for="konsistensi_haid" class="inline-block ml-4">Konsistensi :</label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="konsistensi_haid" id="konsistensihaid_encer" value="encer" {{ ($asesmenKandungan->konsistensi_haid=="encer")? "checked" : "" }}><label for="konsistensihaid_encer" class="ml-2">Encer</label>
                            <input type="radio" name="konsistensi_haid" id="konsistensihaid_gumpal" value="gumpal" {{ ($asesmenKandungan->konsistensi_haid=="gumpal")? "checked" : "" }}><label for="konsistensihaid_gumpal" class="ml-2">Gumpal</label>
                        </div>                                                                         
                        <p class="inline-block">.</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="gangguan_seksual" class="inline-block">Gangguan seksual</label>
                        <p class="inline-block">:</p>                          
                        <input type="text" name="gangguan_seksual" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->gangguan_seksual}}">
                    </li>
                </ul>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">POLA/HAID</span> (6 bulan terakhir)</p>
                <ul class="list-disc list-inside">
                    <li class="mb-6">                    
                        <label for="kb_jenis" class="inline-block">KB Jenis :</label>                                                  
                        <input type="text" name="kb_jenis" class="w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->kb_jenis}}">
                        <label for="kb_lama" class="inline-block ml-4">Lama :</label>                                                  
                        <input type="text" name="kb_lama" class="w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->kb_lama}}">
                    </li>
                    <li class="mb-6">                    
                        <label for="obathormon_pernah" class="inline-block">Obat/hormon yang pernah dipakai :</label>                         
                        <input type="text" name="obathormon_pernah" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->obathormon_pernah}}">
                    </li>                    
                </ul>                
            </div>

            <div class="w-full  border border-black p-3">
                <ul class="list-disc list-inside">
                    <li class="mb-6">                    
                        <label for="penyakit" class="">Penyakit yang pernah diderita :</label>                         
                        <div>
                            <div class="ml-4">
                                <div class="w-32 inline-block mb-3">                                    
                                    <p>Jantung</p>
                                </div>
                                <p class="inline-block">:</p>
                                <div name="penyakit_jantung" id="penyakit_jantung" class="inline-block">                                                                                                   
                                    <input type="checkbox" name="penyakit_jantung[]" id="hipertensi" value="hipertensi" class="penyakit_jantung mx-2"><label for="hipertensi">Hipertensi</label>
                                    <input type="checkbox" name="penyakit_jantung[]" id="gagal_jantung" value="gagal jantung" class="penyakit_jantung mx-2"><label for="gagal_jantung">Gagal Jantung</label>
                                    <input type="checkbox" name="penyakit_jantung[]" id="jantung_rematik" value="jantung rematik" class="penyakit_jantung mx-2"><label for="jantung_rematik">Jantung Rematik</label>
                                    <span class="ml-4">Lain-lain :</span>
                                    <input type="text" name="penyakit_jantung[]" id="jantung_lain_field" class="penyakit_jantung w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="">
                                </div>                                                      
                            </div> 
                            <div class="ml-4">
                                <div class="w-32 inline-block mb-3">                                    
                                    <p>Paru</p>
                                </div>
                                <p class="inline-block">:</p>                                
                                <div id="penyakit_paru" class="inline-block">
                                    <input type="checkbox" name="penyakit_paru[]" id="asma" value="asma" class="penyakit_paru mx-2"><label for="asma">Asma</label>
                                    <input type="checkbox" name="penyakit_paru[]" id="tb_paru" value="tb paru" class="penyakit_paru mx-2"><label for="tb_paru">TB Paru</label>
                                    <input type="checkbox" name="penyakit_paru[]" id="radang_pleura" value="radang pleura" class="penyakit_paru mx-2"><label for="radang_pleura">Radang Pleura</label>
                                    <span class="ml-4">Lain-lain :</span>
                                    <input type="text" name="penyakit_paru[]" id="paru_lain_field" class="penyakit_paru w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="">
                                </div>                                                      
                            </div>

                            <div class="ml-4">
                                <div class="w-32 inline-block mb-3">                                    
                                    <p>Infeksi</p>
                                </div>
                                <p class="inline-block">:</p>
                                <div id="penyakit_infeksi" class="inline-block">
                                    <input type="checkbox" name="penyakit_infeksi[]" id="asma" value="asma" class="penyakit_infeksi mx-2"><label for="asma">Hepatitis</label>
                                    <input type="checkbox" name="penyakit_infeksi[]" id="hiv" value="hiv" class="penyakit_infeksi mx-2"><label for="hiv">HIV</label>
                                    <input type="checkbox" name="penyakit_infeksi[]" id="sal_kemih" value="radang pleura" class="penyakit_infeksi mx-2"><label for="sal_kemih">Sal Kemih</label>
                                    <span class="ml-4">Lain-lain :</span>
                                    <input type="text" name="penyakit_infeksi[]" id="infeksi_lain_field" class="penyakit_infeksi w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="">
                                </div>                                                      
                            </div>  
                            <div class="ml-4">
                                <div class="w-32 inline-block mb-3">                                    
                                    <p>Metabolik</p>
                                </div>
                                <p class="inline-block">:</p>
                                <div id="penyakit_metabolik" class="inline-block">
                                    <input type="checkbox" name="penyakit_metabolik[]" id="dm" value="dm" class="penyakit_metabolik mx-2"><label for="dm">DM</label>
                                    <input type="checkbox" name="penyakit_metabolik[]" id="thiroid" value="thiroid" class="penyakit_metabolik mx-2"><label for="thiroid">Thiroid</label>
                                    <span class="ml-4">Lain-lain :</span>
                                    <input type="text" name="penyakit_metabolik[]" id="metabolik_lain_field" class="penyakit_metabolik w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="">
                                </div>                                                      
                            </div>   
                            <div class="ml-4">
                                <div class="w-32 inline-block">                                    
                                    <p>Operasi</p>
                                </div>
                                <p class="inline-block">:</p>
                                <div id="penyakit_operasi" class="inline-block">
                                    <input type="checkbox" name="penyakit_operasi[]" id="sc" value="Sc (x)" class="penyakit_operasi mx-2"><label for="sc">Sc (x)</label>
                                    <input type="checkbox" name="penyakit_operasi[]" id="kandungan" value="Kandungan (th)" class="penyakit_operasi mx-2"><label for="tb_paru">Kandungan (th)</label>
                                </div>                                                      
                            </div>                         
                        </div>                  
                    </li>  
                    <li class="mb-6">
                        <label for="faktor_lingkungan" class="">Faktor Lingkungan/ Keturunan : (alergi tipe -reaksi, penyakit metabolik- menular)</label>
                        <input type="text" name="faktor_lingkungan" class="w-2/5 px-3 ml-4 mt-3 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->faktor_lingkungan}}">  
                    </li>  
                    <li class="mb-6">
                        <label for="riwayat_pengobatan" class="">Riwayat pengobatan/perawatan</label>
                        <input type="text" name="riwayat_pengobatan" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->riwayat_pengobatan}}">
                    </li>
                    <li class="mb-6">
                        <label for="alergi" class="">Alergi</label>
                        <input type="text" name="alergi" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->alergi}}"> 
                    </li>
                </ul>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">KEADAAN UMUM</span></p>
                <ul class="list-inside">
                    <li class="mb-6">                    
                        <label for="kesadaran" class="">Kesadaran : </label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="kesadaran" id="komposmentis" value="komposmentis" {{ ($asesmenKandungan->kesadaran=="komposmentis")? "checked" : "" }}><label for="Komposmentis" class="ml-2" >Komposmentis</label>
                            <input type="radio" name="kesadaran" id="apatis" value="Apatis" {{ ($asesmenKandungan->kesadaran=="Apatis")? "checked" : "" }}><label for="apatis" class="ml-2" >Apatis</label>
                            <input type="radio" name="kesadaran" id="somnolens" value="Somnolens" {{ ($asesmenKandungan->kesadaran=="Somnolens")? "checked" : "" }}><label for="somnolens" class="ml-2" >Somnolens</label>
                            <input type="radio" name="kesadaran" id="sopor" value="Sopor" {{ ($asesmenKandungan->kesadaran=="Sopor")? "checked" : "" }}><label for="sopor" class="ml-2">Sopor</label>
                            <input type="radio" name="kesadaran" id="koma" value="Koma" {{ ($asesmenKandungan->kesadaran=="Koma")? "checked" : "" }}><label for="koma" class="ml-2">Koma</label>
                        </div> 
                    </li>
                    <li class="mb-6">                    
                        <p class="">GCS : </p>
                        <div class="ml-4 inline-block">
                            <span class="mr-2">
                                T 
                                <input type="number" name="tensi" min="0" max="999" class="w-20 px-3 ml-2 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="...." value="{{$asesmenKandungan->tensi}}">
                                mm/HG,
                            </span>
                            <span class="mr-2">
                                N 
                                <input type="number" name="nadi" min="0" max="999" class="w-20 px-3 ml-2 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="...." value="{{$asesmenKandungan->nadi}}">
                                x/mnt,
                            </span>
                            <span class="mr-2">
                                tr 
                                <input type="number" name="suhu_tr" min="0" max="999" class="w-20 px-3 ml-2 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="...." value="{{$asesmenKandungan->suhu_tr}}">
                                °C,
                            </span>
                            <span class="mr-2">
                                ta 
                                <input type="number" name="suhu_ta" min="0" max="999" class="w-20 px-3 ml-2 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="...." value="{{$asesmenKandungan->suhu_ta}}">
                                °C,
                            </span>
                            <span class="mr-2"> 
                                RR 
                                <input type="number" name="respiration_rate" min="0" max="999" class="w-20 px-3 ml-2 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="...." value="{{$asesmenKandungan->respiration_rate}}">
                                x/m
                            </span>
                        </div> 
                    </li>
                    <li class="mb-6">
                        <label for="anemis">Anemis</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan[]" id="anemis" value="anemis" class="keadaan mx-2">)</p>
                        <label for="sianosis">Sianosis</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan[]" id="sianosis" value="sianosis" class="keadaan mx-2">)</p>
                        <label for="sesak">Sesak</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan[]" id="sesak" value="sesak" class="keadaan mx-2">)</p>
                        <label for="ikterus">Ikterus</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan[]" id="ikterus" value="ikterus" class="keadaan mx-2">)</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="keadaan_kepala" class="inline-block w-32">Kepala</label>
                        <p class="inline-block">:</p>
                        <input type="text" name="keadaan_kepala" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->keadaan_kepala}}"> 
                    </li>
                    <li class="mb-6">                    
                        <label for="keadaan_dada" class="inline-block w-32">Dada : </label>
                        <p class="inline-block">:</p>
                        <input type="text" name="keadaan_dada" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->keadaan_dada}}"> 
                    </li>
                    <li class="mb-6">                    
                        <label for="keadaan_perut" class="inline-block w-32">Perut : </label>
                        <p class="inline-block">:</p>
                        <input type="text" name="keadaan_perut" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->keadaan_perut}}">  
                    </li>
                    <li class="mb-6">                    
                        <label for="ekstremitas" class="inline-block w-32">Ekstremitas</label>
                        <p class="inline-block">:</p>
                        <input type="text" name="ekstremitas" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->ekstremitas}}"> 
                    </li>
                
                    <li class="mb-6">                    
                        <label for="vt" class="">VT v/v : </label>
                        <ul class="list-inside">
                            <li>  
                                <label for="vt_p" class="inline-block w-24">P</label>
                                <p class="inline-block">:</p>
                                <input type="text" name="vt_p" class="w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->vt_p}}"> 
                            </li>
                            <li>  
                                <label for="vt_cu" class="inline-block w-24">CU</label>
                                <p class="inline-block">:</p>
                                <input type="text" name="vt_cu" class="w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->vt_cu}}"> 
                            </li>
                            <li>  
                                <label for="vt_ap_ka" class="inline-block w-24">AP ka</label>
                                <p class="inline-block">:</p>
                                <input type="text" name="vt_ap_ka" class="w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->vt_ap_ka}}"> 
                            </li>
                            <li>  
                                <label for="vt_ap_ki" class="inline-block w-24">AP ki</label>
                                <p class="inline-block">:</p>
                                <input type="text" name="vt_ap_ki" class="w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->vt_ap_ki}}"> 
                            </li>
                            <li>  
                                <label for="vt_cd" class="inline-block w-24">CD</label>
                                <p class="inline-block">:</p>
                                <input type="text" name="vt_cd" class="w-1/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->vt_cd}}"> 
                            </li>
                        </ul>
                    </li>
                    
                    <li class="mb-6">                    
                        <label for="inspekulo" class="inline-block w-32">Inspekulo</label>
                        <p class="inline-block">:</p>
                        <input type="text" name="inspekulo" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder=""  value="{{$asesmenKandungan->inspekulo}}"> 
                    </li>
                    <li class="mb-6">                    
                        <label for="pungsi_douglas" class="inline-block w-32">Pungsi Douglas</label>
                        <p class="inline-block">:</p>
                        <input type="text" name="pungsi_douglas" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder=""  value="{{$asesmenKandungan->pungsi_douglas}}"> 
                    </li>
                    <li class="mb-6">                    
                        <label for="ultrasonografi" class="inline-block w-32">Ultrasonografi</label>
                        <p class="inline-block">:</p>
                        <input type="text" name="ultrasonografi" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder=""  value="{{$asesmenKandungan->ultrasonografi}}"> 
                    </li>
                    <li class="mb-6">                    
                        <label for="ct_scan" class="inline-block w-32">CT Scan/Ro</label>
                        <p class="inline-block">:</p>
                        <input type="text" name="ct_scan" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder=""  value="{{$asesmenKandungan->ct_scan}}"> 
                    </li>
                    <li class="mb-6">                    
                        <label for="laboratorium" class="inline-block w-32">Laboratorium</label>
                        <p class="inline-block">:</p>
                        <input type="text" name="laboratorium" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder=""  value="{{$asesmenKandungan->laboratorium}}"> 
                    </li>            
                </ul>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">SKETSA</span></p>
                <textarea name="sketsa" cols="200" rows="5" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="">{{$asesmenKandungan->sketsa}}</textarea>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">ASSESMEN/DIAGNOSIS (anatomis, fungsi, kompplikasi/kerja - banding)</span></p>
                <textarea name="assesmen" cols="200" rows="5" class="w-2/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" >{{$asesmenKandungan->assesmen}}</textarea>
            </div>

            <div class="w-full -mt-px flex">
                <div class="w-1/2 border border-black p-3">
                    <p class="text-lg mb-8"><span class="font-bold">RENCANA TERAPI</span></p> 
                    <p class="text-lg mb-8"><span class="font-bold">A. MEDIK</span></p>   
                    <ol class="list-decimal list-inside">
                        <li class="mb-3">  
                            <input type="text" name="med_1" class="w-3/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->med_1}}"> 
                        </li>
                        <li class="mb-3"> 
                            <input type="text" name="med_2" class="w-3/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->med_2}}"> 
                        </li>
                        <li class="mb-3"> 
                            <input type="text" name="med_3" class="w-3/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder=""  value="{{$asesmenKandungan->med_3}}"> 
                        </li>
                        <li class="mb-3">
                            <input type="text" name="med_4" class="w-3/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->med_4}}"> 
                        </li>
                        <li class="mb-3">
                            <input type="text" name="med_5" class="w-3/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->med_5}}"> 
                        </li>
                    </ol>            
                </div>
                <div class="w-1/2 border border-black p-3">
                    <br><br>
                    <p class="text-lg mb-8"><span class="font-bold">B. OPERATIF</span></p>
                </div>
            </div>

            <div class="w-full -mt-px flex">
                <div class="w-1/2 border border-black p-3">
                </div>
                <div class="w-1/2 border border-black p-3 text-center items-center content-center -mr-px">
                    <p><span class="font-bold">Dokter Penanggung Jawab</span></p>
                    <br><br>
                    <input type="text" name="dokter_pj" class="w-3/5 px-3 ml-4 rounded focus:outline-none focus:shadow-outline px-2 border border-gray-500 mr-0" placeholder="" value="{{$asesmenKandungan->dokter_pj}}"> 
                </div>
            </div>
            
            <div class="w-full -mt-px text-right px border border-black p-3">
                    <button
                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Ubah
                    </button>
                    <a class="bg-red-600 hover:bg-red-700 cursor-pointer text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-4"
                        href="{{action('AsesmenKandunganController@show',['id' => $pasien->id, 'nama_dokumen' => $asesmenKandungan->nama_dokumen])}}">
                        Cancel
                    </a>
            </div>
                
            </form>
        </div>
        
    </div>

    </div>
</body>

</html>