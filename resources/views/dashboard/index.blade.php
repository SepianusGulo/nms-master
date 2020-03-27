@extends('layouts.main')

@section('title', 'Page Title')


@section('content')
    <style>
		.card-block div{min-height:300px;}
		#alarm_ch div{margin:auto;}
	</style>
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">

				<!-- Main-body start -->
				<div class="main-body">
					<div class="page-wrapper">
						
						<!-- Page body start -->
						<div class="page-body">
							<div class="row">
								<div class="col-lg-6">
									<!-- Default card start -->
									<div class="card">
										<div class="card-header">
											<h5>Topology</h5>

										</div>
										<div class="card-block">
											<div style="width:100%;height:300px;" id="topology_ch"></div>
										</div>
									</div>
									<!-- Default card end -->
								</div>
								<div class="col-lg-6">
									<!-- Default card start -->
									<div class="card">
										<div class="card-header">
											<h5>Alarm</h5>

										</div>
										<div class="card-block">
											<div style="width:100%;" >
												<div id="alarm_ch"></div>
											</div>
										</div>
									</div>
									<!-- Default card end -->
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<!-- Default card start -->
									<div class="card">
										<div class="card-header">
											<h5>Cpu Utilization</h5>

										</div>
										<div class="card-block">
											<div style="width:100%"></div>
										</div>
									</div>
									<!-- Default card end -->
								</div>
								<div class="col-lg-6">
									<!-- Default card start -->
									<div class="card">
										<div class="card-header">
											<h5>Memory Utilization</h5>

										</div>
										<div class="card-block">
											<div style="width:100%"></div>
										</div>
									</div>
									<!-- Default card end -->
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<!-- Default card start -->
									<div class="card">
										<div class="card-header">
											<h5>Infrastructure Snapshot</h5>	

										</div>
										<div class="card-block">
											<div style="width:100%"></div>
										</div>
									</div>
									<!-- Default card end -->
								</div>
								<div class="col-lg-6">
									<!-- Default card start -->
									<div class="card">
										<div class="card-header">
											<h5>Devices Availability</h5>

										</div>
										<div class="card-block">
											<div style="width:100%"></div>
										</div>
									</div>
									<!-- Default card end -->
								</div>
							</div>
						</div>
						<!-- Page body end -->
					</div>
				</div>
				<!-- Main-body end -->
	
	
	
@endsection
@push('footer_js')
	<script src="/bower_components/raphael/js/raphael.min.js"></script>
    <script src="/bower_components/morris.js/js/morris.js"></script>
	<script src="https://visjs.github.io/vis-network/standalone/umd/vis-network.min.js"></script>
	<script type="text/javascript" src="/assets/pages/chart/knob/knob-custom-chart.js"></script>
	<script type="text/javascript"> 
    var DIR = '/assets/images/';

    var nodes = null;
    var edges = null;
    var network = null;

    // Called when the Visualization API is loaded.
    function draw() {
      // create people.
      // value corresponds with the age of the person
      //var DIR = '../img/indonesia/';
      nodes = [
        {id: 1,  shape: 'circularImage', image: DIR + 'icons8-router-100.png', label:"10.10.10.100"},
        {id: 2,  shape: 'circularImage', image: DIR + 'icons8-router-100.png', label:"10.10.10.40"},
        {id: 3,  shape: 'circularImage', image: DIR + 'icons8-router-100.png', label:"10.10.10.20"},
        {id: 4,  shape: 'circularImage', image: DIR + 'icons8-router-100.png', label:"10.10.10.11"},
      ];

      // create connections between people
      // value corresponds with the amount of contact between two people
      edges = [
        /* {from: 1, to: 2},
        {from: 2, to: 3},
        {from: 2, to: 4} */
      ];

      // create a network
      var container = document.getElementById('topology_ch');
      var data = {
        nodes: nodes,
        edges: edges
      };
      var options = {
        nodes: {
          borderWidth:4,
          size:30,
	      color: {
            border: '#222222',
            background: '#666666'
          },
          font:{color:'#000000'}
        },
        edges: {
          color: 'lightgray'
        }
      };
      network = new vis.Network(container, data, options);
    }
	
	function donutChart() {
		window.areaChart = Morris.Donut({
			element: 'alarm_ch',
			redraw: true,
			data: [
				{ label: 'OK', value: 4 },
				{ label: "Warning", value: 0 },
				{ label: "Danger", value: 0 }
			],
			colors: ['#008b00', '#ffa500', '#ce2828']
		});
	}

	$(document).ready(function(){ 
		draw();
		donutChart();
    }); 
  </script>
@endpush