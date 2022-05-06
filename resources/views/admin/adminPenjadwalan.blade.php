@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Penjadwalan</h2>
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Judul
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode Sapi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Penjaga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjadwalan as $p)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{$p->judul}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p->id_cow}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p->users->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p->tanggal}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <input data-id="{{$p->id}}" disabled class="something w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox"  {{ $p->status ? 'checked' : '' }}>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

          </div>
        </div>
      </main>
    </div>
    </div>
