{{--@extends('layouts.app')
@section('content')--}}
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- <div class="card"> -->
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consectetur odio justo, ut tincidunt risus porttitor quis. Pellentesque vestibulum, lacus quis rutrum sollicitudin, lectus elit dignissim purus, in venenatis augue tortor quis sapien. Vestibulum finibus porta orci vel posuere. Donec molestie convallis sollicitudin. Quisque bibendum ut lectus quis fringilla. Integer vel volutpat leo. Nunc fringilla, mauris nec consequat volutpat, mauris eros condimentum massa, tincidunt fringilla eros ligula dictum nunc. Proin mattis neque id interdum viverra. Pellentesque sodales, lectus eu interdum rhoncus, risus nisl tristique velit, eu eleifend elit nunc ut mi. Phasellus purus turpis, sollicitudin eget venenatis sit amet, accumsan a est. Fusce sed elit ac nisi vulputate lacinia sit amet non mauris. Morbi a nisl imperdiet, sagittis diam fermentum, laoreet eros.
                </p>
                <p>
                    Praesent tincidunt dictum aliquet. Aliquam dapibus dui felis, dictum ullamcorper sapien malesuada vel. Duis suscipit felis sit amet massa posuere dapibus. Vivamus nec quam nunc. Vestibulum finibus libero sed nisl luctus consequat. Vestibulum eget magna nec augue pellentesque vehicula quis vitae mi. Vivamus quis dignissim lacus. Duis est nibh, luctus et mauris accumsan, pulvinar tempus enim. Mauris vitae pellentesque dui, sit amet tristique arcu. Vivamus lacus diam, molestie eget orci non, pulvinar luctus felis. Nullam et sagittis ante. In tortor lectus, volutpat at pharetra vel, accumsan sed libero.
                </p>
            <!-- </div> -->
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>
                    <div class="card-body card-block">
                        <form id="form_register" action="/register" method="post" class="form-modal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nf-username" class="form-control-label">Username</label>
                                        <input type="text" id="nf-username" name="username" placeholder="Enter Username.." class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" > {{ $errors->has('username') ? "<span class='help-block'>Please enter your name</span>" : '' }}
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-password" class="form-control-label">Password</label>
                                        <input type="password" id="nf-password" name="password" placeholder="Enter Password.." class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" > {{ $errors->has('password') ? "<span class='help-block'>Please enter your Password</span>" : '' }}
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-email" class="form-control-label">Email</label>
                                        <input type="text" id="nf-email" name="email" placeholder="Enter Email.." class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" > {{ $errors->has('email') ? "<span class='help-block'>Please enter your Email</span>" : '' }}
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-mobile_number" class="form-control-label">Mobile Number</label>
                                        <input type="text" id="nf-mobile_number" name="mobile_number" placeholder="Enter Mobile Number" class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}" > {{ $errors->has('mobile_number') ? "<span class='help-block'>Please enter Mobile Number</span>" : '' }}
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nf-lastname" class="form-control-label">Last Name</label>
                                        <input type="text" id="nf-lastname" name="lastname" placeholder="Enter Last Name.." class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" > {{ $errors->has('lastname') ? "<span class='help-block'>Please enter your last name</span>" : '' }}
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-firstname" class="form-control-label">First Name</label>
                                        <input type="text" id="nf-firstname" name="firstname" placeholder="Enter First Name.." class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" > {{ $errors->has('firstname') ? "<span class='help-block'>Please enter your first name</span>" : '' }}
                                    </div> 
                                    <div class="form-group">
                                        <label for="nf-middlename" class="form-control-label">Middle Name</label>
                                        <input  type="text" id="nf-middlename" name="middlename" placeholder="Enter Middle Name.." class="form-control {{ $errors->has('middlename') ? 'is-invalid' : '' }}"> {{ $errors->has('middlename') ? "<span class='help-block'>Please enter your middle name</span>" : '' }}
                                    </div> 
                                    <div class="form-group">
                                        <label for="nf-suffix" class="form-control-label">Suffix</label>
                                        <input  type="text" id="nf-suffix" name="suffix" placeholder="Enter Suffix.." class="form-control {{ $errors->has('suffix') ? 'is-invalid' : '' }}"> {{ $errors->has('suffix') ? "<span class='help-block'>Please enter your suffix</span>" : '' }}
                                    </div> 
                                    <div class="form-group">
                                        <label for="nf-gender" class="form-control-label">Gender</label>    
                                        <select name="gender" id="nf-gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" >
                                            <option value="">Please select</option>
                                            <option value="1"> Male </option> 
                                            <option value="0"> Female </option>                                     
                                        </select>
                                        {{ $errors->has('gender') ? "<span class='help-block'>Please select your gender</span>" : '' }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-3">
                                        <button type="submit" class="register_user btn btn-primary form-control">
                                            <i class="fas fa-dot-circle"></i> Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--@endsection--}}