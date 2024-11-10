<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Data User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 14px;
        }

        td {
            padding: 8px;
            font-size: 12px;
            color: #555;
        }

        th,
        td {
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <h2>Data User</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No.Hp</th>
                <th>Alamat</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($db as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->no_telepon }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->role->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
