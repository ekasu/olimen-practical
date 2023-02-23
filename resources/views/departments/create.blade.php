@extends('includes.header_footer')

@section('content')
    <div class="container">
        <div class="shadow-sm bg-white rounded p-4">
            <div class="card">
                <div class="card-header">
                    Add Department
                </div>
                <div class="card-body">
                    <form action="{{ route('department.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text"
                                class="form-control form-control-md @error('name')
                            border border-danger
                        @enderror"
                                name="name" value="{{ old('name') }}" id="" aria-describedby="helpId"
                                placeholder="">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Period</label>
                            <select
                                class="form-select form-select-lg @error('period')
                        border border-danger
                    @enderror"
                                name="period" id="">
                                <option value="" selected>Select one</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                            @error('period')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Total Allocation</label>
                            <input type="text"
                                class="form-control form-control-md @error('amount')
                            border border-danger
                        @enderror"
                                name="amount" value="{{ old('amount') }}" id="" aria-describedby="helpId"
                                placeholder="">
                            @error('amount')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea
                                class="form-control @error('description')
                        border border-danger
                    @enderror"
                                name="description" id="" rows="6">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-secondary">Add Department</button>
                        </div>

                        <a href="{{ route('department.index') }}" class="btn btn-outline-secondary"><i
                            class="bi bi-arrow-left-circle  text-secondary mr-3"></i>Previous Page</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
