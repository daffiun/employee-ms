<x-app-layout>
   <h1 class="text-xl font-bold mb-4">Edit Department</h1>
   
   <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
       @csrf
       @method('PUT')
   
       <label>Name</label>
       <input type="text" name="name" value="{{ $department->name }}" class="border rounded w-full">
   
       <label>Description</label>
       <textarea name="description" class="border rounded w-full">{{ $department->description }}</textarea>
   
       <button class="bg-blue-500 text-white px-3 py-1 mt-3">Update</button>
   </form>
</x-app-layout>
   