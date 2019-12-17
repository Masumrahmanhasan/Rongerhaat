@extends(saLayout())

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form common_form" action="{{ saRoute('basic.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="">
                                        <div class="row form_box">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form_heading">Title</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <input class="form-control prompt" type="text" name="title" id="title" value="{{ $value->title ?? '' }}" required>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form_heading">Website Name</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <input class="form-control prompt" type="text" name="name" id="name" value="{{ $value->name ?? '' }}" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row form_box">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Phone</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <input class="form-control prompt" name="phone" id="phone" value="{{ $value->phone ?? '' }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Email</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                     <input class="form-control prompt" type="email" name="email" id="email" value="{{ $value->email ?? '' }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Address</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <input class="form-control prompt" name="address" id="address" value="{{ $value->address ?? '' }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form_heading">Logo</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <span class="pull-right text-success">{{ $value->logo ?? '' }}</span>
                                                    <input class="form-control prompt file" type="file" name="logo" id="logo" {{ (isset($value)) ? '' : 'required' }} onchange="img_valid($(this));">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form_heading">Copyright Name</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                     <input class="form-control prompt" type="text" name="copy_name" id="copy_name" value="{{ $value->copy_name ?? '' }}" required>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form_heading">Copyright Link</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <input class="form-control prompt" name="copy_link" id="copy_link" value="{{ $value->copy_link ?? '' }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form_heading">Copyright Year</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                     <input class="form-control prompt" type="number" name="copy_year" id="copy_year" value="{{ $value->copy_year ?? '' }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form_heading">Footer Description</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <textarea class="form-control desc_prompt" name="footer_desc" id="footer_desc" required>{{ $value->footer_desc ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="row form_box">
                                            <div class="col-md-12 form-group">
                                                <label class="form_heading">Status</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                <select class="form-control prompt nice_select wide" name="status" id="status" required>
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div> --}}

                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" id="id" value="{{ $value->id ?? '' }}">

                                                <button class="btn btn-outline-info round mr-1 mb-1 waves-effect waves-light save" type="submit" id="submit"><?php echo (isset($value)) ? 'Update' : 'Save'; ?></button>

                                                <a href="{{ saRoute('basic.index') }}" class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light cancel">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $('#status').val({{ $value->status ?? 1 }});
    </script>
@endsection 
