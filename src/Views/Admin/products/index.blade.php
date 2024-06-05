@extends('layouts.master')

@section('title')
    Danh sách Player
@endsection

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="p-5 ">
        <a 
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        href="{{url('admin/products/create')}}">
            Add More
        </a>
    </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            IMG
                        </th>
                        <th scope="col" class="px-6 py-3">
                            EMAIL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CREATED AT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            UPDATED AT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only"></span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only"></span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $product['id']?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $product['c_name']?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $product['name']?>
                        </td>
                        <!-- Display the thumbnail image if it exists, otherwise show "No photo" -->
                        <td class="px-6 py-4">
                            <?= $product['img_thumbnail'] ?? "No photo"?>
                            <img src="$product['img_thumbnail']" alt="" width="100">
                        </td>
                        <td class="px-6 py-4">
                            <?= $product['email']?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $product['create_at']?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $product['update_at']?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ url("admin/products/{$product['id']}/show")}}" class="font-medium text-green-600 dark:text-blue-500 hover:underline">See</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ url("admin/products/{$product['id']}/edit")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ url("admin/products/{$product['id']}/delete")}}" class="font-medium text-red-600 dark:text-blue-500 hover:underline" onclick="return confirm('Are you sure?')">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
