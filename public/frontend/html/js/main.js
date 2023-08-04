
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}


var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

/*(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
*/

// // Example starter JavaScript for disabling form submissions if there are invalid fields
// (function() {
//   'use strict';
//   window.addEventListener('load', function() {
//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.getElementsByClassName('needs-validation');
//     // Loop over them and prevent submission
//     var validation = Array.prototype.filter.call(forms, function(form) {
//       form.addEventListener('submit', function(event) {
//         if (form.checkValidity() === false) {
//           event.preventDefault();
//           event.stopPropagation();
//         }
//         form.classList.add('was-validated');
//       }, false);
//     });
//   }, false);
// })();


(function () {
  'use strict';
  window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {

              var failed = false;

              if ($("[name='check']:checked").length == 0) {
                  $("[name='check']").attr('required', true);
                  failed = true;
              }
              else {
                  $("[name='check']").attr('required', false);
              }

              if (form.checkValidity() === false) {
                  failed = true;
              }

              if (failed == true) {
                  event.preventDefault();
                  event.stopPropagation();
              }

              form.classList.add('was-validated');
          }, false);
      });
  }, false);
})();


(function () {
  'use strict';
  window.addEventListener('load', function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {

              var failed = false;

              if ($("[name='select']:checked").length == 0) {
                  $("[name='select']").attr('required', true);
                  failed = true;
              }
              else {
                  $("[name='select']").attr('required', false);
              }

              if (form.checkValidity() === false) {
                  failed = true;
              }

              if (failed == true) {
                  event.preventDefault();
                  event.stopPropagation();
              }

              form.classList.add('was-validated');
          }, false);
      });
  }, false);
})();
