<x-app-layout>
   <h1 class="text-xl font-bold mb-4">Departments</h1>

   <a href="{{ route('admin.departments.create') }}" 
      class="bg-blue-500 px-3 py-1 text-white rounded">Add Department</a>

   <table class="table-auto w-full mt-4">
       <tr>
           <th>Name</th>
           <th>Description</th>
           <th>Action</th>
       </tr>

       @foreach ($departments as $d)
       <tr>
           <td>{{ $d->name }}</td>
           <td>{{ $d->description }}</td>
           <td class="space-x-2">
               <a href="{{ route('admin.departments.edit', $d->id) }}" class="text-blue-500">Edit</a>

               <form action="{{ route('admin.departments.destroy', $d->id) }}" method="POST" class="inline">
                   @csrf
                   @method('DELETE')
                   <button class="text-red-500">Delete</button>
               </form>
           </td>
       </tr>
       @endforeach
   </table>
</x-app-layout>
