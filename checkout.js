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
          event.preventDefault(); // Prevent immediate navigation
          if (typeof showToaster === 'function') {
            showToaster('Order has been placed successfully!');
            setTimeout(function() {
              form.submit(); // Submit after toaster is shown
            }, 1500);
          } else {
            alert('Order has been placed successfully!');
            form.submit();
          }
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
}());
