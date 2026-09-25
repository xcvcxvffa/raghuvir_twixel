/**
 * Syndron UI - Analytics Dashboard Scripts
 * Matching https://store.codervent.com/syndron-ui-next/dashboard/analytics/
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Theme Switcher (Dark / Light Mode)
    const themeToggleBtn = document.getElementById('themeToggleBtn');
    const themeIcon = document.getElementById('themeIcon');

    // Init theme from localStorage or system preference
    const savedTheme = localStorage.getItem('syndron_theme') || 'light';
    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
        if (themeIcon) {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        }
    } else {
        document.documentElement.classList.remove('dark');
        if (themeIcon) {
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }
    }

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function () {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('syndron_theme', isDark ? 'dark' : 'light');

            if (themeIcon) {
                if (isDark) {
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                } else {
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                }
            }

            // Re-render charts with updated grid & text colors
            updateChartsTheme(isDark);
        });
    }

    // 2. Sidebar Toggle Controller (Desktop Mini-Rail & Mobile Off-Canvas)
    const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
    const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
    const syndronSidebar = document.getElementById('syndronSidebar');
    let sidebarBackdrop = document.querySelector('.syndron-backdrop');

    if (!sidebarBackdrop) {
        sidebarBackdrop = document.createElement('div');
        sidebarBackdrop.className = 'syndron-backdrop';
        document.body.appendChild(sidebarBackdrop);
    }

    // Restore desktop collapsed state on load
    try {
        if (window.innerWidth > 991 && localStorage.getItem('syndron_sidebar_collapsed') === 'true') {
            document.body.classList.add('sidebar-collapsed');
        }
    } catch(e) {}

    function toggleSidebar() {
        if (!syndronSidebar) return;
        const isMobile = window.innerWidth <= 991;

        if (isMobile) {
            // Mobile: off-canvas drawer with backdrop
            const willOpen = !syndronSidebar.classList.contains('open');
            syndronSidebar.classList.toggle('open', willOpen);
            sidebarBackdrop.classList.toggle('active', willOpen);
            document.body.classList.toggle('sidebar-drawer-open', willOpen);
        } else {
            // Desktop: toggle mini slim sidebar (NEVER show backdrop!)
            const isCollapsed = document.body.classList.toggle('sidebar-collapsed');
            sidebarBackdrop.classList.remove('active');
            document.body.classList.remove('sidebar-drawer-open');
            try {
                localStorage.setItem('syndron_sidebar_collapsed', isCollapsed ? 'true' : 'false');
            } catch(e) {}
        }
    }

    function closeSidebar() {
        if (syndronSidebar) {
            syndronSidebar.classList.remove('open');
            if (sidebarBackdrop) sidebarBackdrop.classList.remove('active');
            document.body.classList.remove('sidebar-drawer-open');
        }
    }

    if (toggleSidebarBtn) {
        toggleSidebarBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            toggleSidebar();
        });
    }

    if (sidebarCloseBtn) {
        sidebarCloseBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            closeSidebar();
        });
    }

    if (sidebarBackdrop) {
        sidebarBackdrop.addEventListener('click', closeSidebar);
    }

    // Close on Escape key press
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && syndronSidebar && syndronSidebar.classList.contains('open')) {
            closeSidebar();
        }
    });

    // Auto-close sidebar on mobile when navigating links
    if (syndronSidebar) {
        const navLinks = syndronSidebar.querySelectorAll('.sidebar-link:not([href="javascript:void(0)"])');
        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                if (window.innerWidth <= 991) {
                    closeSidebar();
                }
            });
        });
    }

    // Handle screen resize
    window.addEventListener('resize', function () {
        if (window.innerWidth > 991 && syndronSidebar && syndronSidebar.classList.contains('open')) {
            closeSidebar();
        }
    });

    // 3. User & Notifications Popover Dropdowns
    const userTrigger = document.getElementById('userTrigger');
    const userDropdown = document.getElementById('userDropdown');

    if (userTrigger && userDropdown) {
        userTrigger.addEventListener('click', function (e) {
            e.stopPropagation();
            if (notificationsDropdown) notificationsDropdown.classList.remove('show');
            userDropdown.classList.toggle('show');
        });

        document.addEventListener('click', function (e) {
            if (!userDropdown.contains(e.target) && !userTrigger.contains(e.target)) {
                userDropdown.classList.remove('show');
            }
        });
    }

    const notificationsTrigger = document.getElementById('notificationsTrigger');
    const notificationsDropdown = document.getElementById('notificationsDropdown');

    if (notificationsTrigger && notificationsDropdown) {
        notificationsTrigger.addEventListener('click', function (e) {
            e.stopPropagation();
            if (userDropdown) userDropdown.classList.remove('show');
            notificationsDropdown.classList.toggle('show');
        });

        document.addEventListener('click', function (e) {
            if (!notificationsDropdown.contains(e.target) && !notificationsTrigger.contains(e.target)) {
                notificationsDropdown.classList.remove('show');
            }
        });
    }

    // 4. Universal Password Toggle (Global Delegated Handler)
    document.addEventListener('click', function (e) {
        const toggleBtn = e.target.closest('.password-toggle-btn');
        if (!toggleBtn) return;

        e.preventDefault();
        e.stopPropagation();

        const targetInputId = toggleBtn.getAttribute('data-target');
        let targetInput = targetInputId ? document.getElementById(targetInputId) : null;
        
        if (!targetInput) {
            const parent = toggleBtn.closest('.input-with-icon') || toggleBtn.parentElement;
            if (parent) {
                targetInput = parent.querySelector('input');
            }
        }

        const icon = toggleBtn.querySelector('i, svg');

        if (targetInput) {
            const isPassword = targetInput.type === 'password';
            targetInput.type = isPassword ? 'text' : 'password';

            if (icon) {
                if (isPassword) {
                    icon.className = 'fa-solid fa-eye-slash';
                    toggleBtn.title = 'Hide Password';
                } else {
                    icon.className = 'fa-regular fa-eye';
                    toggleBtn.title = 'Show Password';
                }
            }
        }
    });

    // 5. Chart.js Initializations
    let mainOverviewChart = null;
    let deviceDonutChart = null;

    function getChartThemeColors(isDark) {
        return {
            textColor: isDark ? '#94a3b8' : '#64748b',
            gridColor: isDark ? 'rgba(255, 255, 255, 0.06)' : '#f1f5f9',
            tooltipBg: isDark ? '#181b1f' : '#0f172a',
        };
    }

    function initAnalyticsCharts() {
        const isDark = document.documentElement.classList.contains('dark');
        const theme = getChartThemeColors(isDark);

        // A. Sparkline Charts on KPI Cards with Glowing Gradient Fill
        const sparklineConfigs = [
            { id: 'sparkline1', color: '#EF801C', bg: 'rgba(239, 128, 28, 0.18)', data: [14, 18, 16, 24, 21, 29, 27, 36] },
            { id: 'sparkline2', color: '#74583D', bg: 'rgba(116, 88, 61, 0.18)', data: [20, 17, 25, 23, 31, 29, 36, 42] },
            { id: 'sparkline3', color: '#10b981', bg: 'rgba(16, 185, 129, 0.18)', data: [42, 50, 47, 58, 55, 66, 70, 84] },
            { id: 'sparkline4', color: '#3b82f6', bg: 'rgba(59, 130, 246, 0.18)', data: [38, 35, 36, 32, 34, 30, 29, 28] },
        ];

        sparklineConfigs.forEach(cfg => {
            const el = document.getElementById(cfg.id);
            if (el && typeof Chart !== 'undefined') {
                const ctx = el.getContext('2d');
                const grad = ctx.createLinearGradient(0, 0, 0, 30);
                grad.addColorStop(0, cfg.bg);
                grad.addColorStop(1, 'rgba(255, 255, 255, 0)');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: cfg.data.map(() => ''),
                        datasets: [{
                            data: cfg.data,
                            borderColor: cfg.color,
                            backgroundColor: grad,
                            borderWidth: 2,
                            pointRadius: 0,
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false }, tooltip: { enabled: false } },
                        scales: { x: { display: false }, y: { display: false } }
                    }
                });
            }
        });

        // B. Main Performance Overview Chart
        const mainEl = document.getElementById('syndronOverviewChart');
        if (mainEl && typeof Chart !== 'undefined') {
            const ctx = mainEl.getContext('2d');
            const gradientSessions = ctx.createLinearGradient(0, 0, 0, 320);
            gradientSessions.addColorStop(0, 'rgba(239, 128, 28, 0.3)');
            gradientSessions.addColorStop(1, 'rgba(239, 128, 28, 0.0)');

            const gradientViews = ctx.createLinearGradient(0, 0, 0, 320);
            gradientViews.addColorStop(0, 'rgba(116, 88, 61, 0.2)');
            gradientViews.addColorStop(1, 'rgba(116, 88, 61, 0.0)');

            mainOverviewChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'Sessions',
                            data: [1400, 2200, 1900, 2800, 3400, 3100, 4200, 3900, 4800, 5200, 4900, 5800],
                            borderColor: '#EF801C',
                            backgroundColor: gradientSessions,
                            borderWidth: 2.5,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 3,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#EF801C',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2
                        },
                        {
                            label: 'Page Views',
                            data: [2800, 3600, 3100, 4500, 5200, 4900, 6800, 6200, 7500, 8100, 7900, 9400],
                            borderColor: '#74583D',
                            backgroundColor: gradientViews,
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            borderDash: [4, 4],
                            pointRadius: 3,
                            pointHoverRadius: 6,
                            pointBackgroundColor: '#74583D',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 6,
                                padding: 16,
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 12, weight: '600' },
                                color: theme.textColor
                            }
                        },
                        tooltip: {
                            backgroundColor: theme.tooltipBg,
                            titleColor: '#ffffff',
                            bodyColor: '#e2e8f0',
                            padding: 12,
                            cornerRadius: 8,
                            titleFont: { family: "'Plus Jakarta Sans', sans-serif", size: 12, weight: '700' },
                            bodyFont: { family: "'Plus Jakarta Sans', sans-serif", size: 11 }
                        }
                    },
                    scales: {
                        y: {
                            grid: { color: theme.gridColor },
                            ticks: {
                                color: theme.textColor,
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 11 },
                                callback: function(val) { return val >= 1000 ? (val / 1000) + 'k' : val; }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: theme.textColor,
                                font: { family: "'Plus Jakarta Sans', sans-serif", size: 11 }
                            }
                        }
                    }
                }
            });
        }

        // C. Device Breakdown Donut Chart
        const deviceEl = document.getElementById('syndronDeviceChart');
        if (deviceEl && typeof Chart !== 'undefined') {
            deviceDonutChart = new Chart(deviceEl.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Desktop', 'Mobile', 'Tablet'],
                    datasets: [{
                        data: [58, 34, 8],
                        backgroundColor: ['#EF801C', '#74583D', '#10b981'],
                        borderWidth: 0,
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '72%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: theme.tooltipBg,
                            padding: 10,
                            cornerRadius: 8,
                            callbacks: {
                                label: function (context) {
                                    return ' ' + context.label + ': ' + context.raw + '%';
                                }
                            }
                        }
                    }
                }
            });
        }
    }

    function updateChartsTheme(isDark) {
        const theme = getChartThemeColors(isDark);

        if (mainOverviewChart) {
            mainOverviewChart.options.scales.y.grid.color = theme.gridColor;
            mainOverviewChart.options.scales.y.ticks.color = theme.textColor;
            mainOverviewChart.options.scales.x.ticks.color = theme.textColor;
            mainOverviewChart.options.plugins.legend.labels.color = theme.textColor;
            mainOverviewChart.options.plugins.tooltip.backgroundColor = theme.tooltipBg;
            mainOverviewChart.update();
        }

        if (deviceDonutChart) {
            deviceDonutChart.options.plugins.tooltip.backgroundColor = theme.tooltipBg;
            deviceDonutChart.update();
        }
    }

    initAnalyticsCharts();

    // Date Range Filter Interactivity (Smooth dynamic re-render)
    const dateButtons = document.querySelectorAll('.date-filter-btn');
    dateButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            const parent = this.closest('.date-filter-group');
            if (parent) {
                parent.querySelectorAll('.date-filter-btn').forEach(b => b.classList.remove('active'));
            }
            this.classList.add('active');

            const period = this.textContent.trim();
            if (mainOverviewChart) {
                if (period === '24 Hours') {
                    mainOverviewChart.data.labels = ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'];
                    mainOverviewChart.data.datasets[0].data = [120, 85, 170, 520, 780, 690, 610, 440];
                    mainOverviewChart.data.datasets[1].data = [280, 190, 340, 950, 1480, 1310, 1180, 920];
                } else if (period === '7 Days') {
                    mainOverviewChart.data.labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                    mainOverviewChart.data.datasets[0].data = [840, 980, 1150, 1090, 1380, 1520, 1310];
                    mainOverviewChart.data.datasets[1].data = [1720, 1980, 2310, 2180, 2790, 3050, 2680];
                } else if (period === '30 Days') {
                    mainOverviewChart.data.labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
                    mainOverviewChart.data.datasets[0].data = [10800, 12400, 13900, 15200];
                    mainOverviewChart.data.datasets[1].data = [27500, 31000, 34800, 38100];
                } else if (period === '1 Year' || period === 'Yearly') {
                    mainOverviewChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    mainOverviewChart.data.datasets[0].data = [1400, 2200, 1900, 2800, 3400, 3100, 4200, 3900, 4800, 5200, 4900, 5800];
                    mainOverviewChart.data.datasets[1].data = [2800, 3600, 3100, 4500, 5200, 4900, 6800, 6200, 7500, 8100, 7900, 9400];
                }
                mainOverviewChart.update();
            }
        });
    });
});

// 6. Sonner Stacked Toast Notification Engine (ShadCN style)
window.showSonnerToast = function ({ message, desc = '', type = 'success', duration = 4500 }) {
    let container = document.querySelector('.sonner-toaster-container');
    if (!container) {
        container = document.createElement('div');
        container.className = 'sonner-toaster-container';
        document.body.appendChild(container);
    }

    // Clear any existing toast so only 1 single message card appears
    container.innerHTML = '';

    const wrapper = document.createElement('div');
    wrapper.className = 'sonner-toast-wrapper';

    let iconHtml = '<i class="fa-solid fa-check"></i>';
    if (type === 'error') iconHtml = '<i class="fa-solid fa-circle-exclamation"></i>';
    else if (type === 'warning') iconHtml = '<i class="fa-solid fa-triangle-exclamation"></i>';
    else if (type === 'info') iconHtml = '<i class="fa-solid fa-info"></i>';

    wrapper.innerHTML = `
        <div class="sonner-toast-card">
            <button type="button" class="sonner-close-btn" title="Dismiss">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="sonner-icon-box ${type}">
                ${iconHtml}
            </div>
            <div class="sonner-text-content">
                <div>${message}</div>
                ${desc ? `<div class="sonner-text-desc">${desc}</div>` : ''}
            </div>
        </div>
    `;

    container.appendChild(wrapper);

    function dismissToast() {
        if (wrapper.classList.contains('closing')) return;
        wrapper.classList.add('closing');
        setTimeout(() => {
            if (wrapper.parentNode) {
                wrapper.parentNode.removeChild(wrapper);
            }
        }, 260);
    }

    const closeBtn = wrapper.querySelector('.sonner-close-btn');
    if (closeBtn) {
        closeBtn.addEventListener('click', dismissToast);
    }

    let dismissTimer = setTimeout(dismissToast, duration);

    wrapper.addEventListener('mouseenter', () => {
        clearTimeout(dismissTimer);
    });

    wrapper.addEventListener('mouseleave', () => {
        dismissTimer = setTimeout(dismissToast, duration / 2);
    });
};

// 7. Command Palette Spotlight Search Controller (⌘K / Ctrl+K)
document.addEventListener('DOMContentLoaded', function () {
    const backdrop = document.getElementById('commandPaletteBackdrop');
    const modal = document.getElementById('commandPaletteModal');
    const searchInput = document.getElementById('commandSearchInput');
    const closeBtn = document.getElementById('commandCloseBtn');
    const topbarSearchBox = document.querySelector('.topbar-search-box');
    const topbarSearchInput = document.querySelector('.topbar-search-input');
    const resultsContainer = document.getElementById('commandResultsList');
    const emptyState = document.getElementById('commandEmptyState');
    const themeCommandBtn = document.getElementById('commandThemeToggle');

    if (!backdrop || !searchInput) return;

    function openCommandPalette() {
        backdrop.classList.add('active');
        document.body.style.overflow = 'hidden';
        searchInput.value = '';
        filterCommands('');
        setTimeout(() => searchInput.focus(), 50);
    }

    function closeCommandPalette() {
        backdrop.classList.remove('active');
        document.body.style.overflow = '';
        searchInput.value = '';
    }

    // Open on topbar search click
    if (topbarSearchBox) {
        topbarSearchBox.addEventListener('click', function (e) {
            e.preventDefault();
            openCommandPalette();
        });
    }

    if (topbarSearchInput) {
        topbarSearchInput.addEventListener('focus', function (e) {
            e.preventDefault();
            this.blur();
            openCommandPalette();
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeCommandPalette);
    }

    backdrop.addEventListener('click', function (e) {
        if (e.target === backdrop) {
            closeCommandPalette();
        }
    });

    // Global keyboard shortcut: ⌘K or Ctrl+K
    document.addEventListener('keydown', function (e) {
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            if (backdrop.classList.contains('active')) {
                closeCommandPalette();
            } else {
                openCommandPalette();
            }
        } else if (e.key === 'Escape' && backdrop.classList.contains('active')) {
            e.preventDefault();
            closeCommandPalette();
        }
    });

    // Filter items based on query
    function filterCommands(query) {
        const q = query.toLowerCase().trim();
        const groups = resultsContainer.querySelectorAll('.command-group');
        let totalVisible = 0;

        groups.forEach(group => {
            let groupVisibleCount = 0;
            const items = group.querySelectorAll('.command-item');

            items.forEach(item => {
                const title = (item.querySelector('.command-item-title')?.textContent || '').toLowerCase();
                const desc = (item.querySelector('.command-item-desc')?.textContent || '').toLowerCase();
                const keywords = (item.getAttribute('data-keywords') || '').toLowerCase();

                if (!q || title.includes(q) || desc.includes(q) || keywords.includes(q)) {
                    item.style.display = 'flex';
                    groupVisibleCount++;
                    totalVisible++;
                } else {
                    item.style.display = 'none';
                }
            });

            group.style.display = groupVisibleCount > 0 ? 'block' : 'none';
        });

        if (emptyState) {
            if (totalVisible === 0) {
                emptyState.classList.add('show');
            } else {
                emptyState.classList.remove('show');
            }
        }

        // Highlight first visible item
        highlightFirstVisibleItem();
    }

    searchInput.addEventListener('input', function () {
        filterCommands(this.value);
    });

    function getVisibleItems() {
        return Array.from(resultsContainer.querySelectorAll('.command-item')).filter(
            item => item.style.display !== 'none'
        );
    }

    function highlightFirstVisibleItem() {
        const visible = getVisibleItems();
        resultsContainer.querySelectorAll('.command-item').forEach(item => item.classList.remove('selected'));
        if (visible.length > 0) {
            visible[0].classList.add('selected');
        }
    }

    // Keyboard navigation: Arrow Up, Arrow Down, Enter
    searchInput.addEventListener('keydown', function (e) {
        const visible = getVisibleItems();
        if (visible.length === 0) return;

        let currentIndex = visible.findIndex(item => item.classList.contains('selected'));

        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (currentIndex < visible.length - 1) {
                if (currentIndex >= 0) visible[currentIndex].classList.remove('selected');
                visible[currentIndex + 1].classList.add('selected');
                visible[currentIndex + 1].scrollIntoView({ block: 'nearest' });
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (currentIndex > 0) {
                visible[currentIndex].classList.remove('selected');
                visible[currentIndex - 1].classList.add('selected');
                visible[currentIndex - 1].scrollIntoView({ block: 'nearest' });
            }
        } else if (e.key === 'Enter') {
            e.preventDefault();
            const selectedItem = visible[currentIndex >= 0 ? currentIndex : 0];
            if (selectedItem) {
                selectedItem.click();
            }
        }
    });

    // Theme toggle via command palette
    if (themeCommandBtn) {
        themeCommandBtn.addEventListener('click', function (e) {
            e.preventDefault();
            const themeBtn = document.getElementById('themeToggleBtn');
            if (themeBtn) {
                themeBtn.click();
            }
            closeCommandPalette();
            if (window.showSonnerToast) {
                const isDark = document.documentElement.classList.contains('dark');
                window.showSonnerToast({
                    message: isDark ? 'Dark theme activated' : 'Light theme activated',
                    type: 'info'
                });
            }
        });
    }
});

