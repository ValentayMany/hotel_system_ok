@extends('layout.Add')

@section('contents')
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">RoomID</th>
                    <th class="px-4 py-2 text-left">Room_type_id</th>
                    <th class="px-4 py-2 text-left">Room_Number</th>
                    <th class="px-4 py-2 text-left">image</th>
                    <th class="px-4 py-2 text-left">Description</th>
                    <th class="px-4 py-2 text-left">Price</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $record)
                    <tr class="bg-gray-100 border-b hover:bg-gray-200">
                        <td class="px-4 py-2">{{ $record->room_id }}</td>
                        <td class="px-4 py-2">{{ $record->room_type_id ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $record->room_number }}</td>
                        <td class="px-4 w-10 h-10 py-2"><img src="{{ asset('storage/' . $record->image) }}" alt="">
                        </td>
                        <td class="px-4 py-2">{{ $record->description }}</td>
                        <td class="px-4 py-2">{{ $record->price }}</td>
                        <td>
                            <form id="delete-room-form-{{ $record->room_id }}"
                                action="{{ route('roomadmin.delete', ['room_id' => $record->room_id]) }}" method="get">
                                <button type="button"
                                    class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg focus:outline-none"
                                    onclick="confirmDelete({{ $record->room_id }})">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete(roomId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-room-form-' + roomId).submit();
                }
            });
        }
    </script>

    <!-- อย่าลืมใส่ SweetAlert2 ในหน้า Blade -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
