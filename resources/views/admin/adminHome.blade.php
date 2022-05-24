@extends('layouts.app')
@section('content')

<div class="flex h-screen">
  @include('layouts.adminSidebar')
  <div class="flex flex-col flex-1 w-full">
    @include('layouts.navbar')
      <main class="h-full overflow-y-auto bg-gray-50">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>
          <div class="grid gap-6 mb-8 md:grid-cols-2">
              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                  <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Transaksi</h4>
                  <canvas id="chart1" height="150rem"></canvas>
                  <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-green-400 rounded-full"
                    ></span>
                    <span>Pemasukan</span>
                  </div>
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-red-400 rounded-full"
                    ></span>
                    <span>Pengeluaran</span>
                  </div>
                </div>
              </div>
              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">Pemerahan</h4>
                <canvas id="chart2" height="150rem"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                  <div class="flex items-center">
                    <span
                      class="inline-block w-3 h-3 mr-1 bg-blue-400 rounded-full"
                    ></span>
                    <span>Pemerahan</span>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
  
      var labels =  {{ Js::from($labels) }};
      var pemasukan =  {{ Js::from($data1) }};
      var pengeluaran = {{ Js::from($data2) }};
      var labels2 = {{ Js::from($labels2) }};
      var pemerahan =  {{ Js::from($data3) }};
  
      const data = {
        labels: labels,
        datasets: [{
          label: 'Pemasukan',
          backgroundColor: 'rgb(74, 222, 128)',
          borderColor: 'rgb(74, 222, 128)',
          data: pemasukan,/* 
          yAxisID: 'y', */
        },
        {
          label: 'Pengeluaran',
          backgroundColor: 'rgb(248, 113, 113)',
          borderColor: 'rgb(248, 113, 113)',
          data: pengeluaran,/* 
          yAxisID: 'y1', */
        }]
      };

      const data2 = {
        labels: labels2,
        datasets: [{
          label: 'Pemerahan',
          backgroundColor: 'rgb(96, 165, 250)',
          borderColor: 'rgb(96, 165, 250)',
          data: pemerahan,
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {
          responsive: true,
          interaction : {
            mode: 'index',
            intersect: false
          },
          stacked: false,
          /* scales: {
            y: {
              type: 'linear',
              display: true,
              position: 'left',
            },
            y1: {
              type: 'linear',
              display: true,
              position: 'right',
              grid: {
              drawOnChartArea: false, // only want the grid lines for one axis to show up
              },
            }
          }, */
          plugins: {
            legend: {
              display: false
            }
          }
        }
      };
      
      const config2 = {
        type: 'line',
        data: data2,
        options: {
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