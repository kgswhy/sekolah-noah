@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Data Schedule</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Schedule</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('schedules.create') }}" class="btn btn-primary">Tambah Schedule</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="scheduleTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Shift</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->shift->title }}</td>
                                <td>{{ $schedule->employee->name }}</td>
                                <td>{{ $schedule->date }}</td>
                                <td>
                                    <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
