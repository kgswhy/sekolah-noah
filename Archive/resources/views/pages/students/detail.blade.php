@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center justify-content-between">
        <div class="me-auto">
            <h3 class="page-title">Student Details</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">Students</li>
                    <li class="breadcrumb-item active" aria-current="page">Student Details</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="/students" class="btn btn-outline-primary btn-rounded"><i class="mdi mdi-arrow-left"></i> Back to List</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box shadow-sm rounded-lg p-4">
                <h4 class="text-center mb-4 text-primary">Full Student Information</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3 p-3 border-light">
                            <h5 class="text-primary">General Information</h5>
                            <ul class="list-unstyled">
                                <li><strong>Full Name:</strong> <span class="text-muted">{{ $student->full_name }}</span></li>
                                <li><strong>Nickname:</strong> <span class="text-muted">{{ $student->nickname }}</span></li>
                                <li><strong>Class:</strong> <span class="text-muted">{{ $student->class }}</span></li>
                                <li><strong>Place of Birth:</strong> <span class="text-muted">{{ $student->place_of_birth }}</span></li>
                                <li><strong>Date of Birth:</strong> <span class="text-muted">{{ $student->date_of_birth }}</span></li>
                                <li><strong>Gender:</strong> <span class="text-muted">{{ ucfirst($student->gender) }}</span></li>
                                <li><strong>Religion:</strong> <span class="text-muted">{{ $student->religion }}</span></li>
                                <li><strong>Nationality:</strong> <span class="text-muted">{{ $student->nationality }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3 p-3 border-light">
                            <h5 class="text-primary">Address Information</h5>
                            <ul class="list-unstyled">
                                <li><strong>Address:</strong> <span class="text-muted">{{ $student->address }}</span></li>
                                <li><strong>City:</strong> <span class="text-muted">{{ $student->city }}</span></li>
                                <li><strong>Postal Code:</strong> <span class="text-muted">{{ $student->postal_code }}</span></li>
                            </ul>

                            <h5 class="mt-4 text-primary">Living With:</h5>
                            <ul class="list-unstyled">
                                <li><span class="text-muted">{{ $student->living_with }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="text-primary">Previous School Information</h5>
                    <ul class="list-unstyled">
                        <li><strong>School Name:</strong> <span class="text-muted">{{ $student->previous_school_name ?? 'N/A' }}</span></li>
                        <li><strong>Class:</strong> <span class="text-muted">{{ $student->previous_school_class ?? 'N/A' }}</span></li>
                        <li><strong>Address:</strong> <span class="text-muted">{{ $student->previous_school_address ?? 'N/A' }}</span></li>
                        <li><strong>Phone:</strong> <span class="text-muted">{{ $student->previous_school_phone ?? 'N/A' }}</span></li>
                    </ul>
                </div>

                <div class="mt-4">
                    <h5 class="text-primary">Father's Information</h5>
                    <ul class="list-unstyled">
                        <li><strong>Name:</strong> <span class="text-muted">{{ $student->father_name }}</span></li>
                        <li><strong>Email:</strong> <span class="text-muted">{{ $student->father_email }}</span></li>
                        <li><strong>Phone:</strong> <span class="text-muted">{{ $student->father_phone }}</span></li>
                        <li><strong>Nationality:</strong> <span class="text-muted">{{ $student->father_nationality }}</span></li>
                        <li><strong>ID Card Number:</strong> <span class="text-muted">{{ $student->father_id_card_number }}</span></li>
                        <li><strong>Job:</strong> <span class="text-muted">{{ $student->father_job }}</span></li>
                        <li><strong>Company:</strong> <span class="text-muted">{{ $student->father_company }}</span></li>
                        <li><strong>Position:</strong> <span class="text-muted">{{ $student->father_position }}</span></li>
                        <li><strong>Office Phone:</strong> <span class="text-muted">{{ $student->father_office_phone }}</span></li>
                        <li><strong>Office Address:</strong> <span class="text-muted">{{ $student->father_office_address }}</span></li>
                        <li><strong>Monthly Income:</strong> <span class="text-muted">${{ number_format($student->father_monthly_income, 2) }}</span></li>
                    </ul>
                </div>

                <div class="mt-4">
                    <h5 class="text-primary">Mother's Information</h5>
                    <ul class="list-unstyled">
                        <li><strong>Name:</strong> <span class="text-muted">{{ $student->mother_name }}</span></li>
                        <li><strong>Email:</strong> <span class="text-muted">{{ $student->mother_email }}</span></li>
                        <li><strong>Phone:</strong> <span class="text-muted">{{ $student->mother_phone }}</span></li>
                        <li><strong>Nationality:</strong> <span class="text-muted">{{ $student->mother_nationality }}</span></li>
                        <li><strong>ID Card Number:</strong> <span class="text-muted">{{ $student->mother_id_card_number }}</span></li>
                        <li><strong>Job:</strong> <span class="text-muted">{{ $student->mother_job }}</span></li>
                        <li><strong>Company:</strong> <span class="text-muted">{{ $student->mother_company }}</span></li>
                        <li><strong>Position:</strong> <span class="text-muted">{{ $student->mother_position }}</span></li>
                        <li><strong>Office Phone:</strong> <span class="text-muted">{{ $student->mother_office_phone }}</span></li>
                        <li><strong>Office Address:</strong> <span class="text-muted">{{ $student->mother_office_address }}</span></li>
                        <li><strong>Monthly Income:</strong> <span class="text-muted">${{ number_format($student->mother_monthly_income, 2) }}</span></li>
                    </ul>
                </div>

                @if ($student->guardian_name)
                    <div class="mt-4">
                        <h5 class="text-primary">Guardian's Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> <span class="text-muted">{{ $student->guardian_name }}</span></li>
                            <li><strong>Email:</strong> <span class="text-muted">{{ $student->guardian_email }}</span></li>
                            <li><strong>Phone:</strong> <span class="text-muted">{{ $student->guardian_phone }}</span></li>
                            <li><strong>Nationality:</strong> <span class="text-muted">{{ $student->guardian_nationality }}</span></li>
                            <li><strong>ID Card Number:</strong> <span class="text-muted">{{ $student->guardian_id_card_number }}</span></li>
                            <li><strong>Job:</strong> <span class="text-muted">{{ $student->guardian_job }}</span></li>
                            <li><strong>Company:</strong> <span class="text-muted">{{ $student->guardian_company }}</span></li>
                            <li><strong>Position:</strong> <span class="text-muted">{{ $student->guardian_position }}</span></li>
                            <li><strong>Office Phone:</strong> <span class="text-muted">{{ $student->guardian_office_phone }}</span></li>
                            <li><strong>Office Address:</strong> <span class="text-muted">{{ $student->guardian_office_address }}</span></li>
                            <li><strong>Monthly Income:</strong> <span class="text-muted">${{ number_format($student->guardian_monthly_income, 2) }}</span></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
