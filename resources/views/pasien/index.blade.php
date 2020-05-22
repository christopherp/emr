<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/output.css') }}">
    <script src="https://kit.fontawesome.com/9928c79811.js" crossorigin="anonymous"></script>
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

        @if ($errors->any())
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mt-8" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div><br />
        @endif
        @if (\Session::has('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-8" role="alert">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif

        <div class="container mx-auto py-16 px-4">

            <div class="mb-8">
                <a class="bg-teal-500 text-white hover:bg-teal-700 font-semibold cursor-pointer hover:text-white py-2 px-4 rounded"
                href="{{url('pasien/create')}}">
                <i class="fas fa-plus-square mr-2"></i>Tambah Pasien
                </a>
            </div>
            

            <!-- <p class="text-xl text-teal-500 font-bold">Cari Pasien</p>
            <input
                class="w-2/3 h-12 px-3 rounded mt-2 mb-8 focus:outline-none focus:shadow-outline px-2 border border-gray-300"
                type="search" placeholder="Search by ID or Name.."> -->
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="w-1/4 py-2 text-left text-l text-teal-500 font-bold">Nomor Rekam Medis</th>
                        <th class="w-1/2 py-2 text-left text-l text-teal-500 font-bold">Nama</th>
                        <th class="w-1/8 py-2 text-left text-l text-teal-500 font-bold">Tanggal Lahir</th>
                        <th class="w-1/8 py-2 text-center text-l text-teal-500 font-bold">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($pasiens as $pasien)
                    <tr>
                        
                        
                        <td class="border p-3">{{ $pasien->nomor_rm }}</td>
                        <td class="border p-3">{{$pasien->first_name}} {{$pasien->last_name}}</td>
                        <td class="border p-3">{{$pasien->tanggal_lahir }}</td>

                        <td class="border p-3 text-center"> 
                                <a class="bg-teal-500 text-white hover:bg-teal-700 font-semibold cursor-pointer hover:text-white py-2 px-4 rounded mx-auto" 
                                href="{{action('PasienController@show', $pasien->id)}}">
                                <i class="fas fa-search"></i>
                                </a>
                        </td>                                
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $pasiens->links('pagination.default') }}
        </div>
    </div>
</body>

</html>