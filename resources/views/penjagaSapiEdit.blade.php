@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.penjagaSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Edit Sapi</h2>
            
            <form method="post" action="/penjaga/sapi/update/{{ $cow->id }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="relative z-0 mb-6 w-full group">
                    <input value="{{ $cow->kode }}" type="text" name="kode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required  />
                    <label for="kode" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode</label>
                    @if($errors->has('kode'))
                    <div>
                        {{ $errors->first('kode')}}
                    </div>
                    @endif
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input value="{{ $cow->nama }}" type="text" name="nama" id="nama" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="nama" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                    @if($errors->has('nama'))
                    <div>
                        {{ $errors->first('nama')}}
                    </div>
                    @endif
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input value="{{ $cow->bobot }}" type="number" name="bobot" id="bobot" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="bobot" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bobot (kilogram)</label>
                    @if($errors->has('bobot'))
                    <div>
                        {{ $errors->first('bobot')}}
                    </div>
                    @endif
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input value="{{ $cow->tgl_lahir }}" datepicker datepicker-format="yyyy-mm-dd" name="tgl_lahir" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal Lahir" required>
                    @if($errors->has('tgl_lahir'))
                    <div>
                        {{ $errors->first('tgl_lahir')}}
                    </div>
                    @endif
                </div>
                <div>
                <div class="inline-block">
                    <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Simpan">
                </div>
                @if($message = Session::get('success'))
                <div class="inline-block mx-5 text-sm text-green-600">{{ $message }}</div>
                @elseif($message = Session::get('error'))
                <div class="inline-block mx-5 text-sm text-green-600">{{ $message }}</div>
                @endif
                </div>
            </form>
        </div>
      </main>
    </div>
    </div>
