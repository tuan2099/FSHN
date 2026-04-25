<?php
/**
 * Section Component: Booking Form (Flatpickr Integration)
 */
?>
<div class="booking-form-wrapper absolute bottom-12 left-0 w-full z-40 pb-4">
    <div class="container mx-auto px-6">
        <div class="bg-white shadow-2xl flex flex-col lg:flex-row items-stretch relative">
            
            <!-- Arrival -->
            <div id="arrival-trigger" class="flex-1 border-r border-brand-black-100 p-4 flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors">
                <div class="flex items-center justify-between pointer-events-none">
                    <span class="text-[13px] font-medium text-brand-black-300 arrival-date-display">Arrival</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-black-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 00-2 2z" />
                    </svg>
                </div>
                <input type="text" id="arrival-input" class="opacity-0 pointer-events-none absolute">
            </div>

            <!-- Departure -->
            <div id="departure-trigger" class="flex-1 border-r border-brand-black-100 p-4 flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors">
                <div class="flex items-center justify-between pointer-events-none">
                    <span class="text-[13px] font-medium text-brand-black-300 departure-date-display">Departure</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-black-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z" />
                    </svg>
                </div>
                <input type="text" id="departure-input" class="opacity-0 pointer-events-none absolute">
            </div>

            <!-- Rooms -->
            <div class="flex-1 border-r border-brand-black-100 p-4 flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors booking-field" data-target="dropdown-rooms">
                <div class="flex items-center justify-between pointer-events-none">
                    <span class="text-[13px] font-medium text-brand-black-300 rooms-display">Rooms</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-black-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Guests -->
            <div class="flex-1 border-r border-brand-black-100 p-4 flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors booking-field" data-target="dropdown-guests">
                <div class="flex items-center justify-between pointer-events-none">
                    <span class="text-[13px] font-medium text-brand-black-300 guests-display">Guests</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-black-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Action -->
            <div class="flex-1 lg:flex-none">
                <button class="check-availability-btn w-full h-full bg-brand-orange text-white px-10 py-5 text-[13px] font-bold uppercase tracking-widest hover:bg-brand-blue transition-all">
                    Check availability
                </button>
            </div>

            <!-- DROPDOWNS -->
            <!-- Rooms Dropdown -->
            <div id="dropdown-rooms" class="booking-popup absolute top-full left-[40%] mt-4 bg-white shadow-2xl w-[200px] hidden animate-fade-in z-[100]">
                <div class="flex flex-col">
                    <?php for($i=1; $i<=3; $i++): ?>
                        <div class="px-8 py-4 border-b border-brand-black-100 last:border-0 hover:bg-brand-black-50 cursor-pointer transition-colors selector-item" data-value="<?php echo $i; ?> Room<?php echo $i>1?'s':''; ?>">
                            <span class="text-[16px] font-bold text-brand-blue"><?php echo $i; ?> Room<?php echo $i>1?'s':''; ?></span>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Guests Dropdown -->
            <div id="dropdown-guests" class="booking-popup absolute top-full left-[60%] mt-4 bg-white shadow-2xl w-[200px] hidden animate-fade-in z-[100]">
                <div class="flex flex-col">
                    <?php for($i=1; $i<=4; $i++): ?>
                        <div class="px-8 py-4 border-b border-brand-black-100 last:border-0 hover:bg-brand-black-50 cursor-pointer transition-colors selector-item" data-value="<?php echo $i; ?> Guest<?php echo $i>1?'s':''; ?>">
                            <span class="text-[16px] font-bold text-brand-blue"><?php echo $i; ?> Guest<?php echo $i>1?'s':''; ?></span>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* Custom Flatpickr Styling */
.flatpickr-calendar {
    border-radius: 0;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    border: none;
    padding: 10px;
    font-family: 'Outfit', sans-serif;
}
.flatpickr-month {
    height: 60px;
}
.flatpickr-current-month {
    font-family: 'Playfair Display', serif;
    font-size: 1.25rem;
    font-weight: 700;
    font-style: italic;
    color: #002D5B; /* brand-blue */
}
.flatpickr-weekday {
    font-weight: 700 !important;
    text-transform: uppercase;
    font-size: 10px;
    color: #949494; /* brand-black-400 */
}
.flatpickr-day.selected {
    background: #002D5B !important;
    border-color: #002D5B !important;
    border-radius: 999px;
}
.flatpickr-day:hover {
    background: #f3f4f6;
    border-radius: 999px;
}
.flatpickr-months .flatpickr-prev-month, .flatpickr-months .flatpickr-next-month {
    color: #002D5B;
    padding: 10px;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fadeIn 0.3s ease-out forwards;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bookingData = { arrival: '', departure: '', rooms: '1 Room', guests: '2 Guests' };

    // Flatpickr Initializations
    const arrivalPicker = flatpickr("#arrival-input", {
        dateFormat: "d/m/Y",
        minDate: "today",
        static: true,
        monthSelectorType: "static",
        onChange: function(selectedDates, dateStr) {
            bookingData.arrival = dateStr;
            const display = document.querySelector('.arrival-date-display');
            display.textContent = dateStr;
            display.classList.remove('text-brand-black-300');
            display.classList.add('text-brand-blue', 'font-bold');
            departurePicker.set('minDate', dateStr);
        }
    });

    const departurePicker = flatpickr("#departure-input", {
        dateFormat: "d/m/Y",
        minDate: "today",
        static: true,
        monthSelectorType: "static",
        onChange: function(selectedDates, dateStr) {
            bookingData.departure = dateStr;
            const display = document.querySelector('.departure-date-display');
            display.textContent = dateStr;
            display.classList.remove('text-brand-black-300');
            display.classList.add('text-brand-blue', 'font-bold');
        }
    });

    // Custom Triggers for Flatpickr
    document.getElementById('arrival-trigger').addEventListener('click', () => arrivalPicker.open());
    document.getElementById('departure-trigger').addEventListener('click', () => departurePicker.open());

    // Dropdowns
    const fields = document.querySelectorAll('.booking-field');
    const popups = document.querySelectorAll('.booking-popup');
    
    fields.forEach(field => {
        field.addEventListener('click', function(e) {
            e.stopPropagation();
            const targetId = this.getAttribute('data-target');
            const targetPopup = document.getElementById(targetId);
            popups.forEach(p => { if (p.id !== targetId) p.classList.add('hidden'); });
            if (targetPopup) targetPopup.classList.toggle('hidden');
        });
    });
    
    document.addEventListener('click', () => popups.forEach(p => p.classList.add('hidden')));

    const items = document.querySelectorAll('.selector-item');
    items.forEach(item => {
        item.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            const popup = this.closest('.booking-popup');
            if (popup.id === 'dropdown-rooms') {
                bookingData.rooms = value;
                const display = document.querySelector('.rooms-display');
                display.textContent = value;
                display.classList.remove('text-brand-black-300');
                display.classList.add('text-brand-blue', 'font-bold');
            } else if (popup.id === 'dropdown-guests') {
                bookingData.guests = value;
                const display = document.querySelector('.guests-display');
                display.textContent = value;
                display.classList.remove('text-brand-black-300');
                display.classList.add('text-brand-blue', 'font-bold');
            }
        });
    });

    // Check Availability
    document.querySelector('.check-availability-btn').addEventListener('click', function() {
        if (!bookingData.arrival || !bookingData.departure) {
            alert('Please select arrival and departure dates.');
            return;
        }
        console.log('API CALL:', bookingData);
        this.textContent = 'Searching...';
        setTimeout(() => {
            alert('Found rooms!');
            this.textContent = 'Check availability';
        }, 1000);
    });
});
</script>
