// Make sure DOM is loaded before adding event listeners
const roomSelect = document.getElementById('bookingRoom');
const totalAmountInput = document.getElementById('totalAmount');
const checkInInput = document.getElementById('check_in_date');
const checkOutInput = document.getElementById('check_out_date');

document.addEventListener('DOMContentLoaded', function() {
    initializeBookingDateRangePicker();
    // booking total computation

    
    $('#bookingDates').on('apply.daterangepicker', function () {
        calculateTotal();
    });
    
    // // format date for database
    // const bookingDates = $('#bookingDates');
    // const checkInField = $('#check_in_date');
    // const checkOutField = $('#check_out_date');

    // if (bookingDates.length) {
    //     bookingDates.daterangepicker({
    //         autoUpdateInput: false,
    //         minDate: moment(), 
    //         locale: {
    //             cancelLabel: 'Clear',
    //             format: 'YYYY-MM-DD'
    //         }
    //     });

    //     bookingDates.on('apply.daterangepicker', function (ev, picker) {
    //         $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
    //         checkInField.val(picker.startDate.format('YYYY-MM-DD'));
    //         checkOutField.val(picker.endDate.format('YYYY-MM-DD'));
    //         console.log("date changed");
    //     });

    //     bookingDates.on('cancel.daterangepicker', function (ev, picker) {
    //         $(this).val('');
    //         checkInField.val('');
    //         checkOutField.val('');
    //     });
    //     calculateTotal();
    // }

    // [checkInInput, checkOutInput].forEach(input => {
    //     if (input) {
    //         input.addEventListener('change', calculateTotal);
    //         input.addEventListener('input', calculateTotal);
    //     }
    // });
});

function calculateTotal() {
        const roomOption = roomSelect.options[roomSelect.selectedIndex];
        const price = parseFloat(roomOption.getAttribute('data-price')) || 0;
        
        const checkInDate = new Date(checkInInput.value);
        const checkOutDate = new Date(checkOutInput.value);
        
        if (!isNaN(checkInDate.getTime()) && !isNaN(checkOutDate.getTime()) && price > 0) {
            const diffTime = checkOutDate - checkInDate;
            const nights = diffTime / (1000 * 60 * 60 * 24);
            
            if (nights > 0) {
                const total = nights * price;
                totalAmountInput.value = total.toFixed(2);
            } else {
                totalAmountInput.value = '';
            }
        } else {
            totalAmountInput.value = '';
        }
    }

function initializeBookingDateRangePicker() {
    const bookingDates = $('#bookingDates');
    const checkInField = $('#check_in_date');
    const checkOutField = $('#check_out_date');
    const roomSelect = $('#bookingRoom');

    if (bookingDates.length) {
        bookingDates.off('apply.daterangepicker');
        bookingDates.off('cancel.daterangepicker');

        bookingDates.daterangepicker({
            autoUpdateInput: false,
            minDate: moment(),
            locale: {
                cancelLabel: 'Clear',
                format: 'YYYY-MM-DD'
            }
        });

        bookingDates.on('apply.daterangepicker', function (ev, picker) {
            const formatted = picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD');
            $(this).val(formatted);
            checkInField.val(picker.startDate.format('YYYY-MM-DD'));
            checkOutField.val(picker.endDate.format('YYYY-MM-DD'));
            console.log("Date changed");
            calculateTotal();
        });

        bookingDates.on('cancel.daterangepicker', function () {
            $(this).val('');
            checkInField.val('');
            checkOutField.val('');
        });

        if (checkInField.val() && checkOutField.val()) {
            calculateTotal();
        }

        if (roomSelect.length) {
            roomSelect.on('change', calculateTotal);
        }
    }
}


// Navigation functionality
function showSection(sectionName, clickedElement = null) {
    // Hide all sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.classList.add('hidden'));
    
    // Show selected section
    document.getElementById(sectionName).classList.remove('hidden');
    
    // Update active nav link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => link.classList.remove('active'));
    
    if (clickedElement) {
        clickedElement.classList.add('active');
    } else {
        // If no element provided, find the nav link for this section
        const targetLink = document.querySelector(`[onclick="showSection('${sectionName}')"]`);
        if (targetLink) {
            targetLink.classList.add('active');
        }
    }
}

