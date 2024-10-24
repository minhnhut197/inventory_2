<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('livewire.addnewsuppliermodal')
        @include('livewire.editsuppliermodal')
        <div class="content-wrapper  m-0">
            <section class="content-header">
                <h1>
                    Danh sách nhà cung cấp
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                style="display:inline-block;margin-right:5px">Home</span></a></li>
                    <li><span style="margin: 0 5px;">Nhà cung cấp</span></li>
                    <li class="active"><span style="font-weight:600;margin-left:5px">Danh sách nhà cung cấp</span></li>
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
                                        <th>Mã nhà cung cấp</th>
                                        <th>Tên nhà cung cấp</th>
                                        <th>Điện thoại</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Hàng hóa</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{$supplier->code}}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->phone }}</td>
                                            <td>{{$supplier->email}}</td>
                                            <td>{{ $supplier->address }}</td>
                                            <td>{{ $supplier->items }}</td>
                                            <td>
                                                @if ($supplier->status == "Active")
                                                    <span>Đang hoạt động</span>
                                                @elseif ($supplier->status=="Suspended")
                                                    <span>Ngừng hoạt động</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('admin.edituser', $user->id) }} "><i
                                                        class="fa fa-edit fa-2x"></i></a> --}}
                                                <a href="">
                                                    <button type="button"
                                                        wire:click.prevent="mount2({{ $supplier->id }})"
                                                        class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                                        data-bs-target="#editsupplier"><i class="fa fa-edit fa-2x"></i>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm delete-btn"
                                                    wire:click.prevent="deleteConfirm({{ $supplier->id }})"
                                                    wire:confirm="Bạn có chắc chắn muốn xóa nhà cung cấp này?" ><i
                                                        class="fa fa-times fa-2x text-danger "></i>
                                                </button>
                                                {{-- <a href="#"
                                                    onclick="confirm('Want to delete?')||event.stopImmediatePropagation()"
                                                    wire:click.prevent="delete({{ $item->id }})"><i
                                                        class="fa fa-2x fa-times text-danger"
                                                        style="padding-left:10px"></i></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
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
@endpush

@push('styles')
    <style>
        .modal-content {
            background-color: white;
        }
    </style>
@endpush
