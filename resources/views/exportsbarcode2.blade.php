<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Nama Acara</th>
                <th>Kode Sertifikat</th>
                <th>Kode Barcode</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->student->name }}</td>
                    <td>{{ $item->student->id }}</td>
                    <td>{{ $item->event->name }}</td>
                    <td>{{ $item->serial_number }}</td>
                    <td>{{ base64_encode($item->serial_number) . ':' . rand() . rand() . $item->student->id . rand() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
