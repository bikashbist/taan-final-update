@extends('layouts.admin')
@section('styles')
@endsection
@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-2 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['trail']}}</h2>
                    <div class="m-b-5">Trails </div><i class="fa fa-book widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['post']}}</h2>
                    <div class="m-b-5">Posts </div><i class="fa fa-book widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="ibox bg-secondary color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['staff']}}</h2>
                    <div class="m-b-5">Staff</div><i class="fa fa-users widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['member']}}</h2>
                    <div class="m-b-5">{{ __('Members') }}</div><i class="fa fa-users widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['admin']}}</h2>
                    <div class="m-b-5">{{ __('Admin') }}</div><i class="fa fa-users widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="ibox bg-primary color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['destination']}}</h2>
                    <div class="m-b-5">Destination </div><i class="fa fa-calendar widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div>
                        <canvas id="myChart" style="width:100%;max-width:600px;height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div>
                        <canvas id="myChart_1" style="width:100%;max-width:600px;height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div>
                        <canvas id="myChart_2" style="width:100%;max-width:600px;height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    // Convert PHP array to JSON (ensure numeric values)
    var data = <?php echo json_encode($data['branch'], JSON_NUMERIC_CHECK); ?>;
    var xValues = data.map(item => item.title);
    var yValues = data.map(item => item.total);
    // Dynamic color generation based on data length
    var generateColors = (count) => {
        const baseColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];
        if (count > baseColors.length) {
            const additional = Array.from({
                    length: count - baseColors.length
                }, (_, i) =>
                `hsl(${(i * 360 / (count - baseColors.length))}deg 70% 60%)`
            );
            return [...baseColors, ...additional];
        }
        return baseColors.slice(0, count);
    };
    if (data.length > 0) {
        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: generateColors(data.length),
                    data: yValues,
                    borderWidth: 1,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    title: {
                        display: true,
                        text: "Staff Details With Branch",
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw} (${context.percent}%)`;
                            }
                        }
                    }
                }
            }
        });
    } else {
        console.warn('No data available for chart');
        document.getElementById("myChart").innerHTML = '<p class="text-center">No data available</p>';
    }
</script>
<script>
    const member_type = <?php echo json_encode($data['member_type'], JSON_NUMERIC_CHECK); ?>;
    console.log(member_type);
    var xValues = member_type.map(item => item.title);
    var yValues = member_type.map(item => item.total);
    var generateColors = (count) => {
        const baseColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];
        if (count > baseColors.length) {
            const additional = Array.from({
                    length: count - baseColors.length
                }, (_, i) =>
                `hsl(${(i * 360 / (count - baseColors.length))}deg 70% 60%)`
            );
            return [...baseColors, ...additional];
        }
        return baseColors.slice(0, count);
    };
    if (member_type.length > 0) {
        new Chart("myChart_1", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: generateColors(member_type.length),
                    data: yValues,
                    borderWidth: 1,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    title: {
                        display: true,
                        text: "Member Type Details",
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw} (${context.percent}%)`;
                            }
                        }
                    }
                }
            }
        });
    } else {
        console.warn('No data available for chart');
        document.getElementById("myChart_1").innerHTML = '<p class="text-center">No data available</p>';
    }
</script>
<script>
    var xValues = <?php echo json_encode($data['month_date'], JSON_NUMERIC_CHECK); ?>;
    var yValues = <?php echo json_encode($data['month_count'], JSON_NUMERIC_CHECK); ?>;
    var barColors = generateColors(yValues.length);

    new Chart("myChart_2", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Member Registration Monthly",
            }
        }
    });
</script>
@endsection