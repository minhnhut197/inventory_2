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
<div wire:ignore.self class="modal fade" id="addnewimport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New Import</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="store">
                <div class="modal-body">
                    
                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-2 control-label">Receipt Code</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Receipt Code" class="form-control input-md input-custom "
                                wire:model.live="receipt_code">
                            @error('receipt_code')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Employee</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-control input-custom" wire:model.live="employee" style="border:1px solid #d2d6de">
                                <option value=""></option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('employee')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Supplier</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-control input-custom" wire:model.live="supplier" style="border:1px solid #d2d6de">
                                <option value=""></option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                            @error('supplier')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Category</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-control input-custom" wire:model.live="category" style="border:1px solid #d2d6de">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Item</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-control input-custom" wire:model.live="item" style="border:1px solid #d2d6de">
                                <option value=""></option>
                                @foreach ($items as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('item')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-2 control-label">Quantity</label>
                        <div class="col-md-8">
                            <input type="number" placeholder="Quantity" class="form-control input-md input-custom "
                                wire:model.live="quantity">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Unit</label>
                        <div class="col-md-8">
                            <select name="" id="" class="form-control input-custom" wire:model.live="unit" style="border:1px solid #d2d6de">
                                <option value=""></option>
                                <option value="Hop">Hộp</option>
                                <option value="Goi">Gói</option>
                                <option value="Cai">Cái</option>
                                <option value="Chai">Chai</option>
                                <option value="Gram">Gram</option>
                                <option value="Lit">Lít</option>
                                <option value="Cay">Cây</option>
                            </select>
                            @error('unit')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-2 control-label">Unit Price</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Unit Price" class="form-control input-md input-custom "
                                wire:model.live="unit_price">
                            @error('unit_price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-2 control-label">Total Amount</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Total Amount" class="form-control input-md input-custom "
                                wire:model.live="total_amount">
                            @error('total_amount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center">
                        <label for="" class="col-md-2 control-label">Discount</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Discount" class="form-control input-md input-custom "
                                wire:model.live="discount">
                            @error('discount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-save"
                            ></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End AddNew Modal --}}
