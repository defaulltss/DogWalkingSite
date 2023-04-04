$(document).ready(function() {
    $('login-submit').submit(function(event) {
      event.preventDefault();
  
      $.ajax({
        type: 'POST',
        url: 'login.php',
        data: $(this).serialize(),
        success: function(response) {
          if (response === 'error') {
            // Display error message in modal
            $('#error-message').text('Wrong email or password.');
            $('#error-modal').modal('show');
          } else {
            // Redirect to dashboard
            window.location.href = 'index.php';
          }
        }
      });
    });
  });
  