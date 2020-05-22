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
    </script>
    <script src="{{ url('/js/showasesmenmedis.js') }}"></script>
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
                    <p class="text-teal-500" href="{{action('PasienController@show', $pasien->id)}}">{{ $asesmenKandungan->nama_dokumen }}</p>
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

        <div class="text-right my-4">
            <a
                    href="{{action('AsesmenKandunganController@edit',['id' => $pasien->id, 'nama_dokumen' => $asesmenKandungan->nama_dokumen])}}"
                    class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Edit
            </a>
            <form action="{{action('AsesmenKandunganController@destroy',['id' => $pasien->id, 'nama_dokumen' => $asesmenKandungan->nama_dokumen])}}" method="post" class="inline-block">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick="return confirm('Are you sure?')"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="submit">Hapus</button>
            </form>
        </div>
        

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
                  
            <div class="w-full mt-8 flex">
                <div class="w-1/2 border border-black p-3">
                    <label for="rujukan" class="block">Rujukan (Dari, Diagnosis, Obat-obatan)</label>           
                    <!-- <input type="text" name="rujukan" class="w-5/6 h-10 px-3 rounded mt-2 focus:outline-none focus:shadow-outline px-2 border border-gray-500" placeholder=""> -->
                    <p class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> rujukan }}</p>
                </div>
                <div class="w-1/2 border border-black p-3">
                    <label for="tanggal_datang" class="">Datang tgl.</label>           
                    <!-- <input type="date" class="px-3 rounded mt-2 focus:outline-none focus:shadow-outline px-2 border border-gray-500" name="tanggal_datang"> -->
                    <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> tanggal_datang }}</span>
                    <label for="jam_datang" class="">Jam</label>
                    <!-- <input type="time" class="px-3 rounded mt-2 focus:outline-none focus:shadow-outline px-2 border border-gray-500" name="jam_datang" id="">   -->
                    <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> jam_datang }}</span>
                </div>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">SUBJEKTIF/KELUHAN</span> (Kualitas Dan Kuantitas)</p>
                <ul class="list-disc list-inside">
                    <li class="mb-6">                    
                        <label for="pendarahan" class="inline-block w-32">Pendarahan</label>
                        <p class="inline-block">:</p>                          
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> pendarahan }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="keputihan" class="inline-block w-32">Keputihan</label>
                        <p class="inline-block">:</p>                          
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> keputihan }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="nyeri" class="inline-block w-32">Nyeri</label>
                        <p class="inline-block">:</p>                          
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> nyeri }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="benjolan" class="inline-block w-32">Benjolan</label>
                        <p class="inline-block">:</p>                          
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> benjolan }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="riwayat_haid" class="inline-block w-32">Riwayat Haid</label>
                        <p class="inline-block">:</p>                          
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> riwayat_haid }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="menars_usia" class="inline-block">Menars Usia</label>                                                  
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> menars_usia }}</span>
                        <p class="inline-block">Th.</p>
                        <label for="lama_haid" class="inline-block ml-4">Lama Haid</label>                                                  
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> lama_haid }}</span>
                        <p class="inline-block">Hari.</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="nyeri_haid" class="inline-block">Nyeri Haid :</label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="nyeri_haid" id="nyerihaid_ya" value="Ya" {{ ($asesmenKandungan->nyeri_haid=="Ya")? "checked" : "disabled" }}><label for="nyerihaid_ya" class="ml-2"  >Ya</label>
                            <input type="radio" name="nyeri_haid" id="nyerihaid_tidak" value="Tidak" {{ ($asesmenKandungan->nyeri_haid=="Tidak")? "checked" : "disabled"}} ><label for="nyerihaid_tidak" class="ml-2">Tidak</label>
                        </div> 
                        <div class="ml-4 inline-block">
                            <input type="checkbox" name="nyeri_haid_saat" id="nyerihaid_sebelum" value="sebelum" class="nyeri_haid_saat"><label for="nyerihaid_sebelum" class="ml-2">Sebelum</label>
                            <input type="checkbox" name="nyeri_haid_saat" id="nyerihaid_selama" value="selama" class="nyeri_haid_saat"><label for="nyerihaid_selama" class="ml-2">Selama</label>
                            <input type="checkbox" name="nyeri_haid_saat" id="nyerihaid_mulai" value="mulai" class="nyeri_haid_saat"><label for="nyerihaid_mulai" class="ml-2">Mulai</label>
                            <input type="checkbox" name="nyeri_haid_saat" id="nyerihaid_akhir" value="akhir" class="nyeri_haid_saat"><label for="nyerihaid_akhir" class="ml-2">Akhir</label>
                        </div>                                                                           
                        <p class="inline-block">.</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="jumlah_pembalut" class="inline-block">Jumlah Pembalut (pembalut/hari) :</label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="jumlah_pembalut" id="jumlah_pembalut_sedikit" value="sedikit" {{ ($asesmenKandungan->jumlah_pembalut=="sedikit")? "checked" : "disabled" }}><label for="jumlah_pembalut_sedikit" class="ml-2">Sedikit (1-2 pembalut)</label>
                            <input type="radio" name="jumlah_pembalut" id="jumlah_pembalut_sedang" value="sedang"{{ ($asesmenKandungan->jumlah_pembalut=="sedang")? "checked" : "disabled" }}><label for="jumlah_pembalut_sedang" class="ml-2">Sedang (3-4 pembalut)</label>
                            <input type="radio" name="jumlah_pembalut" id="jumlah_pembalut_banyak" value="banyak"{{ ($asesmenKandungan->jumlah_pembalut=="banyak")? "checked" : "disabled" }}><label for="jumlah_pembalut_banyak" class="ml-2">Banyak (>4 pembalut)</label>                            
                        </div>                        
                    </li>
                    <li class="mb-6">                    
                        <label for="warna_haid" class="inline-block">Warna :</label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="warna_haid" class="ml-2" id="warnahaid_kehitaman" value="kehitaman" {{ ($asesmenKandungan->warna_haid=="kehitaman")? "checked" : "disabled" }}><label for="warnahaid_kehitaman" class="ml-2">Kehitaman</label>
                            <input type="radio" name="warna_haid" class="ml-2" id="warnahaid_merah_segar" value="merah segar" {{ ($asesmenKandungan->warna_haid=="merah segar")? "checked" : "disabled" }}><label for="warnahaid_merah_segar" class="ml-2">Merah Segar</label>
                            <input type="radio" name="warna_haid" class="ml-2" id="warnahaid_kecoklatan" value="kecoklatan" {{ ($asesmenKandungan->warna_haid=="kecoklatan")? "checked" : "disabled" }}><label for="warnahaid_kecoklatan" class="ml-2">Kecoklatan</label>
                        </div>                    
                        <label for="konsistensi_haid" class="inline-block ml-4">Konsistensi :</label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="konsistensi_haid" id="konsistensihaid_encer" value="encer" {{ ($asesmenKandungan->konsistensi_haid=="encer")? "checked" : "disabled" }}><label for="konsistensihaid_encer" class="ml-2">Encer</label>
                            <input type="radio" name="konsistensi_haid" id="konsistensihaid_gumpal" value="gumpal" {{ ($asesmenKandungan->konsistensi_haid=="gumpal")? "checked" : "disabled" }}><label for="konsistensihaid_gumpal" class="ml-2">Gumpal</label>
                        </div>                                                                           
                        <p class="inline-block">.</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="gangguan_seksual" class="inline-block">Gangguan seksual</label>
                        <p class="inline-block">:</p>                          
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> gangguan_seksual }}</span>
                    </li>
                </ul>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">POLA/HAID</span> (6 bulan terakhir)</p>
                <ul class="list-disc list-inside">
                    <li class="mb-6">                    
                        <label for="kb_jenis" class="inline-block">KB Jenis :</label>                                                  
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> kb_jenis }}</span>
                        <label for="kb_lama" class="inline-block ml-4">Lama :</label>                                                  
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> kb_lama }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="obathormon_pernah" class="inline-block">Obat/hormon yang pernah dipakai :</label>                         
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> obathormon_pernah }}</span>
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
                                    <span class="penyakit_jantung px-3 mt-2 font-medium "></span>
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
                                    <span class="penyakit_paru px-3 mt-2 font-medium "></span>
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
                                    <span class="penyakit_infeksi px-3 mt-2 font-medium "></span>
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
                                    <span class="penyakit_metabolik px-3 mt-2 font-medium "></span>
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
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> faktor_lingkungan }}</span>
                    </li>  
                    <li class="mb-6">
                        <label for="riwayat_pengobatan" class="">Riwayat pengobatan/perawatan</label>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> riwayat_pengobatan }}</span>
                    </li>
                    <li class="mb-6">
                        <label for="alergi" class="">Alergi</label>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> alergi }}</span>
                    </li>
                </ul>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">KEADAAN UMUM</span></p>
                <ul class="list-inside">
                    <li class="mb-6">                    
                        <label for="kesadaran" class="">Kesadaran : </label>
                        <div class="ml-4 inline-block">
                            <input type="radio" name="kesadaran" id="komposmentis" value="komposmentis" {{ ($asesmenKandungan->kesadaran=="komposmentis")? "checked" : "disabled" }}><label for="Komposmentis" class="ml-2" >Komposmentis</label>
                            <input type="radio" name="kesadaran" id="apatis" value="Apatis" {{ ($asesmenKandungan->kesadaran=="Apatis")? "checked" : "disabled" }}><label for="apatis" class="ml-2" >Apatis</label>
                            <input type="radio" name="kesadaran" id="somnolens" value="Somnolens" {{ ($asesmenKandungan->kesadaran=="Somnolens")? "checked" : "disabled" }}><label for="somnolens" class="ml-2" >Somnolens</label>
                            <input type="radio" name="kesadaran" id="sopor" value="Sopor" {{ ($asesmenKandungan->kesadaran=="Sopor")? "checked" : "disabled" }}><label for="sopor" class="ml-2">Sopor</label>
                            <input type="radio" name="kesadaran" id="koma" value="Koma" {{ ($asesmenKandungan->kesadaran=="Koma")? "checked" : "disabled" }}><label for="koma" class="ml-2">Koma</label>
                        </div> 
                    </li>
                    <li class="mb-6">                    
                        <p class="">GCS : </p>
                        <div class="ml-4 inline-block">
                            <span class="mr-2">
                                T 
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> tensi }}</span>
                                mm/HG,
                            </span>
                            <span class="mr-2">
                                N 
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> nadi }}</span>
                                x/mnt,
                            </span>
                            <span class="mr-2">
                                tr 
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> suhu_tr }}</span>
                                °C,
                            </span>
                            <span class="mr-2">
                                ta 
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> suhu_ta }}</span>
                                °C,
                            </span>
                            <span class="mr-2"> 
                                RR 
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> respiration_rate }}</span>
                                x/m
                            </span>
                        </div> 
                    </li>
                    <li class="mb-6">
                        <label for="anemis">Anemis</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan" id="anemis" value="anemis" class="keadaan mx-2">)</p>
                        <label for="sianosis">Sianosis</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan" id="sianosis" value="sianosis" class="keadaan mx-2">)</p>
                        <label for="sesak">Sesak</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan" id="sesak" value="sesak" class="keadaan mx-2">)</p>
                        <label for="ikterus">Ikterus</label><p class="inline-block mx-2">(<input type="checkbox" name="keadaan" id="ikterus" value="ikterus" class="keadaan mx-2">)</p>
                    </li>
                    <li class="mb-6">                    
                        <label for="keadaan_kepala" class="inline-block w-32">Kepala</label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> keadaan_kepala }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="keadaan_dada" class="inline-block w-32">Dada : </label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> keadaan_dada }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="keadaan_perut" class="inline-block w-32">Perut : </label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> keadaan_perut }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="ekstremitas" class="inline-block w-32">Ekstremitas</label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> ekstremitas }}</span>
                    </li>
                
                    <li class="mb-6">                    
                        <label for="vt" class="">VT v/v : </label>
                        <ul class="list-inside">
                            <li>  
                                <label for="vt_p" class="inline-block w-24">P</label>
                                <p class="inline-block">:</p>
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> vt_p }}</span>
                            </li>
                            <li>  
                                <label for="vt_cu" class="inline-block w-24">CU</label>
                                <p class="inline-block">:</p>
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> vt_cu }}</span>
                            </li>
                            <li>  
                                <label for="vt_ap_ka" class="inline-block w-24">AP ka</label>
                                <p class="inline-block">:</p>
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> vt_ap_ka }}</span>
                            </li>
                            <li>  
                                <label for="vt_ap_ki" class="inline-block w-24">AP ki</label>
                                <p class="inline-block">:</p>
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> vt_ap_ki }}</span>
                            </li>
                            <li>  
                                <label for="vt_cd" class="inline-block w-24">CD</label>
                                <p class="inline-block">:</p>
                                <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> vt_cd }}</span>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="mb-6">                    
                        <label for="inspekulo" class="inline-block w-32">Inspekulo</label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> inspekulo }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="pungsi_douglas" class="inline-block w-32">Pungsi Douglas</label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> pungsi_douglas }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="ultrasonografi" class="inline-block w-32">Ultrasonografi</label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> ultrasonografi }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="ct_scan" class="inline-block w-32">CT Scan/Ro</label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> ct_scan }}</span>
                    </li>
                    <li class="mb-6">                    
                        <label for="laboratorium" class="inline-block w-32">Laboratorium</label>
                        <p class="inline-block">:</p>
                        <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> laboratorium }}</span>
                    </li>            
                </ul>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">SKETSA</span></p>
                <p class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> sketsa }}</p>
            </div>

            <div class="w-full -mt-px border border-black p-3">
                <p class="text-lg mb-8"><span class="font-bold">ASSESMEN/DIAGNOSIS (anatomis, fungsi, kompplikasi/kerja - banding)</span></p>
                <p class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> assesmen }}</p>
            </div>

            <div class="w-full -mt-px flex">
                <div class="w-1/2 border border-black p-3">
                    <p class="text-lg mb-8"><span class="font-bold">RENCANA TERAPI</span></p> 
                    <p class="text-lg mb-8"><span class="font-bold">A. MEDIK</span></p>   
                    <ol class="list-decimal list-inside">
                        <li class="mb-3">  
                            <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> med_1 }}</span>
                        </li>
                        <li class="mb-3"> 
                            <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> med_2 }}</span>
                        </li>
                        <li class="mb-3"> 
                            <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> med_3 }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> med_4 }}</span>
                        </li>
                        <li class="mb-3">
                            <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> med_5 }}</span>
                        </li>
                    </ol>            
                </div>
                <div class="w-1/2 border border-black p-3">
                    <br><br>
                    <p class="text-lg mb-8"><span class="font-bold">B. OPERATIF</span></p>
                </div>
            </div>

            <div class="w-full -mt-px flex">
                <div class="w-1/2 border border-black p-3 -mr-px">
                </div>
                <div class="w-1/2 border border-black p-3 text-center items-center content-center -mr-px">
                    <p><span class="font-bold">Dokter Penanggung Jawab</span></p>
                    <br><br>
                    <span class="px-3 mt-2 font-medium ">{{ $asesmenKandungan -> dokter_pj }}</span>
                </div>
            </div>
        </div>
        
    </div>

    </div>
</body>

</html>