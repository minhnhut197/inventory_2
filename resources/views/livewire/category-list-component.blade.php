<div class="hold-transition skin-blue sidebar-mini" >
    <div class="wrapper">
        @include('livewire.add-category-modal')
        @include('livewire.edit-category-modal')
        @include('livewire.delete-category-modal')
        <div class="content-wrapper  m-0" >
            <section class="content-header">
                <h1>
                    Danh sách danh mục
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                style="display:inline-block;margin-right:5px">Home</span></a></li>
                    <li><span style="margin: 0 5px;">Danh mục và hàng hóa</span></li>
                    <li class="active"><span style="font-weight:600;margin-left:5px">Danh mục</span></li>
                </ol>
            </section>
            <div class="row bg-white">
                <div class="col-md-82">
                    <div class="box">
                        <div class="box-header with-border">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#addnewcategory"><i class="fa fa-plus"></i> Thêm mới
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
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                {{-- <a href="{{ route('admin.edituser', $user->id) }} "><i
                                                        class="fa fa-edit fa-2x"></i></a> --}}
                                                <a href="">
                                                    <button type="button"
                                                        wire:click.prevent="mount2({{ $category->id }})"
                                                        class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal"
                                                        data-bs-target="#editcategory"><i class="fa fa-edit fa-2x"></i>
                                                    </button>
                                                {{-- </a>
                                                <button type="button" class="btn btn-primary btn-sm delete-btn"
                                                    wire:click.prevent="deleteConfirm({{ $category->id }})"
                                                      ><i  class="fa fa-times fa-2x text-danger "
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#delcategory">
                                                    </i>
                                                </button> --}}
                                                <button type="button" class="btn btn-primary btn-sm delete-btn"
                                                    wire:click.prevent="deleteConfirm({{ $category->id }})"
                                                    wire:confirm="Bạn có chắc chắn muốn xóa danh mục này?"  ><i  class="fa fa-times fa-2x text-danger ">
                                                    </i>
                                                </button>
                                                {{-- <button type="button" class="btn btn-primary btn-sm edit-btn"
                                                 onclick="document.getElementById('id01').style.display='block'">
                                                 <i
                                                 class="fa fa-times fa-2x text-danger "></i> </button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="button" class="deletebtn">Delete</button>
      </div>
    </div>
  </form>
</div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
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
        var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
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
