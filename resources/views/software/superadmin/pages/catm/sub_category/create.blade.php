@extends(saLayout())

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sub-Category Manage</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form common_form" action="{{ saRoute('sub.category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="">
                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form_heading">Select Category</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <select class="form-control prompt nice_select wide" name="cat_id" id="cat_id" required style="width: 100%;">
                                                        @foreach ($categories as $key => $v)
                                                            <option value="{{ $v->id }}" {{ (isset($value) && $value->cat_id == $v->id) ? 'selected' : '' }}>{{ $v->cat_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" class="form_heading">Sub-Category Name</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <input class="form-control prompt" type="text" name="sub_cat_name" id="sub_cat_name" value="{{ $value->sub_cat_name ?? '' }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12 form-group">
                                                <label class="form_heading">Status</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                <select class="form-control prompt nice_select wide" name="status" id="status" required>
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form_box">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" id="id" value="{{ $value->id ?? '' }}">

                                                <button class="btn btn-outline-info round mr-1 mb-1 waves-effect waves-light save" type="submit" id="submit"><?php echo (isset($value)) ? 'Update' : 'Save'; ?></button>

                                                <a href="{{ saRoute('sub.category.index') }}" class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light cancel">Back</a>
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
