@extends('layouts.master')

@section('title')
    Danh sách Player
@endsection

@section('content')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h1 class="m-0">Adidas</h1>
                </div>
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary p-2">Add Product</a>
            </div>
        </div>
        <div class="white_card_body">
            <div class="table-responsive m-b-30">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Img</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product['id'] }}</th>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['price'] }}</td>
                                <td>{{ $product['c_name'] }}</td>
                                <td>
                                    @if (!empty($product['product_img']))
                                        <img src="{{ asset("{$product['product_img']}") }}" alt="" width="100"
                                            style="border-radius: 10px;">
                                    @else
                                        <p>No photo</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url("admin/products/{$product['id']}/show") }}">
                                        <button class="btn btn-success">See</button>
                                    </a>

                                    <a href="{{ url("admin/products/{$product['id']}/edit") }}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>

                                    <a href='{{ url("admin/products/{$product['id']}/delete") }}' class="btn btn-danger"
                                        onclick="return confirm('Are You Sure About That')">
                                        Delete
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    </section>
@endsection
