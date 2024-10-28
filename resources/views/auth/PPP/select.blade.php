
<form method="post" id="select-mmid">
    @csrf
    <div class="form-group mb-3">
        <label>Family Id</label>        
        <input type="text" class="form-control" id="" name="" placeholder="Please Enter PPP" value="{{ $family_id }}"
            disabled>


    </div>
    <div class="form-group mb-3">
        <label>Please Select Members</label>        

        <select class="form-control" name="mmid" id="members">
            <option value="">--please Select --</option>
            <?php foreach ($res->result->dropdown as $d) { ?>
            <option value='{{ $d->value }}'>{{ $d->text }}</option>";
            <?php } ?>
        </select>

    </div>

    <div class="row">

        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>