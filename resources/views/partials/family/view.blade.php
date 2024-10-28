
<section class="content p-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                Family ID :-
            </div>
            <div class="col-sm-3">
                {{$logged_in_user['familyID'] }}
            </div>
            <div class="col-sm-3">
                Name as in PPP :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['fullName'] }}
            </div>
            <div class="col-sm-3">
                Father's Name :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['fatherFullName'] }}
            </div>
            <div class="col-sm-3">
                Category Name :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['casteCategoryName'] }}
            </div>
            <div class="col-sm-3">
                Gender :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['gender'] }}
            </div>
            <div class="col-sm-3">
                Date of Birth :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['dob'] }}
            </div>
            <div class="col-sm-3">
                Address :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['address_LandMark'] }}
            </div>
            <div class="col-sm-3">
                Block :-
            </div>
            <div class="col-sm-3">
                {{$logged_in_user['btName'] }}
            </div>
            <div class="col-sm-3">
                District :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['districtName'] }}
            </div>
            <div class="col-sm-3">
                Mobile No :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['mobileNo'] }}
            </div>
            <div class="col-sm-3">
                Family Income :-
            </div>
            <div class="col-sm-3">
                {{ $logged_in_user['familyIncome'] }}
            </div>
        </div>


    </div>
</section>