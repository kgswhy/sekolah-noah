@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Task Management</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Task</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="#" data-bs-toggle="modal" data-bs-target="#addTaskModal" class="btn btn-primary">+ Tambah Task</a>
    </div>
</div>
@endsection

@section('style')
    
@endsection

@section('content')
<style>
        .kanban-board {
            display: flex;
            flex-direction: row;
            overflow-x: auto;
            padding: 20px;
        }

        .kanban-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 20px;
        }

        .kanban-column {
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 10px;
            width: 300px;
            min-height: 500px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .kanban-column h5 {
            text-align: center;
            margin-bottom: 10px;
        }

        .list-group {
            padding: 0;
            list-style: none;
        }

        .list-group-item {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .kanban-column h5 {
            text-align: center;
        }

        /* Modal style */
        .modal-dialog {
            max-width: 600px;
        }
    </style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <!-- Kanban Board -->
                <div class="kanban-board">
                    <div class="kanban-container" id="kanban-container">
                        <!-- To Do Column -->
                        <div class="kanban-column" id="todo">
                            <h5>To Do</h5>
                            <ul id="todo-list" class="list-group">
                                <li class="list-group-item" data-id="1">Task 1 <button class="btn btn-danger btn-sm float-end delete-task">Hapus</button></li>
                                <li class="list-group-item" data-id="2">Task 2 <button class="btn btn-danger btn-sm float-end delete-task">Hapus</button></li>
                                <li class="list-group-item" data-id="3">Task 3 <button class="btn btn-danger btn-sm float-end delete-task">Hapus</button></li>
                            </ul>
                        </div>
                        <!-- In Progress Column -->
                        <div class="kanban-column" id="in-progress">
                            <h5>In Progress</h5>
                            <ul id="in-progress-list" class="list-group">
                                <li class="list-group-item" data-id="4">Task 4 <button class="btn btn-danger btn-sm float-end delete-task">Hapus</button></li>
                                <li class="list-group-item" data-id="5">Task 5 <button class="btn btn-danger btn-sm float-end delete-task">Hapus</button></li>
                            </ul>
                        </div>
                        <!-- Done Column -->
                        <div class="kanban-column" id="done">
                            <h5>Done</h5>
                            <ul id="done-list" class="list-group">
                                <li class="list-group-item" data-id="6">Task 6 <button class="btn btn-danger btn-sm float-end delete-task">Hapus</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for adding a new task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Tambah Task Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addTaskForm">
                    <div class="mb-3">
                        <label for="taskTitle" class="form-label">Judul Task</label>
                        <input type="text" class="form-control" id="taskTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="taskDescription" class="form-label">Deskripsi Task</label>
                        <textarea class="form-control" id="taskDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="taskPriority" class="form-label">Prioritas Task</label>
                        <select class="form-control" id="taskPriority">
                            <option value="low">Rendah</option>
                            <option value="medium">Sedang</option>
                            <option value="high">Tinggi</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="saveTaskBtn">Simpan Task</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Include SortableJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize SortableJS on the task columns
        new Sortable(document.getElementById('todo-list'), {
            group: 'task',  // Same group for drag-and-drop across columns
            animation: 150
        });

        new Sortable(document.getElementById('in-progress-list'), {
            group: 'task',
            animation: 150
        });

        new Sortable(document.getElementById('done-list'), {
            group: 'task',
            animation: 150
        });

        // Add Task Button click event
        document.getElementById('saveTaskBtn').addEventListener('click', function() {
            const taskTitle = document.getElementById('taskTitle').value;
            const taskDescription = document.getElementById('taskDescription').value;
            const taskPriority = document.getElementById('taskPriority').value;

            // Create new task element
            const newTask = document.createElement('li');
            newTask.classList.add('list-group-item');
            newTask.innerHTML = `${taskTitle} <button class="btn btn-danger btn-sm float-end delete-task">Hapus</button>`;

            // Add new task to the To Do list
            document.getElementById('todo-list').appendChild(newTask);

            // Close modal
            let myModal = new bootstrap.Modal(document.getElementById('addTaskModal'));
            myModal.hide();

            // Clear form
            document.getElementById('addTaskForm').reset();
        });

        // Delete task functionality
        document.body.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-task')) {
                e.target.closest('li').remove();
            }
        });
    });
</script>
@endsection
