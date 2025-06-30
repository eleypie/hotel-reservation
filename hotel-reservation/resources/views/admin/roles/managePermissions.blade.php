@extends('layouts.admin-app')

@section('title', 'Edit Role')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Permissions Management</h2>
        </div>
        <form method="POST" action="">
            @method('PUT')
            @csrf

            @if ($errors->any())
                <div class="position-absolute top-0 end-0 p-3 inputError" style="z-index: 1050;">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Input Error!</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class=" container-fluid">
                <div class="form-group" style="display:flex; flex-direction:row;">
                    <a href="">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                            Create Permission
                        </button>
                    </a>
                    <a href="">
                        <button class="btn btn-warning" id="rename">Rename Selected Permission</button>
                    </a>
                    <button type="button" id="deleteP" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-confirm" data-role-id="">
                            Delete Selected Permission
                    </button>
                </div><br>
                <div class="form-group">
                    <label>List of Permissions</label>
                    


                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-12 col-md-4">
                                <div class="form-check d-flex align-items-center">
                                    <label class="custom-radio-card ms-2">
                                        <input class="form-radio" type="radio" name="id" 
                                        value="{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('admin-roles') }}">
                <button type="button" class="btn btn-secondary" style="margin-top: 1rem; height:2.7rem; width:5rem">
                    Back
                </button>
            </a>
        </form>
    </div>
</main>
@endsection