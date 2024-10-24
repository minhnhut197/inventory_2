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
<div wire:ignore.self class="modal fade" id="editcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Thay đổi tên danh mục</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="update">
                <div class="modal-body">
                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-2 control-label">Tên danh mục</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Name" class="form-control input-md input-custom "
                                wire:model.live="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i>
                        Hủy</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="add"><i class="fa fa-save"
                            ></i>
                        Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
