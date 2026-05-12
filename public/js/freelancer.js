/**
 * Freelancer Tax Calculator — PakTools
 * Section 154A | Finance Act 2025
 */

document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('calculate_btn').addEventListener('click', function () {

        // ── Get inputs ──────────────────────────────────────────────
        var rawVal  = document.getElementById('revenue_input').value.replace(/[^0-9.]/g, '');
        var type    = document.getElementById('revenue_type').value;
        var isPseb  = document.getElementById('pseb_status').value === 'yes';

        if (!rawVal || isNaN(parseFloat(rawVal))) {
            var inp = document.getElementById('revenue_input');
            inp.style.borderColor = '#ef4444';
            inp.focus();
            setTimeout(function(){ inp.style.borderColor = ''; }, 1500);
            return;
        }

        var amount    = parseFloat(rawVal);
        var taxRate   = isPseb ? 0.0025 : 0.01;

        var monthlyRev = type === 'monthly' ? amount : Math.round(amount / 12);
        var yearlyRev  = type === 'monthly' ? amount * 12 : amount;

        var monthlyTax = Math.round(monthlyRev * taxRate);
        var yearlyTax  = Math.round(yearlyRev  * taxRate);
        var monthlyNet = Math.round(monthlyRev - monthlyTax);
        var yearlyNet  = Math.round(yearlyRev  - yearlyTax);
        var saving     = Math.round(yearlyRev * 0.01 - yearlyTax);

        function fmt(n) {
            return 'Rs ' + n.toLocaleString('en-PK');
        }

        // ── Build table HTML ────────────────────────────────────────
        var html = '<div class="table-responsive shadow-sm"><table style="width:100%;border-collapse:collapse;font-size:14px;">'
            + '<thead>'
            +   '<tr style="background:#16a34a;color:#fff;">'
            +     '<th style="padding:12px 16px;text-align:left;font-weight:700;text-transform:uppercase;font-size:12px;">Breakdown</th>'
            +     '<th style="padding:12px 16px;text-align:right;font-weight:700;text-transform:uppercase;font-size:12px;">Monthly</th>'
            +     '<th style="padding:12px 16px;text-align:right;font-weight:700;text-transform:uppercase;font-size:12px;">Yearly</th>'
            +   '</tr>'
            + '</thead>'
            + '<tbody>'

            // Row 1 — Gross
            +   '<tr style="background:#f8fafc;border-bottom:1px solid #e2e8f0;">'
            +     '<td style="padding:14px 16px;font-weight:700;color:#475569;">&#9679; Gross Remittance</td>'
            +     '<td style="padding:14px 16px;text-align:right;font-weight:800;color:#0f172a;">' + fmt(monthlyRev) + '</td>'
            +     '<td style="padding:14px 16px;text-align:right;font-weight:700;color:#64748b;">' + fmt(yearlyRev)  + '</td>'
            +   '</tr>'

            // Row 2 — Tax
            +   '<tr style="background:#fff5f5;border-bottom:1px solid #fee2e2;">'
            +     '<td style="padding:14px 16px;font-weight:700;color:#dc2626;">&#9679; FWT Tax Deducted</td>'
            +     '<td style="padding:14px 16px;text-align:right;font-weight:800;color:#dc2626;">&minus; ' + fmt(monthlyTax) + '</td>'
            +     '<td style="padding:14px 16px;text-align:right;font-weight:700;color:#f87171;">&minus; ' + fmt(yearlyTax)  + '</td>'
            +   '</tr>'

            // Row 3 — Net
            +   '<tr style="background:#f0fdf4;">'
            +     '<td style="padding:14px 16px;font-weight:700;color:#15803d;">&#9679; Net Profit (Take-Home)</td>'
            +     '<td style="padding:14px 16px;text-align:right;font-weight:800;color:#16a34a;font-size:16px;">' + fmt(monthlyNet) + '</td>'
            +     '<td style="padding:14px 16px;text-align:right;font-weight:700;color:#4ade80;">' + fmt(yearlyNet)  + '</td>'
            +   '</tr>'

            + '</tbody>'
            + '<tfoot>'
            +   '<tr style="background:#eff6ff;border-top:2px solid #bfdbfe;">'
            +     '<td colspan="3" style="padding:10px 16px;font-size:12px;color:#475569;">'
            +       '<strong style="color:#1d4ed8;">&#128203; Rate: ' + (isPseb ? '0.25%' : '1.00%') + ' Final Withholding Tax</strong>'
            +       ' &nbsp;|&nbsp; '
            +       (isPseb
                        ? '<span style="color:#15803d;font-weight:700;">&#128176; PSEB Saving vs unregistered: ' + fmt(saving) + '/year</span>'
                        : '<span style="color:#ea580c;font-weight:700;">&#128161; Register PSEB to save ' + fmt(saving) + '/year</span>')
            +     '</td>'
            +   '</tr>'
            + '</tfoot>'
            + '</table>';

        // ── Inject & show ───────────────────────────────────────────
        var container = document.getElementById('result_table');
        if (container) {
            container.innerHTML = html;
        }

        var section = document.getElementById('result_section');
        section.style.display = 'block';
        section.classList.remove('hidden');
        section.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });

});
