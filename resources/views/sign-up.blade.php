<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register a new account</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('head')
    <link href="assets/css/intlTelInput.css" rel="stylesheet">
    <link href="assets/css/intlTelInput.min.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Sailor
    * Updated: Jan 09 2024 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

    <main id="main">
    
      <!-- ======= create Account Section ======= -->
      <section id="new_account" class="new_account">
        <div class="container" data-aos="fade-up">

          <div class="row">

            <div class="col-lg-8">

              <div class="create-page">

                <div class="create-form-title" data-aos="fade-up" data-aos-duration="5000">
                  <h4>Create an Account</h4>
                </div>
                <div class="create-form" data-aos="fade-up" data-aos-duration="5000">
                
                  <form action="forms/register.php" method="POST" id = "create">

                    <div class="row">

                      <div class="col-md-6 form-group">
                        <label for="first_name" class="mb-2">First Name</label>
                        <input name="first_name" type="text" class="form-control" placeholder="" required>
                      </div>
                
                      <div class="col-md-6 form-group">
                        <label for="last_name" class="mb-2">Last Name</label>
                        <input name="last_name" type="text" class="form-control" placeholder="" required>
                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6 form-group">
                        <label for="display_name" class="mb-2">Display Name</label>
                        <input name="display_name" type="text" class="form-control" placeholder="">
                      </div>
                
                      <div class="col-md-6 form-group">
                        <label for="email" class="mb-2">Email Address</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="" required>
                      </div>

                    </div>

                    <div class="row">
					
                      <div class="col-12 py-1">
                      <div class="form-text" id="emailCompare" style="color: red;"> </div>
                      </div>
            
                    </div>

                    <div class="row">

                      <div class="col-md-6 form-group">
                        <label for="birthdate" class="mb-2">Birthday</label>
                        <input name="birthdate" type="date" class="form-control">
                      </div>

                      <!-- Task: Place the Label on top like other labels -->

                      <div class="col-md-6 form-group">
                        
                        <div>
                          <label class="mb-2" for="phone_number">Phone number</label>
                      </div>

                        <input name="phone_number" id="phone" type="tel" class="form-control">
                      </div>

                    </div>

                    <hr>

                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group regions">
                          <label for="region" class="mb-2">Region</label>
                          <select id="region" name="region" class="form-select" onchange="fetch_provinces()">
                          <option disabled selected>-Select Region-</option>
                          </select>
                        </div>
                      </div>
      
                      <div class="col mb-3">
                        <div class="form-group province">
                          <label for="province" class="mb-2">Province</label>
                          <select id="province" name="province" class="form-select" onchange="fetch_cities()">
                          <option></option>
                          </select>
                        </div>
                      </div>
      
                      <div class="col mb-3">
                        <div class="form-group city">
                          <label for="city" class="mb-2">City/Municipality</label>
                          <select id="city" name="city" class="form-select" onchange="fetch_barangays()">
                          <option></option>
                          </select>
                        </div>
                      </div>
      
                      <div class="col mb-3">
                        <div class="form-group barangay">
                          <label for="barangay" class="mb-2">Barangay</label>
                          <select id="barangay" name="barangay" class="form-select">
                          <option></option>
                          </select>
                        </div>
                      </div>
              
                    </div>
                    
                    <hr>

                    <div class="row">

                      <label for="biography" class="mb-2">Bio</label>
                      <div class="col form-group">
                        <textarea name="biography" class="form-control" placeholder="Say something..." maxlength="50" style="width: 100%;"></textarea>
                        </div>

                        <div id="count" style="text-align: end;">
                          <span id="current">0</span>
                          <span id="maximum">/ 50</span>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6 form-group">
                        <label for="username" class="mb-2">Username</label>
                        <input name="username" type="text" class="form-control" placeholder="">
                      </div>
  
                      <div class="col-md-6 form-group">
                        <label for="passkey" class="mb-2">Password</label>
                        <input name="passkey" type="password" id="passkey" class="form-control" placeholder="" required>
                      </div>

                      <div class="col-md-6 form-group">
                        <label for="passkey" class="mb-2">Confirm Password</label>
                        <input name="checkpass" type="password" id="checkpass" class="form-control" placeholder="" disabled="true">
                      </div>

                    </div>

                    <div class="row">
					
                      <div class="col-12 py-1">
                      <div class="form-text" id="passmessage" style="color: red;"> </div>
                      </div>
            
                    </div>

                    <div class="row">
                      <div>
                        <div class="col-12 my-2 pb-2">
                          <div class="form-check">
                            <input style="width: 15px; margin-right: 10px; " class="form-check-input" type="checkbox" id="checkcon" value="">
                          
                            <label class="form-check-label">I agree to the 
                              <button id="myBtn" class="terms" data-toggle="modal">Terms and Conditions <a style="text-decoration: none; color: blue; cursor: pointer;"></button> 
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div>
                        <div class="col-12 my-2 pb-2">
                          <div class="form-check">
                            <a style="text-decoration: none; cursor: pointer;">
                              <input style="width: 15px; margin-right: 10px;" class="form-check-input" type="checkbox" id="checkcon" value="">
                            
                              <label class="form-check-label">I agree to the </label>
                              </a>
                            <button id="myBtn2" class="privacy" data-toggle="modal"> Data Privacy <a style="text-decoration: none; color: blue; cursor: pointer;"></button>
                          </div>
                        </div>
                      </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary" id="submitform" disabled="true">Create</button>
  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
 
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Terms and Conditions</h3>
            <br>
            <p>We are Thought Confederation ("we", "us", "our").</p>
            <p>We operate this website, as well as any other related products and Servicesthat refer or link to these legal terms (the "Legal Terms", collectively, the "Services").</p>

            <p>You can contact us by email at contact@us.com.</p>

            <p>These Legal Terms constitute a legally binding agreement made between you, whether personally or on behalf of an entity ("you"), and Thought Confederation, concerning your access to and use of the Services. You agree that by accessing the Services, you have read, understood, and agreed to be bound by all of these Legal Terms. IF YOU DO NOT AGREE WITH ALL OF THESE LEGAL TERMS, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SERVICES AND YOU MUST DISCONTINUE USE IMMEDIATELY.</p>
        
            <p>Supplemental terms and conditions or documents that may be posted on the Services from time to time are hereby expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or modifications to these Legal Terms at any time and for any reason. We will alert you about any changes by updating the "Last updated" date of these Legal Terms, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Legal Terms to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Legal Terms by your continued use of the Services after the date such revised Legal Terms are posted.</p>
          </div>
        </div>

        <!-- The Modal -->
        <div id="myModal2" class="modal">
          <!-- Modal content -->
          <div class="modal-content" style="font-size: medium; height: 65%;">
            <span class="close2">&times;</span>
            <h3>Data Privacy Use</h3>
            <br>
            <p>All information we collect shall be kept private and confidential by the Thought Confederation and shall be used solely for legal purposes as mandated by the Data Privacy Act and other relevant laws. Information that are matters of public interest, however, may be disclosed to the public subject to applicable laws, rules, and regulations. Pictures taken during any activity may also be used in Thought Confederation's promotional and publicity materials.</p>
          </div>
        </div>
      </section>
    </main><!-- End #main -->
  
    @include('foot')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Telephone Code JS Files -->
    <script src="assets/js/data.js" type="text/javascript"></script>
    <script src="assets/js/data.min.js" type="text/javascript"></script>
    <script src="assets/js/intlTelInput-jquery.js" type="text/javascript"></script>
    <script src="assets/js/intlTelInput-jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/intlTelInput.js" type="text/javascript"></script>
    <script src="assets/js/intlTelInput.min.js" type="text/javascript"></script>
    <script src="assets/js/utils.js" type="text/javascript"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/js/address.js" type="text/javascript"></script>
    <script src="assets/js/create_account.js" type="text/javascript"></script>

    <!-- Responsible for implementing the Telephone JS -->
    <script>
    const input = document.querySelector("#phone");
    
    window.intlTelInput(input, {initialCountry: "auto", geoIpLookup: callback => {fetch("https://ipapi.co/json").then(res => res.json()).then(data => callback(data.country_code)).catch(() => callback("us"));},utilsScript: "/intl-tel-input/js/utils.js?"});


    var modal = document.getElementById("myModal");
    var modal2 = document.getElementById("myModal2");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    var btn2 = document.getElementById("myBtn2");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close2")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
    modal.style.display = "block";
    }

    btn2.onclick = function() {
    modal2.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    span2.onclick = function() {
    modal2.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) 
      {
        modal.style.display = "none";
      }
      else if(event.target == modal2)
      {
        modal2.style.display = "none";
      }
    } 

    </script>

<script>
  // Get the modal

</script>

    <script src="{{asset('assets/js/emailChecker.js')}}"></script>

  </body>

</html>