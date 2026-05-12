/**
 * YouTube Income Tax Calculator — PakTools
 * Resident  : 1% FWT (AdSense USD) + FBR Slab (PKR Sponsorships)
 * Non-Resident: Rs 195/1000 views income benchmark → 30% expense deduction → slab tax
 */

document.addEventListener('DOMContentLoaded', function () {

    /* ── helpers ── */
    function fmt(n) {
        return 'Rs\u00a0' + Math.round(n).toLocaleString('en-PK');
    }

    function slabTax(yearlyIncome) {
        if (yearlyIncome <= 600000) return { tax: 0, label: '0%' };
        if (yearlyIncome <= 1200000) return { tax: (yearlyIncome - 600000) * 0.01, label: '1%' };
        if (yearlyIncome <= 2200000) return { tax: 6000 + (yearlyIncome - 1200000) * 0.11, label: '11%' };
        if (yearlyIncome <= 3200000) return { tax: 116000 + (yearlyIncome - 2200000) * 0.23, label: '23%' };
        if (yearlyIncome <= 4100000) return { tax: 346000 + (yearlyIncome - 3200000) * 0.30, label: '30%' };
        return { tax: 616000 + (yearlyIncome - 4100000) * 0.35, label: '35%' };
    }

    /* ── mode toggle ── */
    var modeRadios = document.querySelectorAll('input[name="tax_mode"]');
    var residentSection = document.getElementById('resident_section');
    var nonresidentSection = document.getElementById('nonresident_section');

    function applyMode() {
        var mode = document.querySelector('input[name="tax_mode"]:checked')?.value || 'resident';
        residentSection.style.display = mode === 'resident' ? '' : 'none';
        nonresidentSection.style.display = mode === 'nonresident' ? '' : 'none';
        document.getElementById('result_section').style.display = 'none';
    }

    modeRadios.forEach(function (r) { r.addEventListener('change', applyMode); });
    applyMode();

    /* ── format-on-type ── */
    ['adsense_input', 'sponsor_input', 'views_input'].forEach(function (id) {
        var el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('input', function () {
            var raw = this.value.replace(/[^0-9]/g, '');
            this.value = raw ? parseInt(raw, 10).toLocaleString('en-PK') : '';
        });
    });

    /* ── chip buttons ── */
    window.setChip = function (inputId, value, groupId) {
        var el = document.getElementById(inputId);
        el.value = value === 0 ? '0' : value.toLocaleString('en-PK');
        document.querySelectorAll('#' + groupId + ' .ytchip').forEach(function (c) {
            c.classList.remove('active');
        });
        event.target.classList.add('active');
    };

    /* ── calculate ── */
    document.getElementById('calculate_btn').addEventListener('click', function () {

        var mode = document.querySelector('input[name="tax_mode"]:checked')?.value || 'resident';

        /* ════════════════════════════════════════════════════════
           NON-RESIDENT MODE
           Income = (yearly_views / 1000) × Rs 195  [FBR benchmark]
           Taxable = Income × 0.70  (30% allowed expense deduction)
           Tax = slabTax(Taxable)
        ════════════════════════════════════════════════════════ */
        if (mode === 'nonresident') {

            var viewsRaw = document.getElementById('views_input').value.replace(/[^0-9]/g, '');
            var viewsMonthly = parseInt(viewsRaw, 10) || 0;

            if (viewsMonthly <= 0) {
                highlight('views_input');
                return;
            }

            var yearlyViews = viewsMonthly * 12;
            var grossIncome = (yearlyViews / 1000) * 195;          // FBR benchmark income
            var expDeduction = grossIncome * 0.30;                   // 30% allowed
            var taxableIncome = grossIncome - expDeduction;           // 70% taxable
            var slab = slabTax(taxableIncome);
            var yearlyTax = Math.round(slab.tax);
            var monthlyTax = Math.round(yearlyTax / 12);
            var yearlyNet = Math.round(grossIncome - yearlyTax);
            var monthlyNet = Math.round(yearlyNet / 12);

            var html = `
            <div style="margin-bottom:16px;padding:12px 16px;background:#fff7ed;border:1px solid #fed7aa;border-radius:10px;font-size:13px;color:#92400e;">
                ⚠️ Based on <strong>proposed</strong> FBR rules (Rs 195 / 1,000 views benchmark income, 30% expense deduction, then standard slabs). Final rules may vary.
            </div>
            <div class="table-responsive shadow-sm">
                <table style="width:100%;font-size:14px;border-collapse:collapse;">
                    <tr style="background:#16a34a;color:#fff;">
                        <th style="padding:10px 14px;text-align:left;">Description</th>
                        <th style="padding:10px 14px;text-align:right;">Monthly</th>
                        <th style="padding:10px 14px;text-align:right;">Yearly</th>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9;">
                        <td style="padding:10px 14px;color:#64748b;">Pakistan Views</td>
                        <td style="padding:10px 14px;text-align:right;">${viewsMonthly.toLocaleString('en-PK')}</td>
                        <td style="padding:10px 14px;text-align:right;">${yearlyViews.toLocaleString('en-PK')}</td>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9;">
                        <td style="padding:10px 14px;color:#64748b;">Benchmark Income (Rs 195/1k views)</td>
                        <td style="padding:10px 14px;text-align:right;">${fmt(grossIncome / 12)}</td>
                        <td style="padding:10px 14px;text-align:right;">${fmt(grossIncome)}</td>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9;">
                        <td style="padding:10px 14px;color:#64748b;">Expense Deduction (30%)</td>
                        <td style="padding:10px 14px;text-align:right;color:#16a34a;">− ${fmt(expDeduction / 12)}</td>
                        <td style="padding:10px 14px;text-align:right;color:#16a34a;">− ${fmt(expDeduction)}</td>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9;">
                        <td style="padding:10px 14px;color:#64748b;">Taxable Income (70%)</td>
                        <td style="padding:10px 14px;text-align:right;">${fmt(taxableIncome / 12)}</td>
                        <td style="padding:10px 14px;text-align:right;">${fmt(taxableIncome)}</td>
                    </tr>
                    <tr style="background:#fef2f2;border-bottom:1px solid #fecaca;">
                        <td style="padding:10px 14px;font-weight:700;">Income Tax (Slab: ${slab.label})</td>
                        <td style="padding:10px 14px;text-align:right;font-weight:700;color:#dc2626;">${fmt(monthlyTax)}</td>
                        <td style="padding:10px 14px;text-align:right;font-weight:700;color:#dc2626;">${fmt(yearlyTax)}</td>
                    </tr>
                    <tr style="background:#ecfdf5;">
                        <td style="padding:10px 14px;font-weight:800;">Estimated Net Income</td>
                        <td style="padding:10px 14px;text-align:right;font-weight:800;color:#15803d;">${fmt(monthlyNet)}</td>
                        <td style="padding:10px 14px;text-align:right;font-weight:800;color:#15803d;">${fmt(yearlyNet)}</td>
                    </tr>
                </table>
            </div>`;

            document.getElementById('result_table').innerHTML = html;
            document.getElementById('result_section').style.display = 'block';
            document.getElementById('result_section').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            return;
        }

        /* ════════════════════════════════════════════════════════
           RESIDENT MODE
           AdSense USD → 1% FWT (Section 154A) — FINAL tax, no slab on top
           PKR Sponsorships → standard FBR slabs 2025-26
        ════════════════════════════════════════════════════════ */

        var usdRaw = document.getElementById('adsense_input').value.replace(/[^0-9.]/g, '');
        var rateRaw = document.getElementById('exchange_rate').value.replace(/[^0-9.]/g, '') || '280';
        var sponsorRaw = document.getElementById('sponsor_input').value.replace(/[^0-9.]/g, '') || '0';

        if (!usdRaw || parseFloat(usdRaw) <= 0) {
            highlight('adsense_input');
            return;
        }

        var usdMonthly = parseFloat(usdRaw);
        var exchangeRate = parseFloat(rateRaw);
        var localMonthly = parseFloat(sponsorRaw) || 0;

        // AdSense (1% FWT — final, no slab)
        var foreignMonthlyPKR = usdMonthly * exchangeRate;
        var foreignYearlyPKR = foreignMonthlyPKR * 12;
        var foreignMonthlyTax = Math.round(foreignMonthlyPKR * 0.01);
        var foreignYearlyTax = foreignMonthlyTax * 12;

        // Local sponsorships (slab on annual total)
        var localYearly = localMonthly * 12;
        var localSlab = slabTax(localYearly);
        var localYearlyTax = Math.round(localSlab.tax);
        var localMonthlyTax = Math.round(localYearlyTax / 12);

        // Totals
        var totalMonthlyGross = foreignMonthlyPKR + localMonthly;
        var totalYearlyGross = foreignYearlyPKR + localYearly;
        var totalMonthlyTax = foreignMonthlyTax + localMonthlyTax;
        var totalYearlyTax = foreignYearlyTax + localYearlyTax;
        var totalMonthlyNet = totalMonthlyGross - totalMonthlyTax;
        var totalYearlyNet = totalYearlyGross - totalYearlyTax;
        var effectiveRate = totalYearlyGross > 0
            ? ((totalYearlyTax / totalYearlyGross) * 100).toFixed(1)
            : '0.0';

        var html = `
        <div style="margin-bottom:16px;padding:12px 16px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;font-size:13px;color:#166534;">
            ✅ AdSense 1% FWT is your <strong>final</strong> tax — no additional slab applies on this income (Section 154A). Request a <strong>PRC</strong> from your bank.
        </div>
        <div class="table-responsive shadow-sm">
            <table style="width:100%;font-size:14px;border-collapse:collapse;">
                <tr style="background:#16a34a;color:#fff;">
                    <th style="padding:10px 14px;text-align:left;">Income Type</th>
                    <th style="padding:10px 14px;text-align:right;">Monthly</th>
                    <th style="padding:10px 14px;text-align:right;">Yearly</th>
                </tr>

                <tr style="background:#f8fafc;border-bottom:1px solid #e2e8f0;">
                    <td colspan="3" style="padding:8px 14px;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;">AdSense (USD Wire → PKR)</td>
                </tr>
                <tr style="border-bottom:1px solid #f1f5f9;">
                    <td style="padding:10px 14px;color:#64748b;">Gross (USD ${usdMonthly.toLocaleString('en-PK')} × ${exchangeRate})</td>
                    <td style="padding:10px 14px;text-align:right;">${fmt(foreignMonthlyPKR)}</td>
                    <td style="padding:10px 14px;text-align:right;">${fmt(foreignYearlyPKR)}</td>
                </tr>
                <tr style="border-bottom:1px solid #f1f5f9;">
                    <td style="padding:10px 14px;color:#dc2626;">1% FWT (Section 154A — Final)</td>
                    <td style="padding:10px 14px;text-align:right;color:#dc2626;">− ${fmt(foreignMonthlyTax)}</td>
                    <td style="padding:10px 14px;text-align:right;color:#dc2626;">− ${fmt(foreignYearlyTax)}</td>
                </tr>

                ${localMonthly > 0 ? `
                <tr style="background:#f8fafc;border-bottom:1px solid #e2e8f0;">
                    <td colspan="3" style="padding:8px 14px;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.05em;">Local Sponsorships (PKR)</td>
                </tr>
                <tr style="border-bottom:1px solid #f1f5f9;">
                    <td style="padding:10px 14px;color:#64748b;">Gross Sponsorship</td>
                    <td style="padding:10px 14px;text-align:right;">${fmt(localMonthly)}</td>
                    <td style="padding:10px 14px;text-align:right;">${fmt(localYearly)}</td>
                </tr>
                <tr style="border-bottom:1px solid #f1f5f9;">
                    <td style="padding:10px 14px;color:#dc2626;">FBR Slab Tax (${localSlab.label})</td>
                    <td style="padding:10px 14px;text-align:right;color:#dc2626;">− ${fmt(localMonthlyTax)}</td>
                    <td style="padding:10px 14px;text-align:right;color:#dc2626;">− ${fmt(localYearlyTax)}</td>
                </tr>
                ` : ''}

                <tr style="background:#fef2f2;border-bottom:1px solid #fecaca;border-top:2px solid #e2e8f0;">
                    <td style="padding:10px 14px;font-weight:700;">Total Tax <span style="font-size:11px;font-weight:500;color:#64748b;">(Effective: ${effectiveRate}%)</span></td>
                    <td style="padding:10px 14px;text-align:right;font-weight:700;color:#dc2626;">${fmt(totalMonthlyTax)}</td>
                    <td style="padding:10px 14px;text-align:right;font-weight:700;color:#dc2626;">${fmt(totalYearlyTax)}</td>
                </tr>
                <tr style="background:#ecfdf5;">
                    <td style="padding:12px 14px;font-weight:800;font-size:15px;">Net Take-Home</td>
                    <td style="padding:12px 14px;text-align:right;font-weight:800;font-size:15px;color:#15803d;">${fmt(totalMonthlyNet)}</td>
                    <td style="padding:12px 14px;text-align:right;font-weight:800;font-size:15px;color:#15803d;">${fmt(totalYearlyNet)}</td>
                </tr>
            </table>
        </div>`;

        document.getElementById('result_table').innerHTML = html;
        document.getElementById('result_section').style.display = 'block';
        document.getElementById('result_section').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });

    function highlight(id) {
        var el = document.getElementById(id);
        if (!el) return;
        el.style.borderColor = '#ef4444';
        el.focus();
        setTimeout(function () { el.style.borderColor = ''; }, 1500);
    }
});