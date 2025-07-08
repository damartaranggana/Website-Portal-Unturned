// Mobile Navigation Toggle
const mobileNavToggle = document.getElementById('mobile-nav-toggle');
const mainNav = document.getElementById('main-nav');

if (mobileNavToggle && mainNav) {
    mobileNavToggle.addEventListener('click', () => {
        mainNav.classList.toggle('active');
        mobileNavToggle.classList.toggle('active');
    });

    // Close mobile nav when clicking on a link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('active');
            mobileNavToggle.classList.remove('active');
        });
    });
}

// Leaderboard Tab Navigation
const leaderboardTabs = document.querySelectorAll('.leaderboard-tab');
const leaderboardSections = document.querySelectorAll('.section');

if (leaderboardTabs.length > 0) {
    leaderboardTabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();

            // Remove active class from all tabs
            leaderboardTabs.forEach(t => t.classList.remove('active'));

            // Add active class to clicked tab
            tab.classList.add('active');

            // Show corresponding section
            const target = tab.getAttribute('data-target');
            leaderboardSections.forEach(section => {
                if (section.id === target) {
                    section.style.display = 'block';
                    section.scrollIntoView({ behavior: 'smooth' });
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });

    // Initialize: Show kills section by default, hide others
    document.querySelectorAll('.section').forEach(section => {
        if (section.id !== 'kills') {
            section.style.display = 'none';
        }
    });
}

// Table Sorting Functionality
function initializeTableSorting() {
    const tables = document.querySelectorAll('.table');

    tables.forEach(table => {
        const headers = table.querySelectorAll('th');

        headers.forEach((header, index) => {
            // Skip rank column (index 0) as it should always stay in order
            if (index === 0) return;

            // Add sort icon and make header clickable
            header.style.cursor = 'pointer';
            header.classList.add('sortable');

            // Add sort icon
            const sortIcon = document.createElement('span');
            sortIcon.className = 'sort-icon';
            sortIcon.innerHTML = '↕';
            sortIcon.style.marginLeft = '5px';
            sortIcon.style.fontSize = '12px';
            sortIcon.style.color = '#666';
            header.appendChild(sortIcon);

            let sortDirection = 'none'; // none, asc, desc

            header.addEventListener('click', () => {
                const tbody = table.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));

                // Remove active class from all headers
                headers.forEach(h => {
                    h.classList.remove('sort-asc', 'sort-desc');
                    const icon = h.querySelector('.sort-icon');
                    if (icon) icon.innerHTML = '↕';
                });

                // Toggle sort direction
                if (sortDirection === 'none' || sortDirection === 'desc') {
                    sortDirection = 'asc';
                    header.classList.add('sort-asc');
                    header.querySelector('.sort-icon').innerHTML = '↑';
                } else {
                    sortDirection = 'desc';
                    header.classList.add('sort-desc');
                    header.querySelector('.sort-icon').innerHTML = '↓';
                }

                // Sort rows
                rows.sort((a, b) => {
                    const aValue = a.cells[index].textContent.trim();
                    const bValue = b.cells[index].textContent.trim();

                    // Handle numeric values (remove commas and convert to number)
                    const aNum = parseFloat(aValue.replace(/,/g, ''));
                    const bNum = parseFloat(bValue.replace(/,/g, ''));

                    if (!isNaN(aNum) && !isNaN(bNum)) {
                        // Numeric sorting
                        if (sortDirection === 'asc') {
                            return aNum - bNum;
                        } else {
                            return bNum - aNum;
                        }
                    } else {
                        // String sorting
                        if (sortDirection === 'asc') {
                            return aValue.localeCompare(bValue);
                        } else {
                            return bValue.localeCompare(aValue);
                        }
                    }
                });

                // Reorder rows in the table
                rows.forEach(row => {
                    tbody.appendChild(row);
                });

                // Update rank numbers after sorting
                updateRankNumbers(table);
            });

            // Add hover effect
            header.addEventListener('mouseenter', () => {
                if (!header.classList.contains('sort-asc') && !header.classList.contains('sort-desc')) {
                    header.style.backgroundColor = '#f8f9fa';
                }
            });

            header.addEventListener('mouseleave', () => {
                if (!header.classList.contains('sort-asc') && !header.classList.contains('sort-desc')) {
                    header.style.backgroundColor = '';
                }
            });
        });
    });
}

// Update rank numbers after sorting
function updateRankNumbers(table) {
    const rows = table.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        const rankCell = row.cells[0];
        if (rankCell) {
            rankCell.textContent = index + 1;
        }
    });
}

// Initialize table sorting when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    initializeTableSorting();
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add hover effects to table rows
document.querySelectorAll('.table tbody tr').forEach(row => {
    row.addEventListener('mouseenter', () => {
        row.style.transform = 'scale(1.01)';
        row.style.transition = 'transform 0.2s ease';
    });

    row.addEventListener('mouseleave', () => {
        row.style.transform = 'scale(1)';
    });
});

// Add click effects to buttons
document.querySelectorAll('.btn').forEach(btn => {
    btn.addEventListener('click', function (e) {
        // Create ripple effect
        const ripple = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple');

        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe elements for animation
document.querySelectorAll('.fade-in-up, .slide-in-left').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
    observer.observe(el);
}); 