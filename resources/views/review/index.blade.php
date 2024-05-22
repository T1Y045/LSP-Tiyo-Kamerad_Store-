<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="dark-edition">
    <div class="wrapper">
        @extends('dashboard.master')
        @section('nav')
        @include('dashboard.nav')

        @endsection

        <div class="main-panel">
            <!-- Navbar -->
            @section('page-title', 'Review')
            @section('main')
            @include('dashboard.main')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">List Comments</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Product</th>
                                                    <th>Rating</th>
                                                    <th>Comment</th>
                                                    <th>Control</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reviews as $idx => $data)
                                                <tr>
                                                    <td>{{ $idx + 1 }}</td>
                                                    <td>{{ $data->customer_name }}</td>
                                                    <td>{{ $data->product_name }}</td>
                                                    <td>{{ $data->rating }}</td>
                                                    @if (strlen($data->comment) > 8)
                                                    <td data-bs-toggle="tooltip" data-bs-placement="right"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="{{ $data->comment }}" style="cursor: help;">
                                                        {{ substr($data->comment, 0, 8) . '...' }}
                                                    </td>
                                                    @else
                                                    <td>{{ $data->comment }}</td>
                                                    @endif
                                                    <td class="align-middle text-center text-sm">
                                                        <a href="{{ route('review.edit', $data->id) }}"
                                                            class="btn-sm btn btn-primary">Edit</a>
                                                        <a href="#" onclick="confirmDelete('{{ $data->customer_name }}', {{ $data->id }})"
                                                            class="btn-sm btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="https://creative-tim.com/presentation">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right" id="date">
                        , made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <input type="hidden" id="sts" class="form-control" value="{{ $status ?? '' }}" />
    <input type="hidden" id="psn" class="form-control" value="{{ $pesan ?? '' }}" />

    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
    </script>

    <script>
        function confirmDelete(categoryName, categoryId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete the comments from "' + categoryName + '". This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteReview(categoryId);
                }
            });
        }

        function deleteReview(reviewId) {
            axios.delete('/review/' + reviewId)
                .then((response) => {
                    Swal.fire('Success', response.data.message, 'success');
                    window.location.reload();
                })
                .catch((error) => {
                    Swal.fire('Error', error.response.data.message, 'error');
                });
        }
    </script>
</body>

</html>