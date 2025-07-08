// Shop Table Sorting Functionality
function initializeTableSorting() {
    const tables = document.querySelectorAll('.table');

    tables.forEach(table => {
        const headers = table.querySelectorAll('th');

        headers.forEach((header, index) => {
            // Add sort icon and make header clickable
            header.style.cursor = 'pointer';
            header.classList.add('sortable');

            // Add sort icon if not already present
            if (!header.querySelector('.sort-icon')) {
                const sortIcon = document.createElement('span');
                sortIcon.className = 'sort-icon';
                sortIcon.innerHTML = '↕';
                sortIcon.style.marginLeft = '5px';
                sortIcon.style.fontSize = '12px';
                sortIcon.style.color = '#666';
                header.appendChild(sortIcon);
            }

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

// Search Functionality for Shop Tables
function setupTableSearch(searchId, tableId) {
    const searchInput = document.getElementById(searchId);
    const table = document.getElementById(tableId);

    if (!searchInput || !table) return;

    const rows = table.querySelectorAll('tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const matchesSearch = text.includes(searchTerm);
            row.style.display = matchesSearch ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
}

// Initialize all shop functionality when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize table sorting
    initializeTableSorting();

    // Setup search for items table if it exists
    setupTableSearch('itemSearch', 'itemsTable');

    // Setup search for vehicles table if it exists
    setupTableSearch('vehicleSearch', 'vehiclesTable');
});

// Export functions for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initializeTableSorting,
        setupTableSearch
    };
} 