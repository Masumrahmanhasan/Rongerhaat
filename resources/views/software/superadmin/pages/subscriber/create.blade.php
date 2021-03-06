<form class="form" name="common_form" id="common_form" action="{{ saRoute('subscriber.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Title</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="email" name="email" id="email" required value="{{ $value->email ?? '' }}">
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
    // $('.nice_select').niceSelect();
</script>