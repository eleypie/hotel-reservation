
//Profile dropdown
const profileDropdown = document.getElementById('profileDropdown');
const dropdownMenu = document.getElementById('dropdownMenu');

document.addEventListener('DOMContentLoaded', function() {
            
            if (profileDropdown && dropdownMenu) {
                profileDropdown.addEventListener('click', function(e) {
                    e.preventDefault();
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!profileDropdown.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.style.display = 'none';
                    }
                });
            }
        }); 

//deluxe room carousel
const mainCarousel = document.getElementById('mainCarousel');
const thumbnails = document.querySelectorAll('#carousel-thumbs img');
document.addEventListener('DOMContentLoaded', function() {
            mainCarousel.addEventListener('slid.bs.carousel', function (e) {
                const activeIndex = e.to;
                
                thumbnails.forEach((thumb, index) => {
                    thumb.classList.remove('selected');
                    if (parseInt(thumb.getAttribute('data-bs-slide-to')) === activeIndex) {
                        thumb.classList.add('selected');
                    }
                });
            });
            
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    thumbnails.forEach(t => t.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
        }); 

//date range picker
$(function() {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        minDate: moment(), // This prevents selection of past dates
        locale: {
            cancelLabel: 'Clear',
            applyLabel: 'Select Dates'
        },
        autoUpdateInput: false // This gives us more control over the display
    }, function(start, end, label) {
        console.log("Selected dates: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    
    // Update the input field when dates are selected
    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(
            picker.startDate.format('MMM D, YYYY') + 
            ' - ' + 
            picker.endDate.format('MMM D, YYYY')
        );
    });
    
    // Clear the input when cancelled
    $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
});