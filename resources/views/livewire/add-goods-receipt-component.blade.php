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
                                <form action="" wire:ignore>
                                    <input type="text" wire:model.live="searchTerm" class="form-control input-custom"
                                        placeholder="" id="searchGoodsReceipt">

                                </form>

                                <div class="search-results">
                                    <ul class="list-group">
                                        @if ($items && $items->count() > 0)
                                            @foreach ($items as $item)
                                                <div class="d-flex">

                                                    <li class="list-group-item search-results-li"
                                                        style="width: 100%;height:65px">
                                                        <div class="row">
                                                            <div
                                                                class="col-md-2 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('assets/images/avatars/1708524452.png') }}"
                                                                    alt="No" width="45px">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <span class="id"
                                                                    style="display:none">{{ $item->id }}</span>
                                                                <span class="unit"
                                                                    style="display:none">{{ $item->unit }}</span>
                                                                <span class="name">{{ $item->name }}</span>
                                                                <p><span class="code">{{ $item->code }}</span>
                                                                    <span style="margin-left: 10px">Tồn :
                                                                        {{ $item->quantity }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-information">Không tìm thấy hàng hóa</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <form class="box" wire:submit.prevent="store" wire:ignore>
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

                                <table id="example1" class="table table-striped"    >
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
                        <button id="clearLocalStorageBtn">Xóa dữ liệu Local Storage</button>
                        <button id="check">Kiểm tra</button>
                        <div class="form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Người tạo</label>
                            <div class="col-md-6" >
                                <select name="creator" id="" class="form-control input-custom" wire:model.live="creator"
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
                            <div class="col-md-6" >
                                <input type="text" placeholder="" wire:model.live="code"
                                    class="form-control input-md input-custom input-custom-m">
                                @error('code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Nhà cung cấp</label>
                            <div class="col-md-6" >
                                <select name="" id="" class="form-control input-custom" wire:model.live="supplier"
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




                        <div class=" form-group d-flex align-items-center justify-content-center pull-left">
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
                        </div>

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
                        <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-6 text-end">
                                <button type="submit" class="btn btn-primary" name="add"
                                    data-bs-dismiss="modal"><i class="fa fa-save"></i>
                                    Hoàn thành</button>
                            </div>
                        </div>

                    </div>
                    
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
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

        //Clear localStorage
        document.getElementById('clearLocalStorageBtn').addEventListener('click', function() {
            localStorage.removeItem('searchResults');
        });
        // document.getElementById('check').addEventListener('click', function() {
        //     let savedDataJSON = localStorage.getItem('searchResults');
        //     if (savedDataJSON) {
        //         // Nếu có, lấy giá trị từ localStorage
        //         let savedData = JSON.parse(savedDataJSON);
        //         // Lặp qua mảng savedData và thiết lập giá trị cho các input tương ứng
        //         savedData.forEach((item, index) => {
        //             document.getElementById(`input-${index + 1}`).value = item.itemQuantity;
        //             document.getElementById(`input-${index + 2}`).value = item.priceCell;
        //             document.getElementById(`input-${index + 3}`).value = item.discount;
        //         });
        //     }
        // });

        const searchInput = document.getElementById('searchGoodsReceipt');
        const searchResults = document.querySelector('.search-results');
        const searchResultsContainer = document.querySelector('.search-results-container');
        let selectedData = [];
        // document.addEventListener('DOMContentLoaded', function() {

        function convertUnitName(unit) {
            switch (unit) {
                case "Kilogram":
                    return "Kilogram";
                case "Gram":
                    return "Gram";
                case "Meter":
                    return "Mét";
                case "Litre":
                    return "Lít";
                case "Unit":
                    return "Cây";
                case "Pack":
                    return "Bịch/Gói";
                case "Box":
                    return "Hộp/Thùng";
                default:
                    return unit;
            }
        }

        document.querySelectorAll('.search-results-li').forEach(function(li) {
            li.addEventListener('click', function(event) {

                let itemName = li.querySelector('span.name').textContent.trim();
                let itemCode = li.querySelector('span.code').textContent.trim();
                let itemId = li.querySelector('span.id').textContent.trim();
                let itemUnit = li.querySelector('span.unit').textContent.trim();

                let currentSelection = {
                    itemName: itemName,
                    itemCode: itemCode,
                    itemId: itemId,
                    itemUnit: itemUnit,
                    itemQuantity: 1,
                    priceCell: 0,
                    discount: 0,
                    sum: 0
                };

                selectedData.push(currentSelection);

                let existingDataJSON = localStorage.getItem('searchResults');
                let existingData = existingDataJSON ? JSON.parse(existingDataJSON) : [];

                existingData.push(currentSelection);

                localStorage.setItem('searchResults', JSON.stringify(existingData));
                console.log(localStorage.getItem('searchResults'));
                renderTableBody();
                searchResults.style.display = "none";
            });



        });


        function renderTableBody() {

            let savedDataJSON = localStorage.getItem('searchResults');

            if (savedDataJSON) {
                savedData = JSON.parse(savedDataJSON);

                let tbody = document.querySelector('#example1 tbody');


                tbody.innerHTML = '';
                console.log(localStorage.getItem('searchResults'));

                savedData.forEach((item, index) => {
                    let row = document.createElement('tr');

                    // Thêm cột STT
                    // Thêm cột STT
// let sttCell = document.createElement('td');
// let sttInput = document.createElement('input');
// sttInput.type = 'text';
// sttInput.classList.add('form-control', 'input-custom');
// sttInput.value = index + 1; // Thiết lập giá trị của input
// sttCell.appendChild(sttInput);
// row.appendChild(sttCell);

// Thêm cột cho itemCode
let itemCodeCell = document.createElement('td');
let itemCodeInput = document.createElement('input');
itemCodeInput.type = 'text';
itemCodeInput.classList.add('form-control', 'input-custom');
itemCodeInput.value = item.itemCode; // Thiết lập giá trị của input
itemCodeCell.appendChild(itemCodeInput);
row.appendChild(itemCodeCell);

// Thêm cột cho itemName
let itemNameCell = document.createElement('td');
let itemNameInput = document.createElement('input');
itemNameInput.type = 'text';
itemNameInput.classList.add('form-control', 'input-custom');
itemNameInput.value = item.itemName; // Thiết lập giá trị của input
itemNameCell.appendChild(itemNameInput);
row.appendChild(itemNameCell);

// Thêm cột cho Unit
// let itemUnitCell = document.createElement('td');
// let itemUnitInput = document.createElement('input');
// itemUnitInput.type = 'text';
// itemUnitInput.classList.add('form-control', 'input-custom');
// itemUnitInput.value = convertUnitName(item.itemUnit); // Thiết lập giá trị của input
// itemUnitCell.appendChild(itemUnitInput);
// row.appendChild(itemUnitCell);

                    // Số lượng
                    let quantityCell = document.createElement('td');

                    let divInputGroup = document.createElement('div');
                    divInputGroup.classList.add('input-group');
                    // divInputGroup.setAttribute('wire:ignore.self', '');
                    // Tạo nút trừ
                    let btnMinus = document.createElement('button');
                    btnMinus.textContent = '-';
                    btnMinus.classList.add('btn', 'btn-outline-secondary', 'btn-minus');
                    btnMinus.type = 'button';

                    // Tạo input số lượng
                    let inputQuantity = document.createElement('input');
                    inputQuantity.type = 'text';
                    inputQuantity.classList.add('form-control', 'input-custom', 'quantity');
                    inputQuantity.name = 'quantity';
                    inputQuantity.value = item.itemQuantity || 1;

                    // Tạo nút cộng
                    let btnPlus = document.createElement('button');
                    btnPlus.textContent = '+';
                    btnPlus.classList.add('btn', 'btn-outline-secondary', 'btn-plus');
                    btnPlus.type = 'button';

                    // Them vao inputGroup
                    divInputGroup.appendChild(btnMinus);
                    divInputGroup.appendChild(inputQuantity);
                    divInputGroup.appendChild(btnPlus);

                    quantityCell.appendChild(divInputGroup);
                    row.appendChild(quantityCell);

                    // Sự kiện cho nút +
                    btnPlus.addEventListener('click', function() {

                        let newQuantity = parseInt(inputQuantity.value) + 1;
                        item.itemQuantity = newQuantity;
                        inputQuantity.value = newQuantity;
                        updateTotalPrice();
                        saveToLocalStorage(index, newQuantity);
                    });

                    // Sự kiện cho nút -
                    btnMinus.addEventListener('click', function() {
                        let newQuantity = parseInt(inputQuantity.value) - 1;
                        if (newQuantity >= 1) {
                            item.itemQuantity = newQuantity;
                            inputQuantity.value = newQuantity;
                            updateTotalPrice();
                            saveToLocalStorage(index, newQuantity);
                        }
                    });

                    // Sự kiện input số lượng
                    inputQuantity.addEventListener('input', function() {
                        let newQuantity = parseInt(inputQuantity.value);
                        if (!isNaN(newQuantity) && newQuantity >= 1) {
                            item.itemQuantity = newQuantity;
                            updateTotalPrice();
                            saveToLocalStorage(index, newQuantity);
                        }
                    });

                    // Thêm cột cho Đơn giá
                    let priceCell = document.createElement('td');
                    let priceInput = document.createElement('input');
                    priceInput.type = 'text';
                    priceInput.classList.add('form-control', 'input-custom', 'input-custom-v');
                    priceInput.name = 'price';
                    priceInput.value = item.priceCell || '';

                    priceCell.appendChild(priceInput);
                    row.appendChild(priceCell);


                    // Sự kiện input
                    priceInput.addEventListener('input', function() {
                        let inputValue = priceInput.value;
                        item.priceCell = inputValue;
                        savePriceCellToLocalStorage(index, inputValue);
                    });


                    // Thêm cột cho Giảm giá    
                    let discountCell = document.createElement('td');
                    let discountInput = document.createElement('input');
                    discountInput.type = 'text';
                    discountInput.classList.add('form-control', 'input-custom', 'input-custom-v');
                    discountInput.name = 'discount';
                    discountInput.value = item.discount || '';

                    discountCell.appendChild(discountInput);
                    row.appendChild(discountCell);


                    // Thêm sự kiện input vào input
                    discountInput.addEventListener('input', function() {
                        let inputValue = discountInput.value;
                        item.discount = inputValue;
                        saveDiscountCellToLocalStorage(index, inputValue);
                    });


                    // Thêm cột cho Thành tiền
                    let sumCell = document.createElement('td');
                    let totalPriceInput = document.createElement('input');
                    totalPriceInput.type = 'text';
                    totalPriceInput.classList.add('form-control', 'input-custom', 'input-custom-v', 'total-price');
                    totalPriceInput.name = 'sum';
                    totalPriceInput.value = item.itemQuantity * item.priceCell - item.discount ||
                        ''; // Đặt giá trị ban đầu của input
                    sumCell.appendChild(totalPriceInput);
                    row.appendChild(sumCell);

                    //Su kiện thành tiền
                    totalPriceInput.addEventListener('input', function() {
                        let inputValue = totalPriceInput.value;
                        item.sum = inputValue;
                        saveSumCellToLocalStorage(index, inputValue);
                    });
                    // divInputGroup.setAttribute('wire:ignore');
                    // inputQuantity.setAttribute('wire:model.live', 'quantity');
                    // priceInput.setAttribute('wire:model.live', 'unit_price');
                    // discountInput.setAttribute('wire:model.live', 'discount');
                    // itemCodeInput.setAttribute('wire:model.live','item')
                    // Thêm cột Xóa
                    let deleteCell = document.createElement('td');
                    let deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Xóa';
                    deleteButton.classList.add('btn', 'btn-danger');
                    deleteCell.appendChild(deleteButton);
                    row.appendChild(deleteCell);
                    deleteButton.addEventListener('click', function() {
                        // Xác định chỉ số của dòng được nhấp nút xóa
                        let rowIndex = this.closest('tr').rowIndex;
                        // Xóa dòng tương ứng từ bảng
                        this.closest('tr').remove();
                        // Xóa dữ liệu tương ứng từ localStorage
                        let existingDataJSON = localStorage.getItem('searchResults');
                        let existingData = existingDataJSON ? JSON.parse(existingDataJSON) : [];
                        // Loại bỏ phần tử có chỉ số rowIndex từ mảng existingData
                        existingData.splice(rowIndex - 1, 1);
                        // Lưu dữ liệu mới vào localStorage
                        localStorage.setItem('searchResults', JSON.stringify(existingData));
                    });


                    //Them vao tbody
                    tbody.appendChild(row);
                });
                attachInputListeners();
            }
        }

        function attachInputListeners() {

            document.querySelectorAll('.input-custom-v').forEach(input => {

                input.addEventListener('input', function() {
                    updateTotalPrice();
                });
            });


            // Lắng nghe sự kiện khi số lượng sản phẩm thay đổi
            document.querySelectorAll('.quantity').forEach(input => {
                input.addEventListener('input', function() {
                    updateTotalPrice();
                });
            });
        }


        function saveToLocalStorage(index, newQuantity) {
            console.log(localStorage.getItem('searchResults'));
            let savedDataJSON = localStorage.getItem('searchResults');
            let savedData = JSON.parse(savedDataJSON);

            if (savedData && savedData.length > 0) {
                savedData[index].itemQuantity = newQuantity;
            }

            localStorage.setItem('searchResults', JSON.stringify(savedData));
            console.log(localStorage.getItem('searchResults'));
            // Hiển thị dữ liệu mới trong localStorage
            updateTotalSumMoney();
            renderTableBody();
        }

        function savePriceCellToLocalStorage(index, newQuantity) {
            let savedDataJSON = localStorage.getItem('searchResults');
            let savedData = JSON.parse(savedDataJSON);
            console.log("hello");
            console.log(localStorage.getItem('searchResults'));

            // Thay đổi giá trị itemQuantity của một mục trong savedData
            // Ví dụ: Thay đổi giá trị itemQuantity của mục đầu tiên trong savedData thành 5
            if (savedData && savedData.length > 0) {
                savedData[index].priceCell = newQuantity; // Thay đổi giá trị itemQuantity tại index 0
            }

            // Cập nhật dữ liệu mới vào localStorage
            localStorage.setItem('searchResults', JSON.stringify(savedData));

            // Hiển thị dữ liệu mới trong localStorage
            console.log(localStorage.getItem('searchResults'));
            renderTableBody();
        }

        function saveDiscountCellToLocalStorage(index, newQuantity) {
            let savedDataJSON = localStorage.getItem('searchResults');
            let savedData = JSON.parse(savedDataJSON);
            console.log("hello");
            console.log(localStorage.getItem('searchResults'));

            // Thay đổi giá trị itemQuantity của một mục trong savedData
            // Ví dụ: Thay đổi giá trị itemQuantity của mục đầu tiên trong savedData thành 5
            if (savedData && savedData.length > 0) {
                savedData[index].discount = newQuantity; // Thay đổi giá trị itemQuantity tại index 0
            }

            // Cập nhật dữ liệu mới vào localStorage
            localStorage.setItem('searchResults', JSON.stringify(savedData));

            // Hiển thị dữ liệu mới trong localStorage
            console.log(localStorage.getItem('searchResults'));
            renderTableBody();
        }

        function saveSumCellToLocalStorage(index, newQuantity) {
            let savedDataJSON = localStorage.getItem('searchResults');
            let savedData = JSON.parse(savedDataJSON);

            if (savedData && savedData.length > 0) {
                savedData[index].sum = newQuantity;
            }

            // Cập nhật dữ liệu mới vào localStorage
            localStorage.setItem('searchResults', JSON.stringify(savedData));
            updateTotalSumMoney();
            renderTableBody();
        }

        function updateTotalSumMoney() {
            let totalSum = 0;
            // Lấy dữ liệu từ localStorage
            let savedDataJSON = localStorage.getItem('searchResults');
            if (savedDataJSON) {
                let savedData = JSON.parse(savedDataJSON);
                // Tính tổng các giá trị sum
                totalSum = savedData.reduce((accumulator, currentValue) => {
                    // Tính toán giá trị sum cho mỗi mục và cộng vào tổng
                    const sum = parseFloat(currentValue.itemQuantity || 0) * parseFloat(currentValue.priceCell ||
                        0) - parseFloat(currentValue.discount || 0);
                    return accumulator + sum;
                }, 0);
            }
            // Cập nhật giá trị cho ô nhập liệu có id sumMoney
            document.getElementById('sumMoney').value = totalSum;
        }


        function updateTotalPrice() {
            // Lặp qua mỗi dòng trong tbody
            document.querySelectorAll('tbody tr').forEach(row => {
                // Lấy giá trị từ các ô nhập liệu
                const price = parseFloat(row.querySelector('.input-custom-v[name="price"]').value) || 0;
                const quantity = parseInt(row.querySelector('.quantity').value) || 1;
                const discount = parseFloat(row.querySelector('.input-custom-v[name="discount"]').value) || 0;

                // Tính toán tổng tiền
                const totalPrice = (price * quantity) - discount;
                console.log(totalPrice);
                // Cập nhật giá trị của ô "Thành tiền"
                row.querySelector('.total-price').value = totalPrice;
            });
        }

        function updateAmountToPay() {
            //Lấy giá trị tổng tiền hàng từ phần tử có id sumMoney
            let totalSum = parseFloat(document.getElementById('sumMoney').value) || 0;
            console.log(totalSum);
            // Lấy giá trị giảm giá từ phần tử có id total_discount
            let discount = parseFloat(document.getElementById('total_discount').value) || 0;
            console.log(discount);
            // Tính toán số tiền cần trả nhà cung cấp
            let amountToPay = totalSum - discount;
            console.log(amountToPay);
            // Cập nhật giá trị cho phần tử có id amountToPay
            document.getElementById('amountToPay').value = amountToPay; // Làm tròn đến 2 chữ số thập phân
        }

        // Gọi hàm updateAmountToPay sau mỗi lần tổng tiền hàng hoặc giảm giá thay đổi
        document.getElementById('sumMoney').addEventListener('keyup', updateAmountToPay);
        document.getElementById('total_discount').addEventListener('keyup', updateAmountToPay);
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
    </style>
@endpush
