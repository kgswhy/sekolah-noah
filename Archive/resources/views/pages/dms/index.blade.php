@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Document Management System</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">DMS</li>
                    <li class="breadcrumb-item active" aria-current="page">File Manager</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <!-- Optional button for other actions -->
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <!-- File & Folder List Header -->
                <div class="d-flex justify-content-between mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFolderModal">Buat Folder</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#uploadFileModal">Upload File</button>
                </div>

                <!-- File & Folder Grid -->
                <div class="file-manager">
                    <!-- Folder Item -->
                    <div class="file-item folder-item">
                        <div class="file-icon">
                            <i data-feather="folder" class="feather-icon"></i>
                        </div>
                        <div class="file-info">
                            <h5>HRD</h5>
                            <p class="file-details">Folder</p>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Manage Access</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="file-item folder-item">
                        <div class="file-icon">
                            <i data-feather="folder" class="feather-icon"></i>
                        </div>
                        <div class="file-info">
                            <h5>Admission</h5>
                            <p class="file-details">Folder</p>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Manage Access</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- File Item -->
                    <div class="file-item">
                        <div class="file-icon">
                            <i data-feather="file-text" class="feather-icon"></i>
                        </div>
                        <div class="file-info">
                            <h5>Design Baru.pdf</h5>
                            <p class="file-details">10 MB - Last modified: 2025-04-12</p>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Manage Access</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="file-item">
                        <div class="file-icon">
                            <i data-feather="file" class="feather-icon"></i>
                        </div>
                        <div class="file-info">
                            <h5>Report.xlsx</h5>
                            <p class="file-details">2.5 MB - Last modified: 2025-04-10</p>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Manage Access</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Create Folder -->
<div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFolderModalLabel">Buat Folder Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createFolderForm">
            <div class="mb-3">
                <label for="folderName" class="form-label">Nama Folder</label>
                <input type="text" class="form-control" id="folderName" required>
            </div>
            <button type="submit" class="btn btn-primary">Buat Folder</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Upload File -->
<div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadFileModalLabel">Upload File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="uploadFileForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Pilih File</label>
                <input type="file" class="form-control" id="file" required>
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('styles')
<style>
    .file-manager {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .file-item {
        flex: 0 0 23%;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .file-item:hover {
        transform: translateY(-5px);
    }

    .file-item .file-icon {
        color: #007bff;
    }

    .file-item h5 {
        margin: 10px 0;
        font-size: 16px;
    }

    .file-item .file-details {
        color: #6c757d;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .file-item .btn-group {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .folder-item .file-icon {
        color: #28a745;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    // Replace all feather icons with proper SVG
    feather.replace();

    // Script for creating a folder
    document.getElementById('createFolderForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var folderName = document.getElementById('folderName').value;
        if (folderName) {
            var folderList = document.querySelector('.file-manager');
            var folderItem = document.createElement('div');
            folderItem.classList.add('file-item', 'folder-item');
            folderItem.innerHTML = `
                <div class="file-icon">
                    <i data-feather="folder" class="feather-icon"></i>
                </div>
                <div class="file-info">
                    <h5>${folderName}</h5>
                    <p class="file-details">Folder</p>
                    <div class="btn-group">
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </div>
                </div>
            `;
            folderList.appendChild(folderItem);
            document.getElementById('folderName').value = '';
            alert('Folder berhasil dibuat');
        }
    });

    // Script for uploading file
    document.getElementById('uploadFileForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var fileInput = document.getElementById('file');
        var fileName = fileInput.files[0].name;
        if (fileName) {
            var fileList = document.querySelector('.file-manager');
            var fileItem = document.createElement('div');
            fileItem.classList.add('file-item');
            fileItem.innerHTML = `
                <div class="file-icon">
                    <i data-feather="file" class="feather-icon"></i>
                </div>
                <div class="file-info">
                    <h5>${fileName}</h5>
                    <p class="file-details">5 MB - Last modified: 2025-04-12</p>
                    <div class="btn-group">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Manage Access</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
            `;
            fileList.appendChild(fileItem);
            fileInput.value = '';
            alert('File berhasil di-upload');
        }
    });
</script>
@endsection
