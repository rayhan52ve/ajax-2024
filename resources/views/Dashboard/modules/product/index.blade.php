@extends('Dashboard.layouts.master')

@section('breadcrumb', 'Product')

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title">Products List</h1>
                        <button class="btn btn-outline-success" data-toggle="modal" data-target="#addProductModal">Create
                            Product</buton>
                    </div>
                    {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table class="table" id="DataTbl">
                            <thead style="background-color: skyblue">
                                <tr>
                                    <th class="border-top-0">SL</th>
                                    <th class="border-top-0">Product Name</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Action</th>

                                </tr>
                                <hr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                @endphp
                                @forelse ($products as $item)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td class="">
                                            <div class="btn-group">
                                                <button
                                                    class="btn btn-rounded btn-outline-primary btn-sm mt-1 update_product_form"
                                                    title="Edit" data-toggle="modal" data-target="#updateProductModal"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                    data-price="{{ $item->price }}">
                                                    <i class="mdi mdi-account-edit mdi-18px"></i>
                                                </button>
                                                <button data-id="{{ $item->id }}"
                                                    class="delete btn btn-rounded btn-outline-danger btn-sm ml-1 mt-1"
                                                    type="button" title="Delete">
                                                    <i class="mdi mdi-delete-forever mdi-18px"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <h5>No Data Found</h5>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <!-- trigger modal -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    {{-- Add modal  --}}
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Create Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errorMsgContainer mb-3">

                    </div>
                    <form action="" method="POST" id="addProductForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">product Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price"
                                placeholder="Product price">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_product">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Add  modal  --}}

    {{-- Update modal  --}}
    <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="updateProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="errorMsgContainer mb-3">

                    </div>
                    <form action="" method="POST" id="updateProductForm">
                        @csrf
                        <input type="hidden" name="id" id="up_id">
                        <div class="form-group">
                            <label for="name">product Name</label>
                            <input type="text" class="form-control" name="up_name" id="up_name"
                                placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="up_price" id="up_price"
                                placeholder="Product price">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product">Update Product</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Update  modal  --}}

    {{-- Ajax --}}
    <script>
        $(document).ready(function() {

            // add product
            $(document).on('click', '.add_product', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let price = $('#price').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('product.store') }}",
                    data: {
                        name: name,
                        price: price
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#addProductModal').modal('hide');
                            $('#addProductForm')[0].reset();
                            $('.table').load(location.href + ' .table');
                            toastr.success('Product added successfully', 'Success');
                        }
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $('.errorMsgContainer').empty();
                        $.each(error.errors, function(index, value) {
                            $('.errorMsgContainer').append(
                                '<span class="text-danger">' + value + '</span>' +
                                '<br>');
                        });
                    }
                });
            });

            // show product value in update form
            $(document).on('click', '.update_product_form', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                $('#up_id').val(id);
                $('#up_name').val(name);
                $('#up_price').val(price);
            })

            // Update product
            $(document).on('click', '.update_product', function(e) {
                e.preventDefault();
                let up_id = $('#up_id').val();
                let up_name = $('#up_name').val();
                let up_price = $('#up_price').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('product.update') }}",
                    data: {
                        up_id: up_id,
                        up_name: up_name,
                        up_price: up_price
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#updateProductModal').modal('hide');
                            $('#updateProductForm')[0].reset();
                            $('.table').load(location.href + ' .table');
                            toastr.success('Product Updated Successfully', 'Success');
                        }
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $('.errorMsgContainer').empty();
                        $.each(error.errors, function(index, value) {
                            $('.errorMsgContainer').append(
                                '<span class="text-danger">' + value + '</span>' +
                                '<br>');
                        });
                    }
                });
            });

            // Delete product
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                let product_id = $(this).data('id');
                if (confirm('Are you sure to dele this?')) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('product.destroy') }}",
                        data: {
                            product_id: product_id,
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 'success') {
                                $('.table').load(location.href + ' .table');
                                toastr.error('Product Deleted Successfully');
                            }
                        },
                    });
                }

            });

        });
    </script>

    {{-- Ajax --}}

@endsection
