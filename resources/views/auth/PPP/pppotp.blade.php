<form method="post" id="otp_verify">
    @csrf
    <p>{{$p['msg']}}</p>
    <input type="hidden" id="txn" name="txn" value="{{ $p['data']->result->txn}}">
    <input type="hidden" id="member_id" name="member_id" value="{{$mmid}}">
    <div class="input-group mb-3">


    </div>
    <div class="form-group mb-3">
        <label>Please Enter OTP</label>        
        <input type="text" class="form-control" value="111111" name="otp" placeholder="Please Enter a Otp">

    </div>

    <div class="row">

        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>