<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Account List') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>User #</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
            @php
                $i = 1
            @endphp
                @foreach($users as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @php
                        $currentDateTime = now(); // Current time
                        $createdAtDateTime = \Carbon\Carbon::parse($user->created_at); // Timestamp from the variable

                        $interval = $currentDateTime->diff($createdAtDateTime);

                        $timeElapsed = '';
                        if ($interval->d > 0) {
                            $timeElapsed = $interval->d . ' days';
                        } elseif ($interval->h > 0) {
                            $timeElapsed = $interval->h . ' hours';
                        } elseif ($interval->i > 0) {
                            $timeElapsed = $interval->i . ' minutes';
                        } elseif ($interval->s > 0) {
                            $timeElapsed = $interval->s . ' seconds';
                        } else {
                            $timeElapsed = '0 seconds';
                        }
                    @endphp
                    <td>{{ $timeElapsed }}</td>
                </tr>
                @endforeach
            </tbody>
                <span class="text-sm text-gray-600">Total Users: {{ count($users) }}</span>

        </table>
    </div>

</x-app-layout>
