// Make sure DOM is loaded before adding event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Set today's date as default for date inputs
    // const today = new Date().toISOString().split('T')[0];
    const checkInInput = document.getElementById('check_in_date');
    const checkOutInput = document.getElementById('check_out_date');
    
    // if (checkInInput) checkInInput.value = today;
    // if (checkOutInput) checkOutInput.value = today;

    
    // booking total computation
    const roomSelect = document.getElementById('bookingRoom');
    const totalAmountInput = document.getElementById('totalAmount');
    
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
    
    roomSelect.addEventListener('change', calculateTotal);
    $('#bookingDates').on('apply.daterangepicker', function () {
        calculateTotal();
    });
    
    // format date for database
    const bookingDates = $('#bookingDates');
    const checkInField = $('#check_in_date');
    const checkOutField = $('#check_out_date');

    if (bookingDates.length) {
        bookingDates.daterangepicker({
            autoUpdateInput: false,
            minDate: moment(), 
            locale: {
                cancelLabel: 'Clear',
                format: 'YYYY-MM-DD'
            }
        });

        bookingDates.on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
            checkInField.val(picker.startDate.format('YYYY-MM-DD'));
            checkOutField.val(picker.endDate.format('YYYY-MM-DD'));
            setTimeout(calculateTotal, 10);
        });

        bookingDates.on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
            checkInField.val('');
            checkOutField.val('');
        });
    }

    // const modal = document.getElementById('delete-confirm');
    // modal.addEventListener('show.bs.modal', function (event) {
    //     const button = event.relatedTarget;
    
    //     const title = button.getAttribute('data-title');
    //     const body = button.getAttribute('data-body');
    
    //     modal.querySelector('.modal-title').textContent = title;
    //     modal.querySelector('#modalBody').textContent = body;
    // });
});

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
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            checkInInput.val(picker.startDate.format('YYYY-MM-DD'));
            checkOutInput.val(picker.endDate.format('YYYY-MM-DD'));
        });

        bookingInput.on('cancel.daterangepicker', function () {
            $(this).val('');
            checkInInput.val('');
            checkOutInput.val('');
        });
    }
});

// function modalContent() {
//     const deleteModal = document.getElementById('delete-confirm');
//     deleteModal.addEventListener('show.bs.modal', function (event) {
//         const button = event.relatedTarget;
//         const title = button.getAttribute('data-title');
//         const body = button.getAttribute('data-body');
//         const modalTitle = deleteModal.querySelector('.modal-title');
//         const modalBody = deleteModal.querySelector('#modalBody');

//         if (title) modalTitle.textContent = title;
//         if (body) modalBody.textContent = body;
//     });
// }