@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Sapi</h2>
          
          @if ($message = Session::get('success'))
          <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800">
              <p>{{ $message }}</p>
          </div>
          @endif


          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              Kode
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Nama
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Bobot (KG)
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Tanggal Lahir
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Umur (Tahun)
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($cow as $c)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                              {{$c->kode}}
                          </td>
                          <td class="px-6 py-4">
                            {{$c->nama}}
                          </td>
                          <td class="px-6 py-4">
                            {{$c->bobot}}
                          </td>
                          <td class="px-6 py-4">
                            {{$c->tgl_lahir}}
                          </td>
                          <td class="px-6 py-4">
                            {{$c->age()}}
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
