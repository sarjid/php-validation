// validation on doante form 
if (isset($_POST['submit'])) {
	
	if (isset($_POST['term']) == true ) {

		if (isset($_POST['name']) && !empty($_POST['name'])) {
			$pattern = '/^[a-zA-Z\s]*$/';
			if (preg_match($pattern, $_POST['name'])) {
				$name = $_POST['name'];

			}else {
				$nameError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Use Only Lower and uppercase and space</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
				
			}
		}else {
			$nameError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Please Fill Out Your Name</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}

		// Blood Group Validation 

		
		if (isset($_POST['blood_group']) && !empty($_POST['blood_group'])) {
			$blood_group = $_POST['blood_group'];
			
		}else {
			$bloodError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Please Select Your Blood Group</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}

		// Gender Validation 
		if (isset($_POST['gender']) && !empty($_POST['gender'])) {
			$gender = $_POST['gender'];
		}else {
			$genderError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>please Select Your Gender</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}

		// date of birthday validation 
		// day 

		if (isset($_POST['day']) && !empty($_POST['day'])) {
			
			$day = $_POST['day'];
		}else {
			$dayError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>please Select Your Birth-day </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}

		// Month 
		if (isset($_POST['month']) && !empty($_POST['month'])) {
			
			$month = $_POST['month'];
		}else {
			$monthError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>please Select Your Birth-Month </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}
		// year 

		if (isset($_POST['year']) && !empty($_POST['year'])) {
			
			$year = $_POST['year'];
		}else {
			$yearError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>please Select Your Birth-year </strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}
		
		// Email validation 

		if (isset($_POST['email']) && !empty($_POST['email'])) {
			$pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			if (preg_match($pattern, $_POST['email'])) {
				$check_email = $_POST['email'];
				 
				$sql = "SELECT email FROM donor WHERE email = '$check_email' ";
				$result = mysqli_query($connection, $sql);
				if (mysqli_num_rows($result) ) {
					$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Your Email Has Already Exists !</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>';
					
				}else {
					$email = $_POST['email'];
				}
			}else {
				$emailError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Please Inter Valid Email Address !</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>';
			}
		}else {
			$emailError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>please input your Email Address</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
			
		}

		// Contact No 
		if (isset($_POST['contact_no']) && !empty($_POST['contact_no'])) {
			if (preg_match('/\d{11}/', $_POST['contact_no'])) {
				$contact_no = $_POST['contact_no'];
			}else {
				$contactError = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>your Contact Number Should be 11 Characters</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
			}
		}else {
			$contactError = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Please input your Contact Number</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}

		// city 

		if (isset($_POST['city']) && !empty($_POST['city'])) {
			$city = $_POST['city'];
		}else {
			$cityError = ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>please Select Your City</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		}

		//  Password vaidation 
		
		if (isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['c_password']) && !empty($_POST['c_password'])) {
			if (strlen($_POST['password']) >= 6) {
				if ($_POST['password'] == ($_POST['c_password'])) {
					$password = $_POST['password'];
					
				}else {
					$conpassdError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Your Password Are not same !</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>';
				}
			}else {
				$passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Your password must be longer then 6 characters !</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>';
			}
		}else {
			$passwordError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Please Create your password !</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>';
		}
	
		  	// insert data into database 

	if (isset($name) && isset($blood_group) && isset($gender) && isset($day) && isset($month) && isset($year) && isset($email) && isset($contact_no) && isset($city) && isset($password)) {

		$password = md5($password);
		$DonorDB = $day.'-'.$month.'-'.$year;

		$sql = "INSERT INTO donor (name, blood_group, gender, email, city, dob, contact_no, save_life_date, password) VALUES ('$name', '$blood_group', '$gender', '$email', '$city', '$DonorDB', '$contact_no', '0', '$password')";
		$result = mysqli_query($connection, $sql);
		if ($result) {
			$submitSucc = '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Rigister Succesfully Complete <b><a href="signin.php">Login</a></b> Now </strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>';
		}else {
			$submitError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Opps Data insert Error ! Try again</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>';
		}
		
		
	}
			
		
	}else {
		$termError= ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>please aggre with our terms and condition</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
	}



}