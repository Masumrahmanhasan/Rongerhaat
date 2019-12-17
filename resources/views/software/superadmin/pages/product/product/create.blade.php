@extends(saLayout())

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Manage</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form common_form" action="{{ saRoute('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="">
                                        <div class="row form_box">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Select Category</label><i class="fa fa-star fill"></i>
                                                    <select class="form-control prompt nice_select wide" name="cat_id" id="cat_id" required style="width: 100%;">
                                                        @foreach ($categories as $key => $v)
                                                            <option value="{{ $v->id }}" {{ (isset($value) && $value->cat_id == $v->id) ? 'selected' : '' }}>{{ $v->cat_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Select Sub-Category</label><i class="fa fa-star fill"></i>
                                                    <select class="form-control prompt nice_select wide" name="sub_cat_id" id="sub_cat_id" required style="width: 100%;">
                                                        @foreach ($sub_categories as $key => $v)
                                                            <option value="{{ $v->id }}" {{ (isset($value) && $value->sub_cat_id == $v->id) ? 'selected' : '' }}>{{ $v->sub_cat_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form_heading">Select Brand</label><i class="fa fa-star fill"></i>
                                                    <select class="form-control prompt nice_select wide" name="brand_id" id="brand_id" required style="width: 100%;">
                                                        @foreach ($brand as $key => $v)
                                                            <option value="{{ $v->id }}" {{ (isset($value) && $value->brand_id == $v->id) ? 'selected' : '' }}>{{ $v->br_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form_heading">Name</label><i class="fa fa-star fill"></i>
                                                    <input class="form-control prompt" type="text" name="name" id="name" value="{{ $value->name ?? '' }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form_heading">Image</label><i class="fa fa-star fill"></i> 
                                                @if (isset($value))
                                                    <div class="row">
                                                        @foreach ($value->productImg as $v)
                                                            <div class="col-md-3">
                                                                <img src="{{ source('upload/products/100x100'.$v->image) }}" style="width: 50px; height: 50px; margin: 5px;">

                                                                <i class="btn btn-icon fa fa-trash-o rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light del_btn acc_btn" data-href="{{ saRoute('product.image.destroy') }}" data-id="{{ $v->id }}">
                                                                </i>

                                                                <input class="form-control prompt file" type="file" name="image{{ $v->id }}" id="image{{ $v->id }}" onchange="img_valid($(this));">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <br>
                                                    <div class="dropzone dropzone-area" id="dropzone">
                                                        <div class="dz-message">Drop Files Here To Upload</div>
                                                    </div>
                                                <br>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Price</label><i class="fa fa-star fill"></i>
                                                    <input class="form-control prompt" type="number" name="price" id="price" value="{{ $value->price ?? '' }}" required min="1">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Discount</label><i class="fa fa-star fill"></i>
                                                    <input class="form-control prompt" type="number" name="discount" id="discount" value="{{ $value->discount ?? '0' }}" min="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form_heading">Description</label><i class="fa fa-star fill"></i>
                                                    <textarea class="form-control desc_prompt" name="description" id="description" required>{{ $value->description ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12 form-group">
                                                <label class="form_heading">Status</label><i class="fa fa-star fill"></i>
                                                <select class="form-control prompt nice_select wide" name="status" id="status" required>
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <div class="dzImg"></div>
                                                <input type="hidden" name="id" id="id" value="{{ $value->id ?? '' }}">

                                                <button class="btn btn-outline-info round mr-1 mb-1 waves-effect waves-light save" type="submit" id="submit"><?php echo (isset($value)) ? 'Update' : 'Save'; ?></button>

                                                <a href="{{ saRoute('product.index') }}" class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light cancel">Back</a>
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

        var myDropzone = $("#dropzone").dropzone({
            url: "{{ saRoute('product.dropzone') }}",
            // previewsContainer: ".dropzone-previews",
            params: 'file',
            paramName: "file",
            // maxFilesize: 1,
            // addRemoveLinks: !0,
            // dictRemoveFile: " Trash",
            acceptedFiles: 'image/*',
            uploadMultiple: true,
            parallelUploads: 10,
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("_token", "{{ csrf_token() }}");
                });
                this.on("success", function(file, responseText) {
                    $('.dzImg').html(responseText);
                    // console.log(responseText);
                });
            }
        });
    </script>
@endsection 
