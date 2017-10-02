<div class="row margin-top-20">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
		<form id="newAccount" method="POST">
			<div class="panel-heading">
				<h4>Account Information</h4>
			</div>
			<div class="panel-body">
				
					<div class="form-group">
						<label>First Name</label>
						<input name="firstName" placeholder="Enter First Name" type="text" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input name="lastName" placeholder="Enter Last Name" type="text" class="form-control"></input>
					</div>
					<div class="form-group">
                        <label>Birth Date</label>
                        <input name="birthDate" type="date" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Sex</label>
                        <select id="sex" class="form-control choose" name="sex">
                            <option selected value disabled style="display: none">Select Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" cols="2" placeholder="Enter Address "></textarea>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input name="contactNumber" type="text" class="form-control" placeholder="Enter Contact Number" />
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="emailAddress" type="text" class="form-control" placeholder="Enter Email Address" />
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password" />
                    </div>
				
			</div>
			<div class="panel-footer">
				<input name="signup" type="submit" class="btn btn-block btn-primary" value="Create Account" />
			</div>
		</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function (){
        var validator=$("#newAccount").bootstrapValidator({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields :{
                firstName :{
                    validators :{
                         notEmpty :{
                             message :"Please enter your first name"
                         }
                    }
                },
                lastName :{
                    validators :{
                         notEmpty :{
                             message :"Please enter your last name"
                         }
                    }
                },
                birthDate :{
                    validators :{
                        notEmpty :{
                             message :"Please enter your birth date"
                         }
                    }
                },
                sex :{
                    validators :{
                        notEmpty: {
                            message: "Please enter your sex"
                        }
                    }
                },
                address :{
                    validators :{
                        notEmpty :{
                             message :"Please enter your address"
                         }
                    }
                },
                contactNumber :{
                    validators :{
                        notEmpty :{
                             message :"Pleae enter your contact number"
                         }
                    }
                },
                emailAddress :{
                    validators :{
                        notEmpty :{
                             message :"Pleae enter your email address"
                         },
                        emailAddress: {
                            message: 'Please enter a valid email address'
                        },
                        remote: {
                            message: 'Someone is already registered using this email',
                            url: '<?php echo base_url('signup/checkEmail'); ?>',
                            type: 'POST',
                            delay: 2000
                        }
                    }
                },
                username :{
                    validators :{
                        notEmpty :{
                             message :"Please enter your desired username"
                         },
                         stringLength: {
                            min: 6,
                            message: 'Username must have at least 6 characters'
                        },
                        remote: {
                            message: 'Someone is already using this email',
                            url: '<?php echo base_url('signup/checkUsername'); ?>',
                            type: 'POST',
                            delay: 2000
                        }
                    }
                },
                password :{
                    validators :{
                        notEmpty :{
                             message :"Please enter your desired password"
                         },
                        stringLength: {
                            min: 8,
                            message: 'Password must have at least 8 characters'
                        }
                    }
                    
                },
                confirmPassword :{
                    validators :{
                        notEmpty :{
                             message :"Please confirm your password"
                         },
                        identical: {
                            field: 'password',
                            message: "Your password didn't match"
                        }
                    }
                }
            }
        });
    } );

</script>

