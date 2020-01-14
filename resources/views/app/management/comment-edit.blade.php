<div class="card">
    <div class="card-body card-block">
    <form id="form_comment" action="/comment/{{$data['id']}}" method="post" class="form-modal" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field("PATCH") }}
            <input type="hidden" value="{{$data['id']}}" id="nf-id" name="id" placeholder="Enter id.." class="form-control {{ $errors->has('id') ? 'is-danger' : '' }}">
            <div class="form-group">
                <label for="nf-body" class="form-control-label">Body</label>
                <textarea class="form-control {{ $errors->has('body') ? 'is-danger' : '' }}" id="nf-body"  placeholder="Enter comment body.." name="body" rows="3">{{ $errors->has('body') ? "<span class='help-block'>Please enter comment body</span>" : '' }}{{ $data['body'] }}</textarea>
            </div> 
        </form>
    </div>
    <div class="card-footer">
    <button type="submit" class="edit_comment btn btn-primary btn-sm">
			<i class="fas fa-dot-circle"></i> Submit
         </button>
        <button type="reset" class="reset_field btn btn-danger btn-sm">
			<i class="fas fa-ban"></i> Reset
        </button>
    </div>
</div>

