@extends('layouts.app')
@section('content')

<div class="flex h-[97vh]">
  @include('layouts.penjagaSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
  <main class="h-full overflow-y-auto bg-gray-50">
    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Profil</h2>
      <div class="w-full justify-center flex mb-16">
        <i class="fa-solid fa-circle-user text-gray-300 text-[12rem]"></i>
      </div>
      <form>
        <div class="mb-6 flex items-center">
          <label for="name" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
          <label type="name" id="name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">{{Auth::user()->name}}</label>
        </div>
        <div class="mb-6 flex items-center">
          <label for="email" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
          <label type="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">{{Auth::user()->email}}</label>
        </div>
        <div class="mb-6 flex items-center">
          <label for="no_hp" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor HP</label>
          <label type="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">{{Auth::user()->no_hp}}</label>
        </div>
        <div class="mb-6 flex items-center">
          <label for="alamat" class="w-1/4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alamat</label>
          <label type="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">{{Auth::user()->alamat}}</label>
        </div>
      </form>
    </div>
  </main>
</div>
</div>
