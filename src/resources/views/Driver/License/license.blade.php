@extends('layouts.driver')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
@endsection
@section('content')
    <!-- pop-up -->
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">My licenses</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Valid until</th>
                                <th>Status</th>
                                <th>Reason(if not apporved)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($licenses as $license)
                                <tr>
                                    <input type="hidden" class="location_id" value="{{ $license['id'] }}">
                                    <td>{{ $license['id'] }}</td>
                                    <td>{{ $license['end_date'] }}</td>
                                    <td>{{ $license->statuses->name }}</td>
                                    <td>{{ $license['reason'] }}</td>
                                    <td>
                                        <form action="{{ route('deleteLicense', $license['id']) }}" method="POST"
                                            style="display: inline" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal fade" id="ModalDelete{{ $license['id'] }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete car
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure that you want to delete this car?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target='#ModalDelete{{ $license['id'] }}'>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div><!-- .animated -->
    </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->



@endsection
@section('script')

    <script src=" {{ asset('style/assets/js/lib/data-table/datatables.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/jszip.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/pdfmake.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/vfs_fonts.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/buttons.html5.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/buttons.print.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js') }} "></script>
    <script src=" {{ asset('style/assets/js/lib/data-table/datatables-init.js') }} "></script>

    <script>
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
@stop
