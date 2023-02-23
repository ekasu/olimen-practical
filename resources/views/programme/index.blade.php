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
                    <h3 class="mt-2">Programmes</h3>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="btn-group mt-3" role="group" aria-label="button group">
                        <a href="{{ route('programme.create') }}" type="button"
                            class="btn btn-outline-secondary shadow border mr-1">Add
                            Programme</a>
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
                            <th>Desciption</th>
                            <th>Department</th>
                            <th>Group</th>
                            <th>Category</th>
                            <th>Unit`of`measeure</th>
                            <th>Period</th>
                            <th>Quantity</th>
                            <th>Unit`Price</th>
                            <th>Total`Exclusive</th>
                            <th>Vat</th>
                            <th>Total`Inclusive</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Desciption</th>
                            <th>Department</th>
                            <th>Group</th>
                            <th>Category</th>
                            <th>Unit`of`measeure</th>
                            <th>Period</th>
                            <th>Quantity</th>
                            <th>Unit`Price</th>
                            <th>Total`Exclusive</th>
                            <th>Vat</th>
                            <th>Total`Inclusive</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @if ($programmes->count() > 0)
                            @foreach ($programmes as $programme)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td><a href="{{ route('showsubprogrammes', $programme) }}"
                                            class="btn text-secondary">{{ $programme->name }} </a> </td>
                                    <td>{{ $programme->description }}</td>
                                    <td>{{ $programme->department->name }}</td>
                                    <td>{{ $programme->group }}</td>
                                    <td>{{ $programme->category }}</td>
                                    <td>{{ $programme->unit_measure }}</td>
                                    <td>{{ $programme->period }}</td>
                                    <td>{{ $programme->quantity }}</td>
                                    <td>{{ $programme->unit_price }}</td>
                                    <td>{{ $programme->total_exclusive }}</td>
                                    <td>{{ $programme->vat }}</td>
                                    <td>{{ $programme->total_inclusive }}</td>
                                    <td>{{ $programme->created_at->format('y/m/d') }}</td>
                                    <td><a href="{{ route('programme.edit', $programme) }}">Edit</a> | <a
                                            href="{{ route('programme.destroy', $programme) }}"
                                            Onclick="return ConfirmDelete();">Delete</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-primary">
                                    Wooh !! there are no programmes found
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>


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
