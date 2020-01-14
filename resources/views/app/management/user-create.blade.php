<div class="card">
    <div class="card-body card-block">
    <form id="form_user" action="/user" method="post" class="form-modal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nf-username" class="form-control-label">Username</label>
                <input type="text" id="nf-username" name="username" placeholder="Enter Username.." class="form-control {{ $errors->has('username') ? 'is-danger' : '' }}"> {{ $errors->has('username') ? "<span class='help-block'>Please enter your name</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-password" class="form-control-label">Password</label>
                <input type="password" id="nf-password" name="password" placeholder="Enter Password.." class="form-control {{ $errors->has('password') ? 'is-danger' : '' }}"> {{ $errors->has('password') ? "<span class='help-block'>Please enter your Password</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-lastname" class="form-control-label">Last Name</label>
                <input type="text" id="nf-lastname" name="lastname" placeholder="Enter Last Name.." class="form-control {{ $errors->has('lastname') ? 'is-danger' : '' }}"> {{ $errors->has('lastname') ? "<span class='help-block'>Please enter your last name</span>" : '' }}
            </div> 
            <div class="form-group">
                <label for="nf-firstname" class="form-control-label">First Name</label>
                <input type="text" id="nf-firstname" name="firstname" placeholder="Enter First Name.." class="form-control {{ $errors->has('firstname') ? 'is-danger' : '' }}"> {{ $errors->has('firstname') ? "<span class='help-block'>Please enter your first name</span>" : '' }}
            </div> 
            <div class="form-group">
                <label for="nf-middlename" class="form-control-label">Middle Name</label>
                <input  type="text" id="nf-middlename" name="middlename" placeholder="Enter Middle Name.." class="form-control {{ $errors->has('middlename') ? 'is-danger' : '' }}"> {{ $errors->has('middlename') ? "<span class='help-block'>Please enter your middle name</span>" : '' }}
            </div> 
            <div class="form-group">
                <label for="nf-suffix" class="form-control-label">Suffix</label>
                <input  type="text" id="nf-suffix" name="suffix" placeholder="Enter Suffix.." class="form-control {{ $errors->has('suffix') ? 'is-danger' : '' }}"> {{ $errors->has('suffix') ? "<span class='help-block'>Please enter your suffix</span>" : '' }}
            </div> 
            <div class="form-group">
                <label for="nf-gender" class="form-control-label">Gender</label>    
                <select name="gender" id="nf-gender" class="form-control">
                    <option value="">Please select</option>
                    <option value="1"> Male </option> 
                    <option value="0"> Female </option>                                     
                </select>
            </div>
            <div class="form-group">
                <label for="nf-email" class="form-control-label">Email</label>
                <input type="text" id="nf-email" name="email" placeholder="Enter Email.." class="form-control {{ $errors->has('email') ? 'is-danger' : '' }}"> {{ $errors->has('email') ? "<span class='help-block'>Please enter your Email</span>" : '' }}
            </div>
            <div class="form-group">
                <label for="nf-mobile_number" class="form-control-label">Mobile Number</label>
                <input type="text" id="nf-mobile_number" name="mobile_number" placeholder="Enter Mobile Number" class="form-control {{ $errors->has('mobile_number') ? 'is-danger' : '' }}"> {{ $errors->has('mobile_number') ? "<span class='help-block'>Please enter Mobile Number</span>" : '' }}
            </div>
        </form>
    </div>
    <div class="card-footer">
    <button type="submit" class="add_user btn btn-primary btn-sm">
			<i class="fas fa-dot-circle"></i> Submit
         </button>
        <button type="reset" class="reset_field btn btn-danger btn-sm">
			<i class="fas fa-ban"></i> Reset
        </button>
    </div>
</div>

