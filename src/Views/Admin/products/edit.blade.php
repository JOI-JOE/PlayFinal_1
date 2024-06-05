@extends('layouts.master')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h1 class="m-0">Adidas | Detail: {{ $product['name'] }}</h1>
                </div>
            </div>
        </div>
    </div>
    @if (!empty($_SESSION['errors']))
        <div class="alert alert-warning">
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

    @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
    @endif

    <div class="white_card card_height_100 mb_30 p-4">
        <form class="max-w mx-auto" action="{{ url('admin/products/' . $product['id'] . '/update') }}" method="POST"
            enctype="multipart/form-data">
            <div class="mb-4">
                <label for="nameProduct" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $product['name'] }}" class="form-control" id="nameProduct">
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text">$</span>
                <input type="number" name="price" value="{{ $product['price'] }}" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
            </div>

            <div class="mb-4">
                <label for="formFile" class="form-label">Img</label>
                <input class="form-control" type="file" name="product_img" id="formFile">
                <div class="mb-4 mt-2">
                    <img src="{{ asset("{$product['product_img']}") }}" alt="" width="100"
                        style="border-radius: 10px;">
                </div>
            </div>

            <div class="mb-4">
                <select class="form-select form-select-xl" name="category_id" aria-label="Category">
                    <option value="">Choose</option>
                    @foreach ($categoryPluck as $key => $value)
                        <option @if ($key == $product['category_id']) selected @endif value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
