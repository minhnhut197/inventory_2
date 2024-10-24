{{-- AddNew Modal --}}
<style>
    .input-custom{
        background-color: white;
    }
    .input-custom:focus{
        background-color: white;
    }
</style>
<div wire:ignore.self class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New Warehouse</b></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" wire:submit.prevent="store">
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
                        <label for="" class="col-md-2 control-label">Address</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Address" class="form-control input-md input-custom"
                                wire:model.live="address">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Capacity</label>
                        <div class="col-md-8">
                            <textarea id="short_description" placeholder="Capacity" class="form-control input-custom" wire:model.live="capacity"></textarea>
                            @error('capacity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Used Capacity</label>
                        <div class="col-md-8">
                            <input id="short_description" placeholder="Used Capacity" class="form-control input-custom" wire:model.live="used_capacity">
                            @error('used_capacity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Remaining Capacity</label>
                        <div class="col-md-8">
                            <input id="short_description" placeholder="Remaining Capacity" class="form-control input-custom" wire:model.live="remaining_capacity">
                            @error('remaining_capacity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Description</label>
                        <div class="col-md-8">
                            <textarea type="text" name="description" placeholder="Description" class="form-control input-md input-custom"
                                wire:model.live="description"></textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Warehouse Type</label>
                        <div class="col-md-8">
                            <select name="warehouse_type" id="" class="form-control input-custom" wire:model.live="warehouse_type" style="border:1px solid #d2d6de">
                                <option value=""></option>
                                <option value="Normal storage">Kho thường</option>
                                <option value="Cold storage">Kho lạnh</option>
                            </select>
                            @error('warehouse_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group d-flex align-items-center justify-content-center pull-left">
                        <label for="" class="col-md-2 control-label">Manager</label>
                        <div class="col-md-8">
                            <select name="manager_id" id="" class="form-control input-custom" wire:model.live="manager_id" style="border:1px solid #d2d6de">
                                <option value=""></option>
                                @foreach ($managers as $manager)
                                    <option value="{{$manager->id}}">{{$manager->name}}</option>
                                @endforeach
                            </select>
                            @error('manager_id')
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
