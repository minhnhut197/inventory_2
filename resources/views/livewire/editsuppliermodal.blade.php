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
<div wire:ignore.self class="modal fade" id="editsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Thay đổi thông tin nhà cung cấp</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="update">
                <div class="modal-body">
                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-4 control-label">Mã nhà cung cấp</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Name" class="form-control input-md input-custom "
                                wire:model.live="code">
                            @error('code')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-4 control-label">Tên nhà cung cấp</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Name" class="form-control input-md input-custom "
                                wire:model.live="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-4 control-label">Điện thoại</label>
                        <div class="col-md-6">
                            <input type="text" placeholder="Contact" class="form-control input-md input-custom"
                                wire:model.live="phone">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            <textarea id="short_description" placeholder="Email" class="form-control input-custom" wire:model.live="email"></textarea>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-4 control-label">Địa chỉ</label>
                        <div class="col-md-6">
                            <textarea id="short_description" placeholder="Address" class="form-control input-custom" wire:model.live="address"></textarea>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-4 control-label">Trạng thái</label>
                        <div class="col-md-6">
                            <select name="" id="" class="form-control input-custom" wire:model.live="status" style="border:1px solid #d2d6de">
                                <option value="" >-----Chọn trạng thái hoạt động-----</option>
                                <option value="Active">Đang hoạt động</option>
                                <option value="Suspended">Ngừng hoạt động</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-4 control-label">Hàng hóa</label>
                        <div class="col-md-6">
                            <textarea id="description" placeholder="Items" class="form-control input-custom" wire:model.live="items"></textarea>
                            @error('items')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i>
                        Hủy</button>
                    <button type="submit" class="btn btn-primary" name="add" data-bs-dismiss="modal"><i class="fa fa-save"
                            ></i>
                        Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
