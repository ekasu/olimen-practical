@extends('includes.header_footer')

@section('content')
    <div class="card">
        @if (!empty(session('success')))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-8">
                    <h3 class="mt-2">Departments</h3>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="btn-group mt-3" role="group" aria-label="button group">
                        <a href="{{ route('department.create') }}" type="button"
                            class="btn btn-outline-secondary shadow border mr-1">Add
                            Department</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped bg-white">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>No</th>
                            <th>Name</th>
                            <th>Period</th>
                            <th>Total Allocation</th>
                            <th>Desciption</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Period</th>
                            <th>Total Allocation</th>
                            <th>Desciption</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @if ($departments->count() > 0)
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td><a href="{{ route('department.showall', $department) }}" class="text-secondary btn">{{ $department->name }} </a>
                                    </td>
                                    <td>{{ $department->period }}</td>
                                    <td>{{ $department->amount }}</td>
                                    <td>{{ $department->description }}</td>
                                    <td>{{ $department->created_at->format('y/m/d') }}</td>
                                    <td><a href="{{ route('department.edit', $department) }}">Edit</a> | <a
                                            href="{{ route('department.destroy', $department) }}"
                                            Onclick="return ConfirmDelete();">Delete</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    Wooh !! there are no departments found
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete this user?");
    }
</script>