// Modal functionality
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Close modal when clicking outside
window.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
        e.target.style.display = 'none';
    }
});

// Add Room Form
// document.getElementById('addRoomForm').addEventListener('submit', function(e) {
//     e.preventDefault();
    
//     const roomNumber = document.getElementById('roomNumber').value;
//     const roomType = document.getElementById('roomType').value;
//     const roomRate = document.getElementById('roomRate').value;
//     const roomStatus = document.getElementById('roomStatus').value;
//     const roomAmenities = document.getElementById('roomAmenities').value;
    
//     // Add new row to rooms table
//     const table = document.getElementById('roomsTable').getElementsByTagName('tbody')[0];
//     const newRow = table.insertRow();
    
//     const statusClass = roomStatus.toLowerCase() === 'available' ? 'status-available' : 
//                         roomStatus.toLowerCase() === 'occupied' ? 'status-occupied' : 'status-maintenance';
    
//     newRow.innerHTML = `
//         <td>${roomNumber}</td>
//         <td>${roomType}</td>
//         <td>${roomRate}</td>
//         <td><span class="status-badge ${statusClass}">${roomStatus}</span></td>
//         <td>${roomAmenities}</td>
//         <td>
//             <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
//             <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
//         </td>
//     `;
    
//     this.reset();
//     closeModal('addRoomModal');
//     alert('Room added successfully!');
// });

// Add Booking Form
// document.getElementById('addBookingForm').addEventListener('submit', function(e) {
//     e.preventDefault();
    
//     const guestName = document.getElementById('guestName').value;
//     const guestEmail = document.getElementById('guestEmail').value;
//     const room = document.getElementById('bookingRoom').value;
//     const checkIn = document.getElementById('checkInDate').value;
//     const checkOut = document.getElementById('checkOutDate').value;
//     const total = document.getElementById('totalAmount').value;
    
//     // Generate booking ID
//     const bookingId = '#BK' + String(Math.floor(Math.random() * 1000)).padStart(3, '0');
    
//     this.reset();
//     closeModal('addBookingModal');
//     alert(`Booking ${bookingId} created successfully for ${guestName}!`);
// });

// Assign Staff Form
// document.getElementById('assignStaffForm').addEventListener('submit', function(e) {
//     e.preventDefault();
    
//     const room = document.getElementById('assignRoom').value;
//     const task = document.getElementById('taskType').value;
//     const staff = document.getElementById('assignedStaff').value;
//     const priority = document.getElementById('priority').value;
    
//     this.reset();
//     closeModal('assignStaffModal');
//     alert(`${task} task assigned to ${staff} for Room ${room} with ${priority} priority!`);
// });

// Room management functions
function editRoom(button) {
    const row = button.closest('tr');
    const roomNumber = row.cells[0].textContent;
    alert(`Edit room ${roomNumber} functionality would be implemented here.`);
}

function deleteRoom(button) {
    if (confirm('Are you sure you want to delete this room?')) {
        const row = button.closest('tr');
        row.remove();
        alert('Room deleted successfully!');
    }
}

// Check-in/out functions
function checkIn(button) {
    const row = button.closest('tr');
    const guestName = row.cells[0].textContent;
    const statusCell = row.cells[3];
    statusCell.innerHTML = '<span class="status-badge status-confirmed">Checked In</span>';
    button.textContent = 'Completed';
    button.disabled = true;
    button.className = 'btn btn-warning';
    alert(`${guestName} has been checked in successfully!`);
}

function setCleaningStatus(button) {
    const row = button.closest('tr');
    const roomNumber = row.cells[1].textContent;
    button.textContent = 'Cleaning Assigned';
    button.disabled = true;
    alert(`Cleaning status set for Room ${roomNumber}!`);
}

function showSideNav() {
    const sidebar = document.getElementById('sideNav');
    sidebar.classList.toggle('sidebar-visible');
    document.getElementById('navbarContent').classList.toggle('show');
}

// Initialize dashboard on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set today's date as default for date inputs
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('checkInDate').value = today;
    document.getElementById('checkOutDate').value = today;
});

document.addEventListener("DOMContentLoaded", function () {
    const bookingInput = $('#bookingDates');
    const checkInInput = $('#check_in_date');
    const checkOutInput = $('#check_out_date');
    const roomSelect = $('#bookingRoom');

    roomSelect.on('change', function () {
        const roomTypeId = $(this).val();
        console.log("selected " + roomTypeId);
        if (!roomTypeId) return;

        fetch(`/room-availability?room_type=${roomTypeId}`)
            .then(res => res.json())
            .then(data => {
                console.log('Unavailable dates:', data.unavailable_dates);
                updateDateRangePicker(data.unavailable_dates);
            });
    });

    function updateDateRangePicker(unavailableDates) {
        bookingInput.data('daterangepicker')?.remove(); // Destroy existing instance

        bookingInput.daterangepicker({
            isInvalidDate: function(date) {
                return unavailableDates.includes(date.format('YYYY-MM-DD'));
            },
            minDate: moment(),                
            minSpan: { days: 1 },
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                format: 'YYYY-MM-DD'
            }
        });

        bookingInput.on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            checkInInput.val(picker.startDate.format('YYYY-MM-DD'));
            checkOutInput.val(picker.endDate.format('YYYY-MM-DD'));
            calculateTotal();
        });

        bookingInput.on('cancel.daterangepicker', function () {
            $(this).val('');
            checkInInput.val('');
            checkOutInput.val('');
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.querySelector('.nav-toggle');
    const closeSidebar = document.querySelector('.close-sidebar');
    const sidebar = document.querySelector('.sidebar');

    if (navToggle && sidebar) {
        navToggle.addEventListener('click', function () {
            sidebar.classList.add('active');
        });
    }

    if (closeSidebar && sidebar) {
        closeSidebar.addEventListener('click', function () {
            sidebar.classList.remove('active');
        });
    }

    // Add active class to nav items
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');

            // Close sidebar on mobile after selecting an item
            if (window.innerWidth <= 992) {
                sidebar?.classList.remove('active');
            }
        });
    });

    // Animate stat cards on load
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';

        setTimeout(() => {
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 150);
    });
});


// function calculateTotal() {
//     const roomTypeSelect = document.getElementById('bookingRoom');
//     const checkInDate = document.getElementById('check_in_date');
//     const checkOutDate = document.getElementById('check_out_date');
//     const nightsInput = document.getElementById('nights');
//     const totalAmountInput = document.getElementById('totalAmount');
    
//     if (roomTypeSelect.value && checkInDate.value && checkOutDate.value) {
//         const checkIn = new Date(checkInDate.value);
//         const checkOut = new Date(checkOutDate.value);
//         const timeDiff = checkOut.getTime() - checkIn.getTime();
//         const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
        
//         if (nights > 0) {
//             const selectedOption = roomTypeSelect.options[roomTypeSelect.selectedIndex];
//             const pricePerNight = parseFloat(selectedOption.getAttribute('data-price'));
//             const totalAmount = nights * pricePerNight;
            
//             nightsInput.value = nights;
//             totalAmountInput.value = totalAmount.toFixed(2);
//         } else {
//             nightsInput.value = '';
//             totalAmountInput.value = '';
//             showError('checkOutError', 'Check-out date must be after check-in date');
//         }
//     }
// }

function showError(errorId, message) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = message;
    errorElement.classList.add('show');
}

function hideError(errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.classList.remove('show');
}

