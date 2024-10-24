<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container" style="padding:3px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="btn btn-success pull-left" style="display: block; width:130px">Edit User</p>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.userlist')}}" class="btn btn-success pull-right" style="display: block; width:100px">All Users</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <p>{{session()->get('message')}}</p>
                            </div>
                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="update">
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="" class="col-md-4 control-label ">Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Name" class="form-control input-md" wire:model.live="name" >
                                </div>
                            </div>
                        
                        
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="" class="col-md-4 control-label">Email</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Email" class="form-control input-md" wire:model.live="email">
                                </div>
                            </div>
                        
                        
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="" class="col-md-4 control-label">Phone</label>
                                <div class="col-md-4" >
                                    <input type="text" placeholder="Phone" class="form-control input-md"  wire:model.live="phone">
                                </div>
                            </div>
                        
                        
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="" class="col-md-4 control-label">Address</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Address" class="form-control input-md"  wire:model.live="address">
                                </div>
                            </div>
                        
                        
                            
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="" class="col-md-4 control-label">Role</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model.live="role">
                                        <option value="0">Admin</option>
                                        <option value="1">Quản lý</option>
                                        <option value="2">Nhân viên</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="" class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model.live="new_image">
                                    @if ($new_image)
                                        <img src="{{$new_image->temporaryUrl()}}" width="120" alt="">
                                    @else
                                        <img src="{{asset('assets/images/products')}}/{{$image}}" alt="">
                                    @endif
                                </div>
                            </div> --}}
                        
                        
                           
                            <div class="form-group d-flex justify-content-center align-items-center">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary pull-right"  >Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('scripts')
    <script>
       $(function(){
        tinymce.init({
            selector: '#short_description',
            setup:function(editor){
                editor.on('Change',function(e){
                    tinyMCE.triggerSave();
                    var sd_data=$('#short_description').val();
                    @this.set('short_description',sd_data);
                });
            }
        });

        tinymce.init({
            selector: '#description',
            setup:function(editor){
                editor.on('Change',function(e){
                    // tinyMCE.triggerSave();
                    var d_data=$('#description').val();
                    @this.set('description',d_data);
                });
            }
        });
       });
    </script>
@endpush --}}

