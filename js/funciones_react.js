jQuery(document).ready(function(){
  // Listen for the input event.
  jQuery("#kilometrosrecorridos").on('input', function (evt) {
    // Allow only numbers.
    jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
  });
});
