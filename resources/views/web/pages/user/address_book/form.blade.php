<form action="{{ webRoute('user.address.book.store') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="col-lg-12">
        <h2 class="step-title">Shipping Address</h2><br>
        <div class="form_grid">
            <div class="row">
                <div class="col-lg-6 form-group required-field">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="s_name" value="{{ $sInfo->s_name ?? '' }}" required>
                </div>

                <div class="col-lg-6 form-group required-field">
                    <label>Street Address</label>
                    <input type="text" class="form-control" name="s_address" value="{{ $sInfo->s_address ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 form-group required-field">
                    <label>Country</label>
                    <input type="text" class="form-control" name="s_country" value="{{ $sInfo->s_country ?? '' }}" required>
                </div>
                
                <div class="col-lg-6 form-group required-field">
                    <label>City</label>
                    <input type="text" class="form-control" name="s_city" value="{{ $sInfo->s_city ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 form-group required-field">
                    <label>State/Province</label>
                    <input type="text" class="form-control" name="s_state" value="{{ $sInfo->s_state ?? '' }}" required>
                </div>
                
                <div class="col-lg-6 form-group required-field">
                    <label>Zip/Postal Code</label>
                    <input type="text" class="form-control" name="s_zip" value="{{ $sInfo->s_zip ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 form-group required-field">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="s_phone" value="{{ $sInfo->s_phone ?? '' }}" required>
                </div>                                            
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <h2 class="step-title">Billing Address</h2><br>
        <div class="form_grid">
            <div class="row">
                <div class="col-lg-6 form-group required-field">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="b_name" value="{{ $bInfo->b_name ?? '' }}" required>
                </div>

                <div class="col-lg-6 form-group required-field">
                    <label>Street Address</label>
                    <input type="text" class="form-control" name="b_address" value="{{ $bInfo->b_address ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 form-group required-field">
                    <label>Country</label>
                    <input type="text" class="form-control" name="b_country" value="{{ $bInfo->b_country ?? '' }}" required>
                </div>
                
                <div class="col-lg-6 form-group required-field">
                    <label>City</label>
                    <input type="text" class="form-control" name="b_city" value="{{ $bInfo->b_city ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 form-group required-field">
                    <label>State/Province</label>
                    <input type="text" class="form-control" name="b_state" value="{{ $bInfo->b_state ?? '' }}" required>
                </div>
                
                <div class="col-lg-6 form-group required-field">
                    <label>Zip/Postal Code</label>
                    <input type="text" class="form-control" name="b_zip" value="{{ $bInfo->b_zip ?? '' }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 form-group required-field">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="b_phone" value="{{ $bInfo->b_phone ?? '' }}" required>
                </div>                                            
            </div>

            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>