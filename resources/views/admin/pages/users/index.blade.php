@extends('admin.layouts.master')
@section('content')

    <!-- Advanced Search -->
    <section id="advanced-search-datatable">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">User</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active">View User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include ('components.flash-messages')

        <section id="advanced-search-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i class="fas fa-arrow-circle-left"></i> Back</a>
                            <div class="col-sm-10 mt-1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ol class="breadcrumb float-sm-right">
                                            <li style="margin: 2px;">
                                            <a class="btn btn-info btn-sm" href="{{ route('common.export',['extension'=>'csv','type'=>'admin']) }}">
                                                <i data-feather='file-text'></i> CSV</a>
                                            </li>
                                            <li style="margin: 2px;">
                                                <a class="btn btn-secondary btn-sm" href="{{ route('common.export',['extension'=>'xlsx','type'=>'admin']) }}">
                                                <i data-feather='download'></i> Excel</a>
                                            </li>
                                            <li style="margin: 2px;">
                                                <a class="btn btn-primary btn-sm" href="javascript:void(0)" onclick="showModal(' for Admin','admin')">
                                                <i data-feather='upload'></i> Import</a>
                                            </li>
                                            <li style="margin: 2px;">
                                            <a class="btn btn-danger btn-sm" href="{{ route('common.print',['action'=>'pdf','api'=>'admin']) }}" target="_blank">
                                            <i data-feather='file'></i> PDF</a></li>
                                            <li style="margin: 2px;">
                                            <a class="btn btn-warning btn-sm" href="{{ route('common.print',['action'=>'print','api'=>'admin']) }}" target="_blank">
                                            <i data-feather='printer'></i> Print</a></li>
                                            <li style="margin: 2px;"><a class="btn btn-primary btn-sm" href="{{ route('user.index') }}"><i data-feather='eye'></i> View</a></li>
                                            <li style="margin: 2px;"><a class="btn btn-dark btn-sm" href="{{ route('user.create') }}"><i data-feather='plus'></i> Create</a></li>
                                            <li style="margin: 2px;"><div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Column</button>
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                    >
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Name</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Email</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Phone</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Address</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> User Type</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Status</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><input name="checkbox" type="checkbox" readonly="readonly"/> Social Links</a>
                                                        <div class="col-md-12 p-1">
                                                            <button class="btn btn-sm btn-primary btn-block">Apply</button>
                                                        </div>
                                                    </div>
                                                </div></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Search Form -->
                        <div class="card-body mt-2">
                            <form class="dt_adv_search" method="POST">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-row mb-1">
                                            <div class="col-lg-2">
                                                <label>Name:</label>
                                                <input type="text"  class="form-control" />
                                            </div>
                                            <div class="col-lg-2">
                                                <label>User Type:</label>
                                                <select class="form-control" name="status">
                                                    <option value="">Select Type</option>
                                                    <option value="In Progress">Admin</option>
                                                    <option value="Pending">Driver</option>
                                                    <option value="Delivered">User</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <label>Status:</label>
                                                <select class="form-control" name="status">
                                                    <option value="">Select Status</option>
                                                    <option value="Processing">Active</option>
                                                    <option value="Picked">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-2">
                                                <label>From Date</label>
                                                <input type="date"  class="form-control" name="from" />
                                            </div>
                                            <div class="col-lg-2">
                                                <label>To Date</label>
                                                <input type="date"  class="form-control" name="to" />
                                            </div>
                                            <div class="col-lg-2" style="margin-top:22px;">
                                                <input type="submit"  class="btn btn-success btn-sm" name="submit" value="Search" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="my-0" />
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered table-responsive common-datatables" style="width:100%; padding: 10px">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th><input name="checkbox" onclick='checkedAll();' type="checkbox" readonly="readonly" /></th>
                                    <th>Action</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                    <th>User Type</th>
                                    <th>Status</th>
                                    <th>Social Links</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($users!="")
                                    @foreach($users as $response)
                                        <tr id="tablerow{{ $response->id }}">
                                        <td>{{ $response->id }}</td>
                                        <td><input type="checkbox"  name="summe_code[]" id="summe_code" value="{{ $response->id }}" /></td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('user.show',$response->id) }}"><i data-feather='eye'></i></a>
                                            <a href="{{ route('user.edit',$response->id) }}"><i data-feather='edit'></i></a>
                                            <!--<a href="{{ route('user.destroy',$response->id) }}"><i data-feather='trash-2'></i></a>
                                            <a href="{{ url('common/delete/') }}?id={{ $response->id }}&&api=users&&type=single"><i data-feather='trash-2'></i></a>-->
                                            <a href="#" onclick="singleDelete({{ $response->id }},'admin');"><i data-feather='trash-2'></i></a>
                                            <a href="#"><i data-feather='more-vertical'></i></a>
                                        </td>
                                        <td>{{ $response->name }}</td>
                                        <td>{{ $response->email }}</td>
                                        <td>{{ $response->phone }}</td>
                                        <td>{{ $response->present_address }}</td>
                                        <td>{{ $response->permanent_address }}</td>
                                        <td><button class="btn btn-sm btn-primary">df</button></td>
                                        <td><button class="btn btn-sm btn-success">Active</button></td>
                                        <td><span><i data-feather='facebook'></i></span></td>
                                    </tr>
                                    @endforeach
                                @endif

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--/ Advanced Search -->


@endsection

@section('page-script')
@endsection

