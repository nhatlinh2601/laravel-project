@extends('layouts.backend.backend')
@section('page_title')
    Cài đặt Menu
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (session('success'))
                <div class="col-md-12"><div class="alert alert-success">{{ session('success') }}</div></div>
            @endif
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">
                            Menu
                        </h3>
    
    
                    </div>
                    <div class="card-body p-0">
                        <div class="box-body table-responsive">
                            <div class="dd" id="menu-sort">
                                <li style="list-style-type:none" class=" ">
                                    @foreach ($menus as $item)
                                        <div class="dd-handle ">
                                            <i style="margin: 0 10px" class="{{ $item->icon }}"></i> {{ $item->name }}
                                            <span class="float-right dd-nodrag">
                                                <a href=""><i class="fa fa-edit fa-edit"></i></a>
    
                                                <a  onclick="return confirmDelete() " href="{{ route('admin.menu.delete', $item->id) }}" style="cursor: pointer" class="remove_menu"><i class="fa fa-trash fa-edit"></i></a>
                                            </span>
                                        </div>
                                        <ol style="list-style-type:none" class="dd-list">
                                            @foreach ($item->childs as $child)
                                                <li style="list-style-type:none" class=" dd-collapsed">
                                                    <div class="dd-handle ">
                                                        {{ $child->name }}
                                                        <span class="float-right dd-nodrag">
                                                            <a href=""><i class="fa fa-edit fa-edit"></i></a>
    
                                                            <a  onclick="return confirmDelete() " href="{{ route('admin.menu.child-delete', $child->id) }}" style="cursor: pointer" class="remove_menu"><i class="fa fa-trash fa-edit"></i></a>
                                                        </span>
                                                    </div>
    
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endforeach
    
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title"><i class="fa fa-plus" aria-hidden="true"></i> Tạo mới menu</h3>
                    </div>
                    <form action="{{ route('admin.menu.setting') }}" method="post" accept-charset="UTF-8"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row ">
                                <label for="parent_id" class="col-sm-2 col-form-label">Cha</label>
                                <div class="col-sm-10 ">
                                    <select class="form-control parent mb-3" name="parent_id">
                                        <option value="0">== ROOT ==</option>
                                        @foreach ($menus as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="title" class="col-sm-2 col-form-label">Tiêu đề</label>
                                <div class="col-sm-10 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="name" name="name" value=""
                                            class="form-control title ">
                                    </div>
                                    @error('name')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row ">
                                <label for="uri" class="col-sm-2 col-form-label">URI</label>
                                <div class="col-sm-10 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="text" id="uri" name="uri" value=""
                                            class="form-control uri " placeholder="">
                                    </div>
                                    @error('uri')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="sort" class="col-sm-2 col-form-label">Thứ tự</label>
                                <div class="col-sm-10 ">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <input type="number" style="width: 100px;" id="sort" name="sort" value=""
                                            class="form-control sort " placeholder="">
                                    </div>
                                    @error('sort')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                        <div class="card-footer row">
    
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="btn-group float-right">
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </div>
                                <div class="btn-group float-left">
                                    <button type="reset" class="btn btn-warning">Làm lại</button>
                                </div>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete() {

        var result = confirm("Bạn có chắc chắn muốn xóa không?");
        return result;
    }

    function confirmRestore() {

        var result = confirm("Bạn có chắc chắn muốn khôi phục không?");
        return result;
    }
</script>