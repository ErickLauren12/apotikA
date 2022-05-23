
    <div class="form-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Text</label>
            <input id="eName" name="name" type="text" class="form-control" placeholder="Enter text" value="{{ $data['name'] }}">
            <span class="help-block">
            Isikan Nama </span>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea id="eAddress" name="address" class="form-control" rows="3">{{ $data['address'] }}</textarea>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="eid_category" name="id_category">
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
        <button type="button" class="btn btn-info" data-dismiss = 'modal' onclick="saveDataUpdateTD({{ $data['id'] }})">Submit</button>
        <button type="button" class="btn btn-default">Cancel</button>
    </div>