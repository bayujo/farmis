@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Pemerahan</h2>
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Jumlah (Liter)
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemerahan as $p)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{$p->jumlah}}
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          <div class="mt-5">
            {{$pemerahan->links()}}
          </div>
        </div>
      </main>
    </div>
    </div>
