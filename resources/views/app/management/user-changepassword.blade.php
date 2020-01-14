<div class="card">
    <div class="card-body card-block">
        <form id="form_password" action="/user/updatepassword" method="post" class="form-modal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nf-old_password" class="form-control-label">Old Password</label>
                <input type="password" id="nf-old_password" name="old_password" placeholder="Enter old password.." class="form-control {{ $errors->has('old_password') ? 'is-danger' : '' }}">
                {{ $errors->has('old_password') ? "<span class='help-block'>Please enter old password</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-new_password" class="form-control-label">New Password</label>
                <input type="password" id="nf-new_password" name="new_password" placeholder="Enter new password.." class="form-control {{ $errors->has('new_password') ? 'is-danger' : '' }}">
                {{ $errors->has('new_password') ? "<span class='help-block'>Please enter new password</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-confirm_password" class="form-control-label">Confirm Password</label>
                <input type="password" id="nf-confirm_password" name="confirm_password" placeholder="Enter password confirmation.." class="form-control {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}">
                {{ $errors->has('confirm_password') ? "<span class='help-block'>Please enter password confirmation</span>" : '' }}
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="update_password btn btn-primary btn-sm">
            <i class="fas fa-dot-circle"></i> Submit
        </button>
        <button type="reset" class="reset_field btn btn-danger btn-sm">
            <i class="fas fa-ban"></i> Reset
        </button>
    </div>
</div>