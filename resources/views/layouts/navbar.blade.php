<header class="z-10 py-4 bg-white shadow-md ">
    <div
        class="container flex items-center justify-between md:justify-end h-full px-6 mx-auto text-indigo-600 dark:text-indigo-300"
      >
      <!-- Mobile hamburger -->
      <button
        class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-indigo"
        @click="toggleSideMenu"
        aria-label="Menu" id="dropdownDefault" data-dropdown-toggle="dropdown1" type="button">
        <svg
          class="w-6 h-6"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20">
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd">
          </path>
        </svg>
      </button>
      <div id="dropdown1" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-600">
        <ul class="py-1 text-sm text-gray-600 dark:text-gray-200" aria-labelledby="dropdownDefault">
          @if (Auth::user()->type=='admin')
          <li>
            <a href="/admin/home" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
          </li>
          <li>
            <a href="/admin/sapi" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sapi</a>
          </li>
          <li>
            <a href="/admin/penjaga" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Penjaga</a>
          </li>
          <li>
            <a href="/admin/penjadwalan" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Penjadwalan</a>
          </li>
          <li>
            <a href="/admin/transaksi" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transaksi</a>
          </li>
          <li>
            <a href="/admin/pemerahan" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pemerahan</a>
          </li>
          @elseif (Auth::user()->type=='penjaga')
          <li>
            <a href="/penjaga/home" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
          </li>
          <li>
            <a href="/penjaga/sapi" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sapi</a>
          </li>
          <li>
            <a href="/penjaga/penjadwalan" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Penjadwalan</a>
          </li>
          <li>
            <a href="/penjaga/pemerahan" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pemerahan</a>
          </li>
          @endif
        </ul>
    </div>
      <!-- Search input -->

      <ul class="flex items-center flex-shrink-0 space-x-6">
        <!-- Theme toggler -->
        @if (Auth::user()->type=='admin')
        <!-- Notifications menu -->
        <li class="relative">
          <button id="dropdownDefault" data-dropdown-toggle="dropdown2" type="button">
            <i class="fa-solid fa-bell hover:text-indigo-700"></i>
            @if ($notif)
            <i class="fa-solid fa-circle absolute text-red-500 text-[0.5rem] -mt-[0.1rem] -ml-[0.4rem]"></i>
            <i class="fa-solid fa-circle absolute text-red-500 text-[0.5rem] -mt-[0.1rem] -ml-[0.4rem] animate-ping"></i>
            @endif
          </button>
          <div id="dropdown2" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-600">
            <div class="text-sm w-96 float-right text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-600 dark:border-gray-600 dark:text-white">
              <div class="px-4 border-b py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
                <h5 class="text-xl">Notifikasi</h5>
                <div class="bg-indigo-100 border border-indigo-200 text-indigo-500 text-xs rounded px-1">
                  <strong>@if ($notif) {{ $notif[0]->count }} @else 0 @endif</strong>
                </div>
              </div>
              @if ($notif)
              
              @foreach ($notif as $n)
              
              <a href="\admin\penjadwalan" class="flex w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:text-blue-600 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                <div class="pr-1">
                  📅
                </div>
                <div>
                  <p>Jadwal <span class="font-semibold">{{$n->judul}}</span> untuk sapi <span class="font-semibold">{{$n->id_cow}}</span> masih belum dilakukan</p>
                </div>
              </a>
              @endforeach
              @else
              <div class="grid grid-cols-1 grid-rows-3 w-full h-40 pt-10">
                <div class="text-center">
                  <i class="fa-solid fa-check text-4xl text-blue-600"></i>
                </div>
                <div class="text-center">
                  <p class="text-gray-900 text-sm">belum ada notifikasi untuk saat ini</p>
                </div>
              </div>
              @endif
            </div>
          </div>
        </li>
        @else
        @endif
        <!-- Profile menu -->
        <li class="relative">
          <button class="hover:text-indigo-700" id="dropdownDefault" data-dropdown-toggle="dropdown" type="button">
            <i class="fa-solid fa-user pr-4"></i>
            <p class="font-semibold text-sm inline-block">
              {{ Auth::user()->name }}
            </p>
          </button>

          <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-600">
            <ul class="py-1 text-sm text-gray-600 dark:text-gray-200" aria-labelledby="dropdownDefault">
              <li>
                <a href="@if(Auth::user()->type=='admin') /admin/profil @elseif(Auth::user()->type=='penjaga') /penjaga/profil @endif" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">🧑‍🌾Profile</a>
              </li>
              <li>
                <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                  {{ __('🚪Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
</header>