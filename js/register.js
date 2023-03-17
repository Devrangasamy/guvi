function submitForm() {
  var name = $("input[name=name]").val();
  var email = $("input[name=email]").val();
  var dob = $("input[name=dob]").val();
  var age = $("input[name=age]").val();
  var password = $("input[name=password]").val();
  var mobile = $("input[name=mobile]").val();
    var formData = {
      name: name,
      email: email,
      age:age,
      dob:dob,
      password: password,
      mobile: mobile
    };
    $.ajax({
      url: "http://localhost/guvi/php/register.php",
      type: "POST",
      data: formData,
      success: function (response) {
        kk;
      },
    });
    alert("registration successfulll");
  }