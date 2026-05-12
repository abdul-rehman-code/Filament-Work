/**
 * Main JS for PakTools.pk
 * Handles mobile menu, common UI interactions, etc.
 */

document.addEventListener('DOMContentLoaded', () => {
    // Mobile menu toggle logic
    const mobileMenuButton = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuButton.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });

        // Mobile sub-menu toggle logic
        document.querySelectorAll('.mobile-submenu-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const submenu = btn.nextElementSibling;
                const icon = btn.querySelector('svg');
                
                submenu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    }

    // Format numbers with commas (used across all calculators)
    window.formatCurrency = function(amount) {
        return new Intl.NumberFormat('en-PK', {
            style: 'currency',
            currency: 'PKR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(amount);
    };

    // Remove non-numeric characters from input
    window.cleanNumberInput = function(value) {
        return value.replace(/[^0-9.]/g, '');
    };
});
