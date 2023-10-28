<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>{{ $data["data_number"] }}</title>
<style>
    @page{
    margin: 10 20 10 20;
    size: A4;
    }
    h1, h2, h3, h4, h5 {
    margin: 0;
    }
</style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Data Number</th>
                <th>Description</th>
                <th>Creator</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data['data_number'] }}</td>
                <td>{{ $data['description'] }}</td>
                <td>{{ $data['creator']}}</td>
                <td>{{ $data['status'] }}</td>
                <td>{{ $data['created_at'] }}</td>
            </tr>
        </tbody>
    </table>
    </div>
</body>

</html>