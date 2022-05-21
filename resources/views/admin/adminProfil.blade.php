@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <div class="flex justify-between items-center my-6">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Profil</h2>
            <div>
              <a href="/admin/profil/password/edit" type="button" class="text-white h-10 w-40 mb-6 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 font-medium rounded-full text-sm py-2.5 text-center mr-2 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-indigo-700"><i class="fa-solid fa-unlock pr-2"></i></i>Ubah Password</a>
              <a href="/admin/profil/edit/{{ Auth::user()->id }}" type="button" class="text-white h-10 w-24 mb-6 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 font-medium rounded-full text-sm py-2.5 text-center mr-2 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-indigo-700"><i class="fa-solid fa-pen-to-square pr-2"></i>Edit</a>
            </div>
          </div>
          
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
