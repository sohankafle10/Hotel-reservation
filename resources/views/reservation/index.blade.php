@extends('layouts.admin')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <h1 class="px-4 mb-6 text-2xl text-green-700 font-bold border-l-4 border-green-700">Manage Reservations</h1>

        @if ($reservations->isEmpty())
            <div class="p-4 mb-6 text-green-700 bg-green-100 border-l-4 border-green-700" role="alert">
                <p>No reservations found.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead>
                        <tr class="text-sm text-gray-700 uppercase bg-gray-100">
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Guest Name</th>
                            <th class="px-4 py-3 text-left">Check-in</th>
                            <th class="px-4 py-3 text-left">Check-out</th>
                            <th class="px-4 py-3 text-left">Guests</th>
                            <th class="px-4 py-3 text-left">Rooms</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Payment</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="px-4 py-3">{{ $reservation->id }}</td>
                                <td class="px-4 py-3">{{ $reservation->guest_name }}</td>
                                <td class="px-4 py-3">{{ $reservation->check_in->format('d-m-Y') }}</td>
                                <td class="px-4 py-3">{{ $reservation->check_out->format('d-m-Y') }}</td>
                                <td class="px-4 py-3">{{ $reservation->guests }}</td>
                                <td class="px-4 py-3">{{ $reservation->rooms }}</td>
                                <td class="px-4 py-3">
                                    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="border rounded-lg px-2 py-1" onchange="this.form.submit()">
                                            <option value="Pending" {{ $reservation->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Confirmed" {{ $reservation->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="Checked-in" {{ $reservation->status == 'Checked-in' ? 'selected' : '' }}>Checked-in</option>
                                            <option value="Completed" {{ $reservation->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-4 py-3">{{ $reservation->payment_method }}</td>
                                <td class="px-4 py-3">
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
