@extends('includes.header_footer')

@section('content')
    <div class="container">
        <div class="shadow-sm bg-white rounded p-4">
            <div class="card">
                <div class="card-header">
                    Upade Sub programme
                </div>
                <div class="card-body">
                    <form action="{{ route('subprogramme.update', $subprogramme) }}" method="post">
                        <input type="hidden" name="_method" value="patch">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text"
                                class="form-control form-control-md @error('name')
                            border border-danger
                        @enderror"
                                name="name" value="{{ $subprogramme->name }}" id="" aria-describedby="helpId"
                                placeholder="">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Programme</label>
                            <select
                                class="form-select form-select-lg @error('programme_id')
                        border border-danger
                    @enderror"
                                name="programme_id" id="">
                                @foreach ($programme as $programmes)
                                    <option value="{{ $programmes->id }}" @if ( $programmes->name === $subprogramme->programme->name) selected @endif>
                                        {{ $programmes->name }}</option>
                                @endforeach
                            </select>
                            @error('programme_id')
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
                                <option value="levies" @if ($subprogramme->group === 'levies') selected @endif>
                                    Levies</option>
                                <option value="licenses" @if ($subprogramme->group === 'licenses') selected @endif>
                                    Licenses</option>
                                <option value="permits" @if ($subprogramme->group === 'permits') selected @endif>
                                    Permits</option>
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
                                <option value="levies" @if ($subprogramme->category === 'levies') selected @endif>
                                    Levies</option>
                                <option value="licenses" @if ($subprogramme->group === 'licenses') selected @endif>
                                    Licenses</option>
                                <option value="permits" @if ($subprogramme->group === 'permits') selected @endif>
                                    Permits</option>
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
                                <option value="month" @if ($subprogramme->period === 'month') selected @endif>Month</option>
                                <option value="year" @if ($subprogramme->period === 'year') selected @endif>Year</option>
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
                                name="description" id="" rows="6">{{ $subprogramme->description }}</textarea>
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
                                <option value="each" @if ($subprogramme->unit_measure === 'each') selected @endif>Each</option>
                                <option value="double" @if ($subprogramme->unit_measure === 'double') selected @endif>Double</option>
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
                                name="quantity" value="{{ $subprogramme->quantity }}" id=""
                                aria-describedby="helpId" placeholder="">
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
                                name="unitprice" value="{{ $subprogramme->unit_price }}" id=""
                                aria-describedby="helpId" placeholder="">
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
                                name="vat" value="{{ $subprogramme->vat }}" id=""
                                aria-describedby="helpId" placeholder="">
                            @error('vat')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-secondary">Update subprogramme</button>
                        </div>

                        <a href="{{ route('subprogramme.index') }}" class="btn btn-outline-secondary"><i
                                class="bi bi-arrow-left-circle  text-secondary mr-3"></i>Previous Page</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
