<aside class="w-64 bg-gray-800 text-white h-screen flex flex-col">
   <div class="p-6 border-b border-gray-700">
       <h1 class="text-2xl font-bold">HR System</h1>
   </div>

   <nav class="flex-1 px-4 py-6 space-y-2">
       @if (auth()->user()->role === 'admin')
           <!-- Admin Menu -->
           <a href="" 
              class="block px-4 py-2 rounded hover:bg-gray-700">
               Dashboard
           </a>
           <div class="space-y-1">
               <p class="px-4 py-2 text-sm text-gray-400">Master Data</p>
               <a href="{{ route('admin.departments.index') }}" 
                  class="block px-4 py-2 rounded hover:bg-gray-700 ml-4">
                  Departemen
               </a>
               <a href="" 
                  class="block px-4 py-2 rounded hover:bg-gray-700 ml-4">
                  Posisi
               </a>
               <a href="" 
                  class="block px-4 py-2 rounded hover:bg-gray-700 ml-4">
                  Karyawan
               </a>
           </div>

           <div class="space-y-1">
               <p class="px-4 py-2 text-sm text-gray-400">Payroll</p>
               <a href="" 
                  class="block px-4 py-2 rounded hover:bg-gray-700 ml-4">
                  Daftar Gaji
               </a>
           </div>

           <a href="" 
              class="block px-4 py-2 rounded hover:bg-gray-700">
              📋 Laporan
           </a>
           <a href="" 
              class="block px-4 py-2 rounded hover:bg-gray-700">
              ⚙️ Pengaturan
           </a>
       @else
           <!-- Employee Menu -->
           <a href="" 
              class="block px-4 py-2 rounded hover:bg-gray-700">
               Dashboard
           </a>
           <a href="" 
              class="block px-4 py-2 rounded hover:bg-gray-700">
               ✓ Absensi
           </a>
           <a href="" 
              class="block px-4 py-2 rounded hover:bg-gray-700">
               💰 Gaji
           </a>
           <a href="" 
              class="block px-4 py-2 rounded hover:bg-gray-700">
               📋 Laporan
           </a>
       @endif
   </nav>

   <!-- Logout -->
   <div class="p-4 border-t border-gray-700">
       <form method="POST" action="{{ route('logout') }}">
           @csrf
           <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-700">
               🚪 Logout
           </button>
       </form>
   </div>
</aside>
