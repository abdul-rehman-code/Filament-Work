/**
 * Capital Gain Tax Calculator Logic - FBR Pakistan
 */

document.addEventListener('DOMContentLoaded', () => {
    const gainInput = document.getElementById('gain_input');
    const filerStatus = document.getElementById('filer_status');
    const calcBtn = document.getElementById('calculate_btn');
    
    calcBtn.addEventListener('click', () => {
        let inputVal = window.cleanNumberInput(gainInput.value) || 0;
        let gainAmount = parseFloat(inputVal);
        if (gainAmount === 0) return;

        let appliesFiler = filerStatus.value === 'filer';
        
        // 2024-25 Budget rates for generic property sale capital gains: 15% Filer, 45% Non-filer
        let taxRate = appliesFiler ? 0.15 : 0.45; 
        
        let tax = gainAmount * taxRate;
        
        document.getElementById('res_gross_gain').textContent = window.formatCurrency(gainAmount);
        document.getElementById('res_tax_amount').textContent = window.formatCurrency(tax);
        document.getElementById('res_net_gain').textContent = window.formatCurrency(gainAmount - tax);

        document.getElementById('tax_desc').textContent = appliesFiler ? "15% Filer CGT applied." : "45% Non-Filer CGT penalty rate applied.";

        const resultSection = document.getElementById('result_card');
        resultSection.classList.remove('hidden');
        resultSection.classList.remove('opacity-50');
    });
});
