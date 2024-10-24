@extends('layouts.base2')


{{-- @section('content')
    <!-- Nội dung của view của bạn -->
@endsection --}}
@section('content')
    <div class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            {{-- @include('livewire.editusermodal') --}}
            {{-- @include('livewire.add-import-modal') --}}
            @include('livewire.goods-receipt-component')
            <div class="content-wrapper  m-0">
                <section class="content-header">
                    <h1>
                        Thêm phiếu nhập hàng
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/home"><i class="fa fa-dashboard"></i> <span
                                    style="display:inline-block;margin-right:5px">Home</span></a></li>
                        <li><span style="margin: 0 5px;">Giao dịch</span></li>
                        <li class="active"><span style="font-weight:600;margin-left:5px">Nhập hàng</span></li>
                    </ol>
                </section>
                <div class="row bg-white">
                    <div class="col-md-8">
                        
                        <div class="box">
                            <div class="box-header with-border d-flex align-items-center ">
                                <div class="search-results-container">
                                    <form action="" class="navbar-form navbar-left form-search" role="search">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-search-ajax input-custom">
                                            <div class="search-ajax-result" style="z-index: 1">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <form class="box" id="main-form" method="POST" action="/admin/add-goods-receipt-form">
                            <div class="box-body">
                                


                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                {{-- <th><b>STT</b></th> --}}
                                                <th><b>Mã hàng</b></th>
                                                <th><b>Tên hàng</b></th>
                                                {{-- <th><b>ĐVT</b></th> --}}
                                                <th><b>Số lượng</b></th>
                                                <th><b>Đơn giá</b></th>
                                                <th><b>Giảm giá </b></th>
                                                <th><b>Thành tiền</b></th>
                                                <th><b>Xóa</b></th>
                                                {{-- <th>Giảm giá</b></th>
                                            <th>Tổng tiền</th>
                                            <th>Thời gian nhập</th>
                                            <th>Hành động</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody wire:ignore>

                                        </tbody>
                                    </table>
                                    {{-- {{ $imports->links() }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="box-body">
                            <div class="form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label">Người tạo</label>
                                <div class="col-md-6">
                                    <select name="creator" id="" class="form-control input-custom"
                                        style="border:1px solid #d2d6de">
                                        <option value=""></option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('creator')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label">Mã phiếu nhập</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder=""
                                        class="form-control input-md input-custom input-custom-m" name="code_receipt">
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label">Nhà cung cấp</label>
                                <div class="col-md-6">
                                    <select name="supplier" id="" class="form-control input-custom"
                                        style="border:1px solid #d2d6de">
                                        <option value="">-------- Chọn nhà cung cấp --------</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>




                            {{-- <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label">Trạng thái</label>
                                <div class="col-md-6">
                                    <select name="" id="" class="form-control input-custom"
                                        style="border:1px solid #d2d6de">
                                        <option value="">------- Chọn trạng thái -------</option>
                                        <option value="Received">Đã nhập hàng</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label">Tổng tiền hàng</label>
                                <div class="col-md-6">
                                    <input type="number" placeholder="" id="sumMoney"
                                        class="form-control input-md input-custom input-custom-m">
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                    <label for="" class="col-md-4 control-label">Giảm giá</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder=""
                                            class="form-control input-md input-custom input-custom-m"
                                            wire:model.live="name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}

                            <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label">Giảm giá</label>
                                <div class="col-md-6">
                                    <input type="number" placeholder="" id="total_discount"
                                        class="form-control input-md input-custom input-custom-m">
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>



                            <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label">Cần trả nhà cung cấp</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder=" " id="amountToPay"
                                        class="form-control input-md input-custom input-custom-m">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @csrf
                            <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-6 text-end">
                                    <button type="submit" id="finish" class="btn btn-primary" name="add"
                                        data-bs-dismiss="modal"><i class="fa fa-save"></i>
                                        Hoàn thành</button>
                                </div>
                            </div>
                            <span class="output"></span>


                        </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        //Scrollbar
        $(function() {
            $('.search-results').hide();
            const ps = new PerfectScrollbar('.sidebar-mini', {
                wheelSpeed: 2,
                wheelPropagation: true,
                minScrollbarLength: 20
            });

        })
        $('.input-search-ajax').keyup(function() {
            $('.search-ajax-result').css('display', 'block');
            var _text = $(this).val();
            
            var _url = "{{ url('public/uploads') }}";
            $.ajax({
                url: "{{ route('ajax-search-item') }}?key=" + _text,
                type: 'GET',
                success: function(res) {
                    var _html = '';
                    for (let item of res) {
                        _html += '<div class="media d-flex">';
                        _html += '<a href="#" class="pull-left">';
                        _html +=
                            '<img src="{{ asset('assets/images/avatars/1708524452.png') }}" alt="" width="30" class="media-object">';
                        // _html +=
                        //     '<img src="'+_url+'/'+item.image+'" alt="" width="30" class="media-object">';
                        _html += ' </a>';
                        _html += '<div class="media-body">';
                        _html += '<h4 class="media-name" data-name="' + item.name + '">' + item.name +
                            '</h4>';
                        _html += '<h4 class="media-code" style="display:none"  data-code="' + item
                            .code + '">' + item.code + '</h4>';
                        _html += '<p>' + item.description + '</p>';
                        _html += '</div>';
                        _html += '</div>';
                    }
                    $('.search-ajax-result').html(_html);
                }
            });
        });
        let indexRow=0;
        $('.search-ajax-result').on("click", ".media", function() {
            var name = $(this).find('.media-name').data('name');
            var code = $(this).find('.media-code').data('code');
            ++indexRow;
            $("#example1").append(`<tr> 
                <td><input type="text" name="inputs[`+indexRow+`][code]" value="` +code + `"></td>
                <td><input type="text" name="inputs[`+indexRow+`][name]" value="` + name + `"></td>
                <td>
                    <div class="quantity-control">`+
                        //<button class="decrement">-</button>
                       ` <input type="number" class="quantity" name="inputs[`+indexRow+`][quantity]" value="1" min="1" style="width:40px">`+
                       // <button class="increment">+</button>
                   ` </div>
                </td>
                <td><input type="number" class="unit-price" name="inputs[`+indexRow+`][unit_price]"  min="0" style="width: 100px;"></td>
                <td><input type="number" class="discount" name="inputs[`+indexRow+`][discount]" min="0" style="width: 100px;"></td>
                <td><input type="number" class="total-price"  readonly style="width: 100px;"></td>
                <td><button class="remove-product">Xóa</button></td>
                </tr>`);
            $(this).parent().css('display', 'none');
        });

        // $("#main-form").submit(function(e){
        //     e.preventDefault();
        //     var form=$("#main-form")[0];
        //     var data=new FormData(form);
        //     // var creatorValue = data.get('code');
        //     $.ajax({
        //         url:"{{route('add-good-receipt-form')}}",
        //         type:"POST",
        //         data:data,
        //         processData:false,
        //         contentType:false,
        //         success:function(e){
        //             $(".output").text(data.res).css('color','green');
        //             setTimeout(() => {
        //                     $(".output").text("").css('color','');
        //                 }, 5000);
        //         },
        //         error:function(e){
        //             $(".output").text(e.responseText);
        //         }
        //     });
        // });

        // $("#example1").on("click", ".increment", function() {
        //     var input = $(this).siblings(".quantity");
        //     var currentValue = parseInt(input.val());
        //     input.val(currentValue + 1);
        //     updateTotalPrice($(this).closest("tr"));
        // });

        // // Gắn sự kiện click cho nút Giảm
        // $("#example1").on("click", ".decrement", function() {
        //     var input = $(this).siblings(".quantity");
        //     var currentValue = parseInt(input.val());
        //     if (currentValue > 1) {
        //         input.val(currentValue - 1);
        //         updateTotalPrice($(this).closest("tr"));
        //     }
        // });

        $("#example1").on("input", ".quantity, .unit-price, .discount", function() {
            updateTotalPrice($(this).closest("tr"));
        });

        // Hàm cập nhật tổng giá trị
        function updateTotalPrice(row) {
            var quantity = parseFloat(row.find('.quantity').val());
            var unitPrice = parseFloat(row.find('.unit-price').val());
            var discount = parseFloat(row.find('.discount').val());
            var totalPrice = (unitPrice * quantity) - discount;
            row.find('.total-price').val(totalPrice);
        }

        $("#example1").on("input", ".quantity, .unit-price, .discount", function() {
            updateTotalMoney(); // Cập nhật tổng tiền hàng
        });

        // Hàm cập nhật tổng tiền hàng
        function updateTotalMoney() {
            var sum = 0;
            $("#example1 tr").each(function() {
                var quantity = parseFloat($(this).find('.quantity').val());
                var unitPrice = parseFloat($(this).find('.unit-price').val());
                var discount = parseFloat($(this).find('.discount').val());
                var totalPrice = (unitPrice * quantity) - discount;
                if (!isNaN(totalPrice)) {
                    sum += totalPrice;
                }
            });
            $('#sumMoney').val(sum);
        }

        $("#sumMoney, #total_discount").on("input", function() {
            updateAmountToPay(); // Cập nhật giá trị cần trả nhà cung cấp
        });

        // Hàm cập nhật giá trị cần trả nhà cung cấp
        function updateAmountToPay() {
            var sumMoney = parseFloat($('#sumMoney').val()) || 0; // Giá trị tổng tiền hàng
            var totalDiscount = parseFloat($('#total_discount').val()) || 0; // Giá trị giảm giá
            var amountToPay = sumMoney - totalDiscount; // Tính toán giá trị cần trả nhà cung cấp
            $('#amountToPay').val(amountToPay.toFixed(2)); // Cập nhật giá trị vào ô "Cần trả nhà cung cấp"
        }

        $("#example1").on("click", ".remove-product", function() {
            $(this).closest("tr").hide(); // Ẩn đi hàng tương ứng
        });

    </script>

@endsection

@section('css')
    <style>
        .modal-content {
            background-color: white;
        }

        .input-custom-v {
            /* Đặt giá trị nằm bên phải */
            text-align: right;
            padding-right: 10px;
            /* Đảm bảo vùng nhập liệu không tràn ra ngoài phải */
            box-sizing: border-box;
            /* Đảm bảo đường viền dưới không thay đổi kích thước của input */
            border: none;
            /* Ẩn toàn bộ đường viền */
            border-bottom: 1px solid black;
            /* Chỉ hiển thị đường viền dưới */
            padding: 5px 0;
            /* Thêm khoảng cách giữa đường viền và văn bản */
            outline: none;
            /* Ẩn đường viền khi input được focus */
        }

        .input-custom-m {
            /* Đặt giá trị nằm bên phải */
            text-align: right;
            padding-right: 10px;
            /* Đảm bảo vùng nhập liệu không tràn ra ngoài phải */
            box-sizing: border-box;
            /* Đảm bảo đường viền dưới không thay đổi kích thước của input */
            border: none;
            /* Ẩn toàn bộ đường viền */
            border-bottom: 1px solid black;
            /* Chỉ hiển thị đường viền dưới */
            padding: 5px 0;
            /* Thêm khoảng cách giữa đường viền và văn bản */
            outline: none;
            /* Ẩn đường viền khi input được focus */
        }

        .form-search .form-group {
            width: 350px;
            position: relative;
        }

        .form-search .form-group .form-control {
            width: 100%;
        }

        .form-search .search-ajax-result {
            position: absolute;
            background-color: #fff;
            padding: 10px;
            width: 100%;
        }

        .form-search .search-ajax-result h4 {
            font-size: 14px;
        }

        .form-search .search-ajax-result p {
            margin: 0;
            font-size: 12px;
        }
    </style>
@endsection
