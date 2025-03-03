@extends('layout.Add')

@section('title', 'AddBook')

@section('contents')
    <div class="max-w-md mx-auto bg-gray-800 text-white p-6 rounded-lg shadow-lg mt-10">
        <h2 class="text-2xl font-semibold mb-4 text-center">Add New Room</h2>

        <form method="POST" action="{{ route('admin/upload') }}" enctype="multipart/form-data" class="grid gap-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Room Type</label>
                <select name="room_type_id"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Room Type</option>
                    @foreach ($data as $room_type)
                        <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:flex md:gap-4">
                <div class="w-full">
                    <label class="block text-sm font-medium">Room Number</label>
                    <input type="text" name="room_number"
                        class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>

                <div class="w-full">
                    <label class="block text-sm font-medium">Price</label>
                    <input type="text" name="price"
                        class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium">Room Image</label>
                <input type="file" name="image"
                    class="w-full px-4 py-2 rounded-md bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md shadow-md transition">Add
                    Room</button>
            </div>
        </form>
    </div>
@endsection
