<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('livewire.editusermodal')
        @include('livewire.addnewusermodal')
        <div class="content-wrapper  m-0">
            <section class="content-header">
                <h1>
                    Danh sách người dùng
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                style="display:inline-block;margin-right:5px">Home</span></a></li>
                    <li><span style="margin: 0 5px;">Người dùng</span></li>
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
                                        <th>Vai trò</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái hoạt động</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td> <img style="width: 50px;height:50px" src="{{asset('assets/images/avatars/')}}/{{$user->avatar}}" class="rounded-circle"  alt=""></td>
                                            <td>
                                                @if ($user->gender == 1)
                                                    <span>Nam</span>
                                                @elseif ($user->gender==0)
                                                    <span>Nữ</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($user->dateofbirth)->format('d-m-Y') }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                @if ($user->role == 0)
                                                    <span>Admin</span>
                                                @elseif ($user->role == 1)
                                                    <span>Quản lý</span>
                                                @else
                                                    <span>Nhân viên</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                            <td> @if ($user->status == "Active")
                                                <span>Đang hoạt động</span>
                                            @elseif ($user->status=="Suspended")
                                                <span>Ngừng hoạt động</span>
                                            @endif</td>
                                            <td>
                                                {{-- <a href="{{ route('admin.edituser', $user->id) }} "><i
                                                        class="fa fa-edit fa-2x"></i></a> --}}
                                                <a href="">
                                                    <button type="button" wire:click.prevent="mount2({{$user->id}})" class="btn btn-primary btn-sm edit-btn"
                                                    data-bs-toggle="modal" data-bs-target="#edituser"><i
                                                        class="fa fa-edit fa-2x"></i>
                                                </button>
                                                </a>
                                                <button type="button"
                                                    class="btn btn-primary btn-sm delete-btn" wire:click.prevent="deleteConfirm({{ $user->id }})"
                                                    wire:confirm="Bạn có chắc chắn muốn xóa tài khoản này?"><i
                                                        class="fa fa-times fa-2x text-danger " ></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
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
