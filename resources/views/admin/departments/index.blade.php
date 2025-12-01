<x-app-layout>
    <div class="container mx-auto p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-orange-700">Departments</h1>
            <a href="{{ route('admin.departments.create') }}" 
               class="bg-orange-600 hover:bg-orange-700 px-6 py-2 rounded-lg shadow-lg transition-all inline-flex items-center font-semibold">
                <span class="mr-2 text-lg">+</span> Tambah Department
            </a>
            
        </div>
    
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-600 text-green-800 p-4 rounded-lg mb-6 shadow">
                <div class="flex items-center font-medium">
                    <span class="mr-2 text-lg">✓</span>
                    {{ session('success') }}
                </div>
            </div>
        @endif
    
        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-orange-200">
            <table class="w-full">
                <thead>
                    <tr class="bg-orange-100 border-b border-orange-300">
                        <th class="px-6 py-4 text-left text-sm font-bold text-orange-800">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-orange-800">Kode</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-orange-800">Kepala Bagian</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-orange-800">Total Pegawai</th>
                        <th class="px-6 py-4 text-center text-sm font-bold text-orange-800">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-orange-100">
                    @forelse($departments as $dept)
                    <tr class="hover:bg-orange-50 transition-colors">
                        <td class="px-6 py-4 text-gray-900 font-medium">{{ $dept->name }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-orange-50 border border-orange-200 px-3 py-1 rounded-full text-sm text-orange-700 font-medium">
                                {{ $dept->code ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-800">{{ $dept->manager->full_name ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-orange-200 text-orange-800 px-3 py-1 rounded-full text-sm font-bold">
                                {{ $dept->total_employees }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-3">
                                <!-- EDIT BUTTON -->
                                <a href="{{ route('admin.departments.edit', $dept->id) }}" 
                                   class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow transition">
                                    Edit
                                </a>

                                <!-- DELETE BUTTON -->
                                <form action="{{ route('admin.departments.destroy', $dept->id) }}" 
                                      method="POST" 
                                      class="inline-block" 
                                      onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-orange-700">
                            <div class="flex flex-col items-center">
                                <span class="text-5xl mb-2">📁</span>
                                <p class="text-lg font-semibold">Belum ada department</p>
                                <p class="text-sm text-orange-500">Tambahkan department baru untuk memulai</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
