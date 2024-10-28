<?php
use App\Models\Job;
use App\Models\Skills;
use App\Models\User;

?>

<div class="container">
    <div class="row">
        <?php
         $jj = Job::take(5)->
        where('mark_a_featured',1)->
        orderby('id','DESC')
                ->get();
                
                foreach ($jj as $key => $result) {
                        $uu = User::where('id',$result->user_id)->first();
                    $s = Skills::orWhereIn('id', explode(',', $result->skills))->get();
                

                ?>
        <div class="col-md-12 mt-3 mb-3">

            <?php if($result->mark_a_featured == 1){ ?>
            <div class="job_wraper  featured">

                <?php }else{ ?>
                <div class="job_wraper">

                    <?php } ?>

                    <div class="job_inner">
                        <div class="job_img">
                            <?php if (!empty($result->company_logo) && file_exists(public_path($result->company_logo))) { ?>
                            <img src="{{ asset($result->company_logo) }}" class="img-fluid" alt="job">
                            <?php } else { ?>
                            <?php if (file_exists(public_path($uu->profile_picture))) { ?>
                            <img src="{{ asset($uu->profile_picture) }}" class="img-fluid" alt="job">
                            <?php } else { ?>
                            <img src="{{ asset('/new/logo.png') }}" class="img-fluid" alt="default">
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="job_content">
                            <p>{{ $result->job_title }}</p>
                            <ul>

                                <li>{{ $result->address }}</li>
                                <li>${{ $result->max_salary }}/year</li>

                            </ul>
                            <div class="job_btn_wraper">

                                @foreach ($s as $ss)
                                    <a href="#">{{ $ss->name }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="job_btn_right">
                        <div class="time"><i class="fa-regular fa-clock"></i>2pm</div>
                        <div class="apply_btn"><a href="{{ url('job-detail', $result->id) }}"
                                class="btn btn-md btn-light-primary px-4">Apply</a></div>
                    </div>
                    <?php if($result->pin_to_top == 1){ ?>
                    <div class="pin pin-tp-top"><i class="fa-solid fa-thumbtack"></i></div>
                    <?php } ?>

                </div>
            </div>
            <?php } ?>
{{-- ============================================ --}}

<?php
$jj = Job::take(5)->
where('mark_a_featured','!=',1)->
where('pin_to_top',1)->

orderby('id','DESC')
       ->get();
       
       foreach ($jj as $key => $result) {
               $uu = User::where('id',$result->user_id)->first();
           $s = Skills::orWhereIn('id', explode(',', $result->skills))->get();
       

       ?>
<div class="col-md-12 mt-3 mb-3">

   <?php if($result->mark_a_featured == 1){ ?>
   <div class="job_wraper  featured">

       <?php }else{ ?>
       <div class="job_wraper">

           <?php } ?>

           <div class="job_inner">
               <div class="job_img">
                   <?php if (!empty($result->company_logo) && file_exists(public_path($result->company_logo))) { ?>
                   <img src="{{ asset($result->company_logo) }}" class="img-fluid" alt="job">
                   <?php } else { ?>
                   <?php if (file_exists(public_path($uu->profile_picture))) { ?>
                   <img src="{{ asset($uu->profile_picture) }}" class="img-fluid" alt="job">
                   <?php } else { ?>
                   <img src="{{ asset('/new/logo.png') }}" class="img-fluid" alt="default">
                   <?php } ?>
                   <?php } ?>
               </div>
               <div class="job_content">
                   <p>{{ $result->job_title }}</p>
                   <ul>

                       <li>{{ $result->address }}</li>
                       <li>${{ $result->max_salary }}/year</li>

                   </ul>
                   <div class="job_btn_wraper">

                       @foreach ($s as $ss)
                           <a href="#">{{ $ss->name }}</a>
                       @endforeach

                   </div>
               </div>
           </div>
           <div class="job_btn_right">
               <div class="time"><i class="fa-regular fa-clock"></i>2pm</div>
               <div class="apply_btn"><a href="{{ url('job-detail', $result->id) }}"
                       class="btn btn-md btn-light-primary px-4">Apply</a></div>
           </div>
           <?php if($result->pin_to_top == 1){ ?>
           <div class="pin pin-tp-top"><i class="fa-solid fa-thumbtack"></i></div>
           <?php } ?>

       </div>
   </div>
   <?php } ?>
{{-- ================= --}}
<?php
$jj = Job::take(5)->
where('mark_a_featured',0)->
where('pin_to_top',0)->
orderby('id','DESC')
       ->get();
       
       foreach ($jj as $key => $result) {
               $uu = User::where('id',$result->user_id)->first();
           $s = Skills::orWhereIn('id', explode(',', $result->skills))->get();
       

       ?>
<div class="col-md-12 mt-3 mb-3">

   <?php if($result->mark_a_featured == 1){ ?>
   <div class="job_wraper  featured">

       <?php }else{ ?>
       <div class="job_wraper">

           <?php } ?>

           <div class="job_inner">
               <div class="job_img">
                   <?php if (!empty($result->company_logo) && file_exists(public_path($result->company_logo))) { ?>
                   <img src="{{ asset($result->company_logo) }}" class="img-fluid" alt="job">
                   <?php } else { ?>
                   <?php if (file_exists(public_path($uu->profile_picture))) { ?>
                   <img src="{{ asset($uu->profile_picture) }}" class="img-fluid" alt="job">
                   <?php } else { ?>
                   <img src="{{ asset('/new/logo.png') }}" class="img-fluid" alt="default">
                   <?php } ?>
                   <?php } ?>
               </div>
               <div class="job_content">
                   <p>{{ $result->job_title }}</p>
                   <ul>

                       <li>{{ $result->address }}</li>
                       <li>${{ $result->max_salary }}/year</li>

                   </ul>
                   <div class="job_btn_wraper">

                       @foreach ($s as $ss)
                           <a href="#">{{ $ss->name }}</a>
                       @endforeach

                   </div>
               </div>
           </div>
           <div class="job_btn_right">
               <div class="time"><i class="fa-regular fa-clock"></i>2pm</div>
               <div class="apply_btn"><a href="{{ url('job-detail', $result->id) }}"
                       class="btn btn-md btn-light-primary px-4">Apply</a></div>
           </div>
           <?php if($result->pin_to_top == 1){ ?>
           <div class="pin pin-tp-top"><i class="fa-solid fa-thumbtack"></i></div>
           <?php } ?>

       </div>
   </div>
   <?php } ?>
   {{-- ============== --}}
   <?php
   $jj = Job::take(5)->
  where('mark_a_featured',NULL)->
  where('pin_to_top',NULL)->
  orderby('id','DESC')
          ->get();
          
          foreach ($jj as $key => $result) {
                  $uu = User::where('id',$result->user_id)->first();
              $s = Skills::orWhereIn('id', explode(',', $result->skills))->get();
          

          ?>
  <div class="col-md-12 mt-3 mb-3">

      <?php if($result->mark_a_featured == 1){ ?>
      <div class="job_wraper  featured">

          <?php }else{ ?>
          <div class="job_wraper">

              <?php } ?>

              <div class="job_inner">
                  <div class="job_img">
                      <?php if (!empty($result->company_logo) && file_exists(public_path($result->company_logo))) { ?>
                      <img src="{{ asset($result->company_logo) }}" class="img-fluid" alt="job">
                      <?php } else { ?>
                      <?php if (file_exists(public_path($uu->profile_picture))) { ?>
                      <img src="{{ asset($uu->profile_picture) }}" class="img-fluid" alt="job">
                      <?php } else { ?>
                      <img src="{{ asset('/new/logo.png') }}" class="img-fluid" alt="default">
                      <?php } ?>
                      <?php } ?>
                  </div>
                  <div class="job_content">
                      <p>{{ $result->job_title }}</p>
                      <ul>

                          <li>{{ $result->address }}</li>
                          <li>${{ $result->max_salary }}/year</li>

                      </ul>
                      <div class="job_btn_wraper">

                          @foreach ($s as $ss)
                              <a href="#">{{ $ss->name }}</a>
                          @endforeach

                      </div>
                  </div>
              </div>
              <div class="job_btn_right">
                  <div class="time"><i class="fa-regular fa-clock"></i>2pm</div>
                  <div class="apply_btn"><a href="{{ url('job-detail', $result->id) }}"
                          class="btn btn-md btn-light-primary px-4">Apply</a></div>
              </div>
              <?php if($result->pin_to_top == 1){ ?>
              <div class="pin pin-tp-top"><i class="fa-solid fa-thumbtack"></i></div>
              <?php } ?>

          </div>
      </div>
      <?php } ?>
        </div>
    </div>
