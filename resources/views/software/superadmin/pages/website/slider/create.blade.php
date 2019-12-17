<form class="form" name="common_form" id="common_form" action="{{ saRoute('slider.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Title</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="title" id="title" required value="{{ $value->title ?? '' }}">
            </div>

            <div class="col-md-12 form-group">
                <label class="form_heading">Sub-Title</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="sub_title" id="sub_title" required value="{{ $value->sub_title ?? '' }}">
            </div>
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Heading</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="heading" id="heading" required value="{{ $value->heading ?? '' }}">
            </div>

            <div class="col-md-12 form-group">
                <label class="form_heading">Sub-Heading</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="sub_heading" id="sub_heading" required value="{{ $value->sub_heading ?? '' }}">
            </div>
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Image</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <span class="pull-right text-success file_name l_img" style="padding:0px 5px;">{{ $value->image ?? '' }}</span>
                <input class="form-control prompt file" type="file" name="image" id="image" onchange="img_valid($(this));" {{ !isset($value) ? 'required' : '' }}>
            </div>
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Description</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <textarea class="form-control desc_prompt" type="text" name="description" id="description" rows="5" required>{{ $value->description ?? '' }}</textarea>
            </div>
        </div>

{{--         <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Status</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <select class="form-control prompt nice_select wide" name="status" id="status" required>
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div> --}}
    </div>

    <div class="">
        <input type="hidden" name="id" id="id" value="{{ $value->id ?? '' }}">
        <button type="submit" name="submit" id="submit" class="btn btn-success save">{{ (isset($value)) ? 'Update' : 'Save' }}</button>
        <button type="button" class="btn btn-danger cancel float-right" data-izimodal-close>Cancel</button>
    </div>
</form>

<script type="text/javascript">
    $('#status').val({{ $value->status ?? 1 }});
    // $('.nice_select').niceSelect();
</script>