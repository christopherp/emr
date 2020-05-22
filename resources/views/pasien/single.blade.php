<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/output.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9928c79811.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/dobpicker.js') }}"></script>
    <script src="{{asset('js/createpasien.js') }}"></script>

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
                    <p class="text-teal-500 hover:text-teal-800">></p>
                </li>
                <li class="mr-3">
                <p class="text-teal-500">{{ $pasien->nomor_rm }}</p>
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

        

        <div class="container mx-auto py-8 px-4 flex">



                <div class="w-2/3 border">
                    <div class="p-3">
                        <p class="text-3xl text-teal-500 font-semibold">Data Pasien</p>
                    </div>

                    <div class="flex p-3">
                        <div class="w-1/3">
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nomor Rekam
                                Medis</p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Depan</p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama Belakang
                            </p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Tanggal Lahir
                            </p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Jenis Kelamin
                            </p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Alamat</p>
                        </div>
                        <div class="w-2/3">
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-semibold mb-2">:
                                {{ $pasien->nomor_rm }}</p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-semibold mb-2">:
                                {{$pasien->first_name}}</p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-semibold mb-2">:
                                {{$pasien->last_name}}</p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-semibold mb-2">:
                                {{$pasien->tanggal_lahir }}</p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-semibold mb-2">:
                                {{$pasien->jenis_kelamin }}</p>
                            <p class="block uppercase tracking-wide text-gray-700 text-xs font-semibold mb-2">:
                                {{$pasien->alamat }}</p>
                        </div>

                    </div>

                    <div class="h-px w-11/12 bg-gray-400 mx-auto"></div>

                    <div class="p-3">
                        <p class="text-3xl text-teal-500 font-semibold">Dokumen Rekam Medis</p>
                    </div>

                    <div class="flex p-3">
                        <table class="table-auto w-full"> 
                            <thead>
                                <tr>
                                    <th class="py-2 text-left text-l text-teal-500 font-bold">Id.</th>
                                    <th class="py-2 text-left text-l text-teal-500 font-bold">Nama</th>
                                    <th class="py-2 text-left text-l text-teal-500 font-bold">Dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($dokumenasesmens as $dokumenasesmen)
                                <tr>                                                                        
                                    <td class="border p-3">{{$dokumenasesmen->id }}</td>
                                    <td class="border p-3"><a class="text-teal-500 hover:text-teal-800" href="{{action('AsesmenKandunganController@show',['id' => $pasien->id, 'nama_dokumen' => $dokumenasesmen->nama_dokumen])}}">{{$dokumenasesmen->nama_dokumen}}</a></td>
                                    <td class="border p-3">{{$dokumenasesmen->created_at }}</td>                                
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-1/3 bg-teal-500">
                    <div class="p-3">
                        <p class="text-3xl text-white font-semibold">Actions</p>

                        <ul class="text-white ml-4 text-xl p-4">
                            <li><a href="{{action('PasienController@edit', $pasien['id'])}}"><i
                                        class="fas fa-edit mx-2"></i>Ubah</a></li>
                            <li>
                                <form action="{{action('PasienController@destroy',$pasien['id'])}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger"
                                        type="submit"><i class="far fa-trash-alt mx-2"></i>Hapus</button>
                                </form>
                            </li>
                            <li><a href="{{action('AsesmenKandunganController@create',$pasien['id'])}}">
                            <i class="fas fa-notes-medical mx-2"></i>Tambah Asesmen Medis</a></li>
                        </ul>
                    </div>
                </div>
        </div>

    </div>
</body>

</html>