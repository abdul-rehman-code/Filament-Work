/**
 * Rental Income Tax Calculator Logic - FBR Pakistan
 */

document.addEventListener('DOMContentLoaded', () => {
    const rentalInput = document.getElementById('rental_input');
    const calcBtn = document.getElementById('calculate_btn');
    
    calcBtn.addEventListener('click', () => {
        let inputVal = window.cleanNumberInput(rentalInput.value) || 0;
        let amount = parseFloat(inputVal); // Annual Rental Income
        if (amount === 0) return;

        let tax = 0;
        let slabInfo = "";

        // Simplified 2024-2025 Rental Tax Slabs
        if (amount <= 300000) {
            tax = 0;
            slabInfo = "Up to 300,000 PKR - 0% Tax";
        } else if (amount <= 600000) {
            tax = (amount - 300000) * 0.05;
            slabInfo = "5% of amount exceeding Rs. 300,000";
        } else if (amount <= 2000000) {
            tax = 15000 + ((amount - 600000) * 0.10);
            slabInfo = "Rs. 15,000 + 10% of amount exceeding Rs. 600,000";
        } else if (amount <= 4000000) {
            tax = 155000 + ((amount - 2000000) * 0.15);
            slabInfo = "Rs. 155,000 + 15% of amount exceeding Rs. 2M";
        } else {
            tax = 455000 + ((amount - 4000000) * 0.20);
            slabInfo = "Rs. 455,000 + 20% of amount exceeding Rs. 4M";
        }

        document.getElementById('res_gross_rental').textContent = window.formatCurrency(amount);
        document.getElementById('res_yearly_tax').textContent = window.formatCurrency(tax);
        document.getElementById('res_take_home').textContent = window.formatCurrency(amount - tax);
        document.getElementById('tax_desc').textContent = "Applied Slab: " + slabInfo;

        document.getElementById('result_card').classList.remove('hidden');
    });
});
