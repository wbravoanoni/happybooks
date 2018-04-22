
/* Validar CAPTCHA  */
function get_action(form) {

var v = grecaptcha.getResponse();
if(v.length == 0)
{
   // document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";

   alert("Error, ingresa el Captcha");
    return false;
}
 if(v.length != 0)
 {
   // document.getElementById('captcha').innerHTML="Captcha completed";
    return true; 
 }
}