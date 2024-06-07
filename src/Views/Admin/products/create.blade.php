@extends('layouts.master')

@section('title')
    Add More Player
@endsection

@section('content')
    @if (!empty($_SESSION['errors']))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @php
            unset($_SESSION['errors']);
        @endphp
    @endif
    <div class="white_card card_height_100 mb_30 p-4">
        <form class="max-w mx-auto" action="{{ url('admin/products/store') }}" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="nameProduct" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="nameProduct">
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">Regular</span>
                <input type="number" name="price_regular" class="form-control" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">Sale</span>
                <input type="number" name="price_sale" class="form-control" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
            </div>

            <div class="mb-4">
                <select class="form-select form-select-xl" name="category_id" aria-label="Category">
                    <option value="">Choose</option>
                    @foreach ($categoryPluck as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="formFile" class="form-label">Img</label>
                <input class="form-control" type="file" name="img_thumbnail" id="formFile">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
