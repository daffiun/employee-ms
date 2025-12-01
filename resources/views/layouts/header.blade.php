<header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
   <h2 class="text-2xl font-semibold text-gray-800">
       @if (auth()->user()->role === 'admin')
           Admin Panel
       @else
           Dashboard Karyawan
       @endif
   </h2>

   <div class="flex items-center space-x-4">
       <span class="text-gray-600">{{ auth()->user()->name }}</span>
       <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" 
            alt="Avatar" class="w-10 h-10 rounded-full">
   </div>
</header>
