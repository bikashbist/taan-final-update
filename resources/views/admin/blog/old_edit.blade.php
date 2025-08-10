@extends($data['layout'])
@section('title')
Admin Post Add | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
.card-img-top {
    height: 150px;
    object-fit: cover;
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
        <form action="{{ route($_base_route.'.update', ['post_unique_id'=>$data['rows']->post_unique_id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input name="user_type" type="hidden" value="{{ $data['user_type'] }}">
                {{-- main post --}}
                {{-- @dd($data['rows']) --}}
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit Trail</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 form-group">
                                    <label>Title</label>
                                    <input class="form-control rounded" type="text" name="title" id="title" value="{{ old('title', $data['rows']->title) }}" placeholder="Title">
                                    @if($errors->has('title'))
                                    <p id="title-error" class="help-block " for="title"><span>{{ $errors->first('title') }}</span></p>
                                    @endif
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="trail_address" class="">Trail Address</label>
                                    <input class=" form-control" type="text" id="trail_address" value="{{ old('trail_address', $data['rows']->trail_address) }}" name="trail_address" >
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Destination</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="{{ old('destination',$data['rows']->destination) }}" name="destination">
                                    </div>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Durations</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded duration" value="{{ old('durations',$data['rows']->durations) }}" name="durations">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Activities</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="{{ old('activities', $data['rows']->activities) }}" name="activities">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Max.altitude</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="{{ old('max_altitude', $data['rows']->max_altitude) }}" name="max_altitude">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="uploadSliderImages">Group Size</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" value="{{ old('group_size', $data['rows']->group_size) }}" name="group_size">
                                    </div>
                                </div>

                                <div class="form-group col-sm-6 col-md-6">
                                    <label for="image" class="">Thumbnail Image</label>
                                    <input class=" form-control" type="file" id="image" name="blog_thumnail" accept="image/*">
                                    @if($errors->has('blog_thumnail'))
                                    <p id="title-error" class="help-block " for="title"><span>{{ $errors->first('blog_thumnail') }}</span></p>
                                    @endif
                                    @if($data['rows']->thumbs && file_exists(public_path($data['rows']->thumbs)))
                                    <div>
                                        <img src="{{ asset($data['rows']->thumbs) }}" alt="blog thumnail" height="50" width="100">
                                    </div>
                                    @else
                                    <p>No Image Found</p>
                                    @endif
                                </div>

                                <div class="form-group col-sm-6 col-md-6">
                                    <label for="image" class="">Map</label>
                                    <input class=" form-control" type="file" id="route_map" name="route_map" value="" accept="image/*">
                                    @if($errors->has('route_map'))
                                    <p id="title-error" class="help-block " for="title"><span>{{ $errors->first('route_map') }}</span></p>
                                    @endif
                                    @if($data['rows']->route_map && file_exists(public_path($data['rows']->route_map)))
                                    <div>
                                    <img src="{{ asset($data['rows']->route_map) }}" alt="Route map" height="50" width="100">
                                    </div>
                                    @else
                                    <p>No Image Found</p>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <label>Description</label>
                                    <textarea name="description" id="my-editor" cols="30" rows="9" class="form-control rounded my-editor">{!! old('description', $data['rows']->description) !!}</textarea>
                                    @if($errors->has('description'))
                                        <p id="title-error" class="help-block " for="title"><span>{{ $errors->first('description') }}</span></p>
                                        @endif
                                </div>



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
                                        <option value="">Select Category</option>
                                        @foreach($data['category'] as $row)
                                        <option value="{{ $row->id }}" {{ old('category_id', $data['rows']->category_id) == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                    <p id="title-error" class="help-block " for="title"><span>{{ $errors->first('category_id') }}</span></p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Season</label>
                                    <select name="season_id" class="form-control season_id select_category" id="season_id">
                                        <option value="">Select Season</option>
                                        @foreach($data['season'] as $row)
                                        <option value="{{ $row->id }}" {{ old('season_id' ,$data['rows']->season_id) == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Difficulty</label>
                                    <select name="difficult_id" class="form-control defficult_id select_category" id="difficult_id">
                                        <option value="">Select difficulty</option>
                                        @foreach($data['difficulty'] as $row)
                                        <option value="{{ $row->id }}" {{ old('difficult_id' ,$data['rows']->difficult_id) == $row->id ? 'selected' : ''  }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Month</label>
                                    <select name="month_id" class="form-control month_id select_category" id="month_id">
                                        <option value="">Select difficulty</option>
                                        @foreach($data['month'] as $row)
                                        <option value="{{ $row->id }}" {{ old('month_id' ,$data['rows']->month_id) == $row->id ? 'selected' : ''  }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Experience</label>
                                    <select name="experience_id" class="form-control experience select_category" id="experience">
                                        <option value="">Select Experience</option>
                                        @foreach($data['experience'] as $row)
                                        <option value="{{ $row->id }}" {{ old('experience_id', $data['rows']->experience_id) == $row->id ? 'selected' : ''  }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Culture</label>
                                    <select name="culture_id" class="form-control culture_id select_category" id="culture_id">
                                        <option value="">Select Culture</option>
                                        @foreach($data['culture'] as $row)
                                        <option value="{{ $row->id }}" {{ $data['rows']->culture_id == $row->id ? 'selected' : ''  }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Destination</label>
                                    <select name="destination_id" class="form-control destination_id select_destination" id="destination_id">
                                        <option value="">Select Culture</option>
                                        @foreach($data['destination'] as $row)
                                        <option value="{{ $row->id }}" {{ $data['rows']->destination_id == $row->id ? 'selected' : ''  }}>{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label>Transport</label>
                                    <select name="transport_id" class="form-control transport_id select_category" id="transport_id">
                                        <option value="">Select Transport</option>
                                        @foreach($data['transport'] as $row)
                                        <option value="{{ $row->id }}" {{ old('transport_id',$data['rows']->transport_id) == $row->id ? 'selected' : ''  }}>{{ $row->title }}</option>
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
                                        <input type="checkbox" name="status" value=1 {{ $data['rows']->status == 1 ? 'checked' : '' }}><span class="input-span"></span>
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
                                        <input type="checkbox" name="popular" value=1 {{ $data['rows']->popular == 1 ? 'checked' : '' }}><span class="input-span"></span>
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
                            @if(old('days'))
                                @foreach (old('days') as $index => $day)
                                    <div class="form-group">
                                        <div class="input-group control-group increment-days row">
                                            <input type="text" class="form-control rounded col-3" value="Day {{ $index + 1 }}" name="days[{{ $index }}][day]" placeholder="Day">
                                            <input type="text" class="form-control rounded col-9" name="days[{{ $index }}][days_title]" value="{{ $day['days_title'] ?? '' }}" placeholder="Day Title"><br>
                                            @if($index == 0)
                                                <button class="btn btn-success btn-days btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                            @endif
                                            <div class="input-group-btn"></div>
                                        </div>
                                        <div class="input-group control-group increment-days row mt-1">
                                            <textarea class="form-control rounded col-12" name="days[{{ $index }}][days_descriptions]" placeholder="Description">{{ $day['days_descriptions'] ?? '' }}</textarea>
                                        </div>
                                        @if($index > 0)
                                            <button class="btn btn-danger btn-remove-days" style="float: right;margin-top: -34px;margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                            @if(!empty($data['rows']->days))
                                @foreach(json_decode($data['rows']->days, true) as $key=>$day)
                                    <div class="form-group">
                                        <div class="input-group control-group increment-days row">
                                            <input type="text" class="form-control rounded col-3" value="{{ !empty($day['day']) ? $day['day'] : 'Day ' . ($key + 1) }}" name="days[{{ $key }}][day]" placeholder="Day">
                                            <input type="text" class="form-control rounded col-9" name="days[{{ $key }}][days_title]" value="{{ !empty($day['days_title']) ? $day['days_title'] : '' }}" placeholder="Day Title"><br>
                                            @if($key == 0)
                                                <button class="btn btn-success btn-days btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                            @endif
                                            <div class="input-group-btn"></div>
                                        </div>
                                        <div class="input-group control-group increment-days row mt-1">
                                            <textarea class="form-control rounded col-12" name="days[{{ $key }}][days_descriptions]" placeholder="Description">{{ !empty($day['days_descriptions']) ? $day['days_descriptions'] : '' }}</textarea>
                                        </div>
                                        @if($key > 0)
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
                            @endif
                        <div class="days-block"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
                {{-- FAQ --}}
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
                            {{-- <button class="btn btn-success btn-faq btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add FAQ</button> --}}
                            <div class="panel-body">
                                @if(old('faq'))
                                    @foreach (old('faq') as $index => $faq)
                                        <div class="form-group faq">
                                            <div class="input-group control-group increment-days row">
                                                <input type="text" class="form-control rounded col-3" value="Question {{ $index + 1 }}" name="faq[{{ $index }}][question]" placeholder="Question">
                                                <input type="text" class="form-control rounded col-9" name="faq[{{ $index }}][question]" value="{{ $faq['question'] ?? '' }}" placeholder="Question Title"><br>
                                                @if($index == 0)
                                                    <button class="btn btn-success btn-faq btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                                @endif
                                            </div>
                                            <div class="input-group control-group increment-days row mt-1">
                                                <textarea class="form-control rounded col-12" name="faq[{{ $index }}][ans]" placeholder="Answer">{{ $faq['ans'] ?? '' }}</textarea>
                                            </div>
                                            @if($index > 0)
                                                <button class="btn btn-danger btn-remove-faq" style="float: right;margin-top: -34px;margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    @if(!empty($data['rows']->faqs))
                                        @foreach(json_decode($data['rows']->faqs, true) as $key => $faq)
                                            <div class="form-group faq">
                                                <div class="input-group control-group increment-days row">
                                                    <input type="text" class="form-control rounded col-3" value="{{ !empty($faq['question']) ? $faq['question'] : 'Question ' . ($key + 1) }}" name="faq[{{ $key }}][question]" placeholder="Question">
                                                    <input type="text" class="form-control rounded col-9" name="faq[{{ $key }}][question]" value="{{ !empty($faq['question']) ? $faq['question'] : '' }}" placeholder="Question Title"><br>
                                                    @if($key == 0)
                                                        <button class="btn btn-success btn-faq btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                                    @endif
                                                </div>
                                                <div class="input-group control-group increment-days row mt-1">
                                                    <textarea class="form-control rounded col-12" name="faq[{{ $key }}][ans]" placeholder="Answer">{{ !empty($faq['ans']) ? $faq['ans'] : '' }}</textarea>
                                                </div>
                                                @if($key > 0)
                                                    <button class="btn btn-danger btn-remove-faq" style="float: right;margin-top: -34px;margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group faq">
                                            <div class="input-group control-group increment-days row">
                                                <input type="text" class="form-control rounded col-3" value="Question 1" name="faq[0][question]" placeholder="Question">
                                                <input type="text" class="form-control rounded col-9" name="faq[0][question]" placeholder="Question Title"><br>
                                                <button class="btn btn-success btn-faq btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add FAQ</button>
                                            </div>
                                            <div class="input-group control-group increment-days row mt-1">
                                                <textarea class="form-control rounded col-12" name="faq[0][ans]" placeholder="Answer"></textarea>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                <div class="faq-block"></div>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- Videos --}}
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
                                            <div class="input-group control-group increment-days row">
                                                <input type="url" class="form-control rounded col-8" name="video_link[{{ $index }}]" value="{{ old('video_link.'.$index) }}" placeholder="Video Link"><br>
                                                <input type="file" class="form-control rounded col-4" name="video_thumbnail[{{ $index }}]" placeholder="Thumbnail" accept="image/*"><br>

                                            </div>

                                            @if($index > 0)
                                                <button class="btn btn-danger btn-remove-video" style="float: right; margin-top: -34px; margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                            @endif
                                            <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                                                @if(!empty(old('video_thumbnail.'.$index)) && file_exists(public_path(old('video_thumbnail.'.$index))))
                                                    <img src="{{ asset(old('video_thumbnail.'.$index)) }}" alt="blog video thumbnail" height="50" width="100">
                                                @else
                                                    <p>No Image Uploaded</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @if(!empty($data['rows']->videos))
                                        @foreach(json_decode($data['rows']->videos, true) as $key => $video)
                                            <div class="form-group video">
                                                <div class="input-group control-group increment-days row">
                                                    <input type="url" class="form-control rounded col-12" name="video_link[{{ $key }}]" value="{{ !empty($video['link']) ? $video['link'] : '' }}" placeholder="Video Link"><br>
                                                    @if($key == 0)
                                                    <button class="btn btn-success btn-video btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                                @endif
                                                </div>

                                                @if($key > 0)
                                                    <button class="btn btn-danger btn-remove-video" style="float: right; margin-top: -34px; margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                                @endif
                                                <div class="input-group control-group increment-days row mt-1" >
                                                    <input type="file" class="form-control rounded col-10" name="video_thumbnail[{{ $key }}]" placeholder="Thumbnail" accept="image/*"><br>

                                                    @if(!empty($video['thumbnail']) && file_exists(public_path($video['thumbnail'])))
                                                        <img src="{{ asset($video['thumbnail']) }}" alt="blog video thumbnail" height="50" width="100">
                                                    @else
                                                        <p>No Image Uploaded</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group video">
                                            <div class="input-group control-group increment-days row">
                                                <input type="url" class="form-control rounded col-8" name="video_link[0]" placeholder="Video Link"><br>
                                                <input type="file" class="form-control rounded col-4" name="video_thumbnail[0]" placeholder="Thumbnail" accept="image/*"><br>
                                                <button class="btn btn-success btn-video btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add Video</button>
                                            </div>
                                            <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                                                <p>No Image Uploaded</p>
                                            </div>
                                        </div>
                                    @endif
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
                                <textarea name="more_info" cols="30" rows="9" class="form-control rounded summernote">{{ old('description', $data['rows']->more_details) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>


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
                                @if(!empty($data['rows']->blogImages))
                                    <div class="row">
                                        @foreach($data['rows']->blogImages as $key => $image)
                                            <div class="col-md-2 mb-4 img-box">

                                                        <a href="{{ asset($image->image_path) }}">
                                                            <img src="{{ asset($image->image_path) }}" alt="Blog Image" class="card-img-top img-thumbnail">
                                                            </a>
                                                        <a class="btn btn-danger btn-sm delete-image" data-id="{{ $image->id }}">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>

                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No images available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- images --}}
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add More Images</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <div id="image-picker"></div>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/spartan-multi-image-picker/dist/js/spartan-multi-image-picker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        //summernote
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 180
            });
        });
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

@php
    $days = json_decode($data['rows']->days, true);
    $dayCount = is_array($days) ? count($days) : 1;
@endphp
<script>
    $(document).ready(function() {
    let dayCounter = {{ $dayCount + 1 }}; // Start from Day 2 as Day 1 is already in the HTML

    // Add Days
    $(".btn-days").click(function() {
        var counter = 1;
        let dayHtml = `
            <div class="form-group">
                <div class="input-group control-group increment-days row">
                    <input type="text" class="form-control rounded col-3" value="Day ${dayCounter}" name="days[${counter}][day]" placeholder="Day" >
                    <input type="text" class="form-control rounded col-9" name="days[${dayCounter}][title]" placeholder="Day Title">
                </div>
                <button class="btn btn-danger btn-remove-days" style="float: right;margin-top: -34px;margin-right: -21px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                <div class="input-group control-group increment-days row mt-1">
                    <textarea class="form-control rounded col-12 form-group" name="days[${dayCounter}][day_descriptions]" placeholder="Description"></textarea>
                </div>
            </div>`;
        $(".days-block").append(dayHtml);
        counter++;
        dayCounter++;
    });

    // Remove Days
    $("body").on("click", ".btn-remove-days", function() {
        $(this).closest(".form-group").remove();
        renumberDays(); // Renumber days after removal
    });

    // Function to Faq
    $(".btn-faq").click(function() {
        var counter = 1;
        let dayHtml = `
            <div class="form-group">
                <div class="input-group control-group">
                    <input type="text" class="form-control rounded" name="faq[${counter}][question]" placeholder="Faq Question">
                </div>
                <button class="btn btn-danger btn-remove-faq" style="float: right;margin-top: -34px;margin-right: -30px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                    <textarea class="form-control rounded col-12 form-group" name="faq[${counter}][ans]" placeholder="Ans"></textarea>
                </div>
            </div>`;
        $(".faq-block").append(dayHtml);
        counter++;
    });

    // Remove Faq
    $("body").on("click", ".btn-remove-faq", function() {
        $(this).closest(".form-group").remove();
    });


    // Function to Video Upload
    $(".btn-video").click(function() {
        var counter = 1;
        let dayHtml = `
            <div class="form-group">
                <div class="input-group control-group">
                    <input type="url" class="form-control rounded" name="video_link[]" placeholder="Video Link">
                </div>
                <button class="btn btn-danger btn-remove-faq" style="float: right;margin-top: -34px;margin-right: -30px;" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                <div class="input-group control-group increment-days row mt-1" style="margin-left:0">
                    <input type="file" class="form-control rounded" name="video_thumbnail[]" placeholder="Video Thumbnail" accept="image/*">
                </div>
            </div>`;
        $(".video-block").append(dayHtml);
        dayCounter++;
    });

    // Remove Faq
    $("body").on("click", ".btn-remove-video", function() {
        $(this).closest(".form-group").remove();
    });

    // Function to renumber days
    function renumberDays() {
        let index = 2; // Start numbering from 1
        $(".days-block .form-group").each(function() {
            $(this).find("input[name='days[]']").val(`Day ${index}`);
            index++;
        });
    }
});
</script>


<script>
    $(function () {
        $("#image-picker").spartanMultiImagePicker({
            fieldName: 'images[]',
            maxCount: 5,
            rowHeight: '100px',
            groupClassName: 'col-spart', // Class name for each image group
            maxFileSize: '',
            placeholderImage: {
                image: 'https://via.placeholder.com/200',
                width: '100%'
            },
            dropFileLabel: "Drop Here",
            onExtensionErr: function (index, file) {
                console.log(index, file, 'extension err');
                alert('Please only input png or jpg type file');
            },
            onSizeErr: function (index, file) {
                console.log(index, file, 'file size too big');
                alert('File size too big');
            }
        });
});

</script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            tabsize: 2,
            height: 180
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle delete button click
        $(document).on('click', '.delete-image', function() {
            const imageId = $(this).data('id');
            const imageElement = $(this).closest('.img-box');

            // Show confirmation dialog
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '{{ url("admin/post/delete-blog-image") }}/'+imageId, // Adjust this route as needed
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: imageId
                    },
                    success: function(response) {
                        imageElement.remove();
                        alert('Image deleted successfully!');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('Failed to delete image.');
                    }
                });
            }
        });
    });


</script>
@endsection
