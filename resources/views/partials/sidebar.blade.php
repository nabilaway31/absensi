<div class="sidebar p-3">
    <h4 class="text-white mb-4">📘 ABSENSI</h4>

    <ul class="nav nav-pills flex-column gap-2">
        <li class="nav-item">
            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                🏠 Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="/guru" class="nav-link {{ request()->is('guru*') ? 'active' : '' }}">
                👩‍🏫 Data Guru
            </a>
        </li>

        <li class="nav-item">
            <a href="/absensi" class="nav-link {{ request()->is('absensi*') ? 'active' : '' }}">
                📝 Absensi
            </a>
        </li>

        <li class="nav-item">
            <a href="/laporan" class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">
                📊 Laporan
            </a>
        </li>
    </ul>

    <hr class="text-secondary">

    <div class="text-white small mt-auto">
        👤 Admin
    </div>
</div>
