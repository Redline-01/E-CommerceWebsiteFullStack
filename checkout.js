(function () {
  'use strict';

  window.addEventListener('load', function () {
    var forms = document.getElementsByClassName('needs-validation');

    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
       
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else {
         
          alert("Order has been placed successfully!");
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
}());
