<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="mb-4 text-indigo">Add New Category</h1>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <!-- Category Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label text-secondary">Category Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                   class="form-control" required>
                            @error('name')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label text-secondary">Description</label>
                            <textarea name="description" id="description" rows="4" 
                                      class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
