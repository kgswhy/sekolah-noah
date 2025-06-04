@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Kalender Kegiatan</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Kalender</li>
            </ol>
        </nav>
    </div>
    <!-- Tombol Tambah Kegiatan di sebelah kanan content header -->
    <div class="ms-auto">
        <button class="btn btn-primary" id="showCreateModal">+ Tambah Kegiatan</button>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="calendar" class="mt-4"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk menambah kegiatan -->
<div class="modal" id="createEventModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEventModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="btn-close" id="closeModalButton" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createEventForm">
                    @csrf
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="eventName" name="eventName" required>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="responsiblePerson" class="form-label">Penanggung Jawab</label>
                        <input type="text" class="form-control" id="responsiblePerson" name="responsiblePerson" required>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="planned">Planned</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Kegiatan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- DayPilot CSS & JS -->
<link href="https://cdn.daypilot.org/2023.1.0/daypilot-all.min.css" rel="stylesheet">
<script src="https://cdn.daypilot.org/2023.1.0/daypilot-all.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Dummy data untuk events
        const events = [
            {
                "start": "2025-05-10T09:00:00",
                "end": "2025-05-10T10:00:00",
                "id": 1,
                "text": "Meeting with client",
                "status": "planned"
            },
            {
                "start": "2025-05-12T14:00:00",
                "end": "2025-05-12T18:00:00",
                "id": 2,
                "text": "Team Building",
                "status": "ongoing"
            }
        ];

        // Initialize DayPilot Calendar
        var calendar = new DayPilot.Calendar("calendar", {
            viewType: "Month",
            startDate: "2025-05-01",
            events: events,
            onEventClick: function (args) {
                var event = args.e.data;
                alert("Event: " + event.text + "\nStart: " + event.start + "\nEnd: " + event.end + "\nStatus: " + event.status);
            }
        });

        calendar.init();

        // Show Create Event Modal
        const showModalButton = document.getElementById('showCreateModal');
        const createEventModal = document.getElementById('createEventModal');
        const closeModalButton = document.getElementById('closeModalButton');

        showModalButton.addEventListener('click', function () {
            createEventModal.style.display = 'block';
        });

        closeModalButton.addEventListener('click', function () {
            createEventModal.style.display = 'none';
        });

        // Handle form submit untuk menambah kegiatan
        const createEventForm = document.getElementById('createEventForm');
        createEventForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const newEvent = {
                start: document.getElementById('startDate').value + "T09:00:00",
                end: document.getElementById('endDate').value + "T17:00:00",
                text: document.getElementById('eventName').value,
                status: document.getElementById('status').value
            };

            // Add event to DayPilot calendar
            calendar.events.add(new DayPilot.Event(newEvent));

            // Close modal
            createEventModal.style.display = 'none';

            // Reset form
            createEventForm.reset();
        });
    });
</script>
@endsection
