<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Slip Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
        }
        .header p {
            margin: 5px 0;
        }
        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 3px;
        }
        .info-table td:first-child {
            width: 150px;
            font-weight: bold;
        }
        .salary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .salary-table th,
        .salary-table td {
            border: 1px solid #000;
            padding: 5px;
        }
        .salary-table th {
            background-color: #f0f0f0;
        }
        .total-row {
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
        }
        .signature {
            float: right;
            width: 200px;
            text-align: center;
        }
        .signature-line {
            border-top: 1px solid #000;
            margin-top: 50px;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>SLIP GAJI KARYAWAN</h2>
        <p>SEKOLAH NOAH</p>
        <p>Periode: {{ $salarySlip->date->format('M Y') }}</p>
    </div>

    <table class="info-table">
        <tr>
            <td>Nama Karyawan</td>
            <td>: {{ $salarySlip->employee->full_name }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $salarySlip->employee->employee_number }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: {{ $salarySlip->employee->position }}</td>
        </tr>
        <tr>
            <td>Departemen</td>
            <td>: {{ $salarySlip->employee->division }}</td>
        </tr>
    </table>

    <table class="salary-table">
        <thead>
            <tr>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salarySlip->components as $component)
                <tr>
                    <td>
                        {{ $component->title }}
                        @if($component->description)
                            <br>
                            <small>{{ $component->description }}</small>
                        @endif
                    </td>
                    <td style="text-align: right">Rp {{ number_format($component->amount, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td>Total Gaji</td>
                <td style="text-align: right">Rp {{ number_format($salarySlip->amount, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <div class="signature">
            <div class="signature-line">
                Direktur Keuangan
            </div>
        </div>
    </div>
</body>
</html> 