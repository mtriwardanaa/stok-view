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
                <th>19/11/2019 7:32:37 AM</th>
                <th>10</th>
                <th>GAJI DESEMBER 2023</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>P</td>
                <td>{{ date('Ymd', strtotime($salary['tanggal_dibuat'])) }}</td>
                <td>{{ $salary['rek_debet'] }}</td>
                <td>{{ $salary['total_pegawai'] }}</td>
                <td>{{ $salary['total_amount'] }}</td>
            </tr>
            @foreach ($salary['salaryDetails'] as $detail)
                <tr>
                    <td>{{ $detail['employee']['account_number'] }}</td>
                    <td>{{ $detail['employee']['name'] }}</td>
                    <td>{{ $detail['salary'] + $detail['tambahan'] - $detail['potongan'] }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>N</td>
                    <td></td>
                    <td></td>
                    <td>N</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
