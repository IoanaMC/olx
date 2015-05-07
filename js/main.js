$(window).load(function() {
 
  $("#form-insert").validate({
    rules: {
      titlu : {
        required: true,
        minlength: 2
      },
      atasament: {
        required: true
      },
	    selectie: {
  		  required: true
  	  },
  	  descriere: {
  	    required: true
  	  }
    },
    messages: {
      titlu: {
        required: "Introduceti un titlu",
        minlength: "Titlul trebuie sa aiba minim 2 caractere"
      },
      atasament: {
		    required: "Incarcati un fisier"
	    },
  	  selectie: {
  		  required: "Selectati o categorie"
  	  },
  	  descriere: {
  		  required: "Introduceti o descriere"
  	  }
    }
  }); 
  
  $("#form-contact").validate({
    rules: {
      name : {
        required: true,
        minlength: 2
      },
      subject : {
        required: true,
      },
      message : {
        required: true,
      },
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      name: {
        required: "Introduceti un nume valid",
        minlength: "Numele trebuie sa aiba minim 2 caractere"
      },
      subject: {
        required: "Introduceti un subiect"
      },
      message: {
        required: "Introduceti un mesaj"
      },
      email: "Introduceti un email valid"
    }
  });  

  var enterName = $('#name').attr('data-name');
  var enterSurname = $('#surname').attr('data-surname');
  var enterPhone = $('#phone').attr('data-telephone');
  var enterValidPhone = $('#phone').attr('data-valid-telephone');
  var enterEmail = $('#email').attr('data-email');
  var enterValidEmail = $('#email').attr('data-valid-email');
  var enterPassword = $('#password').attr('data-password');
  var enterConfirmPass = $('#confirm-password').attr('data-confirm-pass');
  var minLengthRequired = $('#name').attr('data-minLen');

  $("#form-create-account").validate({
      rules: {
          name: {
              required: true,
              minlength: 4
          },
          surname: {
              required: true,
              minlength: 4
          },
          email: {
              required: true,
              email: true
          },
          phone: {
              required: true,
              number: true
          },
          password: {
              required: true,
              minlength: 4
          },
          confirm_password: {
              required: true,
              equalTo: "#password"
          }
      },
      messages: {
          name: {
              required: enterName,
              minlength: minLengthRequired
          },
          surname: {
              required: enterSurname,
              minlength: minLengthRequired
          },
          phone: {
              required: enterPhone,
              number: enterValidPhone
          },
          email: {
              required: enterEmail,
              email: enterValidEmail
          },
          password: {
              required: enterPassword,
              minlength: minLengthRequired
          },
          confirm_password: {
              required: enterPassword,
              equalTo: "Introduceti aceeasi parola"
          }
      }
  }); 
  
  $("#form-login").validate({
    rules: {
      NumeUser : {
        required: true,
        minlength: 4
      },
      Parola : {
        required: true
      }
    },
    messages: {
      NumeUser: {
        required: "Introduceti un nume",
        minlength: "Numele trebuie sa aiba minim 4 caractere"
      },
      Parola: {
        required: "Introduceti parola"
      }
    }
  }); 
  
  /*flexslider*/
  $('.flexslider').flexslider({
    animation: "slide"
  });

});

$(document).ready(function(){
})