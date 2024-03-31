
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        /*custom font*/
        @import url(https://fonts.googleapis.com/css?family=Montserrat);
        
        /*basic reset*/
        * {
            margin: 0;
            padding: 0;
        }
        
        html {
            height: 100%;
            background: antiquewhite; /* fallback for old browsers */
        }
        
        body {
            font-family: montserrat, arial, verdana;
            background: transparent;
        }
        
        .form-group {
            text-align: left !important;
        }
        
        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 30px;
        }
        
        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;
        
            /*stacking fieldsets above each other*/
            position: relative;
        }
        
        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }
        
        /*inputs*/
        #msform input, #msform textarea, #msform select {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }
        
        #msform input:focus, #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #ee0979;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }
        
        /*buttons*/
        #msform .action-button {
            width: 100px;
            background: #ee0979;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }
        
        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #ee0979;
        }
        
        #msform .action-button-previous {
            width: 100px;
            background: #C5C5F1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }
        
        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
        }
        
        /*headings*/
        .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }
        
        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }
        
        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }
        
        #progressbar li {
            list-style-type: none;
            color: black;
            text-transform: uppercase;
            font-size: 15px;
            width: 20%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }
        
        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
        }
        
        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }
        
        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }
        
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: #ee0979;
            color: white;
        }
        
        
        /* Not relevant to this form */
        .dme_link {
            margin-top: 30px;
            text-align: center;
        }
        .dme_link a {
            background: #FFF;
            font-weight: bold;
            color: #ee0979;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 5px 25px;
            font-size: 12px;
        }
        
        .dme_link a:hover, .dme_link a:focus {
            background: #C5C5F1;
            text-decoration: none;
        }
    </style>

    <title>Student Admission</title>
</head>

<body>
    <!-- MultiStep Form -->
   <!-- MultiStep Form -->
