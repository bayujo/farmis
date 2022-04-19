@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Penjaga</h2>
          <a href="/admin/penjaga/tambah" type="button" class="text-white mb-6 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm max-w-[10rem] py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fa-solid fa-plus pr-2"></i>Tambah Penjaga</a>
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              Nama
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Email
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Nomor Telepon
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Alamat
                          </th>
                          <th scope="col" class="px-6 py-3">
                              <span class="sr-only">Edit</span>
                          </th>
                          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $u)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                              {{$u->name}}
                          </td>
                          <td class="px-6 py-4">
                            {{$u->email}}
                          </td>
                          <td class="px-6 py-4">
                            {{$u->no_hp}}
                          </td>
                          <td class="px-6 py-4">
                            {{$u->alamat}}
                          </td>
                          <td class="px-6 py-4 text-right">
                              <a href="/admin/penjaga/edit/{{ $u->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>

          </div>
        </div>
      </main>
    </div>
    </div>
