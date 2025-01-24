<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-700">
                    <h3 class="mb-4 font-bold text-lg">Add New User</h3>

                    <!-- Form Create User -->
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        <!-- Name Field -->
                        <div class="mb-4">
                            <label for="name" class="form-label font-medium">Name</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name') }}" 
                                required
                            >
                            @error('name')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label font-medium">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email') }}" 
                                required
                            >
                            @error('email')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label font-medium">Password</label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                required
                            >
                            @error('password')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- User Type Field -->
                        <div class="mb-4">
                            <label for="usertype" class="form-label font-medium">User Type</label>
                            <select 
                                id="usertype" 
                                name="usertype" 
                                class="form-select @error('usertype') is-invalid @enderror" 
                                required
                            >
                                <option value="user" {{ old('usertype') === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('usertype') === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('usertype')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
