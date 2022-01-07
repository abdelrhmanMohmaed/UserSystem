<?php require_once('../app.php'); ?>
<?php include('inc/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-deck mt-3 text-light text-center font-weight-bold">

            <div class="card bg-primary">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <h1 class="display-4">
                        <?= $admin->totalCount('users'); ?>
                    </h1>
                </div>
            </div>
            <div class="card bg-warning">
                <div class="card-header">Verified Users</div>
                <div class="card-body">
                    <h1 class="display-4">
                        <?= $admin->verified_users(1); ?>
                    </h1>
                </div>
            </div>
            <div class="card bg-success">
                <div class="card-header">Unverifed Users</div>
                <div class="card-body">
                    <h1 class="display-4">
                        <?= $admin->verified_users(0); ?>
                    </h1>
                </div>
            </div>
            <div class="card bg-danger">
                <div class="card-header">Webiste Hits</div>
                <div class="card-body">
                    <h1 class="display-4">
                        <?php $data = $admin->countVisitors();
                        echo $data['hits'] ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-deck mt-3 text-light text-center font-weight-bold">

            <div class="card bg-danger">
                <div class="card-header">Total Notes</div>
                <div class="card-body">
                    <h1 class="display-4">
                        <?= $admin->totalCount('notes'); ?>
                    </h1>
                </div>
            </div>

            <div class="card bg-success">
                <div class="card-header">Total Feedback</div>
                <div class="card-body">
                    <h1 class="display-4">
                        <?= $admin->totalCount('feedback'); ?>
                    </h1>
                </div>
            </div>

            <div class="card bg-info">
                <div class="card-header">Total Notification</div>
                <div class="card-body">
                    <h1 class="display-4">
                        <?= $admin->totalCount('notification'); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card-deck my-3">

            <div class="card border-success">
                <div class="card-header bg-success text-center text-white lead">Male/Female User's Percentage</div>
                <div class="card-body">
                    <div id="chartOne"></div>
                </div>
            </div>

            <div class="card border-info">
                <div class="card-header bg-info text-center text-white lead">Verified/UnVerified User's Percentage</div>
                <div class="card-body">
                    <div id="chartTwo"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include('inc/footer.php') ?>

<script>
    
    // Load the Visualization API and the corechart package.
    google.charts.load("current", {
        packages: ["corechart"]
    });
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(pieChart);
    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function pieChart() {
        // Create the data table.
        var data = google.visualization.arrayToDataTable([
            ['Gender', 'Number'],
            <?php
            $gender = $admin->genderPer();
            foreach ($gender as $row) {
                echo '["' . $row['gender'] . '",' . $row['cnt'] . '],';
            }
            ?>
        ]);
        var options = {
            is3D: false
        };
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chartOne'));
        chart.draw(data, options);
    }


    // Load the Visualization API and the corechart package.
    google.charts.load("current", {
        packages: ["corechart"]
    });
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(colChart);
    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function colChart() {
        // Create the data table.
        var data = google.visualization.arrayToDataTable([
            ['Verified', 'Number'],
            <?php
            $verified = $admin->verifiedPer();
            foreach ($verified as $row) {
                if ($row['verified'] == 0) {
                    $row['verified'] = "Unverified";
                } else {
                    $row['verified'] = "Verified";
                }
                echo '["' . $row['verified'] . '",' . $row['cnt'] . '],';
            }
            ?>
        ]);
        var options = {
            pieHole: 0.4,
        };
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chartTwo'));
        chart.draw(data, options);
    }
</script>