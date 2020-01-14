<div class="card">
    <div class="card-body card-block">
        <form id="form_userprofile" action="/userprofile/{{ $data->id }}" method="post" class="form-modal" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field("PATCH") }}
            <input type="hidden" data-id="{{ $data->id }}" name="id" value="{{ $data->id }}">
            <div class="form-group">
                <label for="nf-email" class="form-control-label">Email</label>
                <input value="{{ $data->email }}" type="text" id="nf-email" name="email" placeholder="Enter Email.." class="form-control {{ $errors->has('email') ? 'is-danger' : '' }}"> {{ $errors->has('email') ? "<span class='help-block'>Please enter your email</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-username" class="form-control-label">Firstname</label>
                <input value="{{ $data->firstname }}" type="text" id="nf-firstname" name="firstname" placeholder="Enter Firstname.." class="form-control {{ $errors->has('firstname') ? 'is-danger' : '' }}"> {{ $errors->has('firstname') ? "<span class='help-block'>Please enter your first name</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-lastname" class="form-control-label">Lastname</label>
                <input value="{{ $data->lastname }}" type="text" id="nf-lastname" name="lastname" placeholder="Enter Lastname.." class="form-control {{ $errors->has('lastname') ? 'is-danger' : '' }}"> {{ $errors->has('lastname') ? "<span class='help-block'>Please enter your last name</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-middlename" class="form-control-label">Middlename</label>
                <input value="{{ $data->middlename }}" type="text" id="nf-middlename" name="middlename" placeholder="Enter Middlename.." class="form-control {{ $errors->has('middlename') ? 'is-danger' : '' }}"> {{ $errors->has('middlename') ? "<span class='help-block'>Please enter your middle name</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-suffix" class="form-control-label">Suffix</label>
                <input value="{{ $data->suffix }}" type="text" id="nf-suffix" name="suffix" placeholder="Enter Suffix.." class="form-control {{ $errors->has('suffix') ? 'is-danger' : '' }}"> {{ $errors->has('suffix') ? "<span class='help-block'>Please enter your suffix</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-gender" class="form-control-label">Gender</label>    
                <select name="gender" id="nf-gender" class="form-control {{ $errors->has('gender') ? 'is-danger' : '' }}">
                    <option value="">Please select</option>
                    <option value=1 <?= isset($data->gender) && $data->gender == 1 ? ' selected="selected"' : ''; ?>> Male </option> 
                    <option value=0 <?= isset($data->gender) && $data->gender == 0 ? ' selected="selected"' : ''; ?>> Female </option>
                </select>
                {{ $errors->has('gender') ? "<small class='help-block'>Please Select Gender</small>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-mobile_number" class="form-control-label">Mobile Number</label>
                <input value="{{ $data->mobile_number }}" type="text" id="nf-mobile_number" name="mobile_number" placeholder="Enter Mobile Number.." class="form-control {{ $errors->has('mobile_number') ? 'is-danger' : '' }}"> {{ $errors->has('mobile_number') ? "<span class='help-block'>Please enter your Mobile Number</span>" : '' }}
            </div>
        </form>
    </div>
    <div class="card-footer">
    <button type="submit" class="edit_profile btn btn-primary btn-sm">
			<i class="fas fa-dot-circle"></i> Submit
         </button>
        <button type="reset" class="reset_field btn btn-danger btn-sm">
			<i class="fas fa-ban"></i> Reset
        </button>
    </div>
</div>