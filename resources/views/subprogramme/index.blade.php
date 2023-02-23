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
                    <h3 class="mt-2">Sub Programmes</h3>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="btn-group mt-3" role="group" aria-label="button group">
                        <a href="{{ route('subprogramme.create') }}" type="button"
                            class="btn btn-outline-secondary shadow border mr-1">Add
                            SubProgramme</a>
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
                            <th>Programme</th>
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
                            <th>Programme</th>
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
                        @if ($subprogrammes->count() > 0)
                            @foreach ($subprogrammes as $subprogramme)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $subprogramme->name }}</td>
                                    <td>{{ $subprogramme->description }}</td>
                                    <td>{{ $subprogramme->programme->name }}</td>
                                    <td>{{ $subprogramme->unit_measure }}</td>
                                    <td>{{ $subprogramme->period }}</td>
                                    <td>{{ $subprogramme->quantity }}</td>
                                    <td>{{ $subprogramme->unit_price }}</td>
                                    <td>{{ $subprogramme->total_exclusive }}</td>
                                    <td>{{ $subprogramme->vat }}</td>
                                    <td>{{ $subprogramme->total_inclusive }}</td>
                                    <td>{{ $subprogramme->created_at->format('y/m/d') }}</td>
                                    <td><a href="{{ route('subprogramme.edit', $subprogramme) }}">Edit</a> | <a
                                            href="{{ route('subprogramme.destroy', $subprogramme) }}"
                                            Onclick="return ConfirmDelete();">Delete</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    Wooh !! there are no subprogrammes found
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
