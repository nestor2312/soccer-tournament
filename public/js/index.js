$(document).ready(function() {
    $('.flip').click(function(event) {
      $(this).closest('.card').find('.card-body').toggleClass('flipped');
    });
  });