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
                    <strong class="card-title">My cars</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Model</th>
                                <th>Plate number</th>
                                <th>Color</th>
                                <th>Status</th>
                                <th>In use</th>
                                <th>Reason</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use App\Models\Car;
                                $isOtherCarUsed = Car::isCarUsed();
                            @endphp
                            @foreach ($cars as $car)
                                <tr>
                                    <input type="hidden" class="location_id" value="{{ $car['id'] }}">
                                    <td>{{ $car['name'] }}</td>
                                    <td>{{ $car['model'] }}</td>
                                    <td>{{ $car['plate_number'] }}</td>
                                    <td>{{ $car['color'] }}</td>
                                    <td>{{ $car->statuses->name }}</td>
                                    <td>
                                        <form action="{{route('updateCarUse')}}" method="POST">
                                            @csrf
                                            <div class="form-check">
                                                <input type="hidden" name="id" value="{{ $car['id'] }}">
                                                <input type="hidden" name="checkbox" value="0">
                                                <input class="form-check-input" type="checkbox"  name='checkbox' value="1"
                                                    id="flexCheckDefault" {{ $car['in_use'] == 1 ? 'checked' : '' }} {{ ($car['status_id'] != 2 || $isOtherCarUsed != $car['in_use']  ) ? 'disabled' : '' }} onchange="this.form.submit()">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                </label>
                                            </div>
                                        </form>

                                    </td>
                                    <td>{{ $car['reason'] }}</td>
                                    <td>

                                        <form action="{{ route('deleteCar', $car['id']) }}" method="POST"
                                            style="display: inline" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal fade" id="ModalDelete{{ $car['id'] }}" tabindex="-1"
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
                                            data-target='#ModalDelete{{ $car['id'] }}'>Delete</a>
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
