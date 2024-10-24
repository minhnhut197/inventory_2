<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        {{-- @include('livewire.editcustomermodal') --}}
        @include('livewire.addnewcustomermodal')
        <div class="content-wrapper  m-0">
            <section class="content-header">
                <h1>
                    Danh sách khách hàng
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                style="display:inline-block;margin-right:5px">Home</span></a></li>
                    <li><span style="margin: 0 5px;">Khách hàng</span></li>
                    <li class="active"><span style="font-weight:600;margin-left:5px">Danh sách người dùng</span></li>
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
                                        <th>Tên người dùng</th>
                                        <th>Avatar</th>
                                        <td>Giới tính</td>
                                        <td>Ngày sinh</td>
                                        <th>Email</th>
                                        <th>Số diện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái hoạt động</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td> <img style="width: 50px;height:50px" src="{{asset('assets/images/avatars/')}}/{{$customer->avatar}}" class="rounded-circle"  alt=""></td>
                                            <td>
                                                @if ($customer->gender == 1)
                                                    <span>Nam</span>
                                                @elseif ($customer->gender==0)
                                                    <span>Nữ</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($customer->dateofbirth)->format('d-m-Y') }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d-m-Y') }}</td>
                                            <td> @if ($customer->status == "Active")
                                                <span>Đang hoạt động</span>
                                            @elseif ($customer->status=="Suspended")
                                                <span>Ngừng hoạt động</span>
                                            @endif</td>
                                            <td>
                                                {{-- <a href="{{ route('admin.editcustomer', $customer->id) }} "><i
                                                        class="fa fa-edit fa-2x"></i></a> --}}
                                                <a href="">
                                                    <button type="button" wire:click.prevent="mount2({{$customer->id}})" class="btn btn-primary btn-sm edit-btn"
                                                    data-bs-toggle="modal" data-bs-target="#editcustomer"><i
                                                        class="fa fa-edit fa-2x"></i>
                                                </button>
                                                </a>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm delete-btn" wire:click.prevent="deleteConfirm({{ $customer->id }})"
                                                    wire:confirm="Bạn có chắc chắn muốn xóa tài khoản này?"><i
                                                        class="fa fa-times fa-2x text-danger " ></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $customers->links() }}
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
