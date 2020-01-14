@extends('app.app-master')
@section('main-content')

<?php
    $middleInitial = isset($data->middlename) ? ucfirst($data->middlename) : null;
    $suffix = isset($data->suffix) ? ucfirst($data->suffix) : null;
?>
    <div class="col-md-12 user-profile-card">
        <div class="card">
            {{-- <div class="card-header">
                <strong class="card-title">Profile</strong>
                <button href="/profile/edit" class="edit_profile float-right" type='submit' data-toggle='tooltip' title='Edit'>
                    <i class='fas fa-edit'></i>
                </button>
            </div> --}}
            <div class="card-body">
                <div class="row card--dark__shadowed">
                    <div class="col-md-5 profile-left row">
                        <div class="wrap col-md-12 my-auto">
                            <img class ="rounded-circle mx-auto d-block" src='/img/<?= ($data->gender == 1) ? "default_avatar_m.svg" : "default_avatar_f.svg" ?>' />
                            <div class="info mt-2">
                                <h5 class="u-name mb-2">{{$data->firstname.' '.$data->lastname}}</h5>
                                <h6 class="u-role">{{$data['role']}}</h6>
                            </div>
                            <div class="location text-sm-center"></div>
                        </div>
                    </div>
                    <div class="col-md-7 profile-right">
                        <div class="card-title">
                            <strong class="">Profile</strong>
                        </div>
                        <dl class="row desc">
                            <?php
                                $profile = "";
                                $profile .= "<dt class='col-5'>Email Address</dt>";
                                $profile .= "<dd class='col-7'>". $data->email ."</dd>";
                                $profile .= "<dt class='col-5'>Name</dt>";
                                $profile .= "<dd class='col-7'>". ucfirst($data->lastname) .', '. ucfirst($data->firstname) . ' ' .$middleInitial. ' ' .$suffix."</dd>";
                                $profile .= "<dt class='col-5'>Gender</dt>";
                                $profile .= "<dd class='col-7'>". $gender = ($data->gender == 1) ? "Male" : "Female" ."</dd>";
                                $profile .= "<dt class='col-5'>Mobile Number</dt>";
                                $profile .= "<dd class='col-7'>". $data->mobile_number ."</dd>";
                                echo $profile;
                            ?>
                        </dl>
                            
                        <button href="/profile/edit" class="edit_profile float-right" type='submit' data-toggle='tooltip' title='Edit'>
                            <i class='fas fa-edit'></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection