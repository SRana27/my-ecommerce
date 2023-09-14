@extends('admin.master')
@section('title')
    manage unit
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mt-2">
            <div class="card ">
                <div class="card-body">
                    <h4 class="card-title text-center ">Unit Manage Table</h4>
                    <hr>
                    @if($message=Session::get('message'))

                        <div class="alert alert-success alert-dismissible fade show text-center">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-lebel="close"></button>
                        </div>
                    @endif
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr class="text-center">
                                <th>sl</th>
                                <th>Unit Name</th>
                                <th>Unit Code</th>
                                <th>Unit description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i=1; @endphp
                            @foreach($units as $unit)
                                <tr>

                                    <td class="pt-5">{{$i++}}</td>
                                    <td class="pt-5">{{$unit->name}}</td>
                                    <td class="pt-5">{{$unit->code}}</td>
                                    <td class="pt-5">{{$unit->description}}</td>
                                    <td class="pt-5">{{$unit->status ==1 ?'Published': 'Unpublished'}}</td>
                                    <td class="d-flex ">
                                        <a href="{{route('edit.unit',['unit_id'=>$unit->id])}}" class=" btn btn-success mx-2 my-4 ">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        @if($unit->status==1)
                                            <a href="{{route('status.unit',['unit_id'=>$unit->id])}}" class=" btn btn-success  my-4 ">
                                                <i class="ti-lock"></i>
                                            </a>
                                        @else
                                            <a href="{{route('status.unit',['unit_id'=>$unit->id])}}" class=" btn btn-danger  my-4 ">
                                                <i class="ti-unlock"></i>
                                            </a>
                                        @endif
                                        <form action="{{route('delete.unit')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="unit_id" value="{{$unit->id}}">
                                            <button onclick="return confirm('are you sure for delete this unit')" class=" btn btn-danger mx-2 my-4"><i class="ti-trash"></i></button>
                                        </form>
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

@endsection
