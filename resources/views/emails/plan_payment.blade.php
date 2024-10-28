<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment and Plan Details</title>
</head>
<body>
    <h2>Thank you for your payment!</h2>
    
    <p>Here are the details of your plan:</p>

    <table>
        <tr>
            <th>Plan Name</th>
            <td>{{ $planDetails['plan_name'] }}</td>
        </tr>
        <tr>
            <th> Price</th>
            <td>${{ $planDetails['amount'] }}</td>
        </tr>
      
        <tr>
            <th>Plan Start Date</th>
            <td>{{ $planDetails['plan_start_date'] }} months</td>
        </tr>
        <tr>
            <th>Plan End Date</th>
            <td>{{ $planDetails['plan_end_date'] }} years</td>
        </tr>
        <tr>
            <th>Number of Standard Jobs</th>
            <td>{{ $planDetails['number_of_jobs_standard'] }}</td>
        </tr>
        <tr>
            <th>Company Career Page</th>
            <td>{{ ucfirst($planDetails['comopany_carrer_page']) }}</td>
        </tr>
        <tr>
            <th>Job Post or Live</th>
            <td>{{ ucfirst($planDetails['job_post_or_live']) }}</td>
        </tr>
        <tr>
            <th>Job Post or Live Number of Days</th>
            <td>{{ $planDetails['job_post_or_live_no_of_days'] }}</td>
        </tr>
        <tr>
            <th>Job Alert to Potential Clients</th>
            <td>{{ ucfirst($planDetails['job_alert_potential_clients']) }}</td>
        </tr>
        <tr>
            <th>Distributed to Google Jobs Network</th>
            <td>{{ ucfirst($planDetails['distributed_google_jobs_network']) }}</td>
        </tr>
        <tr>
            <th>Featured Job Posts</th>
            <td>{{ ucfirst($planDetails['featured_job_posts']) }}</td>
        </tr>
        <tr>
            <th>Social Media Sharing</th>
            <td>{{ ucfirst($planDetails['social_media_sharing']) }}</td>
        </tr>
        <tr>
            <th>Company Logo on Home Page</th>
            <td>{{ ucfirst($planDetails['company_logo_on_home_page']) }}</td>
        </tr>
        <tr>
            <th>Resume Database Access</th>
            <td>{{ ucfirst($planDetails['resume_database_access']) }}</td>
        </tr>
    </table>


    <p>Thank you for choosing our service!</p>
</body>
</html>
