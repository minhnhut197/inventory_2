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
<div wire:ignore.self class="modal fade" id="delcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" >
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa danh mục này không? </p>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i>
                        Hủy</button>
                    <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-save"
                            ></i>
                        Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
