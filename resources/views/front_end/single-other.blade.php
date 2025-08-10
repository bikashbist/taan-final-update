@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="about-us gallery-page mb-3 ">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="{{ asset('assets/site/images/layout-img/page-title.webp') }}" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                <h1 class="text-white">@if(isset($data['row']->title)) {{ $data['row']->title }} @endif</h1>
            </div>
            <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png') }}"
                alt="icon">
        </div>
    </div>

</section>

<section class="main-content mt-lg-4">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="main-content__details">
                    <div class="trail-details">
                        <div class="page_content">
                            @if(isset($data['row']->thumbnail))
                            <img class="mb-3 "
                                src="{{ asset($data['row']->thumbnail) }}"
                                alt="img">
                            @else
                            <p>Image Not Found's !</p>
                            @endif
                            <blockquote>
                                <p> @if(isset($data['row']->description))
                                    {!! $data['row']->description !!}
                                    @endif
                                </p>
                            </blockquote>
                            <blockquote>
                                <!-- Video Section -->
                                @if(isset($data['row']->video_url) && $data['row']->video_url != null)
                                <a href="https://www.youtube.com/embed/<?php echo $data['row']->video_id; ?>">
                                    <iframe src="https://www.youtube.com/embed/<?php echo $data['row']->video_id; ?>" width="100%" height="400px" frameborder="0" allowfullscreen=""></iframe>
                                </a>
                                @endif

                            </blockquote>
                            <h4 class="p1"><span class="s1">Files</span></h4>
                            @if(count($data['file']) != 0)
                            <div class="download-assetsPanel">
                                @if(count($data['file']) != 0)
                                <table width="100%" border="0" class="table table-bordered table-striped">
                                    <thead class="bg-primary fs-6">
                                        <tr>
                                            <th scope="col">S.N</th>
                                            <th scope="col">Title</th>
                                            <th scope="col"> Download Count </th>
                                            <th scope="col">View & Downlo </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['file'] as $key=>  $row)
                                        <tr>
                                            <td>{{ $key+1 }}.</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->download_count   }}</td>
                                            <td>
                                                <a href="{{ asset( $row->file) }}" class="btn btn-sm btn-info"><i class="fa fa-eye">&nbsp;</i> View</a>&nbsp;
                                                <a href="{{ route('site.file.download', ['id'=> $row->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-download">&nbsp;</i> Download</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            @else
                            <p>Files Not Found's !</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="main-content__sidebar">
                    <div class=" sidebar sidebar-border trail-details-sidebar mb-4  ">
                        <h3>Related Post </h3>
                        <div class="sidebar__package p-4">
                            <ul class="posts blog withthumb ">
                                @if(isset($data['related_post']) && count($data['related_post']) > 0)
                                @foreach($data['related_post'] as $row)
                                <li class="mb-3">
                                    <div class="post_circle_thumb">
                                        <a href="{{ route('site.other.show', ['id'=> $row->post_unique_id]) }}"><img class="alignleft frame post_thumb"
                                                src="{{ asset($row->thumbnail)}} "
                                                alt="img"></a>
                                    </div><a href="{{ route('site.other.show', ['id'=> $row->post_unique_id]) }}">{{ $row->title }}</a>
                                    <div class="post_attribute">{{ \Carbon\Carbon::parse($row->created_at)->format('jS F Y') }}</div>
                                </li>
                                @endforeach
                                @else
                                <p>Related Post Not Found's !</p>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection