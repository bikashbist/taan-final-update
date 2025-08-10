@extends('layouts.membership')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spartan-multi-image-picker/dist/css/spartan-multi-image-picker.css">
<link rel="stylesheet" href="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/rte_theme_default.css')}}" />
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
<div class="page-heading">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> Back </a>
    </div>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add Trail Details</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <form action="{{ route($_base_route.'.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="type" type="hidden" value="post">
                        <div class="row">
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="title" style="font-weight: bold;">Title (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
                                @if($errors->has('title'))
                                <p id="member_type_id-error" class="help-block" style="color: red;" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="trail_address" style="font-weight: bold;">Trail Address (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="trail_address" id="trail_address" value="{{ old('trail_address') }}" placeholder="Trail Address">
                                @if($errors->has('trail_address'))
                                <p id="member_type_id-error" class="help-block" style="color: red;" for="trail_address"><span>{{ $errors->first('trail_address') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="duration" style="font-weight: bold;">Durations (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="duration" id="duration" value="{{ old('duration') }}" placeholder="Durations">
                                @if($errors->has('duration'))
                                <p id="duration-error" class="help-block" style="color: red;" for="duration"><span>{{ $errors->first('duration') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="activities" style="font-weight: bold;">Activities (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="activities" id="activities" value="{{ old('activities') }}" placeholder="Activities">
                                @if($errors->has('activities'))
                                <p id="duration-error" class="help-block" style="color: red;" for="activities"><span>{{ $errors->first('activities') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="max_altitude" style="font-weight: bold;">Max.altitude (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="max_altitude" id="max_altitude" value="{{ old('max_altitude') }}" placeholder="Max.altitude">
                                @if($errors->has('max_altitude'))
                                <p id="duration-error" class="help-block" style="color: red;" for="max_altitude"><span>{{ $errors->first('max_altitude') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="group_size" style="font-weight: bold;">Group Size (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="group_size" id="group_size" value="{{ old('group_size') }}" placeholder="Group Size">
                                @if($errors->has('group_size'))
                                <p id="duration-error" class="help-block" style="color: red;" for="group_size"><span>{{ $errors->first('group_size') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="blog_thumnail" style="font-weight: bold;">Thumbnail (<span style="color:red">*</span>)</label>
                                <input class=" form-control" type="file" id="blog_thumnail" name="blog_thumnail" value="" accept="image/webp, image/*">
                                @if($errors->has('blog_thumnail'))
                                <p id="duration-error" class="help-block" style="color: red;" for="blog_thumnail"><span>{{ $errors->first('blog_thumnail') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="route_map" style="font-weight: bold;">Map (<span style="color:red">*</span>)</label>
                                <input class=" form-control" type="file" id="route_map" name="route_map" value="" accept="image/webp, image/*">
                                @if($errors->has('route_map'))
                                <p id="duration-error" class="help-block" style="color: red;" for="route_map"><span>{{ $errors->first('route_map') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="category_id" style="font-weight: bold;">Trail Category (<span style="color:red">*</span>)</label>
                                <select name="category_id" class="form-control category_id select_category" id="category_id">
                                    <option selected>---Select Category---</option>
                                    @if(isset($data['category']) && $data['category']->count() > 0)
                                    @foreach($data['category'] as $row)
                                    <option value="{{ $row->id }}" {{ old('category_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('category_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="category_id"><span>{{ $errors->first('category_id') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="season_id" style="font-weight: bold;">Season (<span style="color:red">*</span>)</label>
                                <select name="season_id" class="form-control category_id select_category" id="season_id">
                                    <option selected>---Select Season---</option>
                                    @if(isset($data['season']) && $data['season']->count() > 0)
                                    @foreach($data['season'] as $row)
                                    <option value="{{ $row->id }}" {{ old('season_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('season_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="season_id"><span>{{ $errors->first('season_id') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="difficult_id" style="font-weight: bold;">Difficulty (<span style="color:red">*</span>)</label>
                                <select name="difficult_id" class="form-control difficult_id select_category" id="difficult_id">
                                    <option selected>---Select Difficulty---</option>
                                    @if(isset($data['difficulty']) && $data['difficulty']->count() > 0)
                                    @foreach($data['difficulty'] as $row)
                                    <option value="{{ $row->id }}" {{ old('difficult_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('difficult_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="difficult_id"><span>{{ $errors->first('difficult_id') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="month_id" style="font-weight: bold;">Month (<span style="color:red">*</span>)</label>
                                <select name="month_id" class="form-control difficult_id month_id" id="month_id">
                                    <option selected>---Select Month---</option>
                                    @if(isset($data['month']) && $data['month']->count() > 0)
                                    @foreach($data['month'] as $row)
                                    <option value="{{ $row->id }}" {{ old('month_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('month_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="month_id"><span>{{ $errors->first('month_id') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="difficult_id" style="font-weight: bold;">Experience (<span style="color:red">*</span>)</label>
                                <select name="experience_id" class="form-control difficult_id select_category" id="experience_id">
                                    <option selected>---Select Experience---</option>
                                    @if(isset($data['experience']) && $data['experience']->count() > 0)
                                    @foreach($data['experience'] as $row)
                                    <option value="{{ $row->id }}" {{ old('experience_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('experience_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="experience_id"><span>{{ $errors->first('experience_id') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="culture_id" style="font-weight: bold;">Culture (<span style="color:red">*</span>)</label>
                                <select name="culture_id" class="form-control difficult_id select_category" id="culture_id">
                                    <option selected>---Select Culture---</option>
                                    @if(isset($data['culture']) && $data['culture']->count() > 0)
                                    @foreach($data['culture'] as $row)
                                    <option value="{{ $row->id }}" {{ old('culture_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('culture_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="culture_id"><span>{{ $errors->first('culture_id') }}</span></p>
                                @endif
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="destination_id" style="font-weight: bold;">Destination (<span style="color:red">*</span>)</label>
                                <select name="destination_id" class="form-control difficult_id select_category" id="destination_id">
                                    <option selected>---Select Destination---</option>
                                    @if(isset($data['destination']) && $data['destination']->count() > 0)
                                    @foreach($data['destination'] as $row)
                                    <option value="{{ $row->id }}" {{ old('destination_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('destination_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="destination_id"><span>{{ $errors->first('destination_id') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="transport_id" style="font-weight: bold;">Transport (<span style="color:red">*</span>)</label>
                                <select name="transport_id" class="form-control difficult_id select_category" id="transport_id">
                                    <option selected>---Select Transport---</option>
                                    @if(isset($data['transport']) && $data['transport']->count() > 0)
                                    @foreach($data['transport'] as $row)
                                    <option value="{{ $row->id }}" {{ old('transport_id') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('transport_id'))
                                <p id="duration-error" class="help-block" style="color: red;" for="transport_id"><span>{{ $errors->first('transport_id') }}</span></p>
                                @endif
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="status" style="font-weight: bold;">Published </label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="featured" style="font-weight: bold;">Featured</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="featured" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="featured" value=1><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-12 col-lg-12">
                                <label for="group_size" style="font-weight: bold;">Description(<span style="color:red">*</span>)</label>
                                <textarea name="description" id="my-editor" cols="30" id="contet" rows="9" class="form-control rounded description my-editor">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                <p id="name-error" class="help-block " for="description"><span>{{ $errors->first('description') }}</span></p>
                                @endif
                            </div>

                            <div class="form-group col-md-12 col-12 col-lg-12">
                                <label for="photo_video_description" style="font-weight: bold;">Photos & Vidos Description</label>
                                <textarea name="photo_video_description" id="photo_video_description" cols="30" rows="3" class="form-control rounded description my-editor">{{ old('photo_video_description') }}</textarea>
                                @if($errors->has('photo_video_description'))
                                <p id="name-error" class="help-block " for="photo_video_description"><span>{{ $errors->first('photo_video_description') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-12 col-12 col-lg-12">
                                <label for="more_info" style="font-weight: bold;">More info</label>
                                <textarea name="more_info" id="more_info" cols="30" rows="3" class="form-control rounded description my-editor">{{ old('more_info') }}</textarea>
                                @if($errors->has('more_info'))
                                <p id="name-error" class="help-block " for="more_info"><span>{{ $errors->first('more_info') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="ibox-head col-md-12">
                            <div class="ibox-title">Tour Schedule</div>
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
                        <div class="ibox-head col-md-12">
                            <div class="ibox-title">Trip Faq </div>
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
                        <div class="ibox-head col-md-12">
                            <div class="ibox-title">Videos</div>
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
                        <div class="ibox-head col-md-12">
                            <div class="ibox-title">Photo Gallery</div>
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
                        <div class="ibox-head col-md-12">
                            <div class="ibox-title">SEO</div>
                        </div>
                        <div class="form-group col-md-12 col-12 col-lg-12">
                            <label for="meta_tag" style="font-weight: bold;">Meta Tag </label>
                            <input name="meta_tag" id="tagsinput" class="tagsinput form-control" value="{{ old('meta_tag') }}" placeholder="Meta Tag" />
                            @if($errors->has('meta_tag'))
                            <p id="name-error" class="help-block " for="meta_tag"><span>{{ $errors->first('meta_tag') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12 col-12 col-lg-12">
                            <label for="meta_description" style="font-weight: bold;">Meta Description </label>
                            <textarea name="meta_description" cols="30" rows="2" class="form-control rounded ">{{ old('meta_description') }}</textarea>
                            @if($errors->has('meta_description'))
                            <p id="name-error" class="help-block " for="meta_description"><span>{{ $errors->first('meta_description') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-sm" type="reset" style="cursor:pointer;"><i class="fa fa-ban"></i> Reset</button>
                            <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/cms/js/jquery.tagsinput.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/spartan-multi-image-picker/dist/js/spartan-multi-image-picker.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/plugins/all_plugins.js')}}"></script>

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
<script>
    $(document).ready(function() {
        // // Enable local "abbr" plugin from /myplugins/abbr/ folder.
        // CKEDITOR.plugins.addExternal('abbr', '/myplugins/abbr/', 'plugin.js');

        // CKEDITOR.replace('my-editor', options);
        // var options = {
        //     extraPlugins: 'abbr',
        //     customConfig: '/ckeditor_settings/config.js',
        //     filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        //     filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        //     filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        //     filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        // };

        var editor1 = new RichTextEditor("#my-editor");
        //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");

        //slider miages
        $(".btn-img").click(function() {
            var html = $(".clone-img").html();
            $(".slider-image-block").append(html);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });

        // // Tags Input
        $(".meta_tag").tagsInput();
    });
</script>
<script>
    $(function() {
        var oldImages = [];

        @if(old('images'))
        oldImages = @json(old('images'));
        @endif

        $("#image-picker").spartanMultiImagePicker({
            fieldName: 'images[]',
            maxCount: 25,
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