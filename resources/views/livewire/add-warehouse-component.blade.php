{{-- AddNew Modal --}}
<style>
    .input-custom {
        background-color: white;
        color: black;
    }

    .input-custom:focus {
        background-color: white;
        color: black;
    }
    .modal-content{
        position: absolute;
        left: -177px;
    }
    .modal-dialog{
        position: relative;
    }
</style>
<div wire:ignore.self class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 850px;height:440px">
            <div class="modal-header">
                <h4 class="modal-title"><b>Thêm nhà kho</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center">
                            <label for="" class="col-md-4 control-label">Mã nhà kho</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập mã nhà kho"
                                    class="form-control input-md input-custom " wire:model.live="code">
                                @error('code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
    
                        </div>
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Tên nhà kho</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập tên nhà kho"
                                    class="form-control input-md input-custom " wire:model.live="name">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- <div class=" form-group d-flex align-items-center justify-content-center pull-left">
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
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Địa chỉ</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập địa chỉ" class="form-control input-md input-custom"
                                    wire:model.live="address">
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Dung tích</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập dung tích hàng hóa" class="form-control input-md input-custom"
                                    wire:model.live="capacity">
                                @error('capacity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-7 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Dung tích đã sử dụng</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập dung tích đã sử dụng" class="form-control input-md input-custom"
                                    wire:model.live="used_capacity">
                                @error('used_capacity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Dung tích còn lại</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập dung tích còn lại" class="form-control input-md input-custom"
                                    wire:model.live="remaining_capacity">
                                @error('remaining_capacity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Loại nhà kho</label>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control input-custom"
                                    wire:model.live="warehouse_type" style="border:1px solid #d2d6de">
                                    <option value="">------- Chọn loại -------</option>
                                    <option value="Cold">Kho lạnh</option>
                                    <option value="Cool">Kho mát</option>
                                    <option value="Normal">Kho bình thường</option>
                                </select>
                                @error('warehouse_type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-5 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Ngưòi quản lý</label>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control input-custom"
                                    wire:model.live="manager" style="border:1px solid #d2d6de">
                                    <option value="">-------- Chọn người quản lý --------</option>
                                    @foreach ($managers as $manager)
                                        <option value="{{$manager->id}}">{{$manager->name}}</option>
                                    @endforeach
                                </select>
                                @error('manager')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-7 form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-4 control-label">Mô tả</label>
                        <div class="col-md-6">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Nhập mô tả" class="form-control input-md input-custom"
                            wire:model.live="description"></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa fa-close"></i>
                        HủY</button>
                    <button type="submit" class="btn btn-primary" name="add" data-bs-dismiss="modal"><i class="fa fa-save"></i>
                        Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
