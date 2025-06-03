@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Data Payroll</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">HRD</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Payroll</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <form method="GET" action="/payroll" class="d-flex">
            <input type="month" name="monthyear" class="form-control" value="{{ request('monthyear') }}" required>
            <button type="submit" class="btn btn-primary ms-2">Tampilkan</button>
        </form>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Card untuk Tabel Data Payroll -->
        <div class="card">
            <div class="card-body">
                <table id="payrollTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Karyawan</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Payroll akan ditambahkan disini -->
                        @foreach($payrolls as $payroll)
                            <tr>
                                <td>{{ $payroll->id }}</td>
                                <td>{{ $payroll->date }}</td>
                                <td>{{ $payroll->employee->name }}</td>
                                <td>Rp {{ number_format($payroll->amount, 0, ',', '.') }}</td>
                                <td>
                                    <select class="form-control form-control-sm" name="status" onchange="updateStatus({{ $payroll->id }}, this.value)">
                                        <option value="Unpaid" {{ $payroll->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="Paid" {{ $payroll->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="/payroll/slip/{{ $payroll->id }}" class="btn btn-info btn-sm" target="_blank">Slip Gaji</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Tambahkan data lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#payrollTable').DataTable();
    });

    // Update status payroll
    function updateStatus(payrollId, status) {
        $.ajax({
            url: '/payroll/update-status',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                payroll_id: payrollId,
                status: status
            },
            success: function(response) {
                alert('Status berhasil diperbarui!');
            },
            error: function(xhr, status, error) {
                alert('Terjadi kesalahan saat memperbarui status!');
            }
        });
    }
</script>
@endsection
