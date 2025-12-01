<x-app-layout>
   <h1 class="text-xl font-bold mb-4">Create Department</h1>
   
   <form action="{{ route('admin.departments.store') }}" method="POST">
       @csrf
   
       <label>Name</label>
       <input type="text" name="name" class="border rounded w-full">
   
       <label>Description</label>
       <textarea name="description" class="border rounded w-full"></textarea>
   
       <button class="bg-green-500 text-white px-3 py-1 mt-3">Save</button>
   </form>
</x-app-layout>
   