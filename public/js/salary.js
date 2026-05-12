/**
 * Salary Tax Calculator — PakTools
 * Section 149 | Finance Act 2025
 * FBR Withholding Tax Rate Card (Updated up to June 30, 2025)
 */

document.addEventListener('DOMContentLoaded', () => {

    const salaryInput = document.getElementById('salary_input');
    const salaryType = document.getElementById('salary_type');
    const calculateBtn = document.getElementById('calculate_btn');
    const resultSection = document.getElementById('result_section');
    const grossPill = document.getElementById('pill_gross');
    const taxPill = document.getElementById('pill_tax');
    const netPill = document.getElementById('pill_net');
    const detailLog = document.getElementById('detail_log');

    calculateBtn.addEventListener('click', () => {
        let inputVal = window.cleanNumberInput(salaryInput.value);
        if (!inputVal) return;

        let amount = parseFloat(inputVal);
        let type = salaryType.value;
        let yearlySalary = type === 'monthly' ? amount * 12 : amount;
        let monthlySalary = type === 'monthly' ? amount : amount / 12;

        let yearlyTax = 0;
        let slabLabel = '';
        let surchargeNote = '';

        // FBR Section 149 — Slabs FY 2025-26
        if (yearlySalary <= 600000) {
            yearlyTax = 0;
            slabLabel = 'No tax — salary is below taxable limit';

        } else if (yearlySalary <= 1200000) {
            let excess = yearlySalary - 600000;
            yearlyTax = excess * 0.01;
            slabLabel = 'Slab 2 — 1% on income above Rs. 6 Lakh';

        } else if (yearlySalary <= 2200000) {
            let excess = yearlySalary - 1200000;
            yearlyTax = 6000 + (excess * 0.11);
            slabLabel = 'Slab 3 — Rs. 6,000 fixed + 11% on income above Rs. 12 Lakh';

        } else if (yearlySalary <= 3200000) {
            let excess = yearlySalary - 2200000;
            yearlyTax = 116000 + (excess * 0.23);
            slabLabel = 'Slab 4 — Rs. 1,16,000 fixed + 23% on income above Rs. 22 Lakh';

        } else if (yearlySalary <= 4100000) {
            let excess = yearlySalary - 3200000;
            yearlyTax = 346000 + (excess * 0.30);
            slabLabel = 'Slab 5 — Rs. 3,46,000 fixed + 30% on income above Rs. 32 Lakh';

        } else if (yearlySalary <= 10000000) {
            let excess = yearlySalary - 4100000;
            yearlyTax = 616000 + (excess * 0.35);
            slabLabel = 'Slab 6 — Rs. 6,16,000 fixed + 35% on income above Rs. 41 Lakh';

        } else {
            let excess = yearlySalary - 4100000;
            let baseTax = 616000 + (excess * 0.35);
            let surcharge = baseTax * 0.09;
            yearlyTax = baseTax + surcharge;
            slabLabel = 'Slab 6 + 9% Surcharge (income above Rs. 1 Crore)';
            surchargeNote = `Base tax ${window.formatCurrency(baseTax)} + surcharge ${window.formatCurrency(surcharge)}`;
        }

        let monthlyTax = yearlyTax / 12;
        let monthlyTakeHome = monthlySalary - monthlyTax;
        let yearlyTakeHome = yearlySalary - yearlyTax;
        let effectiveRate = yearlySalary > 0
            ? ((yearlyTax / yearlySalary) * 100).toFixed(1)
            : '0.0';

        // ── Results Table ──────────────────────────────────────────────
        const tableHTML = `
            <div class="table-responsive shadow-sm">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-fbrgreen-500 text-white">
                            <th class="px-5 py-3 text-left font-bold text-sm uppercase tracking-wide">Breakdown</th>
                            <th class="px-5 py-3 text-right font-bold text-sm uppercase tracking-wide">Monthly</th>
                            <th class="px-5 py-3 text-right font-bold text-sm uppercase tracking-wide">Yearly</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="bg-slate-50 hover:bg-slate-100 transition">
                            <td class="px-5 py-4 font-bold text-slate-700 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-slate-400 inline-block"></span> Gross Salary
                            </td>
                            <td class="px-5 py-4 text-right font-extrabold text-slate-900">${window.formatCurrency(monthlySalary)}</td>
                            <td class="px-5 py-4 text-right font-bold text-slate-500">${window.formatCurrency(yearlySalary)}</td>
                        </tr>
                        <tr class="bg-red-50 hover:bg-red-100 transition">
                            <td class="px-5 py-4 font-bold text-red-700 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-400 inline-block"></span> Tax Deducted (FBR)
                            </td>
                            <td class="px-5 py-4 text-right font-extrabold text-red-600">− ${window.formatCurrency(monthlyTax)}</td>
                            <td class="px-5 py-4 text-right font-bold text-red-400">− ${window.formatCurrency(yearlyTax)}</td>
                        </tr>
                        <tr class="bg-green-50 hover:bg-green-100 transition">
                            <td class="px-5 py-4 font-bold text-fbrgreen-700 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-green-400 inline-block"></span> Net Take Home
                            </td>
                            <td class="px-5 py-4 text-right font-extrabold text-fbrgreen-600 text-base">${window.formatCurrency(monthlyTakeHome)}</td>
                            <td class="px-5 py-4 text-right font-bold text-fbrgreen-500">${window.formatCurrency(yearlyTakeHome)}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-blue-50 border-t-2 border-blue-100">
                            <td colspan="3" class="px-5 py-3 text-xs text-slate-500">
                                <span class="font-bold text-blue-700">📋 ${slabLabel}</span>
                                &nbsp;|&nbsp; Effective Tax Rate: <strong class="text-slate-700">${effectiveRate}%</strong>
                                ${surchargeNote ? `&nbsp;|&nbsp; <span class="text-orange-600">⚠️ ${surchargeNote}</span>` : ''}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        `;

        // Write table into gross pill area (spans full width); hide the other two pills
        grossPill.innerHTML = tableHTML;
        grossPill.className = 'col-span-3';
        taxPill.innerHTML  = '';
        taxPill.className  = 'hidden';
        netPill.innerHTML  = '';
        netPill.className  = 'hidden';
        detailLog.innerHTML = '';

        resultSection.classList.remove('hidden');
        resultSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });

});