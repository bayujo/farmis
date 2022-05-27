@extends('layouts.app')
@section('content')

<div class="flex h-[97vh]">
  @include('layouts.penjagaSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>
          <div class="my-4 w-full grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $jumlahsapi }}</span>
                        <h3 class="text-base font-normal text-gray-500">
                            Sapi
                        </h3>
                    </div>
                    <div class="ml-5 w-0 flex items-center justify-end text-3xl flex-1 text-green-500 font-bold">
                      🐄
                    </div>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"
                            >{{ $jumlahpemerahan }}</span
                        >
                        <h3 class="text-base font-normal text-gray-500">
                            Pemerahan
                        </h3>
                    </div>
                    <div
                        class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-3xl font-bold"
                    >
                        🥛
                    </div>
                </div>
            </div>
          </div>
          
          <div class="w-full grid grid-cols-1 xl:grid-cols-3 md:grid-cols-2 gap-4">
            <div class="shadow bg-white rounded-lg p-4">
              <div class="mb-4 flex items-center justify-between">
                  <div>
                      <h3 class="text-xl font-bold text-gray-900 mb-2">
                          Terlewat
                      </h3>
                  </div>
                  <div class="flex-shrink-0">
                      <p
                          href="#"
                          class="bg-red-100 text-red-500 font-bold text-xs rounded-lg p-2 px-3"
                          >@if ($penjadwalanmissed) {{ $penjadwalanmissed[0]->count }} @else 0 @endif</p
                      >
                  </div>
              </div>
              <div class="overflow-y-auto max-h-[30rem] min-h-[30rem]">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-5 py-3">
                              Judul
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Kode Sapi
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Tanggal
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Status
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($penjadwalanmissed as $p)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <td scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                              {{$p->judul}}
                          </td>
                          <td class="px-5 py-4">
                              {{$p->id_cow}}
                          </td>
                          <td class="px-5 py-4">
                              {{$p->tanggal}}
                          </td>
                          <td class="px-5 py-4">
                              <div class="flex items-center">
                                  <input data-id="{{$p->id}}" class="something w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox"  {{ $p->status ? 'checked' : '' }}>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="shadow bg-white rounded-lg p-4">
              <div class="mb-4 flex items-center justify-between">
                  <div>
                      <h3 class="text-xl font-bold text-gray-900 mb-2">
                          Hari Ini
                      </h3>
                  </div>
                  <div class="flex-shrink-0">
                      <p
                          href="#"
                          class="bg-indigo-100 text-indigo-500 font-bold text-xs rounded-lg p-2 px-3"
                          >@if ($penjadwalantoday) {{ $penjadwalantoday[0]->count }} @else 0 @endif</p
                      >
                  </div>
              </div>
              <div class="overflow-y-auto max-h-[30rem]">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-5 py-3">
                              Judul
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Kode Sapi
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Tanggal
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Status
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($penjadwalantoday as $p)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <td scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                              {{$p->judul}}
                          </td>
                          <td class="px-5 py-4">
                              {{$p->id_cow}}
                          </td>
                          <td class="px-5 py-4">
                              {{$p->tanggal}}
                          </td>
                          <td class="px-5 py-4">
                              <div class="flex items-center">
                                  <input data-id="{{$p->id}}" class="something w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox"  {{ $p->status ? 'checked' : '' }}>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="shadow bg-white rounded-lg p-4">
              <div class="mb-4 flex items-center justify-between">
                  <div>
                      <h3 class="text-xl font-bold text-gray-900 mb-2">
                          Besok
                      </h3>
                  </div>
                  <div class="flex-shrink-0">
                      <p
                          href="#"
                          class="bg-green-100 text-green-500 font-bold text-xs rounded-lg p-2 px-3"
                          >@if($penjadwalantomorrow) {{ $penjadwalantomorrow[0]->count }} @else 0 @endif</p
                      >
                  </div>
              </div>
              <div class="overflow-y-auto max-h-[30rem]">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-5 py-3">
                              Judul
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Kode Sapi
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Tanggal
                          </th>
                          <th scope="col" class="px-5 py-3">
                              Status
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($penjadwalantomorrow as $p)
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <td scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                              {{$p->judul}}
                          </td>
                          <td class="px-5 py-4">
                              {{$p->id_cow}}
                          </td>
                          <td class="px-5 py-4">
                              {{$p->tanggal}}
                          </td>
                          <td class="px-5 py-4">
                              <div class="flex items-center">
                                  <input data-id="{{$p->id}}" class="something w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox"  {{ $p->status ? 'checked' : '' }}>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
      </main>
    </div>
    </div>
