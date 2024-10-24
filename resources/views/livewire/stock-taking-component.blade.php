@extends('layouts.base2')
@section('content')
<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        {{-- @include('livewire.editusermodal') --}}
        {{-- @include('livewire.add-good-issue-modal') --}}
        {{-- @include('livewire.goods-receipt-component') --}}
        <div class="content-wrapper  m-0">
            <section class="content-header">
                <h1>
                    Phiếu xuất hàng
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                style="display:inline-block;margin-right:5px">Home</span></a></li>
                    <li><span style="margin: 0 5px;">Giao dịch</span></li>
                    <li class="active"><span style="font-weight:600;margin-left:5px">Xuất hàng</span></li>
                </ol>
            </section>
            <div class="row bg-white">
                <div class="col-md-82">
                    <div class="box">
                        <div class="box-header with-border">
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addnewimport"><i class="fa fa-plus"></i> Thêm mới
                            </button> --}}
                            <a href="{{route('add-stock-taking')}}">
                                <button  type="button" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> Thêm mới</button>
                            </a>
                        </div>
                        <div class="box-body">
                            {{-- @if (session()->has('message'))
                                <div class="alert alert-warning">
                                    {{ session()->get('message') }}
                                </div> --}}
                            {{-- <script>
                                     swal("Message","{{Session::get('message')}}",'success',{
                                        button:true,
                                        button:"OK",
                                        timer:3000,
                                        dangerMode:true,
                                     });
                               </script> --}}
                            {{-- @endif --}}
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã phiếu xuất hàng</th>
                                        <th>Người tạo</th>
                                        <th>Khách hàng</th>
                                        <th>Tên mặt hàng</th>
                                        <th>Số lượng</th>
                                        <th>Đơn vị </th>
                                        <th>Đơn giá</th>
                                        <th>Giảm giá</th>
                                        <th>Tổng tiền</th>
                                        <th>Thời gian nhập</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($stock_takings as $stock_taking)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$stock_taking->code}}</td>
                                            <td>{{ $stock_taking->getCreator($stock_taking->creator) }}</td>
                                            <td>{{ $stock_taking->getSupplier($stock_taking->customer) }}</td>
                                            <td>
                                                {{-- {{ $stock_taking->getItemName($stock_taking->item) }} --}}
                                            </td>
                                            <td>
                                                {{-- @if ($user->role == 0)
                                                    <span>Admin</span>
                                                @elseif ($user->role == 1)
                                                    <span>Quản lý</span>
                                                @else
                                                    <span>Nhân viên</span>
                                                @endif --}}
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$stock_taking->created_at}}</td>
                                            <td>
                                                {{-- <a href="{{ route('admin.edituser', $user->id) }} "><i
                                                        class="fa fa-edit fa-2x"></i></a> --}}
                                                <a href="">
                                                    <button type="button" wire:click.prevent="mount2()" class="btn btn-primary btn-sm edit-btn"
                                                    data-bs-toggle="modal" data-bs-target="#edituser"><i
                                                        class="fa fa-edit fa-2x"></i>
                                                </button>
                                                </a>
                                                {{-- <button type="button"
                                                    class="btn btn-primary btn-sm delete-btn" wire:click.prevent="deleteConfirm({{ $user->id }})"
                                                    ><i
                                                        class="fa fa-times fa-2x text-danger " ></i>
                                                </button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $imports->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
            // $('#example1').DataTable({
            //     responsive: true
            // })
            // $('#example2').DataTable({
            //     'paging': true,
            //     'lengthChange': false,
            //     'searching': false,
            //     'ordering': true,
            //     'info': true,
            //     'autoWidth': false
            // })
            const ps = new PerfectScrollbar('.sidebar-mini', {
                wheelSpeed: 2,
                wheelPropagation: true,
                minScrollbarLength: 20
            });
        })
    </script>
    {{-- <script>
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('deleteConfirmed');
                }
            });
        });
    </script> --}}
@endsection

@section('styles')
    <style>
        .modal-content {
            background-color: white;
        }
    </style>
@endsection
