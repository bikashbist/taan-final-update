@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-left mb-4">
        <a href="{{route( $_base_route.'.index' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm btn-xs"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;
        <a href="{{ URL::route($_base_route.'.addPhoto',[$data['row']->id] ) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm btn-xs"><i class="fa fa-plus" aria-hidden="true"></i> Add Photos to Album</a>&nbsp;
        <a href="{{ URL::route($_base_route.'.edit', [$data['row']->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm btn-xs"><i class="fa fa-pencil"></i>&nbsp;Edit Album</button></a>
    </div>
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ $_panel }}</div>
        </div>
        <div class="ibox-body">
            <div class="tab-content">
                <aside class="profile-nav alt green-border">
                    <section class="panel">
                        <div class="user-heading alt green-bg">
                            <a href="#">
                                @if(isset($data['row']->image))
                                <img src="{{ $data['row']->image }}" height="100" width="100" alt="img04">
                                @else
                                <img src="{{ asset('assets/img/placeholder.jpg') }}" height="100" width="100" alt="img04">
                                @endif
                            </a>
                            <h4>{{ $data['row']->title }}</h4>
                            <p><strong>Status:</strong> <span class="badge badge-{{ ($data['row']->status == 1) ? 'success' : 'warning'}} badge-pill m-r-5 m-b-5">{{ ($data['row']->status == 1) ? 'Published' : 'Unpublished'}}</span>
                            </p>
                        </div>
                    </section>
                </aside>
                <div class="row">
                    @if(isset($data['row']->photos)&& count($data['row']->photos) > 0)
                    @foreach($data['row']->photos as $row)
                    <figure class="col-md-2">
                        <a class="fancybox" rel="group" href="{{ asset($row->image)}}">
                            <img src="{{ asset($row->image)}}" height="100" width="100" alt="img04">
                        </a>
                        <figcaption>
                            <div class="pull-left">
                                @if(Route::has($_base_route.'.destroyPhoto'))
                                <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route('admin.gallery.destroyPhoto', $row->id) }}" style="cursor:pointer;"><i class="fa fa-trash font-14"></i></button>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                    @endforeach
                    @else
                    <div class="col-md-12">
                        <div class=" alert-warning">
                            <strong>Warning!</strong> No photos found in this album.
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection