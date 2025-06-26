
//Profile dropdown
const profileDropdown = document.getElementById('profileDropdown');
const dropdownMenu = document.getElementById('dropdownMenu');

document.addEventListener('DOMContentLoaded', function() {
            
            if (profileDropdown && dropdownMenu) {
                profileDropdown.addEventListener('click', function(e) {
                    // e.preventDefault();
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
        minDate: moment(), // Prevent selection of past dates
        locale: {
            cancelLabel: 'Clear',
            applyLabel: 'Select Dates'
        },
        autoUpdateInput: false
    }, function(start, end, label) {
        console.log("Selected dates: " + start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
    });

    // Update the input field with MM/DD/YYYY format
    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(
            picker.startDate.format('MM/DD/YYYY') + 
            ' - ' + 
            picker.endDate.format('MM/DD/YYYY')
        );
    });

    // Clear the input on cancel
    $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
}); 

//receitp modal
// This script is now only for the modal display (after Laravel processes and returns the view)
document.addEventListener('DOMContentLoaded', function () {
    const data = window.modalData;

    if (data) {
        const modal = new bootstrap.Modal(document.getElementById('paymentReceiptModal'));

        // Populate modal with session data
        document.getElementById('modal-transaction-id').textContent = data.gcash_ref || 'N/A';
        document.getElementById('modal-date-time').textContent = new Date().toLocaleString();
        document.querySelector('.booking-details .fw-bold').textContent = data.booking_id;
        document.querySelector('.booking-details div:nth-child(2) + div span:nth-child(2)').textContent = data.room_type;
        document.getElementById('total_price').textContent = `₱${parseFloat(data.price).toLocaleString(undefined, { minimumFractionDigits: 2 })}`;

        // Check-in and out
        const allSpans = document.querySelectorAll('.booking-details .d-flex span');
        allSpans.forEach(span => {
            if (span.textContent.includes('Check-in')) span.nextElementSibling.textContent = data.check_in;
            if (span.textContent.includes('Check-out')) span.nextElementSibling.textContent = data.check_out;
        });

        // GCash details
        document.querySelector('.verification-section .row span:nth-child(2)').textContent = data.gcash_ref;
        document.querySelector('.verification-section .row span:last-child').textContent = '+63 ' + data.gcash_phone;

        modal.show();
    }
});



//action succesful modal
 const receiptModal = new bootstrap.Modal(document.getElementById('receiptActionModal'));
 const actionMsg = document.getElementById('receiptActionMessage');

 const emailBtn = document.getElementById('emailReceiptBtn');
 const downloadBtn = document.getElementById('downloadReceiptBtn');

    // Replace this with actual user email if available
 const userEmail = document.querySelector('input[name="email"]')?.value || 'your@email.com';
document.addEventListener('DOMContentLoaded', function () {

    downloadBtn.addEventListener('click', function (e) {
        e.preventDefault();
        actionMsg.textContent = 'Receipt downloaded successfully.';
        receiptModal.show();
    });

    emailBtn.addEventListener('click', function (e) {
        e.preventDefault();
        actionMsg.textContent = 'Email sent to ' + userEmail;
        receiptModal.show();
    });
}); 

// price summary 
document.addEventListener("DOMContentLoaded", function () {
    const daterangeInput = document.querySelector('input[name="daterange"]');
    const roomRatePerNight = 5500; // You can customize this per room type
    const rateFromBlade = parseFloat(document.getElementById('roomData')?.dataset.rate || 5500);
    const serviceCharge = 1200;

    function updatePriceSummary(nights) {
        const subtotal = nights * rateFromBlade;
        const taxesFees = subtotal * 0.15;
        const total = subtotal + taxesFees + serviceCharge;

        document.querySelector(".price-summary .price-row:nth-child(1) span:nth-child(1)").textContent = `Room (${nights} night${nights > 1 ? 's' : ''})`;
        document.querySelector(".price-summary .price-row:nth-child(1) span:nth-child(2)").textContent = `₱${subtotal.toLocaleString()}`;
        document.querySelector(".price-summary .price-row:nth-child(2) span:nth-child(2)").textContent = `₱${taxesFees.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
        document.querySelector(".price-summary .price-row:nth-child(3) span:nth-child(2)").textContent = `₱${serviceCharge.toLocaleString()}`;
        document.querySelector(".price-summary .total-row span:nth-child(2)").textContent = `₱${total.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
    }

    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
        const startDate = picker.startDate;
        const endDate = picker.endDate;

        const nights = endDate.diff(startDate, 'days');
        updatePriceSummary(nights);
    });

    // Optional: set default calculation if value exists on load
    if (daterangeInput.value.includes(' - ')) {
        const [startStr, endStr] = daterangeInput.value.split(' - ');
        const start = moment(startStr, 'MM/DD/YYYY');
        const end = moment(endStr, 'MM/DD/YYYY');
        const nights = end.diff(start, 'days');
        if (nights > 0) updatePriceSummary(nights);
    }
});
