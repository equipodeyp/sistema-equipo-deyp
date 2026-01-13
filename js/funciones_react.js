jQuery(document).ready(function(){
  // Listen for the input event.
  jQuery("#kilometrosrecorridos").on('input', function (evt) {
    // Allow only numbers.
    jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
  });
});


function toggleSubmenu(element) {
    var submenu = element.nextElementSibling;
    var icon = element.querySelector('.fa-chevron-down');

    if(submenu.style.display === "none") {
        submenu.style.display = "block";
        icon.style.transform = "rotate(180deg)";
    } else {
        submenu.style.display = "none";
        icon.style.transform = "rotate(0deg)";
    }
}
