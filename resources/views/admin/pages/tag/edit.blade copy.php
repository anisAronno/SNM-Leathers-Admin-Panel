@extends('admin.layouts.master')
@section('prefixname', $prefixname)
@section('title', $title)
@section('page_title', $page_title)
@section('content')
    <div class="row">
        <div class="col s12">
            <div id="input-fields" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Edit</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                <ul class="tab">
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('tag.index') }}">List</a></li>
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('tag.create') }}">Add</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="view-input-fields">
                        <div class="row">
                            <div class="col s12">
                                @if ($message = Session::get('success'))
                                    <div class="card-alert card green">
                                        <div class="card-content white-text">
                                            <p>SUCCESS : {{ $message }}</p>
                                        </div>
                                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                                @if ($message = Session::get('failed'))
                                    <div class="card-alert card red">
                                        <div class="card-content white-text">
                                            <p>DANGER : {{ $message }}</p>
                                        </div>
                                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif

                                <form class="row" action="{{ route('tag.update', $tag->id) }}" method="POST" enctype="multipart/form-data" files="true">
                                    @csrf
                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Bangla Name" id="nameBn" value="{{ $tag->nameBn }}" type="text" name="nameBn" class="validate @error('nameBn') validate @enderror">
                                            <label for="first_name1">Bangla Name</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('nameBn') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter English Name" value="{{ $tag->nameEn }}" id="nameEn" type="text" name="nameEn" class="validate">
                                            <label for="first_name1">English Name</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('nameEn') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <select name="status">
                                            <option {{ $tag->status==1 ? "selected" : '' }} value="1">Active</option>
                                            <option {{ $tag->status==0 ? "selected" : '' }} value="0">Deactive</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('custom-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/dropify/css/dropify.min.css')}}">
@endpush
@push('custom-js')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('admin/app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/form-file-uploads.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/ui-alerts.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
@endpush
