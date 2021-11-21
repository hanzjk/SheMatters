
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next1").click(function () {
                var next1=true;

                if (document.getElementById("title").value===""){
                    next1=false;
                   document.getElementById("help_title").textContent="This field is required";
                }
                else{
                    document.getElementById("help_title").textContent="";

                }

                if (document.getElementById("v_age").value===""){
                    next1=false;
                   document.getElementById("help_vage").textContent="This field is requirefd";
                }
                else{
                    document.getElementById("help_vage").textContent="";

                }

////////////////victim
                if (document.getElementById("v_name").value===""){
                    next1=false;
                   document.getElementById("help_vname").textContent="This field is required";
                }

               else if( (/^[a-zA-Z ]*$/).test(document.getElementById("v_name").value)!=true  ){
                   next1=false;
                document.getElementById("help_vname").textContent="Only letters are allowed";

               }
               else{
                document.getElementById("help_vname").textContent="";  
               }

                if (document.getElementById("v_address").value===""){
                    next1=false;
                    document.getElementById("help_vaddress").textContent="This field is required";
                }
                else{
                    document.getElementById("help_vaddress").textContent="";
                }

                if (document.getElementById("v_district").value===""){
                    next1=false
                    document.getElementById("help_vdistrict").textContent="This field is required";
                }
                else{

                    document.getElementById("help_vdistrict").textContent="";
                }

                if ((/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(document.getElementById("v_email").value))!=true && document.getElementById("v_email").value!=""){
                    document.getElementById("help_email").textContent="Invalid Email Address";
                    next1=false;

                }
                else{
                    document.getElementById("help_email").textContent="";
                }

                if((/^[0-9Vv]{10}|[0-9]{12}/.test(document.getElementById("v_nic").value))!=true && document.getElementById("v_nic").value!=""){
                    next1=false;
                    document.getElementById("help_nic").textContent="Only 9 Numbers with V or v is allowed for the old version while only 12 Numbers are allowed for the new version";
                }

                else{
                    document.getElementById("help_nic").textContent="";
   
                }

                if((/[0-9]{10}/.test(document.getElementById("v_contact").value))!=true && document.getElementById("v_contact").value!=""){
                    next1=false;
                    document.getElementById("help_contact").textContent="Only 10 digits are allowed for the contact number";
    
                }
                else{
                    document.getElementById("help_contact").textContent="";
    
                }


    


        
              
                if(next1===true){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({ 'opacity': opacity });
                    },
                    duration: 600
                });
            }
            });


            $(".next2").click(function () {
                var next2=true;

/////////Accused Party
             
             if( (/^[a-zA-Z ]*$/).test(document.getElementById("r_name").value)!=true  ){
                   next2=false;
                document.getElementById("help_rname").textContent="Only letters are allowed";

               }
               else{
                document.getElementById("help_rname").textContent="";  
               }



            
            if (document.getElementById("r_sex").value===""){
                next2=false
                document.getElementById("help_rsex").textContent="This field is required";
            }
            else{
                document.getElementById("help_rsex").textContent="";
            }


            
            if (document.getElementById("r_age").value===""){
                next2=false
                document.getElementById("help_rage").textContent="This field is required";
            }
            else{
                document.getElementById("help_rage").textContent="";
            }


            ///////////Witnesses//////////////////

            if( (/^[a-zA-Z ]*$/).test(document.getElementById("w_name1").value)!=true  ){
                next2=false;
             document.getElementById("help_wname1").textContent="Only letters are allowed";

            }
            else{
             document.getElementById("help_wname1").textContent="";  
            }

            
            if( (/^[a-zA-Z ]*$/).test(document.getElementById("w_name2").value)!=true  ){
                next2=false;
             document.getElementById("help_wname2").textContent="Only letters are allowed";

            }
            else{
             document.getElementById("help_wname2").textContent="";  
            }


            if((/[0-9]{10}/.test(document.getElementById("w_contact1").value))!=true && document.getElementById("w_contact1").value!=""){
                next2=false;
                document.getElementById("help_wcontact1").textContent="Only 10 digits are allowed for the contact number";

            }

            else{
                document.getElementById("help_wcontact1").textContent="";

            }


            
            if((/[0-9]{10}/.test(document.getElementById("w_contact2").value))!=true && document.getElementById("w_contact2").value!=""){
                next2=false;
                document.getElementById("help_wcontact2").textContent="Only 10 digits are allowed for the contact number";

            }

            else{
                document.getElementById("help_wcontact2").textContent="";

            }



       
                if(next2===true){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({ 'opacity': opacity });
                    },
                    duration: 600
                });
            }
            });


            $(".next3").click(function () {
                var next3=true;
////////////////incident
                if (document.getElementById("i_date").value===""){
                    next3=false;
                   document.getElementById("help_idate").textContent="This field is required";
                }

               else{
                document.getElementById("help_idate").textContent="";  
               }

                if (document.getElementById("i_location").value===""){
                    next3=false;
                    document.getElementById("help_ilocation").textContent="This field is required";
                }
                else{
                    document.getElementById("help_ilocation").textContent="";
                }

                if (document.getElementById("i_description_state").value===""){
                    next3=false
                    document.getElementById("help_istate").textContent="This field is required";
                }
                else{
                    document.getElementById("help_istate").textContent="";
                }

                
                if (document.getElementById("i_description").value===""){
                    next3=false
                    document.getElementById("help_idescription").textContent="This field is required";
                }
                else{
                    document.getElementById("help_idescription").textContent="";
                }

               
                if(next3===true){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({ 'opacity': opacity });
                    },
                    duration: 600
                });
            }
            });

            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({ 'opacity': opacity });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {
                return false;
            });

    