@extends('app.app-master')
@section('main-content')

<div class="container-fluid">
    <div class="row  row--mod card--dark__shadowed">
        <div class="col-md-12">
            <div class="row">
                <h3 class="title-5 m-b-35 col-md-2">News</h3>
                <div class="alert alert-info col-md-3 offset-md-7" role="alert">
                    Click <a href="#" class="alert-link">Table row</a> to view news comments. 
                </div>
            </div>
            <table id="news_list" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Is Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Is Active</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection