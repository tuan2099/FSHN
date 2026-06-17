<?php
/**
 * Section Component: Booking Form (Flatpickr Integration)
 */
?>
<!-- Mobile Sticky Trigger -->
    <button id="mobile-booking-trigger"
        class="fixed bottom-0 left-0 w-full z-[90] bg-brand-orange text-white py-4 text-sm font-bold uppercase lg:hidden shadow-[0_-4px_10px_rgba(0,0,0,0.1)]">
        <?php pll_e('Check Availability'); ?>
    </button>

    <div id="booking-form-wrapper"
        class="booking-form-wrapper fixed inset-0 bg-white z-[100] opacity-0 pointer-events-none invisible lg:visible lg:opacity-100 lg:pointer-events-auto lg:!block lg:absolute lg:inset-auto lg:bottom-12 lg:left-0 lg:w-full lg:z-40 lg:pb-4 lg:bg-transparent transition-all duration-300 ease-in-out">

        <!-- Mobile Close Button -->
        <button id="mobile-booking-close"
            class="absolute z-50 p-2 transition-colors top-6 right-6 lg:hidden text-brand-black-900 hover:text-brand-orange">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Mobile Header -->
        <div class="absolute text-lg font-bold uppercase top-8 left-6 lg:hidden text-brand-black-900">
            <?php pll_e('Book Your Stay'); ?>
        </div>

        <div class="container flex flex-col justify-center h-full px-6 pt-20 mx-auto lg:block lg:pt-0">
            <form id="booking-form-inner"
                action="https://fohn.backhotelite.com/en/bookcore/v4/search-dispo.htm" method="post" target="_blank"
                class="relative flex flex-col items-stretch w-full max-w-lg gap-4 mx-auto transition-transform duration-500 ease-out translate-y-8 bg-transparent rounded-none shadow-none lg:bg-white lg:max-w-none lg:shadow-2xl lg:flex-row lg:overflow-visible lg:translate-y-0 lg:gap-0">
                <!-- Hidden fields required by Roiback search-dispo.htm -->
                <input type="hidden" name="edades" id="edades-input" value="">
                <input type="hidden" name="sort_occupancy" value="true">

                <!-- Arrival -->
                <div id="arrival-trigger"
                    class="flex flex-col justify-center flex-1 p-5 transition-colors border cursor-pointer lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 lg:p-4 rounded-xl lg:rounded-none hover:bg-brand-black-50">
                    <div class="flex items-center justify-between pointer-events-none">
                        <span
                            class="text-[14px] lg:text-[11px] text-brand-black-500 arrival-date-display"><?php pll_e('Arrival'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4 text-brand-black-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <input type="text" id="arrival-input" name="entrada" class="absolute opacity-0 pointer-events-none">
                </div>

                <!-- Departure -->
                <div id="departure-trigger"
                    class="flex flex-col justify-center flex-1 p-5 transition-colors border cursor-pointer lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 lg:p-4 rounded-xl lg:rounded-none hover:bg-brand-black-50">
                    <div class="flex items-center justify-between pointer-events-none">
                        <span
                            class="text-[14px] lg:text-[11px] text-brand-black-500 departure-date-display"><?php pll_e('Departure'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4 text-brand-black-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 00-2 2z" />
                        </svg>
                    </div>
                    <input type="text" id="departure-input" name="salida" class="absolute opacity-0 pointer-events-none">
                </div>

                <!-- Adults -->
                <div style="flex: 1.4"
                    class="flex items-center justify-between flex-1 gap-2 p-5 border lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 lg:p-4 rounded-xl lg:rounded-none">
                    <label for="adults-input"
                        class="text-[14px] lg:text-[11px] text-brand-black-500 cursor-text"><?php pll_e('Adults'); ?></label>
                    <div class="flex items-center gap-1">
                        <button type="button"
                            class="flex items-center justify-center w-5 h-5 text-xs leading-none transition-colors rounded-full select-none stepper-btn shrink-0 text-brand-blue hover:bg-brand-black-50"
                            data-stepper="adults" data-action="dec" aria-label="Decrease adults">&minus;</button>
                        <input type="text" inputmode="numeric" id="adults-input" name="adultos"
                            class="number-input w-6 text-center bg-transparent text-[16px] font-bold text-brand-blue focus:outline-none"
                            value="2" data-min="1" data-max="20">
                        <button type="button"
                            class="flex items-center justify-center w-5 h-5 text-xs leading-none transition-colors rounded-full select-none stepper-btn shrink-0 text-brand-blue hover:bg-brand-black-50"
                            data-stepper="adults" data-action="inc" aria-label="Increase adults">+</button>
                    </div>
                </div>

                <!-- Children -->
                <div class="flex items-center justify-between flex-1 gap-2 p-5 border lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 lg:p-4 rounded-xl lg:rounded-none">
                    <label for="children-input"
                        class="text-[14px] lg:text-[11px] text-brand-black-500 cursor-text"><?php pll_e('Children'); ?></label>
                    <div class="flex items-center gap-1">
                        <button type="button"
                            class="flex items-center justify-center w-5 h-5 text-xs leading-none transition-colors rounded-full select-none stepper-btn shrink-0 text-brand-blue hover:bg-brand-black-50"
                            data-stepper="children" data-action="dec" aria-label="Decrease children">&minus;</button>
                        <input type="text" inputmode="numeric" id="children-input" name="ninos"
                            class="number-input w-6 text-center bg-transparent text-[16px] font-bold text-brand-blue focus:outline-none"
                            value="0" data-min="0" data-max="20">
                        <button type="button"
                            class="flex items-center justify-center w-5 h-5 text-xs leading-none transition-colors rounded-full select-none stepper-btn shrink-0 text-brand-blue hover:bg-brand-black-50"
                            data-stepper="children" data-action="inc" aria-label="Increase children">+</button>
                    </div>
                </div>

                <!-- Promocode -->
                <div style="flex: 0.7"
                    class="flex flex-col justify-center flex-1 p-5 border lg:border-0 lg:border-r border-brand-black-200 lg:border-brand-black-100 lg:p-4 rounded-xl lg:rounded-none">
                    <input type="text" id="promocode-input" name="codpromo"
                        class="promocode-input w-full bg-transparent text-[14px] lg:text-[11px] text-brand-black-500 font-medium focus:outline-none"
                        placeholder="<?php echo esc_attr(pll__('Promocode')); ?>" autocomplete="off">
                </div>

                <!-- Action -->
                <div class="flex-1 mt-4 lg:flex-none lg:mt-0">
                    <button type="submit"
                        class="check-availability-btn w-full h-full font-serif bg-brand-orange text-white px-10 py-3 text-[14px] lg:text-[13px] font-bold hover:bg-brand-blue transition-all rounded-xl lg:rounded-none">
                        <?php pll_e('Check Availability'); ?>
                    </button>
                </div>

            </form>
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

        /* Promocode placeholder: match the darker label colour */
        .promocode-input::placeholder {
            color: rgb(115 115 115);
            opacity: 1;
        }

        /* Uppercase all text in the booking form */
        #booking-form-wrapper,
        #booking-form-wrapper input,
        #booking-form-wrapper input::placeholder,
        #mobile-booking-trigger {
            text-transform: uppercase;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookingData = { arrival: '', departure: '', adults: 2, children: 0, promocode: '' };

            // Capture promocode as the user types
            const promocodeInput = document.getElementById('promocode-input');
            if (promocodeInput) {
                promocodeInput.addEventListener('input', function () {
                    bookingData.promocode = this.value.trim();
                });
            }

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
                    display.classList.remove('text-brand-black-500');
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
                    display.classList.remove('text-brand-black-500');
                    display.classList.add('text-brand-blue', 'font-bold');
                }
            });

            // Custom Triggers for Flatpickr
            document.getElementById('arrival-trigger').addEventListener('click', () => arrivalPicker.open());
            document.getElementById('departure-trigger').addEventListener('click', () => departurePicker.open());

            // Number steppers (Adults / Children) — type a number or use +/- buttons
            const adultsInput = document.getElementById('adults-input');
            const childrenInput = document.getElementById('children-input');

            function clampInput(input) {
                const min = parseInt(input.dataset.min, 10);
                const max = parseInt(input.dataset.max, 10);
                let n = parseInt(input.value, 10);
                if (isNaN(n)) n = min;
                if (n < min) n = min;
                if (n > max) n = max;
                input.value = n;
                return n;
            }

            function syncStepper(input) {
                const n = clampInput(input);
                if (input === adultsInput) bookingData.adults = n;
                if (input === childrenInput) bookingData.children = n;
            }

            [adultsInput, childrenInput].forEach(input => {
                if (!input) return;
                // Allow digits only while typing
                input.addEventListener('input', function () {
                    this.value = this.value.replace(/[^0-9]/g, '');
                    const n = parseInt(this.value, 10);
                    if (!isNaN(n)) {
                        if (input === adultsInput) bookingData.adults = n;
                        if (input === childrenInput) bookingData.children = n;
                    }
                });
                // Clamp to min/max when leaving the field
                input.addEventListener('blur', function () { syncStepper(this); });
            });

            // +/- buttons
            document.querySelectorAll('.stepper-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const target = this.dataset.stepper === 'adults' ? adultsInput : childrenInput;
                    let n = parseInt(target.value, 10);
                    if (isNaN(n)) n = parseInt(target.dataset.min, 10);
                    n += (this.dataset.action === 'inc' ? 1 : -1);
                    target.value = n;
                    syncStepper(target);
                });
            });

            // Submit -> POST to Roiback (search-dispo.htm). Fields are posted via
            // their name attributes: entrada, salida (DD/MM/YYYY from Flatpickr),
            // adultos, ninos, edades, codpromo, sort_occupancy.
            const bookingForm = document.getElementById('booking-form-inner');
            const edadesInput = document.getElementById('edades-input');

            bookingForm.addEventListener('submit', function (e) {
                const entrada = document.getElementById('arrival-input').value;
                const salida = document.getElementById('departure-input').value;
                if (!entrada || !salida) {
                    e.preventDefault();
                    alert('<?php echo esc_js(pll__('Please select arrival and departure dates.')); ?>');
                    return;
                }
                // Normalise adults/children to valid numbers
                clampInput(adultsInput);
                clampInput(childrenInput);
                // Roiback expects one age per child (default 4), joined by ';'
                const childCount = parseInt(childrenInput.value, 10) || 0;
                edadesInput.value = Array(childCount).fill(4).join(';');
                // The form then submits normally to search-dispo.htm (target=_blank)
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