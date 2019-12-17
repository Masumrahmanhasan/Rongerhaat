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
                            <form class="form common_form" action="{{ saRoute('social.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="">
                                        <div class="row form_box">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Icon</label><i class="fa fa-star fill"></i>
                                                    <a class="pull-right text-success" target="_blank" href="https://fontawesome.com/v4.7.0/icons/">See Icon List</a>
                                                    <input class="form-control prompt" type="text" name="icon" id="icon" placeholder="Font-awesome Icon (fa fa-icon)" required value="{{ $value->icon ?? '' }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form_heading">Url</label><i class="fa fa-star fill" aria-hidden="true"></i>
                                                    <input class="form-control prompt" type="url" name="url" id="url" required value="{{ $value->url ?? '' }}">
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
                                                <input type="hidden" name="id" id="id" value="{{ $value->id ?? '' }}">

                                                <button class="btn btn-outline-info round mr-1 mb-1 waves-effect waves-light save" type="submit" id="submit"><?php echo (isset($value)) ? 'Update' : 'Save'; ?></button>

                                                <a href="{{ saRoute('social.index') }}" class="btn btn-outline-danger round mr-1 mb-1 waves-effect waves-light cancel">Back</a>
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
