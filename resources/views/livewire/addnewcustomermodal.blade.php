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
        <div class="modal-content" style="width: 850px;height:485px">
            <div class="modal-header">
                <h4 class="modal-title"><b>Thêm người dùng mới</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="store">
                <div class="modal-body">
                    <div class="row">
                        <div class=" col-md-6 form-group d-flex align-items-center justify-content-center pull-left">

                            <div class="" style="margin-left: 85px">
                                {{-- <img src="" class="rounded-circle"
                                    style="width: 100px;border:1px solid black" alt="Avatar" /> --}}
                                    @if ($avatar)
                                    <img src="{{$avatar->temporaryUrl()}}"  class="rounded-circle" width="80" alt="">
                                @endif
                                <input type="file" style="    margin-top: 7px;" class="input-file" wire:model.live="avatar">
                               
                                @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label for="" class="col-md-4 control-label">Tên người dùng</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Nhập tên người dùng"
                                            class="form-control input-md input-custom " wire:model.live="name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
            
                                </div>
                                <div class=" form-group d-flex align-items-center justify-content-center pull-left">
                                    <label for="" class="col-md-4 control-label">Giới tính</label>
                                    <div class="col-md-6">
                                        <select name="" id="" class="form-control input-custom"
                                            wire:model.live="gender" style="border:1px solid #d2d6de">
                                            <option value="">-------- Chọn giới tính --------</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nu">Nữ</option>
                                        </select>
                                        @error('gender')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <label for="dob" class="col-md-4 control-label">Ngày sinh</label>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <!-- Dropdown cho ngày -->
                                        <select name="day" style="border: 1px solid black;" id="day" 
                                        class=" form-control input-md input-custom" wire:model.live="day">
                                            <option value="">Ngày</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <!-- Dropdown cho tháng -->
                                        <select name="month" id="month" style="border: 1px solid black;"
                                        class="form-control input-md input-custom" wire:model.live="month">
                                            <option value="">Tháng</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <!-- Dropdown cho năm -->
                                        <select name="year" id="year" style="border: 1px solid black;padding:7px 10px"
                                        class="form-control input-md input-custom" wire:model.live="year">
                                            <option value="">Năm</option>
                                            @for ($i = date('Y'); $i >= 1900; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        </div>
                                        @error('day')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @error('month')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @error('year')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" placeholder="Nhập email" class="form-control input-md input-custom"
                                    wire:model.live="email">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                          
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Địa chỉ</label>
                            <div class="col-md-6">
                                <textarea id="description" placeholder="Nhập địa chỉ" class="form-control input-custom" wire:model.live="address"></textarea>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Số điện thoại</label>
                            <div class="col-md-6">
                                <textarea id="short_description" placeholder="Nhập số điện thoại" class="form-control input-custom"
                                    wire:model.live="phone"></textarea>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">

                        </div>
                        <div class="col-md-6 form-group d-flex align-items-center justify-content-center pull-left">
                            <label for="" class="col-md-4 control-label">Trạng thái</label>
                            <div class="col-md-6">
                                <select name="" id="" class="form-control input-custom"
                                    wire:model.live="status" style="border:1px solid #d2d6de">
                                    <option value="">------- Chọn trạng thái -------</option>
                                    <option value="Active">Đang hoạt động</option>
                                    <option value="Suspended">Ngừng hoạt động</option>
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
                    <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
