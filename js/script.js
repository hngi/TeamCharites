
            // SELECTING ALL TEXT ELEMENTS

        var username1 = document.forms['uform']['username1'];
        var password1 = document.forms['uform']['password1'];



        var firstname = document.forms['vform']['firstname'];
        var lastname = document.forms['vform']['lastname'];
        var username = document.forms['vform']['username'];
        var email = document.forms['vform']['email'];
        var password = document.forms['vform']['password'];
        var password_confirm =document.forms['vform']['password_confirm'];

        //  password between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lower case character
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        var letters = /^[A-Za-z]+$/;




        // SELECTING ALL ERROR DISPLAY ELEMENTS

        var username1_error = document.getElementById('username1_error');
        var pass1_error=  document.getElementById('pass1_error');


        var fname_error = document.getElementById('fname_error');
        var lname_error = document.getElementById('lname_error');
        var username_error = document.getElementById('username_error');
        var email_error = document.getElementById('email_error');
        var pass_error=  document.getElementById('pass_error');
        var password_error = document.getElementById('password_error');


        

        function Validate2(){

          if (username1.value == "") {
            username1.style.border = "1px solid red";
            document.getElementById('username1_div').style.color = "red";
            username1_error.textContent = "Your username is required";
            username1.focus();
            return false;
          } else{
              username1.style.border = "1px solid #5e6e66";
              document.getElementById('username1_div').style.color = "green";
              username1_error.innerHTML = "";
          }



          if (password1.value == "") {
            password1.style.border = "1px solid red";
            document.getElementById('password1_div').style.color = "red";
            // password_confirm.style.border = "1px solid red";
            pass1_error.textContent = "Password is required";
            password1.focus();
            return false;
          }else{
            password1.style.border = "1px solid #5e6e66";
            document.getElementById('password1_div').style.color = "green";
            pass1_error.innerHTML = "";
            return true;
          }   

      }


        // validation function
        function Validate1() {
          


          // validate username
          if (firstname.value == "") {
            firstname.style.border = "1px solid red";
            document.getElementById('firstname_div').style.color = "red";
            fname_error.textContent = "Your First name is required";
            firstname.focus();
            return false;
          } else{
            firstname.style.border = "1px solid #5e6e66";
            document.getElementById('firstname_div').style.color = "green";
            fname_error.innerHTML = "";
            // return true;
          }

          // validate username
          if (firstname.value.length < 3) {
            firstname.style.border = "1px solid red";
            document.getElementById('firstname_div').style.color = "red";
            fname_error.textContent = "Your name must be at least 3 characters";
            firstname.focus();
            return false;
          }else{
            firstname.style.border = "1px solid #5e6e66";
            document.getElementById('firstname_div').style.color = "green";
            fname_error.innerHTML = "";
            // return true;
          }

          if(!firstname.value.match(letters)){
            firstname.style.border = "1px solid red";
              document.getElementById('firstname_div').style.color = "red";
              fname_error.textContent = "Your first name must be in alphabets only";
              firstname.focus();
              return false;
          }else{
            firstname.style.border = "1px solid #5e6e66";
            document.getElementById('firstname_div').style.color = "green";
            fname_error.innerHTML = "";
          }

          


          if (lastname.value == "") {
            lastname.style.border = "1px solid red";
            document.getElementById('lastname_div').style.color = "red";
            lname_error.textContent = "Your Last name is required";
            lastname.focus();
            return false;
          }else{
            lastname.style.border = "1px solid #5e6e66";
            document.getElementById('lastname_div').style.color = "green";
            lname_error.innerHTML = "";
            // return true;
          }


           if(!lastname.value.match(letters)){
            lastname.style.border = "1px solid red";
              document.getElementById('lastname_div').style.color = "red";
              lname_error.textContent = "Your last name must be in alphabets only";
              lastname.focus();
              return false;
          } else{
            lastname.style.border = "1px solid #5e6e66";
            document.getElementById('lastname_div').style.color = "green";
            lname_error.innerHTML = "";
            // return true;
          }
          

          // validate username
          if (lastname.value.length < 3) {
            lastname.style.border = "1px solid red";
            document.getElementById('lastname_div').style.color = "red";
            lname_error.textContent = "Your name must be at least 3 characters";
            lastname.focus();
            return false;
          }else{
            lastname.style.border = "1px solid #5e6e66";
            document.getElementById('lastname_div').style.color = "green";
            lname_error.innerHTML = "";
            // return true;
          }

          if (username.value == "") {
            username.style.border = "1px solid red";
            document.getElementById('username_div').style.color = "red";
            username_error.textContent = "Your username is required";
            username.focus();
            return false;
          }else{
            username.style.border = "1px solid #5e6e66";
            document.getElementById('username_div').style.color = "green";
            username_error.innerHTML = "";
            // return true;
          }

          // validate email
          if (email.value == "") {
            email.style.border = "1px solid red";
            document.getElementById('email_div').style.color = "red";
            email_error.textContent = "Email is required";
            email.focus();
            return false;
          }else{
            email.style.border = "1px solid #5e6e66";
            document.getElementById('email_div').style.color = "green";
            email_error.innerHTML = "";
            // return true;
          }

          if(!email.value.match(mailformat)){
              email.style.border = "1px solid red";
              document.getElementById('email_div').style.color = "red";
              email_error.textContent = "Please enter a valid email address. Include '@' and '.' symbols";
              email.focus();
              return false;
          }else{
            email.style.border = "1px solid #5e6e66";
            document.getElementById('email_div').style.color = "green";
            email_error.innerHTML = "";
          }
        
          // validate password
          if (password.value == "") {
            password.style.border = "1px solid red";
            document.getElementById('password_div').style.color = "red";
            // password_confirm.style.border = "1px solid red";
            pass_error.textContent = "Password is required";
            password.focus();
            return false;
          }else{
            password.style.border = "1px solid #5e6e66";
            document.getElementById('password_div').style.color = "green";
            pass_error.innerHTML = "";
            // return true;
          }

          if(!password.value.match(passw))
          {
            password.style.border = "1px solid red";
            document.getElementById('password_div').style.color = "red";
            // password_confirm.style.border = "1px solid red";
            pass_error.textContent = "Your password must be between 6 to 20 chacters. It should contain at least one numeric digit, one uppercase and one lower case letter";
            password.focus();
            return false;
          } else if(password.value.match(passw)){
            password.style.border = "1px solid #5e6e66";
            document.getElementById('password_div').style.color = "green";
            pass_error.innerHTML = "";
          }


          
          // check if the two passwords match
          if (password.value != password_confirm.value) {
             password.style.border = "1px solid red";
            document.getElementById('pass_confirm_div').style.color = "red";
            // password_confirm.style.border = "1px solid red";
            password_error.innerHTML = "The two passwords do not match";

            return false;
          }else{
            password.style.border = "1px solid #5e6e66";
            document.getElementById('pass_confirm_div').style.color = "green";
            password_error.innerHTML = "";
            return true;
          }

        }