function validateForm() {
    let isValid = true;

    document.querySelectorAll('.error-message').forEach(el => el.classList.remove('show'));

    const requiredFields = [
        { id: 'firstName', errorId: 'firstNameError', message: 'First name is required' },
        { id: 'lastName', errorId: 'lastNameError', message: 'Last name is required' },
        { id: 'email', errorId: 'emailError', message: 'Email is required' },
        { id: 'phone', errorId: 'phoneError', message: 'Phone number is required' },
        { id: 'guestCount', errorId: 'guestCountError', message: 'Number of guests is required' },
        { id: 'roomType', errorId: 'roomTypeError', message: 'Room type is required' },
        { id: 'checkInDate', errorId: 'checkInError', message: 'Check-in date is required' },
        { id: 'checkOutDate', errorId: 'checkOutError', message: 'Check-out date is required' },
        { id: 'paymentMethod', errorId: 'paymentMethodError', message: 'Payment method is required' }
    ];

    requiredFields.forEach(field => {
        const element = document.getElementById(field.id);
        if (!element.value.trim()) {
            showError(field.errorId, field.message);
            isValid = false;
        }
    });

    const emailInput = document.getElementById('email');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailInput.value && !emailRegex.test(emailInput.value)) {
        showError('emailError', 'Please enter a valid email address');
        isValid = false;
    }

    const checkInDate = new Date(document.getElementById('checkInDate').value);
    const checkOutDate = new Date(document.getElementById('checkOutDate').value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    if (checkInDate < today) {
        showError('checkInError', 'Check-in date cannot be in the past');
        isValid = false;
    }

    if (checkOutDate <= checkInDate) {
        showError('checkOutError', 'Check-out date must be after check-in date');
        isValid = false;
    }

    return isValid;
}

function submitBookingForm() {
    if (validateForm()) {
        document.getElementById('addBookingForm').submit();
    }
}

// Set min dates and recalculate on change
document.addEventListener('DOMContentLoaded', function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('checkInDate').setAttribute('min', today);
    document.getElementById('checkOutDate').setAttribute('min', today);

    document.getElementById('checkInDate').addEventListener('change', function () {
        const checkInDate = this.value;
        document.getElementById('checkOutDate').setAttribute('min', checkInDate);
        calculateTotal();
    });

    document.getElementById('checkOutDate').addEventListener('change', calculateTotal);
    document.getElementById('roomType').addEventListener('change', calculateTotal);
});


// View booking with simulated or real data
function viewBooking(bookingId) {
    fetchBookingData(bookingId).then(function (bookingData) {
        populateViewModal(bookingData);
        openModal('viewBookingModal');
    });
}

// Simulate fetching booking data
function fetchBookingData(bookingId) {
    return new Promise(function (resolve) {
        setTimeout(function () {
            const sampleData = {
                booking_id: bookingId,
                status: 'Checked-in',
                first_name: 'John',
                last_name: 'Smith',
                email: 'john.smith@email.com',
                phone: '+1 234 567 8900',
                guest_count: 2,
                room_no: '101',
                room_type: 'Deluxe',
                check_in: '2024-07-01',
                check_out: '2024-07-05',
                payment_method: 'GCash',
                amount: '$800.00',
                transaction_no: 'TXN123456789',
                notes: 'Special requests: Late check-in, extra towels'
            };
            resolve(sampleData);
        }, 100);
    });
}

// Populate modal fields with booking data
function populateViewModal(data) {
    document.getElementById('viewBookingId').textContent = data.booking_id;
    document.getElementById('viewBookingStatus').textContent = data.status.toUpperCase();
    document.getElementById('viewBookingStatus').className =
        `status-badge status-${data.status.toLowerCase().replace('-', '')}`;

    document.getElementById('viewFirstName').textContent = data.first_name;
    document.getElementById('viewLastName').textContent = data.last_name;
    document.getElementById('viewEmail').textContent = data.email;
    document.getElementById('viewPhone').textContent = data.phone;
    document.getElementById('viewGuestCount').textContent = data.guest_count;
    document.getElementById('viewRoomNo').textContent = data.room_no;
    document.getElementById('viewRoomType').textContent = data.room_type;
    document.getElementById('viewCheckIn').textContent = data.check_in;
    document.getElementById('viewCheckOut').textContent = data.check_out;
    document.getElementById('viewPaymentMethod').textContent = data.payment_method;
    document.getElementById('viewAmount').textContent = data.amount;
    document.getElementById('viewTransactionNo').textContent = data.transaction_no;
    document.getElementById('viewNotes').textContent = data.notes;
}

// Handle transition from view to edit
function editBookingFromView() {
    const bookingId = document.getElementById('viewBookingId').textContent;
    closeModal('viewBookingModal');
    editBooking(bookingId); // This function should already exist elsewhere
}
