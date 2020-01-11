var dropdown = document.querySelectorAll('.dropdown-list'),
    dropdownArray = Array.prototype.slice.call(dropdown, 0);

dropdownArray.forEach(function(el) {
  var button = el.querySelector('a[dropdown-prop="title"]'),
      menu   = el.querySelector('.dropdown-list-items'),
			icon   = button.querySelector('i.dropdown-icon'),
     
			toggleDropdown = function() {
				classie.toggleClass(menu, 'dropdown-list-open');
				classie.toggleClass(icon, 'dropdown-icon-open');
			};
  
			button.addEventListener('click', toggleDropdown);
});