<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Data Produk</title>
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
    <h2>Data Produk</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Produk</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($db as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->kode_produk }}</td>
                    <td>{{ $data->kategori->nama_kategori }}</td>
                    <td>{{ $data->nama_produk }}</td>
                    <td>{{ $data->stok }}</td>
                    <td>Rp.{{ number_format($data->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp.{{ number_format($data->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $data->satuan->nama_satuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
