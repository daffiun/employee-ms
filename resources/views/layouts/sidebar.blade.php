<aside class="w-64 bg-white text-gray-800 h-screen flex flex-col shadow-lg">
    <div class="p-6 border-b border-orange-200">
        <h1 class="text-2xl font-bold text-orange-600">HR System</h1>
    </div>
 
    <nav class="flex-1 px-4 py-6 space-y-2">
        @if (auth()->user()->role === 'admin')
            <!-- Admin Menu -->
            <a href="" 
               class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
                Dashboard
            </a>
            <div class="space-y-1">
                <p class="px-4 py-2 text-sm text-gray-500 font-semibold">Master Data</p>
                <a href="{{ route('admin.departments.index') }}" 
                   class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 ml-4 transition-colors">
                   Departemen
                </a>
                <a href="" 
                   class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 ml-4 transition-colors">
                   Posisi
                </a>
                <a href="" 
                   class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 ml-4 transition-colors">
                   Karyawan
                </a>
            </div>
 
            <div class="space-y-1">
                <p class="px-4 py-2 text-sm text-gray-500 font-semibold">Payroll</p>
                <a href="" 
                   class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 ml-4 transition-colors">
                   Daftar Gaji
                </a>
            </div>
 
            <a href="" 
               class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
               📋 Laporan
            </a>
            <a href="" 
               class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
               ⚙️ Pengaturan
            </a>
        @else
            <!-- Employee Menu -->
            <a href="" 
               class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
                Dashboard
            </a>
            <a href="" 
               class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
                ✓ Absensi
            </a>
            <a href="" 
               class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
                💰 Gaji
            </a>
            <a href="" 
               class="block px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
                📋 Laporan
            </a>
        @endif
    </nav>
 
    <!-- Logout -->
    <div class="p-4 border-t border-orange-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-orange-50 hover:text-orange-600 transition-colors">
                🚪 Logout
            </button>
        </form>
    </div>
 </aside>