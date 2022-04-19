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
      <div id="dropdown1" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
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
          @elseif (Auth::user()->type=='penjaga')
          <li>
            <a href="/penjaga/home" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
          </li>
          <li>
            <a href="/penjaga/sapi" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sapi</a>
          </li>
          @endif
        </ul>
    </div>
      <!-- Search input -->

      <ul class="flex items-center flex-shrink-0 space-x-6">
        <!-- Theme toggler -->

        <!-- Notifications menu -->
        <li class="relative">
          <button>
            <i class="fa-solid fa-bell"></i>
          </button>
        </li>
        <!-- Profile menu -->
        <li class="relative">
          <button id="dropdownDefault" data-dropdown-toggle="dropdown" type="button">
            <i class="fa-solid fa-user pr-4"></i>
            <p class="font-semibold text-sm inline-block">
              {{ Auth::user()->name }}
            </p>
          </button>

          <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
              <li>
                <a href="@if(Auth::user()->type=='admin') /admin/profil @elseif(Auth::user()->type=='penjaga') /penjaga/profil @endif" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
              </li>
              <li>
                <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
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