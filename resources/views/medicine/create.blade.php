@extends('layout.conquer')

@section('content')
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Default Form
        </div>
        <div class="tools">
            <a href="" class="collapse"></a>
            <a href="#portlet-config" data-toggle="modal" class="config"></a>
            <a href="" class="reload"></a>
            <a href="" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body form" style="display: block;">
        <form role="form" method="POST" action="{{ url('medicines') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Generic Name</label>
                    <input name="generic_name" type="text" class="form-control" id="generic_name" placeholder="Enter text">
                    <span class="help-block">
                    Generic Name </span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Form</label>
                    <input name="form" type="text" class="form-control" id="form" placeholder="Enter text">
                    <span class="help-block">
                    Form </span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Restriction Formula</label>
                    <input name="restriction_formula" type="text" class="form-control" id="formula" placeholder="Enter text">
                    <span class="help-block">
                    Restriction Formula </span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input name="price" type="number" class="form-control" id="price" placeholder="Enter text">
                    <span class="help-block">
                    Price </span>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option>Pilih</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier_id" class="form-control">
                        <option>Pilih</option>
                        @foreach ($suppliers as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Faskes 1</label>
                    <input name="faskes1" type="number" max="1" min="0" class="form-control" id="faskes1" placeholder="Faskes 1">
                    <span class="help-block">
                    Faskes 1 </span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Faskes 2</label>
                    <input name="faskes2" type="number" max="1" min="0" class="form-control" id="faskes2" placeholder="Faskes 2">
                    <span class="help-block">
                    Faskes 2</span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Faskes 3</label>
                    <input name="faskes3" type="number" max="1" min="0" class="form-control" id="faskes3" placeholder="Faskes 3">
                    <span class="help-block">
                    Faskes 3</span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <input name="image" type="file" class="form-control" id="image">
                </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="button" class="btn btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection