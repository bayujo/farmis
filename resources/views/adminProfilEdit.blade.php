@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
  <main class="h-full overflow-y-auto bg-gray-50">
    @if($message = Session::get('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
      <span class="font-medium">{{ $message }}</span>
    </div>
    @elseif($message = Session::get('error'))
        <div class="mx-5 text-sm text-green-600">{{ $message }}</div>
    @endif
    <form class="container px-6 mx-auto grid" method="post" action="/admin/profil/update/{{ Auth::user()->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="flex justify-between items-center my-6">
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Profil</h2>
        
        <input type="submit" class="text-white h-10 w-24 mb-6 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Simpan">
      </div>
      
      <div class="w-full justify-center flex mb-16">
        <i class="fa-solid fa-circle-user text-gray-300 text-[12rem]"></i>
      </div>
      <div >
        
        <div class="mb-6 flex items-center">
          <label for="name" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
          <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->name}}"/>
          @if($errors->has('name'))
          <div>
              {{ $errors->first('name')}}
          </div>
          @endif
        </div>
        <div class="mb-6 flex items-center">
          <label for="email" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
          <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->email}}"/>
          @if($errors->has('email'))
          <div>
              {{ $errors->first('email')}}
          </div>
          @endif
        </div>
        <div class="mb-6 flex items-center">
          <label for="no_hp" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor HP</label>
          <input type="text" id="no_hp" name="no_hp" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->no_hp}}"/>
          @if($errors->has('no_hp'))
          <div>
              {{ $errors->first('no_hp')}}
          </div>
          @endif
        </div>
        <div class="mb-6 flex items-center">
          <label for="alamat" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
          <input type="text" id="alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{Auth::user()->alamat}}"/>
          @if($errors->has('alamat'))
          <div>
              {{ $errors->first('alamat')}}
          </div>
          @endif
        </div>
    </div>
    </form>
  </main>
</div>
</div>