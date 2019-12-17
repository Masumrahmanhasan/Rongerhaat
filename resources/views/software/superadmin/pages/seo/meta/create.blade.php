<form class="form" name="common_form" id="common_form" action="{{ saRoute('seo.meta.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="">
        @if (!isset($value))
            <div class="row form_box">
                <div class="col-md-12 form-group">
                    <label class="form_heading">Select Page</label><i class="fa fa-star fill" aria-hidden="true"></i>
                    <select class="form-control prompt nice_select wide" name="page_key" id="page_key" required="" style="width: 100%;">
                        @if (!\App\Model\SeoMeta::where('page_key', 'home')->first())
                            <option value="home" {{ (isset($value) && $value->page_key == 'home') ? 'selected' : '' }}>Home</option>
                        @endif

                        @if (!\App\Model\SeoMeta::where('page_key', 'about')->first())
                            <option value="about" {{ (isset($value) && $value->page_key == 'about') ? 'selected' : '' }}>About</option>
                        @endif

                        @if (!\App\Model\SeoMeta::where('page_key', 'all-blogs')->first())
                            <option value="all-blogs" {{ (isset($value) && $value->page_key == 'all-blogs') ? 'selected' : '' }}>All Blogs</option>
                        @endif

                        {{-- @foreach ($book as $key => $v)
                            @if (!\App\Model\SeoMeta::where('page_key', 'book-'.$v->post_id)->first())
                                <option value="book-{{ $v->post_id }}" {{ (isset($value) && $value->page_key == 'book-'.$v->post_id) ? 'selected' : '' }}>Book - {{ $v->post_id }} ({{ $v->name }})</option>
                            @endif
                        @endforeach

                        @foreach ($blog as $key => $v)
                            @if (!\App\Model\SeoMeta::where('page_key', 'blog-'.$v->post_id)->first())
                                <option value="blog-{{ $v->post_id }}" {{ (isset($value) && $value->page_key == 'blog-'.$v->post_id) ? 'selected' : '' }}>Blog - {{ $v->post_id }} ({{ $v->title }})</option>
                            @endif
                        @endforeach --}}
                    </select>
                </div>       
            </div>
        @else
            <h3 class="text-center text-success">Page: {{ $value->page_key }}</h3>
        @endif

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Meta Title</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <input class="form-control prompt" type="text" name="title" id="title" required value="{{ $value->title ?? '' }}">
            </div>

            <div class="col-md-12 form-group">
                <label class="form_heading">Meta Keywords</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <textarea class="form-control desc_prompt" name="keywords" id="keywords" rows="5" required>{{ $value->keywords ?? '' }}</textarea>
            </div>        
        </div>

        <div class="row form_box">
            <div class="col-md-12 form-group">
                <label class="form_heading">Meta Description</label><i class="fa fa-star fill" aria-hidden="true"></i>
                <textarea class="form-control desc_prompt" name="description" id="description" rows="5" required>{{ $value->description ?? '' }}</textarea>
            </div>

            {{-- <div class="col-md-12 form-group">
                <label class="form_heading">Others</label>
                <textarea class="form-control desc_prompt" name="others" id="others" rows="5">{{ $value->others ?? '' }}</textarea>
            </div> --}}
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
    $('#page_key').val({{ $value->page_key ?? 0 }});
    // $('.nice_select').niceSelect();
</script>