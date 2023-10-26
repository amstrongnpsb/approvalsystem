<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Export Excel</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Data Number</th>
                    <th>Description</th>
                    <th>Creator</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $d->data_number }}</td>
                    <td>{{ $d->description }}</td>
                    <td>{{ $d->creator}}</td>
                    <td>{{ $d->status }}</td>
                    <td>{{ $d->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>