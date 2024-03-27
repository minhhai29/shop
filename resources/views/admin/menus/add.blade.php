@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="/admin/menus/add" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên sản phẩm</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
            <label >Danh mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Danh mục cha</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option> 
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Gía gốc</label>
                        <input type="number" name="price" value="{{old('price')}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Gía giảm</label>
                        <input type="number" name="price_sale" value="{{old('price_sale')}}" class="form-control">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" value="{{old('description')}}" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" value="{{old('content')}}" id="content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label>Kích hoạt</label>
                    <!-- radio -->
                    <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="noactive" name="active" >
                        <label for="noactive" class="custom-control-label">Không</label>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="menu">Ảnh sản phẩm</label>
            <input type="file"  class="form-control" id="upload">
        </div>
        <div id="image_show">

        </div>
        <input type="hidden" name="thumb" id="thumb">
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
        

    @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection