<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->name }}'s History </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #cccfcf;
        }
    </style>
</head>

<body>
    <h1 class="text-center text-2xl font-bold">{{ $user->name . ' ' . $user->last_name }}'s History</h1>
    <h2>Attemps: {{ $records->count() }}</h2>


    <div style="margin-bottom: 4px">
        <p><span class="fw-bold">Employee:</span> {{ $user->name . ' ' . $user->last_name }}</p>
    </div>
    @if ($records->count() == 0)
        <p class="fs-2 fw-bold">No records found</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr style="border-bottom: 1px solid #6c6c6c">
                    <th scope="col">Id</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    {{-- <th scope="col" class="px-6 py-3">Deparment</th>
                        <th scope="col" class="px-6 py-3">Total Access</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr style="border-bottom: 1px solid #6c6c6c">
                        <th scope="row">
                            {{ $record->id }}</th>
                        <td>{{ $record->status }}</td>
                        <td>{{ $record->created_at }}</td>

                        {{-- <td class="px-6 py-4">{{ $user->department->name }}</td>
                            <td class="px-6 py-4">Total Access</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
