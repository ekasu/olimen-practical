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
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped bg-white">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
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
                                    <td>{{ $programme->name }}</td>
                                    <td>{{ $programme->description }}</td>
                                    <td>{{ $programme->created_at->format('y/m/d') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    Wooh !! there are no programms found
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