<div class="row">
    <div class="col-md-12">
        <h2 class="my-3 text-center">Online Student Admission Portal</h2>
    </div>
    <div class="col-md-12 col-md-offset-3">
        <form action="https://vmas.apsgroup.in/ins-admission" method="post" enctype="multipart/form-data" id="msform">
            <!-- progressbar -->
            <ul id="progressbar" class="d-md-block d-none">
                <li class="active">Personal Details</li>
                <li>Academic Details</li>
                <li>Contact Details</li>
                <li>Transport</li>
                <li>Payment</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title mb-4">Personal Details</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Student Image</label>
                            <input type="file" class="form-control" name="student_image" required="">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Student Name</label>
                            <input type="text" name="student_name" required="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Father Name</label>
                            <input type="text" name="father_name" required="" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Mother Name</label>
                            <input type="text" name="mother_name" required="" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3"></div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">DOB</label>
                            <input type="date" name="dob" required="" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <select class="form-control" name="gender" required="">
                                <option value="">-Select-</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title mb-4">Academic Details</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Class</label>
                            <select class="form-control" name="class" required="">
                                <option value="">Select</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Roll</label>
                            <input type="text" name="roll" required="" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title mb-4">Contact Details</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" required="" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Phone No</label>
                            <input type="text" name="phone1" required="" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Additional Phone No</label>
                            <input type="text" name="phone2" required="" class="form-control">
                        </div>
                    </div>
                </div>
                
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title mb-4">Transport</h2>
                <div class="row justify-content-between">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label class="form-label">Pickup Point</label>
                            <select class="form-control" name="pickup_point" required="">
                                @foreach($stopages as $stopage)
                                    <option value="{{$stopage->id}}">{{$stopage->name}} - {{$stopage->fare}} INR</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card p-4 shadow" id="car_details" style="display: none;">
                            <div class="card-body">
                                <h6 class="text-start">Reg No: <span id="reg_no" style="font-weight: bold; text-align: right;"></span></h6>
                                <h6 class="text-start">Driver Name: <span id="driver_name" style="font-weight: bold; text-align: right;"></span></h6>
                                <h6 class="text-start">Driver Phone: <span id="driver_phone" style="font-weight: bold; text-align: right;"></span></h6>
                                <h6 class="text-start">Driver Name: <span id="helper_name" style="font-weight: bold; text-align: right;"></span></h6>
                                <h6 class="text-start">Driver Phone: <span id="helper_phone" style="font-weight: bold; text-align: right;"></span></h6>
                                <h6 class="text-success" style="font-weight: bold;">Seat are available</h6>
                            </div>
                        </div>
                        
                        <div class="card p-4 shadow" id="seat_unavailable" style="display: none;">
                            <div class="card-body">
                                <h6 class="text-danger" style="font-weight: bold;" >No seat are available</h6>
                            </div>
                        </div>
                    </div>
                </div>
                
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next" id="payment_next" disabled />
            </fieldset>
            
            <fieldset>
                <h2 class="fs-title mb-4">Payment</h2>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset> 
        </form>
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script>
    
    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    
    $(".next").click(function(){
    	if(animating) return false;
    	animating = true;
    	
    	current_fs = $(this).parent();
    	next_fs = $(this).parent().next();
    	
    	//activate next step on progressbar using the index of next_fs
    	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    	
    	//show the next fieldset
    	next_fs.show(); 
    	//hide the current fieldset with style
    	current_fs.animate({opacity: 0}, {
    		step: function(now, mx) {
    			//as the opacity of current_fs reduces to 0 - stored in "now"
    			//1. scale current_fs down to 80%
    			scale = 1 - (1 - now) * 0.2;
    			//2. bring next_fs from the right(50%)
    			left = (now * 50)+"%";
    			//3. increase opacity of next_fs to 1 as it moves in
    			opacity = 1 - now;
    			current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'absolute'
          });
    			next_fs.css({'left': left, 'opacity': opacity});
    		}, 
    		duration: 800, 
    		complete: function(){
    			current_fs.hide();
    			animating = false;
    		}, 
    		//this comes from the custom easing plugin
    		easing: 'easeInOutBack'
    	});
    });
    
    $(".previous").click(function(){
    	if(animating) return false;
    	animating = true;
    	
    	current_fs = $(this).parent();
    	previous_fs = $(this).parent().prev();
    	
    	//de-activate current step on progressbar
    	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    	
    	//show the previous fieldset
    	previous_fs.show(); 
    	//hide the current fieldset with style
    	current_fs.animate({opacity: 0}, {
    		step: function(now, mx) {
    			//as the opacity of current_fs reduces to 0 - stored in "now"
    			//1. scale previous_fs from 80% to 100%
    			scale = 0.8 + (1 - now) * 0.2;
    			//2. take current_fs to the right(50%) - from 0%
    			left = ((1-now) * 50)+"%";
    			//3. increase opacity of previous_fs to 1 as it moves in
    			opacity = 1 - now;
    			current_fs.css({'left': left});
    			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    		}, 
    		duration: 800, 
    		complete: function(){
    			current_fs.hide();
    			animating = false;
    		}, 
    		//this comes from the custom easing plugin
    		easing: 'easeInOutBack'
    	});
    });
    
    $(".submit").click(function(){
    	return false;
    })
    </script>
    <script>
        $("select[name='pickup_point']").on("change", function() {
            $("#car_details").hide()
            $("#seat_unavailable").hide()

            const formdata = new FormData();
            formdata.append('class_id', $("select[name='class']").val())
            formdata.append('stopage_id', $("select[name='pickup_point']").val())
            
            fetch("{{ route('check_seat') }}", {
                method: "POST",
                body: formdata
            })
            .then(response => response.json())
            .then(data => {
                if(data.remaining_seats == 0)
                {
                    $("#car_details").hide()
                    $("#seat_unavailable").show()
                    $("#payment_next").prop('disabled', true);
                    
                    $("#available_seat").text("There are no seats available. Please contact to XXXXXXXXXX")
                }
                else
                {
                    $("#car_details").show()
                    $("#seat_unavailable").hide()
                    $("#payment_next").prop('disabled', false);
                    
                    $("#reg_no").text(data.registration_no)
                    $("#driver_name").text(data.driver_name)
                    $("#driver_phone").text(data.driver_phone)
                    $("#helper_name").text(data.helper_name)
                    $("#helper_phone").text(data.helper_phone)
                    
                    $("#available_seat").text(`Available Seats are ${data.seats}`)
                }
            })
        })
    </script>
</body>

</html>