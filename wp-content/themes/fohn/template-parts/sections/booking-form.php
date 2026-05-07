<?php
/**
 * Section Component: Booking Form (Flatpickr Integration)
 */
?>
<<!-- Mobile Sticky Trigger -->
    <button id="mobile-booking-trigger"
        class="fixed bottom-0 left-0 w-full z-[90] bg-brand-orange text-white py-4 text-sm font-bold uppercase lg:hidden shadow-[0_-4px_10px_rgba(0,0,0,0.1)]">
        <?php pll_e('Check Availability'); ?>
    </button>

    <div id="booking-form-wrapper"
        class="booking-form-wrapper fixed inset-0 bg-white z-[100] opacity-0 pointer-events-none invisible lg:visible lg:opacity-100 lg:pointer-events-auto lg:!block lg:absolute lg:inset-auto lg:bottom-12 lg:left-0 lg:w-full lg:z-40 lg:pb-4 lg:bg-transparent transition-all duration-300 ease-in-out">

        <!-- Mobile Close Button -->
        <button id="mobile-booking-close"
            class="absolute top-6 right-6 lg:hidden text-brand-black-900 hover:text-brand-orange transition-colors z-50 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Mobile Header -->
        <div class="absolute top-8 left-6 lg:hidden text-brand-black-900 font-bold text-lg uppercase">
            <?php pll_e('Book Your Stay'); ?>
        </div>

        <div class="container mx-auto px-6 h-full flex flex-col justify-center lg:block pt-20 lg:pt-0">
            <div class="bg-transparent lg:bg-white w-full max-w-lg mx-auto lg:max-w-none shadow-none lg:shadow-2xl flex flex-col lg:flex-row items-stretch relative rounded-none lg:overflow-visible translate-y-8 lg:translate-y-0 transition-transform duration-500 ease-out gap-4 lg:gap-0"
                id="booking-form-inner">

                <!-- Arrival -->
                <div id="arrival-trigger"
                    class="flex-1 border lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 p-5 lg:p-4 rounded-xl lg:rounded-none flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors">
                    <div class="flex items-center justify-between pointer-events-none">
                        <span
                            class="text-[14px] lg:text-[13px] text-brand-black-300 arrival-date-display"><?php pll_e('Arrival'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-4 lg:w-4 text-brand-black-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <input type="text" id="arrival-input" class="opacity-0 pointer-events-none absolute">
                </div>

                <!-- Departure -->
                <div id="departure-trigger"
                    class="flex-1 border lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 p-5 lg:p-4 rounded-xl lg:rounded-none flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors">
                    <div class="flex items-center justify-between pointer-events-none">
                        <span
                            class="text-[14px] lg:text-[13px] text-brand-black-300 departure-date-display"><?php pll_e('Departure'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-4 lg:w-4 text-brand-black-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <input type="text" id="departure-input" class="opacity-0 pointer-events-none absolute">
                </div>

                <!-- Rooms -->
                <div class="flex-1 border lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 p-5 lg:p-4 rounded-xl lg:rounded-none flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors booking-field"
                    data-target="dropdown-rooms">
                    <div class="flex items-center justify-between pointer-events-none">
                        <span
                            class="text-[14px] lg:text-[13px] text-brand-black-300 rooms-display"><?php pll_e('Rooms'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-4 lg:w-4 text-brand-black-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Guests -->
                <div class="flex-1 border lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 p-5 lg:p-4 rounded-xl lg:rounded-none flex flex-col justify-center cursor-pointer hover:bg-brand-black-50 transition-colors booking-field"
                    data-target="dropdown-guests">
                    <div class="flex items-center justify-between pointer-events-none">
                        <span
                            class="text-[14px] font-[300] lg:text-[13px] text-brand-black-300 guests-display"><?php pll_e('Guests'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 lg:h-4 lg:w-4 text-brand-black-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Action -->
                <div class="flex-1 lg:flex-none mt-4 lg:mt-0">
                    <button
                        class="check-availability-btn w-full h-full font-serif bg-brand-orange text-white px-10 py-3 text-[14px] lg:text-[13px] font-bold hover:bg-brand-blue transition-all rounded-xl lg:rounded-none">
                        <?php pll_e('Check Availability'); ?>
                    </button>
                </div>

                <!-- DROPDOWNS -->
                <!-- Rooms Dropdown -->
                <div id="dropdown-rooms"
                    class="booking-popup fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 lg:absolute lg:top-full lg:left-[40%] lg:translate-x-0 lg:translate-y-0 lg:mt-4 bg-white shadow-2xl w-[80%] lg:w-[200px] hidden animate-fade-in z-[110] rounded-xl lg:rounded-none overflow-hidden">
                    <div class="flex flex-col">
                        <?php for ($i = 1; $i <= 3; $i++):
                            $room_label = $i > 1 ? pll__('Rooms') : pll__('Room');
                            $room_text = $i . ' ' . $room_label;
                            ?>
                            <div class="px-8 py-4 border-b border-brand-black-100 last:border-0 hover:bg-brand-black-50 cursor-pointer transition-colors selector-item"
                                data-value="<?php echo esc_attr($room_text); ?>">
                                <span
                                    class="text-[16px] font-bold text-brand-blue"><?php echo esc_html($room_text); ?></span>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Guests Dropdown -->
                <div id="dropdown-guests"
                    class="booking-popup fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 lg:absolute lg:top-full lg:left-[60%] lg:translate-x-0 lg:translate-y-0 lg:mt-4 bg-white shadow-2xl w-[80%] lg:w-[200px] hidden animate-fade-in z-[110] rounded-xl lg:rounded-none overflow-hidden">
                    <div class="flex flex-col">
                        <?php for ($i = 1; $i <= 4; $i++):
                            $guest_label = $i > 1 ? pll__('Guests') : pll__('Guest');
                            $guest_text = $i . ' ' . $guest_label;
                            ?>
                            <div class="px-8 py-4 border-b border-brand-black-100 last:border-0 hover:bg-brand-black-50 cursor-pointer transition-colors selector-item"
                                data-value="<?php echo esc_attr($guest_text); ?>">
                                <span
                                    class="text-[16px] font-bold text-brand-blue"><?php echo esc_html($guest_text); ?></span>
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
            width: 320px !important;
            max-width: none !important;
            right: auto !important;
        }

        .flatpickr-month {
            height: 60px;
        }

        .flatpickr-current-month {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 700;
            font-style: italic;
            color: #002D5B;
            /* brand-blue */
        }

        .flatpickr-weekday {
            font-weight: 700 !important;
            text-transform: uppercase;
            font-size: 10px;
            color: #949494;
            /* brand-black-400 */
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

        .flatpickr-months .flatpickr-prev-month,
        .flatpickr-months .flatpickr-next-month {
            color: #002D5B;
            padding: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookingData = { arrival: '', departure: '', rooms: '1 Room', guests: '2 Guests' };

            // Flatpickr Initializations
            const arrivalPicker = flatpickr("#arrival-input", {
                dateFormat: "d/m/Y",
                minDate: "today",
                disableMobile: true,
                appendTo: document.body,
                onChange: function (selectedDates, dateStr) {
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
                disableMobile: true,
                appendTo: document.body,
                onChange: function (selectedDates, dateStr) {
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
                field.addEventListener('click', function (e) {
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
                item.addEventListener('click', function () {
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
            document.querySelector('.check-availability-btn').addEventListener('click', function () {
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

            // Mobile Popup Logic
            const mobileTrigger = document.getElementById('mobile-booking-trigger');
            const mobileClose = document.getElementById('mobile-booking-close');
            const formWrapper = document.getElementById('booking-form-wrapper');
            const formInner = document.getElementById('booking-form-inner');

            if (mobileTrigger && formWrapper) {
                mobileTrigger.addEventListener('click', () => {
                    formWrapper.classList.remove('opacity-0', 'pointer-events-none', 'invisible');
                    formInner.classList.remove('translate-y-8');
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling
                });

                mobileClose.addEventListener('click', () => {
                    formWrapper.classList.add('opacity-0', 'pointer-events-none', 'invisible');
                    formInner.classList.add('translate-y-8');
                    document.body.style.overflow = '';
                });

                // Close when clicking outside the form on mobile
                formWrapper.addEventListener('click', (e) => {
                    if (window.innerWidth < 1024) { // lg breakpoint
                        if (!formInner.contains(e.target)) {
                            formWrapper.classList.add('opacity-0', 'pointer-events-none', 'invisible');
                            formInner.classList.add('translate-y-8');
                            document.body.style.overflow = '';
                        }
                    }
                });
            }
        });
    </script>