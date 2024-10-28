<table class="table table-striped table-bordered">
    <thead class="">
        <tr>
            <th>Number ID</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Service Type</th>
            {{-- <th>Address</th> --}}
            @if($logged_in_user->hasRole('user'))
            <th>District of Associated Welfare Officer</th>
            <th>Status</th>
            @endif
            @if($logged_in_user->hasRole('welfare_district'))
            <th>Submitted Date</th>
            <th>Days Pending</th>
            @endif
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ex as $key => $value)
        <?php 
            $updatedAt = new DateTime($value->updated_at);
            $currentDate = new DateTime();
            $interval = $currentDate->diff($updatedAt);
            $pendingDays = $interval->days;
            if ($interval->invert) {
                $pendingDays = $pendingDays; // Handle cases where the updated date might be in the future
            }
        ?>
        <tr>
            <td>{{ $value->id }}</td> <!-- Changed to display ID instead of name -->
            <td>{{ $value->name }}</td>
            <td>{{ $value->rank }}</td>
            <td>{{ ucfirst($value->service_type) }}</td>
            {{-- <td>{{ $value->address }}</td> --}}
            @if($logged_in_user->hasRole('user'))
            <td>{{ $value->district['name'] }}</td>
            <?php if( $value->status=='3'){  ?>
            Rejected
            <?php } ?>
            @if($value->status=='2')

            <td>Approved</td>

            @endif
            @if($value->status=='0' || $value->status=='1' )

            <td>In Progress</td>

            @endif

            <td><a href="{{ route('esm.view', $value->id) }}" class="btn btn-primary">View Application</a></td>
            @endif
            @if($logged_in_user->hasRole('welfare_district'))

            <td>{{ date('d-m-Y', strtotime($value->updated_at)) }}</td>
            <td>{{ $pendingDays }} days pending</td>
            <td><a href="{{ route('dept.esm.view', $value->id) }}" class="btn btn-primary">View Application</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>