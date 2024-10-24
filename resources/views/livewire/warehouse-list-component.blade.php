{{-- <div class="content-wrapper bg-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Warehouses
                        </div>
                        <div class="col-md-6">
                            <a href=""  class="btn btn-success float-right">Add New Warehouse</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session()->has('message'))
                        <div class="alert alert-warning">
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Capacity</th>
                                <th>Used Capacity</th>
                                <th>Remaining Capacity</th>
                                <th>Description</th>
                                <th>Manager</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warehouses as $warehouse)
                                <tr>
                                    <td>{{$warehouse->name}}</td>
                                    <td>{{$warehouse->address}}</td>
                                    <td>{{$warehouse->capacity}}</td>
                                    <td>{{$warehouse->used_capacity}}</td>
                                    <td>{{$warehouse->remaining_capacity}}</td>
                                    <td>{{$warehouse->description}}</td>
                                    <td>{{$warehouse->manager_id}}</td>
                                    <td>{{$warehouse->warehouse_type}}</td>
                                    <td>
                                        <a href="#" ><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" wire:click.prevent="delete({{$warehouse->id}})" ><i style="margin-left:10px;"class="text-danger fa fa-times fa-2x"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$users->links()}} --}}
                {{-- </div>
            </div>
        </div>
    </div>
</div> --}} 


<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('livewire.add-warehouse-component')
        @include('livewire.edit-warehouse-modal')
        <div class="content-wrapper  m-0">
            <section class="content-header">
                <h1>
                    Danh sách nhà kho
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                style="display:inline-block;margin-right:5px">Home</span></a></li>
                    <li><span style="margin: 0 5px;">Nhà kho</span></li>
                    <li class="active"><span style="font-weight:600;margin-left:5px">Danh sách nhà kho</span></li>
                </ol>
            </section>
            <div class="row bg-white">
                <div class="col-md-82">
                    <div class="box">
                        <div class="box-header with-border">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addnew"><i class="fa fa-plus"></i> Thêm mới
                            </button>
                        </div>
                        <div class="box-body">
                            {{-- @if (session()->has('message'))
                                <div class="alert alert-warning">
                                    {{ session()->get('message') }}
                                </div>
                            @endif --}}
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã nhà kho</th>
                                        <th>Tên nhà kho</th>
                                        <th>Địa chỉ</th>
                                        <th>Dung tích</th>
                                        <th>Dung tích đã sử dụng</th>
                                        <th>Dung tích còn lại</th>
                                        <th>Loại nhà kho</th>
                                        <th>Người quản lý</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warehouses as $warehouse)
                                        <tr>
                                            <td>{{$warehouse->code}}</td>
                                            <td>{{$warehouse->name}}</td>
                                            <td>{{$warehouse->address}}</td>
                                            <td>{{$warehouse->capacity}}</td>
                                            <td>{{$warehouse->used_capacity}}</td>
                                            <td>{{$warehouse->remaining_capacity}}</td>
                                            <td>{{$warehouse->warehouse_type}}</td>
                                            <td>
                                                @foreach ($managers as $manager)
                                                    @if ($warehouse->manager == $manager->id)
                                                        {{ $manager->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="">
                                                    <button type="button" wire:click.prevent="mount2({{$warehouse->id}})" class="btn btn-primary btn-sm edit-btn"
                                                    data-bs-toggle="modal" data-bs-target="#editwarehouse"><i
                                                        class="fa fa-edit fa-2x"></i>
                                                </button>
                                                </a>
                                                <a href="#" wire:click.prevent="delete({{$warehouse->id}})"
                                                    wire:confirm="Bạn có chắc chắn muốn xóa nhà kho này?" ><i style="margin-left:10px;"class="text-danger fa fa-times fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{$users->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        
    </script>
@endpush

@push('styles')
    <style>
        .modal-content {
            background-color: white;
        }
    </style>
@endpush

