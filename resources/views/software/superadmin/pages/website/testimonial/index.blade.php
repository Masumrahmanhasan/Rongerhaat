@extends(saLayout())

@section('content')
    <section class="content-header">
        <button type="button" class="btn btn-success add_chart_btn get_form" data-id="" data-type="save" data-href="{{ saRoute('testimonial.create') }}">Add New Chart</button>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="ajax_link" href="{{ saRoute('dashboard') }}">
                    <i class="fa fa-dashboard br_dash"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active br_active">Testimonial Manage</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- Load Form -->
            <div id="modal" data-iziModal-title="Testimonial Manage" data-iziModal-subtitle="Testimonial Manage" data-iziModal-icon="icon-energy"></div>
            <div id="load_form"></div>


            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Testimonial List</h3>
                    </div>
                    
                    <div class="box-body">
                        <!-- Load Table -->
                        <div id="load_list">
                            <div class="table-responsive-md table_wrap">
                                <table id="dataTable" class="table table-hover no-wrap">
                                    <thead class="table_head">
                                        <tr>
                                            <td align="left">SL</td>
                                            <td align="left">Name</td>
                                            <td align="left">Designation</td>
                                            <td align="center">Image</td>
                                            <td align="left">Description</td>
                                            <td align="center">Status</td>
                                            <td align="right">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="table_data">
                                        @foreach($testimonial as $key => $v)
                                            <tr>
                                                <td align="left">{{ $key+1 }}</td>
                                                <td align="left">{{ substr($v->name, 0, 10) }}...</td>
                                                <td align="left">{{ substr($v->designation, 0, 10) }}...</td>
                                                <td align="center">
                                                    <img src="{{ source('upload/testimonial/'.$v->image) }}" width="80" height="80" alt="image">
                                                </td>
                                                <td align="left" title="{{ $v->description }}">{{ substr($v->description, 0, 20) }}...</td>
                                                <td align="center">
                                                    @if($v->status == 1)
                                                        <span class="badge badge-pill badge-success badge-theme status_1 st">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning status_0 st disabled">Inactive</span>
                                                    @endif
                                                </td>
                                                <td align="right">
                                                    <button type="button" class="btn btn-sm btn-success-outline edit_btn" data-id="{{ $v->id }}" data-type="edit" data-href="{{ saRoute('testimonial.create') }}">
                                                        <i class="ti-pencil" aria-hidden="true"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-sm btn-danger-outline del_btn" data-href="{{ saRoute('testimonial.destroy') }}" data-id="{{ $v->id }}">
                                                        <i class="ti-trash" aria-hidden="true"></i>
                                                    </button>
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