<form class="form" name="common_form" id="common_form" action="{{ saRoute('book.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Select Publisher</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <select class="form-control prompt nice_select wide" name="publisher_id" id="publisher_id" required="" style="width: 100%;">
                    @foreach ($publisher as $key => $v)
                        <option value="{{ $v->id }}" {{ (isset($value) && $value->publisher_id == $v->id) ? 'selected' : '' }}>{{ $v->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-12 form-group">
                <label class="form_heading">Name</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="name" id="name" required value="{{ $value->name ?? '' }}">
            </div>          
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Title</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="title" id="title" required value="{{ $value->title ?? '' }}">
            </div>

            <div class="col-md-12 form-group">
                <label class="form_heading">Heading</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="heading" id="heading" required value="{{ $value->heading ?? '' }}">
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
                <textarea class="form-control desc_prompt" name="description" id="description" rows="5" required>{{ $value->description ?? '' }}</textarea>
            </div>
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Meta Title</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="meta_title" id="meta_title" required value="{{ $value->meta_title ?? '' }}">
            </div>

            <div class="col-md-12 form-group">
                <label class="form_heading">Meta Keywords</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <textarea class="form-control desc_prompt" name="meta_keywords" id="meta_keywords" rows="3" required>{{ $value->meta_keywords ?? '' }}</textarea>
            </div>        
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Meta Description</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <textarea class="form-control desc_prompt" name="meta_desc" id="meta_desc" rows="3" required>{{ $value->meta_desc ?? '' }}</textarea>
            </div>

            {{-- <div class="col-md-12 form-group">
                <label class="form_heading">Meta Others</label>
                <textarea class="form-control desc_prompt" name="meta_others" id="meta_others" rows="3">{{ $value->meta_others ?? '' }}</textarea>
            </div> --}}
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Trending</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <select class="form-control prompt nice_select wide" name="trending" id="trending" required>
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select>
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
    </div>

    <div class="">
        <input type="hidden" name="id" id="id" value="{{ $value->id ?? '' }}">
        <button type="submit" name="submit" id="submit" class="btn btn-success save">{{ (isset($value)) ? 'Update' : 'Save' }}</button>
        <button type="button" class="btn btn-danger cancel float-right" data-izimodal-close>Cancel</button>
    </div>
</form>

<script type="text/javascript">
    $('#status').val({{ $value->status ?? 1 }});
    $('#trending').val({{ $value->trending ?? 0 }});
    // $('.nice_select').niceSelect();
</script>