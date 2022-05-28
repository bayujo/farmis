@extends('layouts.app')
@section('content')

<div class="flex h-[97vh]">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>
          <div class="my-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
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
                              >{{ $jumlahtransaksi }}</span
                          >
                          <h3 class="text-base font-normal text-gray-500">
                              Transaksi
                          </h3>
                      </div>
                      <div
                          class="ml-5 w-0 mb-1 flex items-center justify-end flex-1 text-green-500 text-3xl font-bold"
                      >
                          💵
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
            
            <div class="w-full mb-4 grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
              <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 2xl:col-span-2">
                <h4 class=" font-semibold text-gray-800 dark:text-gray-300">Transaksi</h4>
                  <div class="py-3">
                    <ul class="flex flex-wrap">
                        <li style="margin-right: 1rem">
                            <button style="display: inline-flex; align-items: center">
                                <span
                                    style="
                                        display: block;
                                        width: 0.75rem;
                                        height: 0.75rem;
                                        border-radius: 9999px;
                                        margin-right: 0.5rem;
                                        border-width: 3px;
                                        border-color: rgb(45, 212, 191);
                                        pointer-events: none;
                                    "
                                ></span
                                ><span style="display: flex; align-items: center"
                                    ><span
                                        style="
                                            color: rgb(30, 41, 59);
                                            font-size: 1.5rem;
                                            line-height: 2.25rem;
                                            font-weight: 700;
                                            margin-right: 0.5rem;
                                            pointer-events: none;
                                        "
                                        >Rp{{ number_format($totalpemasukan[0]) }}</span
                                    ><span
                                        style="
                                            color: rgb(100, 116, 139);
                                            font-size: 0.875rem;
                                            line-height: 1.25rem;
                                        "
                                        >Pemasukan</span
                                    ></span
                                >
                            </button>
                        </li>
                        <li style="margin-right: 1rem">
                            <button style="display: inline-flex; align-items: center">
                                <span
                                    style="
                                        display: block;
                                        width: 0.75rem;
                                        height: 0.75rem;
                                        border-radius: 9999px;
                                        margin-right: 0.5rem;
                                        border-width: 3px;
                                        border-color: rgb(241, 99, 99);
                                        pointer-events: none;
                                    "
                                ></span
                                ><span style="display: flex; align-items: center"
                                    ><span
                                        style="
                                            color: rgb(30, 41, 59);
                                            font-size: 1.5rem;
                                            line-height: 2.25rem;
                                            font-weight: 700;
                                            margin-right: 0.5rem;
                                            pointer-events: none;
                                        "
                                        >Rp{{ number_format($totalpengeluaran[0]) }}</span
                                    ><span
                                        style="
                                            color: rgb(100, 116, 139);
                                            font-size: 0.875rem;
                                            line-height: 1.25rem;
                                        "
                                        >Pengeluaran</span
                                    ></span
                                >
                            </button>
                        </li>
                    </ul>
                  </div>
                  <canvas id="chart1"></canvas>
              </div>
              <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Rekap Transaksi
                        </h3>
                        <span class="text-base font-normal text-gray-500"
                            >Ditampilkan per bulan</span
                        >
                    </div>
                    <div class="flex-shrink-0">
                        <p
                            href="#"
                            class="text-3xl font-medium text-cyan-600 rounded-lg p-2"
                            ></p
                        >
                    </div>
                </div>
                <div class="flex flex-col mt-8 overflow-y-auto max-h-[28rem]">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pemasukan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pengeluaran
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksirekap as $p)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-2">
                                {{$p->txn_month}}
                            </td>
                            <td class="px-6 py-2">
                                {{$p->pemasukan}}
                            </td>
                            <td class="px-6 py-2">
                                {{$p->pengeluaran}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
          </div>
          
          <div class="w-full grid mb-4 grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8">
              <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        Rekap Pemerahan
                    </h3>
                    <span class="text-base font-normal text-gray-500"
                        >Ditampilkan per bulan</span
                    >
                </div>
                <div class="flex-shrink-0">
                    <p
                        href="#"
                        class="text-3xl font-medium text-cyan-600 rounded-lg p-2"
                        ></p
                    >
                </div>
            </div>
            <div class="flex flex-col mt-8 overflow-y-auto max-h-[28rem]">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemerahanrekap as $p)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-2">
                            {{$p->txn_month}}
                        </td>
                        <td class="px-6 py-2">
                            {{$p->jumlah}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 2xl:col-span-2">
              <h4 class=" font-semibold text-gray-800 dark:text-gray-300">Pemerahan</h4>
              <div class="py-3">
                  <ul class="flex flex-wrap">
                      <li style="margin-right: 1rem">
                          <button style="display: inline-flex; align-items: center">
                              <span
                                  style="
                                      display: block;
                                      width: 0.75rem;
                                      height: 0.75rem;
                                      border-radius: 9999px;
                                      margin-right: 0.5rem;
                                      border-width: 3px;
                                      border-color: 	rgb(37, 99, 235);
                                      pointer-events: none;
                                  "
                              ></span
                              ><span style="display: flex; align-items: center"
                                  ><span
                                      style="
                                          color: rgb(30, 41, 59);
                                          font-size: 1.5rem;
                                          line-height: 2.25rem;
                                          font-weight: 700;
                                          margin-right: 0.5rem;
                                          pointer-events: none;
                                      "
                                      >{{ number_format($totalpemerahan[0]) }} Liter</span
                                  ><span
                                      style="
                                          color: rgb(100, 116, 139);
                                          font-size: 0.875rem;
                                          line-height: 1.25rem;
                                      "
                                      >Susu</span
                                  ></span
                              >
                          </button>
                      </li>
                  </ul>
                </div>
                <canvas id="chart2"></canvas>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script type="text/javascript">
  
      var labels =  {{ Js::from($labels) }};
      var pemasukan =  {{ Js::from($data1) }};
      var pengeluaran = {{ Js::from($data2) }};
      var labels2 = {{ Js::from($labels2) }};
      var pemerahan =  {{ Js::from($data3) }};
      var forecast = {{ Js::from($forecast) }};
      var forecast2 = {{ Js::from($forecast2) }};
      var forecast3 = {{ Js::from($forecast3) }};

      const data = {
        labels: labels,
        datasets: [{
          label: 'Pemasukan',
          backgroundColor: 'rgb(45, 212, 191, 0.1)',
          borderColor: 'rgb(45, 212, 191, 1)',
          data: pemasukan,
          tension: 0.4,
          fill: true,
        },
        {
          label: 'Pengeluaran',
          backgroundColor: 'rgb(241, 99, 99, 0.1)',
          borderColor: 'rgb(241, 99, 99, 1)',
          data: pengeluaran,
          tension: 0.4,
          fill: true,
        },
        {
          label: 'Prediksi Pemasukan',
          backgroundColor: 'rgb(45, 212, 191, 0.1)',
          borderColor: 'rgb(45, 212, 191, 0.5)',
          data: forecast,
          tension: 0.5,
          fill: true,
          borderDash: [10,5]
        },
        {
          label: 'Prediksi Pengeluaran',
          backgroundColor: 'rgb(241, 99, 99, 0.1)',
          borderColor: 'rgb(241, 99, 99, 0.5)',
          data: forecast2,
          tension: 0.5,
          fill: true,
          borderDash: [10,5]
        }]
      };

      const data2 = {
        labels: labels2,
        datasets: [{
          label: 'Pemerahan',
          backgroundColor: '	rgb(37, 99, 235, 0.1)',
          borderColor: '	rgb(37, 99, 235, 1)',
          data: pemerahan,
          tension: 0.4,
          fill: true,
        },
        {
          label: 'Prediksi Pemerahan',
          backgroundColor: '	rgb(37, 99, 235, 0.1)',
          borderColor: '	rgb(37, 99, 235, 0.5)',
          data: forecast3,
          tension: 0.5,
          fill: true,
          borderDash: [10,5]
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {
          scales: {
            xAxes: {
                type: 'time'
            }
          },
          responsive: true,
          interaction : {
            mode: 'index',
            intersect: false
          },
          stacked: false,
          plugins: {
            legend: {
              display: false
            }
          },
        }
      };
      
      const config2 = {
        type: 'line',
        data: data2,
        options: {
          scales: {
            x: {
              type: 'time',
              time: {
                
              }
            }
          },
          responsive: true,
          interaction : {
            mode: 'index',
            intersect: false
          },
          stacked: false,
          plugins: {
            legend: {
              display: false
            }
          }
        }
      };
  
      const chart1 = new Chart(
        document.getElementById('chart1'),
        config
      );

      const chart2 = new Chart(
        document.getElementById('chart2'),
        config2
      )
  
    </script>