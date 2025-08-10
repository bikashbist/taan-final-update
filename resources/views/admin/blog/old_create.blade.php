@extends($data['layout'])
@section('title')
Admin Post Add | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spartan-multi-image-picker/dist/css/spartan-multi-image-picker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<style>
    .col-spart {
        width: 10%;
        float: left;
        padding: 5px;
    }

    .bootstrap-tagsinput {
        width: 100%;
    }
</style>
@endsection
@section('content')
@include('admin.section.flash_message_error')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index')}}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input name="user_type" type="hidden" value="{{ $data['user_id'] }}">
                <input name="type" type="hidden" value="post">
                {{-- main post --}}
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add New Trail</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>Title</label>
                                    <input class="form-control rounded" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
                                    @if($errors->has('title'))
                                    <p id="name-error" class="help-block " for="title"><span>{{ $errors->first('title') }}</span></p>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="trail_address" class="">Trail Address</label>
                                    <input class=" form-control" type="text" id="trail_address" name="trail_address">
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Destination</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="" name="destination">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Durations</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded duration" value="" name="durations">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Activities</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="" name="activities">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Max.altitude</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="" name="max_altitude">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Group Size</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="" name="group_size">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="image" class="">Thumbnail</label>
                                    <input class=" form-control" type="file" id="image" name="blog_thumnail" value="" accept="image/webp, image/*">
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="image" class="">Map</label>
                                    <input class=" form-control" type="file" id="brochure" name="route_map" accept="image/png, image/gif, image/jpeg">
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="my-editor" cols="30" id="contet" rows="9" class="form-control rounded description my-editor">{{ old('description') }}</textarea>
                                @if($errors->has('route_map'))
                                <p id="name-error" class="help-block " for="description"><span>{{ $errors->first('description') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Category</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Trail Category</label>
                                    <select name="category_id" class="form-control category_id select_category" id="category_id">
                                        <option selected disabled>Select Category</option>
                                        @foreach($data['rows'] as $row)
                                        <option value="{{ $row->id }}" {{ old('category_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Season</label>
                                    <select name="season_id" class="form-control season_id select_category" id="season_id">
                                        <option selected disabled>Select Season</option>
                                        @foreach($data['season'] as $row)
                                        <option value="{{ $row->id }}" {{ old('season_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Difficulty</label>
                                    <select name="difficult_id" class="form-control defficult_id select_category" id="difficult_id">
                                        <option selected disabled>Select difficulty</option>
                                        @foreach($data['difficulty'] as $row)
                                        <option value="{{ $row->id }}" {{ old('difficult_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Month</label>
                                    <select name="month_id" class="form-control month_id select_category" id="month_id">
                                        <option selected disabled>Select difficulty</option>
                                        @foreach($data['month'] as $row)
                                        <option value="{{ $row->id }}" {{ old('month_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Experience</label>
                                    <select name="experience_id" class="form-control experience select_category" id="experience">
                                        <option selected disabled>Select difficulty</option>
                                        @foreach($data['experience'] as $row)
                                        <option value="{{ $row->id }}" {{ old('experience_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Culture</label>
                                    <select name="culture_id" class="form-control culture_id select_category" id="culture_id">
                                        <option selected disabled>Select difficulty</option>
                                        @foreach($data['culture'] as $row)
                                        <option value="{{ $row->id }}" {{ old('culture_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Destination</label>
                                    <select name="destination_id" class="form-control destination_id select_category" id="destination">
                                        <option selected disabled>Select destinaion</option>
                                        @foreach($data['destination'] as $row)
                                        <option value="{{ $row->id }}" {{ old('destination_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Transport</label>
                                    <select name="transport_id" class="form-control transport_id select_category" id="transport_id">
                                        <option selected disabled>Select difficulty</option>
                                        @foreach($data['transport'] as $row)
                                        <option value="{{ $row->id }}" {{ old('transport_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Popular</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="popular" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="popular" value=1><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <!-- Begin Progress Bar Buttons-->
                        <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm "><i class="fa fa-undo"></i> Back</a>
                        <!-- End Progress Bar Buttons-->
                    </div>
                </div>

                {{-- Days --}}
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Days</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                @if(old('days'))
                                @foreach (old('days') as $index => $day)
                                <div class="form-group">
                                    <div class="input-group control-group increment-days row">
                                        <input type="text" class="form-control rounded col-3" value="Day {{ $index + 1 }}" name="days[{{ $index }}][day]" placeholder="Day">
                                        <input type="text" class="form-control rounded col-9" name="days[{{ $index }}][days_title]" value="{{ $day['days_title'] }}" placeholder="Day Title"><br>
                                        @if($index == 0)
                                        <button class="btn btn-success btn-days btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>

                                        @endif
                                        <div class="input-group-btn"></div>
                                    </div>
                                    <div class="input-group control-group increment-days row mt-1">
                                        <textarea class="form-control rounded col-12" name="days[{{ $index }}][days_descriptions]" placeholder="Description">{{ $day['days_descriptions'] }}</textarea>
                                    </div>
                                    @if($index > 0)
                                    <button class="btn btn-danger btn-remove-days" style="float: right;margin-top: -34px;margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                <div class="form-group">
                                    <div class="input-group control-group increment-days row">
                                        <input type="text" class="form-control rounded col-3" value="Day 1" name="days[0][day]" placeholder="Day">
                                        <input type="text" class="form-control rounded col-9" name="days[0][days_title]" placeholder="Day Title"><br>
                                        <button class="btn btn-success btn-days btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                        <div class="input-group-btn"></div>
                                    </div>
                                    <div class="input-group control-group increment-days row mt-1">
                                        <textarea class="form-control rounded col-12" name="days[0][days_descriptions]" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                @endif

                                <div class="days-block"></div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- faq --}}
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Faq for this trip</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                @if(old('faq'))
                                @foreach (old('faq') as $index => $faq)
                                <div class="form-group faq">
                                    <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                                        <input type="text" class="form-control rounded" name="faq[{{ $index }}][question]" value="{{ $faq['question'] }}"><br>
                                        @if($index == 0)
                                        <button class="btn btn-success btn-faq btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                        @endif
                                    </div>
                                    <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                                        <textarea class="form-control rounded col-12" name="faq[{{ $index }}][ans]" value="{{ $faq['ans'] }}">{{ $faq['ans'] }}</textarea>
                                    </div>
                                    @if($index > 0)
                                    <button class="btn btn-danger btn-remove-faq" style="float: right;margin-top: -34px;margin-right: -30px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                <div class="form-group faq">
                                    <div class="input-group control-group increment-days faq">
                                        <input type="text" class="form-control rounded" name="faq[0][question]" placeholder="Day Title"><br>
                                        <button class="btn btn-success btn-faq btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                    </div>
                                    <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                                        <textarea class="form-control rounded col-12" name="faq[0][ans]" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                @endif
                                <div class="faq-block"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- videos --}}
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Videos</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                @if(old('video_link'))
                                @foreach (old('video_link') as $index => $video)
                                <div class="form-group video">
                                    <div class="input-group control-group increment-days video">
                                        <input type="url" class="form-control rounded" name="video_link[]" value="{{ old('video_link')[$index] }}" placeholder="Video Link"><br>
                                        @if($index == 0)
                                        <button class="btn btn-success btn-video btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                        @endif
                                    </div>
                                    <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                                        <input type="file" class="form-control rounded" name="video_thumbnail[]" placeholder="Thumbnail"><br>
                                    </div>
                                    @if($index > 0)
                                    <button class="btn btn-danger btn-remove-video" style="float: right;margin-top: -34px;margin-right: -30px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                    @endif
                                </div>
                                @endforeach
                                @else
                                <div class="form-group video">
                                    <div class="input-group control-group increment-days video">
                                        <input type="url" class="form-control rounded" name="video_link[]" placeholder="Video Link"><br>
                                        <button class="btn btn-success btn-video btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                    </div>
                                    <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                                        <input type="file" class="form-control rounded" name="video_thumbnail[]" placeholder="Thumbnail"><br>
                                    </div>
                                </div>
                                @endif

                                <div class="video-block"></div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- more info --}}
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">More Info</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <textarea name="more_info" cols="30" rows="9" class="form-control rounded ">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- images --}}
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Blog Images</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group ">
                                    @if(old('images'))
                                    @foreach(old('images') as $image)
                                    <input type="hidden" name="old_images[]" value="{{ $image }}">
                                    @endforeach
                                    @endif
                                    <div id="image-picker"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- meta field --}}
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Meta Field</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">

                            <div class="form-group">
                                <label>Meta Tag</label>
                                <input class="form-control rounded" type="text" name="meta_tag" id="meta_tag"
                                    data-role="tagsinput" value="{{ old('meta_tag') }}" placeholder="Meta Tag">
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" cols="30" rows="4" class="form-control rounded ">{{ old('meta_description') }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/spartan-multi-image-picker/dist/js/spartan-multi-image-picker.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

<script>
    $(document).ready(function() {

        //select 2
        $(".select_category").select2({
            placeholder: "Select",
            allowClear: true
        });
        CKEDITOR.replace('my-editor', options);
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        //slider miages
        $(".btn-img").click(function() {
            var html = $(".clone-img").html();
            $(".slider-image-block").append(html);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });


    });
</script>


<script>
    $(document).ready(function() {
        let dayCounter = 2; // Start from Day 2 as Day 1 is already in the HTML

        // Add Days
        var day_counter = 1;
        var faq_counter = 1;
        var img_counter = 1;
        var video_counter = 1;

        $(".btn-days").click(function() {

            let dayHtml = `
                <div class="form-group">
                    <div class="input-group control-group increment-days row">
                        <input type="text" class="form-control rounded col-3" value="Day ${dayCounter}" name="days[${day_counter}][day]" placeholder="Day">
                        <input type="text" class="form-control rounded col-9" name="days[${day_counter}][days_title]" placeholder="Day Title">
                    </div><button class="btn btn-danger btn-remove-days" style="float: right;margin-top: -34px;margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                    <div class="input-group control-group increment-days row mt-1">
                        <textarea class="form-control rounded col-12 form-group" name="days[${day_counter}][days_descriptions]" placeholder="Description"></textarea>
                    </div>
                </div>`;
            $(".days-block").append(dayHtml);
            $('.duration').val(dayCounter);
            day_counter++;
            dayCounter++;
        });

        // Remove Days
        $("body").on("click", ".btn-remove-days", function() {
            $(this).closest(".form-group").remove();
            dayCounter--;
            $('.duration').val(dayCounter);
            renumberDays(); // Renumber days after removal
        });

        // Function to Faq
        $(".btn-faq").click(function() {

            let dayHtml = `
                <div class="form-group">
                    <div class="input-group control-group">
                        <input type="text" class="form-control rounded" name="faq[${faq_counter}][question]" placeholder="Faq Question">
                    </div>
                    <button class="btn btn-danger btn-remove-faq" style="float: right;margin-top: -34px;margin-right: -30px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                    <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                        <textarea class="form-control rounded col-12 form-group" name="faq[${faq_counter}][ans]" placeholder="Ans"></textarea>
                    </div>
                </div>`;
            $(".faq-block").append(dayHtml);
            faq_counter++;
        });

        // Remove Faq
        $("body").on("click", ".btn-remove-faq", function() {
            $(this).closest(".form-group").remove();

        });


        // Function to Video Upload
        $(".btn-video").click(function() {

            let dayHtml = `
                <div class="form-group">
                    <div class="input-group control-group">
                        <input type="url" class="form-control rounded" name="video_link[]" placeholder="Video Link">
                    </div><button class="btn btn-danger btn-remove-faq" style="float: right;margin-top: -34px;margin-right: -30px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                    <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                        <input type="file" class="form-control rounded" name="video_thumbnail[]" placeholder="Video Thumbnail">
                    </div>
                </div>`;
            $(".video-block").append(dayHtml);
        });

        // Remove Faq
        $("body").on("click", ".btn-remove-video", function() {
            $(this).closest(".form-group").remove();
        });

        // Function to renumber days
        function renumberDays() {
            let index = 1; // Start numbering from 1
            console.log(index);
            $(".days-block .form-group").each(function() {
                $(this).find("input[name='days[]']").val(`Day ${index}`);
                index++;
            });
        }
    });
</script>
{{-- spart image picker --}}
<script>
    // $(function () {
    //     $("#image-picker").spartanMultiImagePicker({
    //         fieldName: 'images[]',
    //         maxCount: 5,
    //         rowHeight: '50px',
    //         groupClassName: 'col-spart', // Class name for each image group
    //         maxFileSize: '',
    //         placeholderImage: {
    //             image: 'https://via.placeholder.com/200',
    //             width: '100%'
    //         },
    //         dropFileLabel: "Drop Here",
    //         onExtensionErr: function (index, file) {
    //             console.log(index, file, 'extension err');
    //             alert('Please only input png or jpg type file');
    //         },
    //         onSizeErr: function (index, file) {
    //             console.log(index, file, 'file size too big');
    //             alert('File size too big');
    //         }
    //     });
    // });

    $(function() {
        var oldImages = [];

        @if(old('images'))
        oldImages = @json(old('images'));
        @endif

        $("#image-picker").spartanMultiImagePicker({
            fieldName: 'images[]',
            maxCount: 5,
            rowHeight: '50px',
            groupClassName: 'col-spart', // Class name for each image group
            maxFileSize: '',
            placeholderImage: {
                image: 'https://via.placeholder.com/200',
                width: '100%'
            },
            dropFileLabel: "Drop Here",
            onExtensionErr: function(index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file');
            },
            onSizeErr: function(index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            },
            init: function(input) {
                if (oldImages.length > 0) {
                    oldImages.forEach(function(image, index) {
                        var img = $('<img />').attr('src', image).css('width', '100%');
                        $(input).before(img);
                    });
                }
            }
        });
    });
</script>
@endsection