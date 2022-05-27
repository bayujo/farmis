@extends('layouts.app')
@section('content')

<div class="flex h-[97vh]">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Edit Transaksi</h2>
            
            <form method="post" action="/admin/transaksi/update/{{ $transaksi->id }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="relative z-0 mb-6 w-full group">
                    <div class="flex flex-wrap">
                        <div class="flex items-center mr-4">
                            <input @if ($transaksi->jenis == 0 ) checked @else @endif id="red-radio" type="radio" value="0" name="jenis" class="w-5 h-5 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                            <label for="red-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pengeluaran</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input @if ($transaksi->jenis == 1 ) checked @else @endif id="green-radio" type="radio" value="1" name="jenis" class="w-5 h-5 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pemasukan</label>
                        </div>
                    </div>
                    @if($errors->has('jenis'))
                    <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $errors->first('jenis')}}</span>
                    </div>
                    @endif
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="nominal" value="{{ $transaksi->nominal }}" id="nominal" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " required />
                    <label for="nominal" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nominal</label>
                    @if($errors->has('nominal'))
                    <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $errors->first('nominal')}}</span>
                    </div>
                    @endif
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="keterangan" value="{{ $transaksi->keterangan }}" id="keterangan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer" placeholder=" " required />
                    <label for="keterangan" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan</label>
                    @if($errors->has('keterangan'))
                    <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">{{ $errors->first('keterangan')}}</span>
                    </div>
                    @endif
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input value="{{ $transaksi->tanggal }}" datepicker datepicker-buttons datepicker-format="yyyy-mm-dd" name="tanggal" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Tanggal" required>
                </div>
                @if($errors->has('tanggal'))
                <div class="p-4 mb-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <span class="font-medium">{{ $errors->first('tanggal')}}</span>
                </div>
                @endif
                <div>
                <div class="inline-block">
                    <input type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-indigo-700" value="Simpan">
                </div>
                
                </div>
            </form>
        </div>
      </main>
    </div>
    </div>
    
