{{-- AddNew Modal --}}
<style>
    .input-custom{
        background-color: white;
        color: black;
    }
    .input-custom:focus{
        background-color: white;
        color: black;
    }
</style>
<div wire:ignore.self class="modal fade" id="edititem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 850px;height:530px">
            <div class="modal-header">
                <h4 class="modal-title"><b>Thay đổi thông tin hàng hóa</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="update">
                <div class="modal-body">
                    <div class="row">
                        <div class=" col-md-6 form-group d-flex align-items-center justify-content-center pull-left">

                            {{-- <div class="" style="margin-left: 85px">
                                <img src="" class="rounded-circle"
                                    style="width: 100px;border:1px solid black" alt="Avatar" />
                                    @if ($avatar)
                                    <img src="{{$avatar->temporaryUrl()}}"  class="rounded-circle" width="80" alt="">
                                @endif
                                <input type="file" style="    margin-top: 7px;" class="input-file" wire:model.live="avatar">
                               
                                @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label for="" class="col-md-4 control-label">Mã hàng hóa</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Nhập mã hàng hóa"
                                            class="form-control input-md input-custom " wire:model.live="code">
                                        @error('code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
            
                                </div>
                                <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                    <label for="" class="col-md-4 control-label">Tên hàng hóa</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Nhập tên hàng hóa"
                                            class="form-control input-md input-custom " wire:model.live="name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                    <label for="" class="col-md-4 control-label">Danh mục</label>
                                    <div class="col-md-6">
                                        <select name="" id="" class="form-control input-custom"
                                            wire:model.live="category" style="border:1px solid #d2d6de">
                                            <option value="">-------- Chọn danh mục --------</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                    <label for="" class="col-md-4 control-label">Nhà cung cấp</label>
                                    <div class="col-md-6">
                                        <select name="" id="" class="form-control input-custom"
                                            wire:model.live="supplier" style="border:1px solid #d2d6de">
                                            <option value="">-------- Chọn nhà cung cấp --------</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Số lượng</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập số lượng hàng hóa" class="form-control input-md input-custom"
                                    wire:model.live="quantity">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Đơn vị</label>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control input-custom"
                                    wire:model.live="unit" style="border:1px solid #d2d6de">
                                    <option value="">------- Đơn vị tính -------</option>
                                   <option value="Piece">Cái</option>
                                   <option value="Kilogram">Kilogram</option>
                                   <option value="Gram">Gram</option>
                                   <option value="Meter">Mét</option>
                                   <option value="Litre">Lít</option>
                                   <option value="Unit">Cây</option>
                                   <option value="Pack">Bịch/Gói</option>
                                   <option value="Box">Hộp/Thùng</option>
                                </select>
                                @error('unit')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-7 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Giá mua</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập giá nhập" class="form-control input-md input-custom"
                                    wire:model.live="purchase_price">
                                @error('purchase_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Giá bán</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập giá bán" class="form-control input-md input-custom"
                                    wire:model.live="selling_price">
                                @error('selling_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Thông báo sắp hết hàng</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập số lượng " class="form-control input-md input-custom"
                                    wire:model.live="stock_out_alert">
                                @error('stock_out_alert')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Trạng thái</label>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control input-custom"
                                    wire:model.live="status" style="border:1px solid #d2d6de">
                                    <option value="">------- Chọn trạng thái -------</option>
                                    <option value="Instock">Còn hàng</option>
                                    <option value="OutOfStock">Hết hàng</option>
                                    <option value="RunningOutOfStock">Sắp hết hàng</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa fa-close"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary" name="add" data-bs-dismiss="modal"><i class="fa fa-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
