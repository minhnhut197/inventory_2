<div class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('livewire.addnewitemmodal')
        @include('livewire.edititemmodal')
        <div class="content-wrapper  m-0">
            <section class="content-header">
                <h1>
                    Danh sách hàng hóa
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                style="display:inline-block;margin-right:5px">Home</span></a></li>
                    <li><span style="margin: 0 5px;">Danh mục và hàng hóa</span></li>
                    <li class="active"><span style="font-weight:600;margin-left:5px">Danh sách hàng hóa</span></li>
                </ol>
            </section>
            <div class="row bg-white">
                <div class="col-md-82">
                    <div class="box">
                        <div class="box-header with-border">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addnewitem"><i class="fa fa-plus"></i> Thêm mới
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
                                        <th>Mã hàng hóa </th>
                                        <th>Tên hàng hóa</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Số lượng</th>
                                        <th>Đơn vị</th>
                                        <th>Giá nhập</th>
                                        <th>Giá bán</th>
                                        <th>Cảnh báo hết hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item->code}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td></td>
                                            <td>
                                                @foreach ($categories as $category)
                                                    @if ($item->category == $category->id)
                                                        <span>{{ $category->name }}</span>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$item->quantity}}</td>
                                            <td>
                                                @if ($item->unit == "Piece")
    <span>Cái</span>
@elseif ($item->unit == "Kilogram")
    <span>Kilogram</span>
@elseif($item->unit == "Gram")
    <span>Gram</span>
@elseif($item->unit == "Meter")
    <span>Mét</span>
@elseif($item->unit == "Litre")
    <span>Lít</span>
@elseif($item->unit == "Unit")
    <span>Cây</span>
@elseif($item->unit == "Pack")
    <span>Bịch/Gói</span>
@elseif($item->unit == "Box")
    <span>Hộp/Thùng</span>
@endif
                                            </td>
                                            <td>
                                               {{$item->purchase_price}}
                                            </td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>{{ $item->stock_out_alert }}</td>
                                            <td>
                                                @if ($item->status == "Instock")
                                                <span>Còn hàng</span>
                                            @elseif ($item->status == "OutOfStock")
                                                <span>Hết hàng</span>
                                            @else
                                                <span>Sắp hết hàng</span>
                                            @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('admin.edituser', $user->id) }} "><i
                                                        class="fa fa-edit fa-2x"></i></a> --}}
                                                <a href="">
                                                    <button type="button"
                                                        wire:click.prevent="mount2({{ $item->id }})"
                                                        class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                                        data-bs-target="#edititem"><i class="fa fa-edit fa-2x"></i>
                                                    </button>
                                                </a>
                                                <button type="button" class="btn btn-primary btn-sm delete-btn"
                                                    wire:click.prevent="deleteConfirm({{ $item->id }})"
                                                    wire:confirm="Bạn có chắc chắn muốn xóa mặt hàng này?">><i
                                                        class="fa fa-times fa-2x text-danger "></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $items->links() }}
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
