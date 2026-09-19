/**
 * Syndron UI Components - Custom Select & Material Calendar Date Picker
 * Theme: Raghuvir Saffron (#EF801C) & Warm Corporate Modern Style
 * Matches exact designs from user reference images (Image 1 & Image 2)
 */

(function () {
    'use strict';

    // Contextual icon map for blog/admin categories and options
    function getContextualIcon(text) {
        const lower = (text || '').toLowerCase();
        if (lower.includes('all')) return 'fa-solid fa-layer-group';
        if (lower.includes('wheat') || lower.includes('atta') || lower.includes('farm')) return 'fa-solid fa-wheat-awn';
        if (lower.includes('recipe') || lower.includes('kitchen') || lower.includes('cook') || lower.includes('food')) return 'fa-solid fa-utensils';
        if (lower.includes('health') || lower.includes('nutrit') || lower.includes('diet')) return 'fa-solid fa-heart-pulse';
        if (lower.includes('mill') || lower.includes('factory') || lower.includes('manufactur') || lower.includes('chakki')) return 'fa-solid fa-industry';
        if (lower.includes('organic') || lower.includes('pure') || lower.includes('bio')) return 'fa-solid fa-leaf';
        if (lower.includes('quality') || lower.includes('standard') || lower.includes('certif') || lower.includes('lab')) return 'fa-solid fa-award';
        if (lower.includes('guide') || lower.includes('tip') || lower.includes('book')) return 'fa-solid fa-book-open';
        if (lower.includes('sharbati')) return 'fa-solid fa-seedling';
        if (lower.includes('weight') || lower.includes('jog') || lower.includes('walk')) return 'fa-solid fa-person-walking';
        return 'fa-solid fa-tag';
    }

    /* ==========================================================================
       1. Custom Dropdown Select (Matching Image 2)
       ========================================================================== */
    function initSyndronSelects() {
        const selects = document.querySelectorAll('select.form-control-admin, select[data-syndron-select]');

        selects.forEach(select => {
            if (select.dataset.syndronSelectInit) return;
            select.dataset.syndronSelectInit = 'true';

            // Hide native select from rendering but keep in DOM for form submit
            select.style.display = 'none';

            // Create wrapper
            const wrapper = document.createElement('div');
            wrapper.className = 'syndron-select-wrapper';

            // Selected option
            let selectedOption = select.options[select.selectedIndex] || select.options[0];

            // Trigger Button
            const trigger = document.createElement('div');
            trigger.className = 'syndron-select-trigger';
            trigger.setAttribute('tabindex', '0');

            const currentIcon = selectedOption ? (selectedOption.dataset.icon || getContextualIcon(selectedOption.text)) : 'fa-solid fa-tag';
            const currentText = selectedOption ? selectedOption.text : 'Select an option';

            trigger.innerHTML = `
                <div class="syndron-select-current">
                    <i class="${currentIcon} current-icon"></i>
                    <span class="current-label">${currentText}</span>
                </div>
                <i class="fa-solid fa-chevron-down syndron-select-chevron"></i>
            `;

            // Menu Popup (Image 2 style)
            const menu = document.createElement('div');
            menu.className = 'syndron-select-menu';

            // Populate options
            Array.from(select.options).forEach((opt, idx) => {
                const optEl = document.createElement('div');
                optEl.className = 'syndron-select-option' + (opt.selected ? ' is-selected' : '');
                optEl.dataset.value = opt.value;
                optEl.dataset.index = idx;

                const iconClass = opt.dataset.icon || getContextualIcon(opt.text);

                optEl.innerHTML = `
                    <i class="${iconClass} option-icon"></i>
                    <span class="option-label">${opt.text}</span>
                    <i class="fa-solid fa-check option-check"></i>
                `;

                optEl.addEventListener('click', function (e) {
                    e.stopPropagation();

                    // Update native select
                    select.selectedIndex = idx;
                    select.value = opt.value;

                    // Update trigger UI
                    trigger.querySelector('.current-icon').className = `${iconClass} current-icon`;
                    trigger.querySelector('.current-label').innerText = opt.text;

                    // Update option selected styles
                    menu.querySelectorAll('.syndron-select-option').forEach(el => el.classList.remove('is-selected'));
                    optEl.classList.add('is-selected');

                    // Close menu
                    closeMenu();

                    // Fire native change and input events (triggers onchange="this.form.submit()")
                    select.dispatchEvent(new Event('change', { bubbles: true }));
                    select.dispatchEvent(new Event('input', { bubbles: true }));
                });

                menu.appendChild(optEl);
            });

            function openMenu() {
                // Close other open selects
                document.querySelectorAll('.syndron-select-wrapper.is-open').forEach(w => {
                    if (w !== wrapper) w.classList.remove('is-open');
                });

                wrapper.classList.add('is-open');

                // Scroll selected option into view
                setTimeout(() => {
                    const activeItem = menu.querySelector('.syndron-select-option.is-selected');
                    if (activeItem) {
                        activeItem.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
                    }
                }, 30);
            }

            function closeMenu() {
                wrapper.classList.remove('is-open');
            }

            // Toggle on trigger click
            trigger.addEventListener('click', function (e) {
                e.stopPropagation();
                if (wrapper.classList.contains('is-open')) {
                    closeMenu();
                } else {
                    openMenu();
                }
            });

            // Keyboard navigation
            trigger.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    if (wrapper.classList.contains('is-open')) {
                        closeMenu();
                    } else {
                        openMenu();
                    }
                } else if (e.key === 'Escape') {
                    closeMenu();
                }
            });

            // Sync if native select changes programmatically
            select.addEventListener('change', function () {
                const newSelected = select.options[select.selectedIndex];
                if (newSelected) {
                    const iconClass = newSelected.dataset.icon || getContextualIcon(newSelected.text);
                    trigger.querySelector('.current-icon').className = `${iconClass} current-icon`;
                    trigger.querySelector('.current-label').innerText = newSelected.text;
                    menu.querySelectorAll('.syndron-select-option').forEach((el, i) => {
                        el.classList.toggle('is-selected', i === select.selectedIndex);
                    });
                }
            });

            wrapper.appendChild(trigger);
            wrapper.appendChild(menu);

            select.parentNode.insertBefore(wrapper, select.nextSibling);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.syndron-select-wrapper') && !e.target.closest('.syndron-select-menu')) {
                document.querySelectorAll('.syndron-select-wrapper.is-open').forEach(w => {
                    w.classList.remove('is-open');
                });
            }
        });

        // Update positions on scroll or resize
        window.addEventListener('resize', function () {
            document.querySelectorAll('.syndron-select-wrapper.is-open').forEach(w => {
                const trigger = w.querySelector('.syndron-select-trigger');
                if (trigger) {
                    const triggerRect = trigger.getBoundingClientRect();
                    const spaceBelow = window.innerHeight - triggerRect.bottom;
                    if (spaceBelow < 230 && triggerRect.top > spaceBelow) {
                        w.classList.add('is-dropup');
                    } else {
                        w.classList.remove('is-dropup');
                    }
                }
            });
        }, { passive: true });
    }


    /* ==========================================================================
       2. Modern Material Calendar Date Picker (Matching Image 1)
       Theme Color: Raghuvir Warm Saffron (#EF801C)
       Functional Pencil Icon: Toggles Manual Date Input vs Month Grid View
       ========================================================================== */
    const MONTH_NAMES = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    const DAY_NAMES = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    function initSyndronDatePickers() {
        const dateInputs = document.querySelectorAll('input[type="date"], input[type="datetime-local"], input[data-syndron-datepicker]');

        dateInputs.forEach(input => {
            if (input.dataset.syndronPickerInit) return;
            input.dataset.syndronPickerInit = 'true';

            const isDateTime = input.type === 'datetime-local' || input.dataset.mode === 'datetime';

            // Wrap input to add custom calendar trigger button
            const wrapper = document.createElement('div');
            wrapper.className = 'syndron-datepicker-input-wrapper';
            input.parentNode.insertBefore(wrapper, input);
            wrapper.appendChild(input);

            // Make native input read-friendly and clickable
            input.style.cursor = 'pointer';

            // Add calendar action icon button inside input
            const triggerBtn = document.createElement('button');
            triggerBtn.type = 'button';
            triggerBtn.className = 'syndron-datepicker-trigger-btn';
            triggerBtn.innerHTML = '<i class="fa-regular fa-calendar-days"></i>';
            wrapper.appendChild(triggerBtn);

            // Create Material Calendar Dialog (Image 1)
            const dialog = document.createElement('div');
            dialog.className = 'syndron-datepicker-dialog';
            document.body.appendChild(dialog);

            // Current State
            let currentDate = new Date();
            if (input.value) {
                const parsed = new Date(input.value);
                if (!isNaN(parsed.getTime())) {
                    currentDate = parsed;
                }
            }

            let viewYear = currentDate.getFullYear();
            let viewMonth = currentDate.getMonth();
            let selectedDate = new Date(currentDate.getTime());
            let selectedHours = currentDate.getHours();
            let selectedMinutes = currentDate.getMinutes();
            let viewMode = 'calendar'; // 'calendar' | 'manual'

            function renderDialog() {
                const today = new Date();

                // Format Top Display: e.g. "Mon, Aug 17" as in Image 1
                const dayName = DAY_NAMES[selectedDate.getDay()];
                const monthShort = MONTH_NAMES[selectedDate.getMonth()].substring(0, 3);
                const dayNum = selectedDate.getDate();
                const displayString = `${dayName}, ${monthShort} ${dayNum}`;

                const monthName = MONTH_NAMES[viewMonth];

                // Render Header
                const editIconClass = viewMode === 'calendar' ? 'fa-solid fa-pen' : 'fa-regular fa-calendar-days';
                const editIconTitle = viewMode === 'calendar' ? 'Switch to manual date input' : 'Switch back to calendar view';
                const captionText = viewMode === 'calendar' ? 'Select date' : 'Enter date';

                let bodyHTML = '';

                if (viewMode === 'manual') {
                    // Manual Input Mode Form
                    const y = selectedDate.getFullYear();
                    const m = String(selectedDate.getMonth() + 1).padStart(2, '0');
                    const d = String(selectedDate.getDate()).padStart(2, '0');
                    const dateValueStr = `${y}-${m}-${d}`;

                    bodyHTML = `
                        <div class="syndron-datepicker-manual-view">
                            <div>
                                <label class="syndron-manual-input-label">Date (YYYY-MM-DD)</label>
                                <input type="date" class="syndron-manual-date-field" id="manualDateField" value="${dateValueStr}">
                            </div>

                            ${isDateTime ? `
                            <div>
                                <label class="syndron-manual-input-label">Time</label>
                                <div style="display: flex; gap: 0.5rem; align-items: center;">
                                    <input type="number" min="1" max="12" class="syndron-time-input" id="timeHourInput" value="${selectedHours % 12 === 0 ? 12 : selectedHours % 12}" style="padding: 0.5rem; width: 60px;">
                                    <span style="font-weight: 700; font-size: 1.1rem;">:</span>
                                    <input type="number" min="0" max="59" class="syndron-time-input" id="timeMinuteInput" value="${String(selectedMinutes).padStart(2, '0')}" style="padding: 0.5rem; width: 60px;">
                                    <button type="button" class="syndron-ampm-btn ${selectedHours >= 12 ? '' : 'is-active'}" id="btnAM" style="padding: 0.5rem 0.75rem;">AM</button>
                                    <button type="button" class="syndron-ampm-btn ${selectedHours >= 12 ? 'is-active' : ''}" id="btnPM" style="padding: 0.5rem 0.75rem;">PM</button>
                                </div>
                            </div>
                            ` : ''}

                            <div class="syndron-manual-hint">
                                <i class="fa-solid fa-circle-info" style="color: #EF801C; margin-right: 4px;"></i>
                                You can type the date directly or click the calendar icon in the header to switch back to the month grid.
                            </div>
                        </div>
                    `;
                } else {
                    // Standard Calendar View
                    bodyHTML = `
                        <!-- 2. Month & Year Navigation Row -->
                        <div class="syndron-datepicker-nav">
                            <div class="syndron-datepicker-month-label" title="Current viewing month">
                                <span>${monthName} ${viewYear}</span>
                                <i class="fa-solid fa-caret-down"></i>
                            </div>
                            <div class="syndron-datepicker-nav-buttons">
                                <button type="button" class="syndron-datepicker-nav-btn prev-month-btn" title="Previous Month">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>
                                <button type="button" class="syndron-datepicker-nav-btn next-month-btn" title="Next Month">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- 3. Days of Week (S M T W T F S) -->
                        <div class="syndron-datepicker-weekdays">
                            <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                        </div>

                        <!-- 4. Days Grid (42 cells) -->
                        <div class="syndron-datepicker-days" id="calendarDaysGrid"></div>

                        ${isDateTime ? `
                        <!-- 5. Time Selector for datetime-local -->
                        <div class="syndron-datepicker-time-box">
                            <i class="fa-regular fa-clock" style="color: #EF801C; margin-right: 2px;"></i>
                            <input type="number" min="1" max="12" class="syndron-time-input" id="timeHourInput" value="${selectedHours % 12 === 0 ? 12 : selectedHours % 12}">
                            <span style="font-weight: 700;">:</span>
                            <input type="number" min="0" max="59" class="syndron-time-input" id="timeMinuteInput" value="${String(selectedMinutes).padStart(2, '0')}">
                            <button type="button" class="syndron-ampm-btn ${selectedHours >= 12 ? '' : 'is-active'}" id="btnAM">AM</button>
                            <button type="button" class="syndron-ampm-btn ${selectedHours >= 12 ? 'is-active' : ''}" id="btnPM">PM</button>
                        </div>
                        ` : ''}
                    `;
                }

                dialog.innerHTML = `
                    <!-- 1. Header (Image 1 Style) -->
                    <div class="syndron-datepicker-header">
                        <div class="syndron-datepicker-caption">${captionText}</div>
                        <div class="syndron-datepicker-display-row">
                            <span class="syndron-datepicker-display-date">${displayString}</span>
                            <div class="syndron-datepicker-edit-icon" title="${editIconTitle}">
                                <i class="${editIconClass}"></i>
                            </div>
                        </div>
                    </div>

                    ${bodyHTML}

                    <!-- Actions Footer (Cancel & OK in Image 1) -->
                    <div class="syndron-datepicker-footer">
                        <button type="button" class="syndron-datepicker-btn btn-cancel">Cancel</button>
                        <button type="button" class="syndron-datepicker-btn btn-ok">OK</button>
                    </div>
                `;

                // Bind Pencil / Calendar toggle icon
                const editIcon = dialog.querySelector('.syndron-datepicker-edit-icon');
                if (editIcon) {
                    editIcon.addEventListener('click', function (e) {
                        e.stopPropagation();
                        viewMode = (viewMode === 'calendar') ? 'manual' : 'calendar';
                        renderDialog();
                    });
                }

                // Handle manual mode input bindings
                if (viewMode === 'manual') {
                    const manualField = dialog.querySelector('#manualDateField');
                    if (manualField) {
                        manualField.addEventListener('input', function () {
                            if (manualField.value) {
                                const parts = manualField.value.split('-');
                                if (parts.length === 3) {
                                    const y = parseInt(parts[0], 10);
                                    const m = parseInt(parts[1], 10) - 1;
                                    const d = parseInt(parts[2], 10);
                                    const temp = new Date(y, m, d);
                                    if (!isNaN(temp.getTime())) {
                                        selectedDate = temp;
                                        viewYear = y;
                                        viewMonth = m;
                                        // Update top header display
                                        const dName = DAY_NAMES[selectedDate.getDay()];
                                        const mShort = MONTH_NAMES[selectedDate.getMonth()].substring(0, 3);
                                        dialog.querySelector('.syndron-datepicker-display-date').innerText = `${dName}, ${mShort} ${selectedDate.getDate()}`;
                                    }
                                }
                            }
                        });
                    }
                } else {
                    // Render 42 Grid Cells in Calendar Mode
                    const grid = dialog.querySelector('#calendarDaysGrid');
                    if (grid) {
                        const firstDayOfMonth = new Date(viewYear, viewMonth, 1).getDay();
                        const daysInCurrentMonth = new Date(viewYear, viewMonth + 1, 0).getDate();
                        const daysInPrevMonth = new Date(viewYear, viewMonth, 0).getDate();

                        // Previous month overflow days
                        for (let i = firstDayOfMonth - 1; i >= 0; i--) {
                            const dayVal = daysInPrevMonth - i;
                            const cell = document.createElement('div');
                            cell.className = 'syndron-datepicker-day is-outside';
                            cell.innerText = dayVal;
                            grid.appendChild(cell);
                        }

                        // Current month days
                        for (let day = 1; day <= daysInCurrentMonth; day++) {
                            const cell = document.createElement('div');
                            cell.className = 'syndron-datepicker-day';
                            cell.innerText = day;

                            const thisDayDate = new Date(viewYear, viewMonth, day);

                            // Today circular outline check
                            if (thisDayDate.toDateString() === today.toDateString()) {
                                cell.classList.add('is-today');
                            }

                            // Selected circular solid check (Theme Saffron from Image 1)
                            if (thisDayDate.toDateString() === selectedDate.toDateString()) {
                                cell.classList.add('is-selected');
                            }

                            cell.addEventListener('click', function () {
                                selectedDate = new Date(viewYear, viewMonth, day);
                                renderDialog();
                            });

                            grid.appendChild(cell);
                        }

                        // Next month fill days (to reach 35 or 42 grid total)
                        const totalRendered = firstDayOfMonth + daysInCurrentMonth;
                        const remainingCells = (totalRendered <= 35 ? 35 : 42) - totalRendered;
                        for (let j = 1; j <= remainingCells; j++) {
                            const cell = document.createElement('div');
                            cell.className = 'syndron-datepicker-day is-outside';
                            cell.innerText = j;
                            grid.appendChild(cell);
                        }
                    }

                    // Nav button listeners
                    const prevBtn = dialog.querySelector('.prev-month-btn');
                    if (prevBtn) {
                        prevBtn.addEventListener('click', (e) => {
                            e.stopPropagation();
                            viewMonth--;
                            if (viewMonth < 0) {
                                viewMonth = 11;
                                viewYear--;
                            }
                            renderDialog();
                        });
                    }

                    const nextBtn = dialog.querySelector('.next-month-btn');
                    if (nextBtn) {
                        nextBtn.addEventListener('click', (e) => {
                            e.stopPropagation();
                            viewMonth++;
                            if (viewMonth > 11) {
                                viewMonth = 0;
                                viewYear++;
                            }
                            renderDialog();
                        });
                    }
                }

                // Time picker buttons (AM/PM)
                if (isDateTime) {
                    const btnAM = dialog.querySelector('#btnAM');
                    const btnPM = dialog.querySelector('#btnPM');
                    if (btnAM && btnPM) {
                        btnAM.addEventListener('click', (e) => {
                            e.stopPropagation();
                            btnAM.classList.add('is-active');
                            btnPM.classList.remove('is-active');
                        });
                        btnPM.addEventListener('click', (e) => {
                            e.stopPropagation();
                            btnPM.classList.add('is-active');
                            btnAM.classList.remove('is-active');
                        });
                    }
                }

                // Cancel button listener
                dialog.querySelector('.btn-cancel').addEventListener('click', (e) => {
                    e.stopPropagation();
                    closeDialog();
                });

                // OK button listener
                dialog.querySelector('.btn-ok').addEventListener('click', (e) => {
                    e.stopPropagation();
                    applyDateSelection();
                    closeDialog();
                });
            }

            function applyDateSelection() {
                const year = selectedDate.getFullYear();
                const month = String(selectedDate.getMonth() + 1).padStart(2, '0');
                const day = String(selectedDate.getDate()).padStart(2, '0');

                if (isDateTime) {
                    let hour = parseInt(dialog.querySelector('#timeHourInput')?.value || '12', 10);
                    const minute = String(dialog.querySelector('#timeMinuteInput')?.value || '00').padStart(2, '0');
                    const isPM = dialog.querySelector('#btnPM')?.classList.contains('is-active');

                    if (isPM && hour < 12) hour += 12;
                    if (!isPM && hour === 12) hour = 0;

                    const formattedHour = String(hour).padStart(2, '0');
                    input.value = `${year}-${month}-${day}T${formattedHour}:${minute}`;
                } else {
                    input.value = `${year}-${month}-${day}`;
                }

                // Fire input and change events
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }

            function openDialog() {
                // Close any other open calendar pickers
                document.querySelectorAll('.syndron-datepicker-dialog.is-open').forEach(d => {
                    if (d !== dialog) d.classList.remove('is-open');
                });

                // Reset state to current input value
                if (input.value) {
                    const parsed = new Date(input.value);
                    if (!isNaN(parsed.getTime())) {
                        currentDate = parsed;
                        selectedDate = new Date(parsed.getTime());
                        viewYear = parsed.getFullYear();
                        viewMonth = parsed.getMonth();
                        selectedHours = parsed.getHours();
                        selectedMinutes = parsed.getMinutes();
                    }
                }

                viewMode = 'calendar';

                // Position dialog right below or aligned with input
                const rect = input.getBoundingClientRect();
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

                let topPos = rect.bottom + scrollTop + 8;
                let leftPos = rect.left + scrollLeft;

                // If dialog would overflow bottom of viewport, place it above or adjust
                const dialogHeight = 440;
                if (rect.bottom + dialogHeight > window.innerHeight && rect.top > dialogHeight) {
                    topPos = rect.top + scrollTop - dialogHeight - 8;
                }

                dialog.style.top = `${Math.max(10, topPos)}px`;

                // Keep inside screen viewport horizontally
                if (leftPos + 350 > window.innerWidth) {
                    leftPos = window.innerWidth - 360;
                }
                dialog.style.left = `${Math.max(10, leftPos)}px`;

                renderDialog();
                dialog.classList.add('is-open');
            }

            function closeDialog() {
                dialog.classList.remove('is-open');
            }

            // Open on trigger click or input click
            triggerBtn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                if (dialog.classList.contains('is-open')) {
                    closeDialog();
                } else {
                    openDialog();
                }
            });

            input.addEventListener('click', function (e) {
                e.preventDefault();
                openDialog();
            });

            // Prevent native browser picker on clicking the input
            input.addEventListener('focus', function (e) {
                if (this.showPicker) {
                    e.preventDefault();
                }
            });
        });

        // Close calendar dialog on clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.syndron-datepicker-dialog') && 
                !e.target.closest('.syndron-datepicker-input-wrapper')) {
                document.querySelectorAll('.syndron-datepicker-dialog.is-open').forEach(d => {
                    d.classList.remove('is-open');
                });
            }
        });
    }

    // Auto-init on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', function () {
        initSyndronSelects();
        initSyndronDatePickers();
    });

    // Expose globally so dynamic views can re-init if needed
    window.initSyndronSelects = initSyndronSelects;
    window.initSyndronDatePickers = initSyndronDatePickers;
})();
