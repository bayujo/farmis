@extends('layouts.app')
@section('content')

<div class="flex h-[97vh]">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Transaksi</h2>
          <a href="/admin/transaksi/tambah" type="button" class="text-white mb-6 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 font-medium rounded-full text-sm max-w-[10rem] py-2.5 text-center mr-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"><i class="fa-solid fa-plus pr-2"></i>Tambah Transaksi</a>
          


          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              Jenis
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Nominal
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Tanggal
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Keterangan
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($transaksi as $t)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <td scope="row" class="px-6 py-4 font-medium">
                            
                            @if ($t -> jenis == 0)
                            <span class="text-red-500">Pengeluaran</span>
                            @else
                            <span class="text-green-500">Pemasukan</span>
                            @endif
                          </td>
                          <td class="px-6 py-4">
                            Rp {{number_format($t->nominal)}}
                          </td>
                          <td class="px-6 py-4">
                            {{$t->tanggal}}
                          </td>
                          <td class="px-6 py-4">
                            {{$t->keterangan}}
                          </td>
                          <td class="py-4 text-right">
                            <a href="/admin/transaksi/edit/{{ $t->id }}" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">Edit</a>
                          </td>
                          <td class="text-right px-6">
                            <form class="m-0" method="POST" action="{{ route('admin.transaksi.delete', $t->id) }}">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline show_confirm" data-toggle="tooltip" title='Delete'>Hapus</button>
                            </form>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          <div class="my-5">
            {{$transaksi->links()}}
          </div>
        </div>
      </main>
    </div>
    </div>
