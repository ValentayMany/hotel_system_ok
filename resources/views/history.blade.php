@extends('layout.Add')

@section('contents')
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">User Name</th>
                    <th class="px-4 py-2 text-left">Guest Email</th>
                    <th class="px-4 py-2 text-left">Guest Phone</th>
                    <th class="px-4 py-2 text-left">Room Number</th>
                    <th class="px-4 py-2 text-left">Room Type</th>
                    <th class="px-4 py-2 text-left">Check-In Date</th>
                    <th class="px-4 py-2 text-left">Check-Out Date</th>
                    <th class="px-4 py-2 text-left">Total Price</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $record)
                    <tr class="bg-gray-100 border-b hover:bg-gray-200">
                        <td class="px-4 py-2">{{ $record->id }}</td>
                        <td class="px-4 py-2">{{ $record->user->firstName ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $record->guest_email }}</td>
                        <td class="px-4 py-2">{{ $record->guest_phone }}</td>
                        <td class="px-4 py-2">{{ $record->room->room_number ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $record->room->roomType->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($record->check_in_date)->toDateString() }}</td>
                        <td>{{ \Carbon\Carbon::parse($record->check_out_date)->toDateString() }}</td>
                        <td class="px-4 py-2">{{ $record->total_price }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('admin.delete', ['id' => $record->id]) }}" method="get">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg focus:outline-none">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
