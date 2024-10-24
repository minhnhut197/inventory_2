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
</style>
<div wire:ignore.self class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Edit User</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="update">

                <div class="modal-body">
                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-2 control-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Name" class="form-control input-md input-custom "
                                wire:model.live="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Email" class="form-control input-md input-custom"
                                wire:model.live="email">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Phone</label>
                        <div class="col-md-8">
                            <textarea id="short_description" placeholder="Phone" class="form-control input-custom" wire:model.live="phone"></textarea>
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" placeholder="Password" class="form-control input-md input-custom"
                                wire:model.live="password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Address</label>
                        <div class="col-md-8">
                            <textarea id="description" placeholder="Address" class="form-control input-custom" wire:model.live="address"></textarea>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Role</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-control input-custom"
                                wire:model.live="role" style="border:1px solid #d2d6de">
                                <option value="0">Admin</option>
                                <option value="1">Quản lý</option>
                                <option value="2">Nhân viên</option>
                            </select>
                            @error('role')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Avatar</label>
                        <div class="col-md-8">
                            {{-- <input type="file" class="input-file" wire:model.live="new_avatar">
                            @if ($new_avatar)
                                <img src="{{ $new_avatar->temporaryUrl() }}" width="120" alt="" >
                            @else
                                <img src="{{ asset('assets/images/avatars/') }}/{{ $avatar }}" width="200"  alt="">
                            @endif --}}
                            @error('avatar')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
