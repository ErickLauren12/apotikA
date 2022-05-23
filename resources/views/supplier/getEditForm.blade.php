<form role="form" method="POST" action="{{ url('supplier/'.$data['id']) }}">
    @csrf
    @method('PUT')
    <div class="form-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Text</label>
            <input name="name" type="text" class="form-control" id="nama" placeholder="Enter text" value="{{ $data['name'] }}">
            <span class="help-block">
            Isikan Nama </span>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" class="form-control" rows="3">{{ $data['address'] }}</textarea>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="id_category" id="">
                <option>Pilih</option>
                @foreach ($DataCategories as $item)
                @if ($item['id'] == $data['category_id'])
                    <option value="{{ $item['id'] }}" selected>{{ $item['name'] }}</option>
                @else
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endif
                    
                @endforeach
            </select>
        </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="button" class="btn btn-default">Cancel</button>
    </div>
</form>