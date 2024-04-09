<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php');
require 'helpers/init_conn_db.php';
?>
<link rel="stylesheet" href="assets/css/index.css">
<?php
if (isset($_GET['error'])) {
	if ($_GET['error'] === 'sameval') {
		echo '<script>alert("Select different value for departure city and arrival city")</script>';
	} else if ($_GET['error'] === 'seldep') {
		echo '<script>alert("Select Departure city")</script>';
	} else if ($_GET['error'] === 'selarr') {
		echo "<script>alert('Select Arrival city')</script>";
	}
}
?>

<link rel="stylesheet" type="text/css" href="styles%2c_bootstrap4%2c_bootstrap.min.css%2bplugins%2c_font-awesome-4.7.0%2c_css%2c_font-awesome.min.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl.carousel.css%2bplugins%2c_OwlCarousel2-2.2.1%2c_owl" />
<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript">
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	};
</script>
<div class="booking-form">
	<h1>
		<img src="assets/images/plane-logo.png" height="105px" width="105px" alt="">
		Online Flight Booking
	</h1>
	<div class="tabs">
		<div class="tab round-trip-tab active" onclick="changeTab('round-trip')">ROUND TRIP</div>
		<div class="tab one-way-tab" onclick="changeTab('one-way')">ONE WAY</div>
	</div>

	<div id="round-trip-section" class="form-section active">
		<form action="book_flight.php" method="post">
			<label for="from">From:</label>
			<input type="hidden" id="from" name="type" value="round" required>
			<?php
			$sql = 'SELECT * FROM Cities ';
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			echo '<select class="" name="dep_city" id="w3_country1">
								<option value="0" selected disabled >Departure</option>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='{$row['city']}'>{$row['city']}</option>";
			}
			?>
			</select>
			<label for="to">To:</label>
			<?php
			$sql = 'SELECT * FROM Cities ';
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			echo '<select value="0" name="arr_city" id="w3_country1">
								<option selected disabled>Arrival</option>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='{$row['city']}'>{$row['city']}</option>";
			}
			?>
			</select>

			<label for="dep_date">Depart:</label>
			<input type="date" id="dep_date" name="dep_date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">

			<label for="ret_date">Return:</label>
			<input type="date" id="ret_date" name="ret_date" type="date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">

			<label for="f_class">Class:</label>
			<!-- id="w3_country1" -->
			<select id="class" name="f_class" onchange="change_country(this.value)" class="frm-field required">
				<option value="E">Economy</option>
				<option value="B">Business</option>
			</select>

			<label for="passenger">Passenger:</label>
			<input type="number" class="input_val" id="passenger" name="passengers" value="1" min="1">

			<button name="search_but" class="submit-btn" type="submit" value="Search Flights">Search Flights</button>
		</form>
	</div>
	<div id="one-way-section" class="form-section">
		<form action="book_flight.php" method="post">
			<label for="fromOneWay">From:</label>
			<input type="hidden" id="fromOneWay" name="type" value="one" name="fromOneWay" required>
			<?php
			$sql = 'SELECT * FROM Cities ';
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			echo '<select value="0" name="dep_city" id="w3_country1">
								<option selected disabled>Departure</option>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='{$row['city']}'>{$row['city']}</option>";
			}
			?>
			</select>

			<label for="w3_country1">To:</label>
			<?php
			$sql = 'SELECT * FROM Cities ';
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			echo '<select value="0" name="arr_city" id="w3_country1">
								<option selected disabled>Arrival</option>';
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<option value='{$row['city']}'>{$row['city']}</option>";
			}
			?>
			</select>

			<label for="departOneWay">Depart:</label>
			<input name="dep_date" type="date" class="form-control" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">

			<label for="w3_country1">Class:</label>
			<select id="w3_country1" name="f_class" onchange="change_country(this.value)" class="frm-field required">
				<option value="E">Economy</option>
				<option value="B">Business</option>
			</select>

			<label for="input_val">Passenger:</label>
			<input type="number" name="passengers" class="input_val" value="1" min="1">

			<button name="search_but" class="submit-btn" type="submit" value="Search Flights">Search Flights</button>
		</form>
	</div>

</div>
</div>

<script>
	function changeTab(tab) {
		document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
		document.querySelectorAll('.form-section').forEach(s => s.classList.remove('active'));

		document.querySelector(`.${tab}-tab`).classList.add('active');
		document.querySelector(`#${tab}-section`).classList.add('active');
	}
</script>

<?php subview('footer.php'); ?>

<script src="assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default',
			width: 'auto',
			fit: true
		});
	});
</script>
<script>
	$('.value-plus').on('click', function() {
		var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) + 1;
		divUpd.text(newVal);
		$('.input_val').val(newVal);
	});

	$('.value-minus').on('click', function() {
		var divUpd = $(this).parent().find('.value'),
			newVal = parseInt(divUpd.text(), 10) - 1;
		if (newVal >= 1) {
			divUpd.text(newVal);
			$('.input_val').val(newVal);
		}
	});
</script>
<!--//quantity-->
<!--load more-->
<script>
	$(document).ready(function() {
		size_li = $("#myList li").size();
		x = 1;
		$('#myList li:lt(' + x + ')').show();
		$('#loadMore').click(function() {
			x = (x + 1 <= size_li) ? x + 1 : size_li;
			$('#myList li:lt(' + x + ')').show();
		});
		$('#showLess').click(function() {
			x = (x - 1 < 0) ? 1 : x - 1;
			$('#myList li').not(':lt(' + x + ')').hide();
		});
	});
</script>