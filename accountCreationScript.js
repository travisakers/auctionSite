$(document).ready(function() {
  $('#existing_user').hide();
  $('#new_user').hide();



    $("#accountSubmitButton").click(function() {
       var first = $("#first").val();           //first name field with id = first
       var last = $("#last").val();             //last name field with id = last
       var email = $("#email").val();           //email field with id = email
       var username = $("#username").val();     //username field with id = username
       var password = $("#password").val();     //password field with id = password
       //create dataString for accountCreation.php
       var dataString = 'first1='+first+'&last1='+last+'&email1='+email+'&username1='+username+'&password1='+password;
       if(first==''||last==''||email==''||username==''||password=='') {          //if some fields are left blank
           alert("Please fill all fields");               
       }else {
           $.ajax({
               type: "POST",
               url: "accountCreation.php",
               data: dataString,
               cache: false,
               success: function(result){
                   alert(result);
               }
           });
       }
       return false;
    });
});