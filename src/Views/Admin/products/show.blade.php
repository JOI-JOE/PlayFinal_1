@extends('layouts.master')

@section('title')
    Show Product
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

    <div class="white_card card_height_100 mb_30 p-3">
        <h1></h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>KEY</th>
                    <th>VALUE</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($product as $field => $value)
                    <tr>
                        <td>{{ $field }}</td>
                        @if ($field == 'product_img')
                            <td><img src="{{ asset("{$value}") }}" alt="" width="100" style="border-radius: 10px;">
                            </td>
                        @else
                            <td>{{ $value }}</td>
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
