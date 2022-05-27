@extends('layouts.app')
@section('content')

<div class="flex h-[97vh]">
  @include('layouts.penjagaSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Penjadwalan</h2>
            <a href="/penjaga/penjadwalan/tambah" type="button" class="text-white mb-6 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 font-medium rounded-full text-sm max-w-[10rem] py-2.5 text-center mr-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"><i class="fa-solid fa-plus pr-2"></i>Tambah Jadwal</a>


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
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
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
                                    <input data-id="{{$p->id}}" class="something w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox"  {{ $p->status ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="/penjaga/penjadwalan/edit/{{ $p->id }}" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-5">
                {{$penjadwalan->links()}}
            </div>
        </div>
      </main>
    </div>
    </div>
    