@extends('layouts/master-dashboard')
@section('content')

<div class="row">
    <div class="col-xl-9 col-12">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="box">
                    <div class="box-body py-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="text-fade">Applications</h5>
                                <h2 class="fw-500 mb-0">132.0K</h2>
                            </div>
                            <div>
                                <div id="revenue1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="box">
                    <div class="box-body py-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="text-fade">Shortlisted</h5>
                                <h2 class="fw-500 mb-0">10.9k</h2>
                            </div>
                            <div>
                                <div id="revenue2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="box">
                    <div class="box-body py-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="text-fade">On Hold</h5>
                                <h2 class="fw-500 mb-0">03.1k</h2>
                            </div>
                            <div>
                                <div id="revenue3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-8 col-xl-7 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Active Jobs</h4>
                        <ul class="box-controls pull-right d-md-flex d-none">
                            <li class="dropdown">
                                <button class="btn btn-primary px-10" href="#">View List</button>
                            </li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <div id="active_jobs"></div>
                    </div>
                    
                </div>
            </div>
            <div class="col-xxxl-4 col-xl-5 col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Total Applications</h4>
                    </div>
                    <div class="box-body">
                        <div class="d-flex w-p100 rounded100 overflow-hidden">
                            <div class="bg-danger h-10" style="width: 8%;"></div>
                            <div class="bg-warning h-10" style="width: 12%;"></div>
                            <div class="bg-success h-10" style="width: 22%;"></div>
                            <div class="bg-info h-10" style="width: 58%;"></div>
                        </div>
                    </div>
                    <div class="box-body p-0">
                        <div class="media-list media-list-hover media-list-divided">
                            <a class="media media-single rounded-0" href="#">
                                <span class="badge badge-xl badge-dot badge-info"></span>
                                <span class="title">Applications </span>
                                <span class="badge badge-pill badge-info-light">58%</span>
                            </a>

                            <a class="media media-single rounded-0" href="#">
                                <span class="badge badge-xl badge-dot badge-success"></span>
                                <span class="title">Shortlisted</span>
                                <span class="badge badge-pill badge-success-light">22%</span>
                            </a>

                            <a class="media media-single rounded-0" href="#">
                                <span class="badge badge-xl badge-dot badge-warning"></span>
                                <span class="title">On-Hold</span>
                                <span class="badge badge-pill badge-warning-light">12%</span>
                            </a>

                            <a class="media media-single rounded-0" href="#">
                                <span class="badge badge-xl badge-dot badge-danger"></span>
                                <span class="title">Rejected</span>
                                <span class="badge badge-pill badge-danger-light">08%</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">New Applications</h4>
                    </div>
                    <div class="box-body">
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/avatar-1.png"
                                    class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500">
                                <a href="#" class="text-dark hover-primary mb-1 fs-16">Sophia
                                    Doe</a>
                                <span class="fs-12"><span class="text-fade">Applied for</span>
                                    Advertising Intern</span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Inbox</span>
                                        <span class="badge badge-pill badge-info">5</span>
                                    </a>
                                    <a class="dropdown-item" href="#">Sent</a>
                                    <a class="dropdown-item" href="#">Spam</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Draft</span>
                                        <span class="badge badge-pill badge-default">1</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/avatar-10.png"
                                    class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500">
                                <a href="#" class="text-dark hover-danger mb-1 fs-16">Mason
                                    Clark</a>
                                <span class="fs-12"><span class="text-fade">Applied for</span>
                                    Project Coordinator</span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Inbox</span>
                                        <span class="badge badge-pill badge-info">5</span>
                                    </a>
                                    <a class="dropdown-item" href="#">Sent</a>
                                    <a class="dropdown-item" href="#">Spam</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Draft</span>
                                        <span class="badge badge-pill badge-default">1</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/avatar-11.png"
                                    class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500">
                                <a href="#" class="text-dark hover-success mb-1 fs-16">Emily
                                    Paton</a>
                                <span class="fs-12"><span class="text-fade">Applied for</span>
                                    Layout Expert</span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Inbox</span>
                                        <span class="badge badge-pill badge-info">5</span>
                                    </a>
                                    <a class="dropdown-item" href="#">Sent</a>
                                    <a class="dropdown-item" href="#">Spam</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Draft</span>
                                        <span class="badge badge-pill badge-default">1</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="me-15">
                                <img src="https://joblly-admin-template-dashboard.multipurposethemes.com/bs5/images/avatar/avatar-12.png"
                                    class="avatar avatar-lg rounded100 bg-primary-light" alt="" />
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500">
                                <a href="#" class="text-dark hover-info mb-1 fs-16">Daniel Breth</a>
                                <span class="fs-12"><span class="text-fade">Applied for</span>
                                    Interior Architect</span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Inbox</span>
                                        <span class="badge badge-pill badge-info">5</span>
                                    </a>
                                    <a class="dropdown-item" href="#">Sent</a>
                                    <a class="dropdown-item" href="#">Spam</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item flexbox" href="#">
                                        <span>Draft</span>
                                        <span class="badge badge-pill badge-default">1</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12">
        <div class="box">
            <div class="box-body">
                <div class="box no-shadow">
                    <div class="box-body px-0 pt-0">
                        <div id="calendar" class="dask evt-cal min-h-350"></div>
                    </div>
                </div>
                <div>
                    <h4 class="box-title mb-30">Scheduled Meeting</h4>
                    <div>
                        <div class="d-flex align-items-center mb-30 justify-content-between">
                            <div class="me-15 text-center rounded15 box-shadowed h-50 w-50 d-table">
                                <p class="mt-5 mb-0 text-warning">Thu</p>
                                <p class="mb-0">8</p>
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500 min-w-p60">
                                <a href="#"
                                    class="text-dark hover-primary mb-1 fs-16 overflow-hidden text-nowrap text-overflow">Interview</a>
                                <span class="fs-10 text-fade"><i class="fa fa-clock-o"></i> 9:00am -
                                    11:30am </span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30 justify-content-between">
                            <div class="me-15 text-center rounded15 box-shadowed h-50 w-50 d-table">
                                <p class="mt-5 mb-0 text-warning">Fri</p>
                                <p class="mb-0">10</p>
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500 min-w-p60">
                                <a href="#"
                                    class="text-dark hover-primary mb-1 fs-16 overflow-hidden text-nowrap text-overflow">Organizational
                                    meeting</a>
                                <span class="fs-10 text-fade"><i class="fa fa-clock-o"></i> 10:00am
                                    - 10:30am </span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30 justify-content-between">
                            <div class="me-15 text-center rounded15 box-shadowed h-50 w-50 d-table">
                                <p class="mt-5 mb-0 text-warning">Mon</p>
                                <p class="mb-0">17</p>
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500 min-w-p60">
                                <a href="#"
                                    class="text-dark hover-primary mb-1 fs-16 overflow-hidden text-nowrap text-overflow">Meeting
                                    with the manager</a>
                                <span class="fs-10 text-fade"><i class="fa fa-clock-o"></i> 9:00am -
                                    11:30am </span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30 justify-content-between">
                            <div class="me-15 text-center rounded15 box-shadowed h-50 w-50 d-table">
                                <p class="mt-5 mb-0 text-warning">Set</p>
                                <p class="mb-0">18</p>
                            </div>
                            <div class="d-flex flex-column flex-grow-1 fw-500 min-w-p60">
                                <a href="#"
                                    class="text-dark hover-primary mb-1 fs-16 overflow-hidden text-nowrap text-overflow">Interview</a>
                                <span class="fs-10 text-fade"><i class="fa fa-clock-o"></i> 9:00am -
                                    11:30am </span>
                            </div>
                            <div class="dropdown">
                                <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                        class="ti-more-alt"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-20 justify-content-between">
                            <div class="me-15 text-center rounded15 box-shadowed h-50 w-50 d-table">
                                <p class="mt-5 mb-0 text-warning">Fri</p>
                                <p class="mb-0">22</p>
                                                </div>
                                                <div class="d-flex flex-column flex-grow-1 fw-500 min-w-p60">
                                                    <a href="#"
                                                        class="text-dark hover-primary mb-1 fs-16 overflow-hidden text-nowrap text-overflow">Organizational
                                                        meeting</a>
                                                    <span class="fs-10 text-fade"><i class="fa fa-clock-o"></i> 10:00am
                                                        - 10:30am </span>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i
                                                            class="ti-more-alt"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

@endsection