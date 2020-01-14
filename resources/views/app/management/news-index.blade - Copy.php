@extends('app.app-master')
@section('main-content')

<div class="row  row--mod card--dark__shadowed">
<?php if(!empty($data)):?>
        <h3 class="title-5 m-b-30 col-md-2">News</h3>
        <div class="col-12 col-sm-6 col-md-12 mt-3" id="accordion">
            @foreach($data as $news => $value)
                <div class='card border-info'>
                    <div class='card-header' id='heading {{ $value["id"] }}'>
                        <a class='news_comments' data-toggle='collapse' data-id='{{ $value["id"] }}' href='#collapse-{{ $value["id"] }}'>{{ $value["title"] }}</a>
                        <span class='btn-holder float-right'>
                        <a class='edit_news' href='/news/{{ $value["id"] }}/edit' aria-hidden='true' data-toggle='tooltip' data-placement='top' data-original-title='Edit News'><i class='fa fa-edit'></i></a>

                            <?php if($value['is_active'] == 1) {
                                    $actionClass = "confirm_delete_news";
                                    $icon = "<i class='fas fa-trash-alt'></i>";
                                    $actionTitle = "Delete";
                                } else {
                                    $actionClass = "confirm_restore_news";
                                    $icon = "<i class='fas fa-recycle'></i>";
                                    $actionTitle = "Restore";
                                }
                                
                                $buttons = "<a href='/news/delete/". $value['id'] . "' id=".$value['id']." aria-hidden='true' data-toggle='tooltip' data-placement='top' data-original-title='" . $actionTitle . "' class='" . $actionClass . "'>" . $icon . "</a> ";
                                echo $buttons;
                            ?>

                        <!-- <a class='delete_news' href='/item/{{ $value["id"] }}/edit' aria-hidden='true' data-toggle='tooltip' data-placement='top' data-original-title='Edit Item'><i class='fa fa-edit'></i></a> -->
                        </span>
                    </div>
                    <div id='collapse-{{ $value["id"] }}' class='collapse' aria-labelledby='heading{{ $value["id"] }}' data-parent='#accordion'>
                        <div class='card-body'>
                            <div class='comment-container'>
                                <nav class='col mt-3 mb-3'>
                                    <a class='add_comment btn-sm btn-primary'
                                        href='/comment/create/{{$value["id"]}}'>
                                        <i class='fa fa-plus mr-1'></i><span> Add Comment</span>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
<?php else: ?>
    <?php echo "<div class='container-fluid mt-3'>
                    <div class='col-12 col-sm-6 col-md-12' id='quesaccordion'>
                        <h3 class='title-5 m-b-30 col-md-2'>No News</h3>
                    </div>
                </div>"; ?>
<?php endif; ?>
        <nav class='col mt-3 mb-3'>
            <a class='add_news btn-sm btn-primary'
                href='/news/create'>
                <i class='fa fa-plus mr-1'></i><span> Add News</span>
            </a>
        </nav>
    </div>
</div>
@endsection