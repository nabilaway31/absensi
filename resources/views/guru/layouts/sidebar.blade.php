<aside class="w-64 bg-slate-800 shadow-2xl">
    <div class="flex flex-col h-screen">
        <!-- Logo/Brand -->
        <div class="p-6 border-b border-slate-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-800 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg">ABSENSI</h3>
                    <p class="text-indigo-300 text-xs">Portal Guru</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('guru_user.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('guru_user.dashboard') ? 'bg-white/10 text-white shadow-lg' : 'text-indigo-200 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('guru_user.rekap') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('guru_user.rekap') ? 'bg-white/10 text-white shadow-lg' : 'text-indigo-200 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                <span class="font-medium">Rekap Absensi</span>
            </a>

            <a href="{{ route('guru_user.profil') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('guru_user.profil') ? 'bg-white/10 text-white shadow-lg' : 'text-indigo-200 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="font-medium">Profil</span>
            </a>
        </nav>

    </div>
</aside>
