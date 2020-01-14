<div class="card">
    <div class="card-body card-block">
    <form id="form_user" action="/user/{{$data['id']}}" method="post" class="form-modal" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field("PATCH") }}
            <input value="{{ $data['id'] }}" type="hidden" id="nf-id" name="id" class="form-control {{ $errors->has('id') ? 'is-danger' : '' }}"> {{ $errors->has('id') ? "<span class='help-block'>Please enter id</span>" : '' }}
            <div class="form-group">
                <label for="nf-username" class="form-control-label">Username</label>
                <input value="{{ $data['username'] }}" type="text" id="nf-username" name="username" placeholder="Enter Username.." class="form-control {{ $errors->has('username') ? 'is-danger' : '' }}"> {{ $errors->has('username') ? "<span class='help-block'>Please enter your name</span>" : '' }}
            </div>
        </form>
    </div>
    <div class="card-footer">
    <button type="submit" class="edit_user btn btn-primary btn-sm">
			<i class="fas fa-dot-circle"></i> Submit
         </button>
        <button type="reset" class="reset_field btn btn-danger btn-sm">
			<i class="fas fa-ban"></i> Reset
        </button>
    </div>
</div>