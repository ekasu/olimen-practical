@extends('includes.header_footer')

@section('content')
    <div class="container">
        <div class="shadow-sm bg-white rounded p-4">
            <div class="card">
                <div class="card-header">
                    Add Programme
                </div>
                <div class="card-body">
                    <form action="{{ route('programme.store') }}" method="post">
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
                            <label for="" class="form-label">Depatment</label>
                            <select
                                class="form-select form-select-lg @error('department_id')
                        border border-danger
                    @enderror"
                                name="department_id" id="">
                                <option value="" selected>Select one</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Group</label>
                            <select
                                class="form-select form-select-lg @error('group')
                        border border-danger
                    @enderror"
                                name="group" id="">
                                <option value="" selected>Select one</option>
                                <option value="levies">Levies</option>
                                <option value="licenses">Licenses</option>
                                <option value="permits">Permits</option>
                            </select>
                            @error('group')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select
                                class="form-select form-select-lg @error('category')
                        border border-danger
                    @enderror"
                                name="category" id="">
                                <option value="" selected>Select one</option>
                                <option value="levies">Levies</option>
                                <option value="licenses">Licenses</option>
                                <option value="permits">Permits</option>
                            </select>
                            @error('category')
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


                        <div class="mb-3">
                            <label for="" class="form-label">Unit Of Measure</label>
                            <select
                                class="form-select form-select-lg @error('unitofmeasure')
                        border border-danger
                    @enderror"
                                name="unitofmeasure" id="">
                                <option value="" selected>Select one</option>
                                <option value="each">Each</option>
                                <option value="double">Double</option>
                            </select>
                            @error('unitofmeasure')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Quantity</label>
                            <input type="text"
                                class="form-control form-control-md @error('quantity')
                            border border-danger
                        @enderror"
                                name="quantity" value="{{ old('quantity') }}" id="" aria-describedby="helpId"
                                placeholder="">
                            @error('quantity')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Unit Price</label>
                            <input type="text"
                                class="form-control form-control-md @error('unitprice')
                            border border-danger
                        @enderror"
                                name="unitprice" value="{{ old('unitprice') }}" id="" aria-describedby="helpId"
                                placeholder="">
                            @error('unitprice')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">VAT</label>
                            <input type="text"
                                class="form-control form-control-md @error('vat')
                            border border-danger
                        @enderror"
                                name="vat" value="{{ old('vat') }}" id=""
                                aria-describedby="helpId" placeholder="">
                            @error('vat')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-secondary">Add Programme</button>
                        </div>

                        <a href="{{ route('department.index') }}" class="btn btn-outline-secondary"><i
                                class="bi bi-arrow-left-circle  text-secondary mr-3"></i>Previous Page</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
