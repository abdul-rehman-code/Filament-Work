/** Pension App Logic */
document.addEventListener('DOMContentLoaded', () => {
    if(!document.getElementById('pension_input')) return;
    document.getElementById('calculate_btn').addEventListener('click', () => {
        let val = window.cleanNumberInput(document.getElementById('pension_input').value);
        if (!val) return;
        document.getElementById('pill_gross').innerHTML = `<div class="text-xs text-slate-500 font-bold">Gross Pension</div><div class="text-xl font-extrabold">${window.formatCurrency(val)}</div>`;
        document.getElementById('pill_tax').innerHTML = `<div class="text-xs text-red-700 font-bold">Tax Cut</div><div class="text-xl font-extrabold text-red-600">PKR 0 (Exempt)</div>`;
        document.getElementById('pill_net').innerHTML = `<div class="text-xs text-fbrgreen-600 font-bold">Take Home</div><div class="text-2xl font-extrabold text-fbrgreen-500">${window.formatCurrency(val)}</div>`;
        document.getElementById('result_section').classList.remove('hidden');
    });
});
