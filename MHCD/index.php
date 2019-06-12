<?php
include_once("topheader.php");
?>
        <div class="container" id="goi" ><br>
            <h2 class="text-strong text-center" style="color:dodgerblue;">CUSTOMER DETAILS</h1><br>
                <form action="addcustomer.php" method="post">
                        <div class="form-group">
                          <label for="companyName">Company Name</label>
                          <input type="plaintext" class="form-control" name="companyName" aria-describedby="emailHelp" placeholder="Enter Company Name" required>
                        </div>
                        <div class="form-group">
                          <label for="address">Company Address</label>
                          <input type="plaintext" class="form-control" name="companyAddress" placeholder="Enter Company Address" required>
                        </div>
                        <div class="form-group">
                                <label for="contact">Contact Number</label>
                                <input type="phone" class="form-control" name="contactNumber" placeholder="Enter Contact Number" required>
                        </div>
                        <div class="form-group">
                                <label for="person">Contact Person</label>
                                <input type="plaintext" class="form-control" name="contactPerson" placeholder="Enter Contact Person" required>
                        </div>
                        <div class="form-group">
                                <label for="gst">GST NO.</label>
                                <input type="plaintext" class="form-control" name="gst" placeholder="Enter Company GST NO." required>
                        </div>
                        <div class="form-group">
                                <label for="pan">PAN NO.</label>
                                <input type="plaintext" class="form-control" name="pan" placeholder="Enter Company PAN NO" required>
                        </div>
                        <div class="form-group">
                                <label for="itemName">Name of Item</label>
                                <input type="plaintext" class="form-control" name="itemName" placeholder="Enter Item Name" required>
                        </div>
                        <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="plaintext" class="form-control" name="quantity" placeholder="Enter Quantity" required>
                        </div>
                        <div class="form-group">
                                <label for="surfaceArea">Surface Area</label>
                                <input type="plaintext" class="form-control" name="surfaceArea" placeholder="Enter Surface Area" required>
                        </div>
                        <hr style="border-top: 2px solname #000">
                       
                    <h2 class="text-strong text-center" style="color:dodgerblue;">FINISHED DETAILS</h2><br>
                        <label>JOBS</label><br>
                        <select class="selectpicker" onchange="showInput()" name="job[]" multiple>
                                <option >Powder Coating</option>
                                <option >Lacquering</option>
                                <option >Electroplating</option>
                                <option >Phosphating</option>
                                <option >Polisihing</option>
                                <option >Testing [RTC Laboratory]</option>
                                <option >Others</option>
                        </select>
                       
                        <script>
                            var flag=0;
                            function showInput(){
                                var s=document.getElementsByName('job[]')[0];
                                //console.log(s.options[2].selected);
                                //var text=s.options[s.selectedIndex].value;
                                //document.getElementById('display').innerHTML=text;
                                var display = document.getElementById("display");
                                if(s.options[2].selected==true && flag==0)
                                {
                                    flag=1;
                                display.appendChild(document.createTextNode("Electroplating Type:"));
                                var input = document.createElement("select");
                                
                                var option = document.createElement("option");
                                option.text = "Kiwi";
                               //option.value=1;
                                input.add(option,0);
                                    
                                var option2 = document.createElement("option");
                                option2.text = "Biwi";
                                    //option2.value=2;
                                input.add(option2,1);
                                    
                                var option3 = document.createElement("option");
                                option3.text = "Giwi";
                                    //option3.value=3;
                                input.add(option3,2);

                                var option4 = document.createElement("option");
                                option4.text = "Liwi";
                                    //option4.value=4;
                                input.add(option4,3);
                                    
                                //input.multiple=true;
                                //input.classList.add('selectpicker');
                                
                                input.name='platingType';
                                display.appendChild(input);
                                //container.appendChild(document.createElement("br"));
                                };
                                if(s.options[2].selected==false)
                                {
                                    flag=0;
                                   var display = document.getElementById("display");
                                    display.innerHTML='';
                                }
                            };    
                            
                        </script>
                        <br/><br/>
                        <p id="display"></p>
                    <br><br>
                        <span class="text-strong" style="color:red;">Note : Press CTRL key to select multiple options.</span><br><br>
                        <div class="form-group">
                            <label for="comment">Remarks</label>
                            <textarea class="form-control" rows="5" style="resize:none;"name="remarks"></textarea>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"  required>
                            <label class="form-check-label" for="exampleCheck1">I Agree</label>
                        </div><br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="max-wnameth:400px;">Submit</button>
                        </div>
                      </form><br><br>
        </div>
    </body>