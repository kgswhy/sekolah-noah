@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Schedule</h3>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('schedules.update', $schedule) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="shift_id" class="form-label">Shift</label>
                        <select class="form-control" id="shift_id" name="shift_id" required>
                            <option value="">--Pilih Shift--</option>
                            @foreach($shifts as $shift)
                                <option value="{{ $shift->id }}" {{ $shift->id == $schedule->shift_id ? 'selected' : '' }}>{{ $shift->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">--Pilih Employee--</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $employee->id == $schedule->employee_id ? 'selected' : '' }}>{{ $employee->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $schedule->date }}" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Schedule</button>
                        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
