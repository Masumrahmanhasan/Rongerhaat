@extends(saLayout())

@section('content')
    <section class="content-header">
        {{-- <button type="button" class="btn btn-success add_chart_btn get_form" data-id="" data-type="save" data-href="{{ saRoute('about.create') }}">Add New Chart</button> --}}
        <h1>About Manage</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="ajax_link" href="{{ saRoute('dashboard') }}">
                    <i class="fa fa-dashboard br_dash"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active br_active">About Manage</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Load Form -->
            <div id="modal" data-iziModal-title="About Manage" data-iziModal-subtitle="About Manage" data-iziModal-icon="icon-user"></div>
            <div id="load_form"></div>


            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">About List</h3>
                    </div>
                    
                    <div class="box-body">
                        <!-- Load Table -->
                        <div id="load_list">
                            <div class="table-responsive-md table_wrap">
                                <table id="dataTable" class="table table-hover no-wrap">
                                    <thead class="table_head">
                                        <tr>
                                            <td align="left">SL</td>
                                            <td align="left">Title</td>
                                            <td align="left">Heading</td>
                                            <td align="center">Image</td>
                                            <td align="left">Description</td>
                                            <td align="center">Status</td>
                                            <td align="right">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="table_data">
                                        @foreach($about as $key => $v)
                                            <tr>
                                                <td align="left">{{ $key+1 }}</td>
                                                <td align="left" title="{{ $v->title }}">{{ substr($v->title, 0, 10) }}...</td>
                                                <td align="left" title="{{ $v->heading }}">{{ substr($v->heading, 0, 10) }}...</td>
                                                <td align="center">
                                                    <img src="{{ source('upload/about/'.$v->image) }}" width="130" height="120" alt="image">
                                                </td>
                                                <td align="left" title="{{ $v->description }}">{{ substr($v->description, 0, 10) }}...</td>
                                                <td align="center">
                                                    @if($v->status == 1)
                                                        <span class="badge badge-pill badge-success badge-theme status_1 st">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning status_0 st disabled">Inactive</span>
                                                    @endif
                                                </td>
                                                <td align="right">
                                                    <button type="button" class="btn btn-sm btn-success-outline edit_btn" data-id="{{ $v->id }}" data-type="edit" data-href="{{ saRoute('about.create') }}">
                                                        <i class="ti-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    {{-- <button type="button" class="btn btn-sm btn-danger-outline del_btn" data-href="{{ saRoute('about.destroy') }}" data-id="{{ $v->id }}">
                                                        <i class="ti-trash" aria-hidden="true"></i>
                                                    </button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection