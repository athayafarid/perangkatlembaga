 <link rel="icon" href="{{ asset('assets/assets-admin/images/favicon.svg') }}" type="image/x-icon">
 <!-- [Google Font] Family -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
     id="main-font-link">
 <!-- [Tabler Icons] https://tablericons.com -->
 <link rel="stylesheet" href="{{ asset('assets-admin/fonts/tabler-icons.min.css') }}">
 <!-- [Feather Icons] https://feathericons.com -->
 <link rel="stylesheet" href="{{ asset('assets/assets-admin/fonts/feather.css') }}">
 <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
 <link rel="stylesheet" href="{{ asset('assets/assets-admin/fonts/fontawesome.css') }}">
 <!-- [Material Icons] https://fonts.google.com/icons -->
 <link rel="stylesheet" href="{{ asset('assets/assets-admin/fonts/material.css') }}">
 <!-- [Template CSS Files] -->
 <link rel="stylesheet" href="{{ asset('assets/assets-admin/css/style.css') }}" id="main-style-link">
 <link rel="stylesheet" href="{{ asset('assets/assets-admin/css/style-preset.css') }}">
 <style>
     body {

         /* ====== PAGE HEADER ====== */
         .page-header h5 {
             font-weight: 700;
             color: #1f2937;
             margin-bottom: 6px;
         }

         .breadcrumb {
             background: transparent;
             padding: 0;
             margin-bottom: 0;
         }

         .breadcrumb-item a {
             color: #6366f1;
             text-decoration: none;
             font-weight: 500;
         }

         .breadcrumb-item.active {
             color: #6b7280;
         }

         /* ====== CARD ====== */
         .card {
             border-radius: 14px;
             overflow: hidden;
         }

         .card-header {
             background: linear-gradient(135deg, #4f46e5, #6366f1);
             border-bottom: none;
         }

         .card-header h4 {
             font-weight: 600;
             font-size: 18px;
         }

         /* ====== BUTTON ====== */
         .btn {
             border-radius: 8px;
             font-weight: 500;
         }

         .btn-sm {
             padding: 6px 12px;
         }

         .btn-warning {
             background-color: #f59e0b;
             border: none;
             color: #fff;
         }

         .btn-warning:hover {
             background-color: #d97706;
         }

         .btn-danger {
             background-color: #ef4444;
             border: none;
         }

         .btn-danger:hover {
             background-color: #dc2626;
         }

         /* ====== SEARCH ====== */
         .input-group .form-control {
             border-radius: 10px 0 0 10px;
         }

         .input-group .btn {
             border-radius: 0 10px 10px 0;
         }

         /* ====== TABLE ====== */
         .table {
             border-radius: 12px;
             overflow: hidden;
         }

         .table thead th {
             background-color: #f1f5f9;
             color: #334155;
             font-weight: 600;
             border-bottom: none;
         }

         .table tbody tr {
             transition: background-color 0.2s ease;
         }

         .table tbody tr:hover {
             background-color: #f8fafc;
         }

         .table td,
         .table th {
             vertical-align: middle;
             padding: 14px;
         }

         /* ====== AKSI BUTTON ====== */
         .table .btn {
             margin: 0 2px;
         }

         /* ====== PAGINATION ====== */
         .pagination {
             gap: 6px;
         }

         .page-link {
             border-radius: 8px !important;
             border: none;
             color: #4f46e5;
         }

         .page-item.active .page-link {
             background-color: #4f46e5;
             color: #fff;
         }

         /* ===============================
   RW CARD – CLEAN & PREMIUM
================================ */

         /* ===============================
   HEADER CARD – REFINED
================================ */

         .rw-page .card-header-blue {
             background: linear-gradient(135deg, #1e293b, #334155);
             padding: 14px 22px;
             /* LEBIH RINGKAS */
             border-radius: 16px 16px 0 0;
             display: flex;
             align-items: center;
         }

         /* TEXT */
         .rw-page .card-header-blue h4 {
             color: rgba(255, 255, 255, 0.9);
             margin: 0;
             font-size: 17px;
             /* tidak terlalu besar */
             font-weight: 600;
             line-height: 1.2;
         }

         .rw-page .card-header-blue small {
             display: block;
             margin-top: 2px;
             font-size: 12.5px;
             color: rgba(255, 255, 255, 0.75);
         }

         /* BUTTON */
         .rw-page .card-header-blue .btn {
             border-radius: 10px;
             padding: 6px 12px;
             font-size: 13px;
             font-weight: 500;
             white-space: nowrap;
         }



         .rw-card-grid {
             align-items: stretch;
         }

         /* CARD */
         .rw-page .rw-card {
             background: #ffffff;
             border-radius: 16px;
             padding: 16px 18px;
             box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
             display: flex;
             flex-direction: column;
             transition: all .25s ease;
         }

         .rw-page .rw-card:hover {
             transform: translateY(-4px);
             box-shadow: 0 14px 36px rgba(0, 0, 0, 0.12);
         }

         /* HEADER */
         .rw-page .rw-card-header {
             display: flex;
             justify-content: space-between;
             align-items: center;
             margin-bottom: 14px;
             padding-bottom: 10px;
             border-bottom: 1px solid #e5e7eb;
         }

         .rw-page .rw-title {
             font-size: 18px;
             font-weight: 700;
             color: #0f172a;
         }

         /* ACTIONS */
         .rw-page .rw-actions {
             display: flex;
             gap: 6px;
         }

         .rw-page .btn-icon {
             width: 32px;
             height: 32px;
             padding: 0;
             border-radius: 8px;
             display: inline-flex;
             align-items: center;
             justify-content: center;
         }

         .rw-page .btn-warning {
             background: #fbbf24;
             border: none;
             color: #1f2937;
         }

         .rw-page .btn-danger {
             background: #ef4444;
             border: none;
             color: #fff;
         }

         /* BODY */
         .rw-page .rw-card-body {
             flex: 1;
             display: flex;
             flex-direction: column;
             gap: 10px;
         }

         .rw-page .rw-row {
             display: flex;
             justify-content: space-between;
             font-size: 14px;
         }

         .rw-page .rw-row .label {
             color: #64748b;
             font-weight: 500;
         }

         .rw-page .rw-row .value {
             color: #0f172a;
             font-weight: 600;
         }

         /* DESCRIPTION */
         .rw-page .rw-desc {
             margin-top: 8px;
             font-size: 14px;
             color: #475569;
             line-height: 1.5;
         }


         /* =====================================
   SIDEBAR – PREMIUM MODERN LOOK
===================================== */

         .pc-sidebar {
             background: linear-gradient(180deg, #0f172a 0%, #020617 100%);
             width: 270px;
             box-shadow: 4px 0 30px rgba(0, 0, 0, 0.35);
             color: #e5e7eb;
         }

         /* LOGO AREA */
         .pc-sidebar .m-header {
             padding: 22px;
             border-bottom: 1px solid rgba(255, 255, 255, 0.08);
         }

         .pc-sidebar .b-brand img {
             filter: brightness(1.2);
         }

         /* MENU CONTENT */
         .pc-sidebar .navbar-content {
             padding: 14px 10px;
         }

         /* CAPTION */
         .pc-sidebar .pc-caption label {
             font-size: 11px;
             letter-spacing: .12em;
             text-transform: uppercase;
             color: #64748b;
             padding: 12px 14px 6px;
         }

         /* MENU ITEM */
         .pc-sidebar .pc-item {
             margin-bottom: 6px;
         }

         /* LINK */
         .pc-sidebar .pc-link {
             display: flex;
             align-items: center;
             gap: 14px;
             padding: 12px 16px;
             border-radius: 14px;
             color: #cbd5f5;
             font-weight: 500;
             position: relative;
             transition: all .25s ease;
         }

         /* ICON */
         .pc-sidebar .pc-micon {
             font-size: 18px;
             color: #94a3b8;
             transition: all .25s ease;
         }

         /* HOVER */
         .pc-sidebar .pc-link:hover {
             background: rgba(99, 102, 241, 0.12);
             color: #ffffff;
         }

         .pc-sidebar .pc-link:hover .pc-micon {
             color: #818cf8;
             transform: scale(1.1);
         }

         /* ACTIVE */
         .pc-sidebar .pc-item.active>.pc-link {
             background: linear-gradient(135deg, #6366f1, #4f46e5);
             color: #ffffff;
             box-shadow: 0 10px 24px rgba(99, 102, 241, 0.45);
         }

         .pc-sidebar .pc-item.active>.pc-link .pc-micon {
             color: #ffffff;
         }

         /* ACTIVE GLOW */
         .pc-sidebar .pc-item.active>.pc-link::after {
             content: '';
             position: absolute;
             right: -6px;
             top: 50%;
             transform: translateY(-50%);
             width: 6px;
             height: 70%;
             background: #6366f1;
             border-radius: 4px;
         }

         /* LOGOUT SECTION */
         .pc-sidebar .p-3 {
             margin-top: auto;
             padding: 18px !important;
             border-top: 1px solid rgba(255, 255, 255, 0.08);
         }

         /* LOGOUT BUTTON */
         .pc-sidebar .btn-danger {
             background: linear-gradient(135deg, #ef4444, #dc2626);
             border: none;
             border-radius: 14px;
             font-weight: 600;
             letter-spacing: .3px;
         }

         .pc-sidebar .btn-danger:hover {
             box-shadow: 0 10px 24px rgba(239, 68, 68, 0.5);
         }

         /* =====================================
   SIDEBAR ACTIVE TEXT – READABILITY FIX
===================================== */

         /* ACTIVE LINK TEXT */
         .pc-sidebar .pc-item.active>.pc-link {
             color: #ffffff !important;
             /* PUTIH JELAS */
         }

         /* ACTIVE TEXT */
         .pc-sidebar .pc-item.active>.pc-link .pc-mtext {
             color: #ffffff !important;
             font-weight: 600;
             /* LEBIH TEGAS */
             letter-spacing: 0.2px;
         }

         /* ACTIVE ICON */
         .pc-sidebar .pc-item.active>.pc-link .pc-micon {
             color: #ffffff !important;
             opacity: 1;
         }

         /* OPTIONAL: HALO TEKS BIAR LEBIH KONTRAS */
         .pc-sidebar .pc-item.active>.pc-link {
             text-shadow: 0 1px 6px rgba(0, 0, 0, 0.35);
         }


         /* =====================================
   GLOBAL THEME SYNC – PROFESSIONAL
===================================== */

         /* BACKGROUND */
         body {
             background-color: #f8fafc;
         }

         /* MAIN CONTENT */
         .pc-container,
         .pc-content {
             background-color: #f8fafc;
         }

         /* PAGE TITLE & BREADCRUMB */
         .page-header h5 {
             color: #0f172a;
             font-weight: 700;
         }

         .breadcrumb-item a {
             color: #6366f1;
         }

         /* CARD */
         .card {
             border-radius: 16px;
             border: 1px solid #e5e7eb;
             box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
         }

         /* CARD TITLE */
         .card h4,
         .card h5 {
             color: #0f172a;
         }

         /* STAT CARDS (TOP DASHBOARD) */
         .card .text-primary {
             color: #6366f1 !important;
         }

         .card .badge {
             border-radius: 8px;
             font-weight: 500;
         }

         /* PRIMARY BUTTON */
         .btn-primary {
             background-color: #6366f1;
             border-color: #6366f1;
         }

         .btn-primary:hover {
             background-color: #4f46e5;
             border-color: #4f46e5;
         }

         /* SEARCH INPUT */
         .form-control {
             border-radius: 10px;
             border: 1px solid #e5e7eb;
         }

         .form-control:focus {
             border-color: #6366f1;
             box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
         }

         /* CHART LEGEND / TEXT */
         .chartjs-render-monitor {
             color: #0f172a;
         }

         /* TABLE */
         .table thead th {
             background-color: #f1f5f9;
             color: #475569;
             border-bottom: none;
         }

         .table tbody tr {
             background-color: #ffffff;
         }

         .table tbody tr:hover {
             background-color: #f8fafc;
         }

         /* PAGINATION */
         .page-link {
             color: #6366f1;
             border-radius: 10px;
         }

         .page-item.active .page-link {
             background-color: #6366f1;
             border-color: #6366f1;
         }


         /* ===============================
   PREMIUM FORM – JABATAN
================================ */

         .form-card {
             border: none;
             border-radius: 20px;
             background: #ffffff;
             box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
             overflow: hidden;
         }

         /* HEADER */
         .form-card-header {
             background: linear-gradient(135deg, #6366f1, #4f46e5);
             padding: 22px 28px;
             color: #ffffff;
         }

         .form-card-header h4 {
             margin: 0;
             font-weight: 700;
         }

         .form-card-header small {
             opacity: .9;
         }

         /* BODY */
         .form-card-body {
             padding: 28px;
         }

         /* LABEL */
         .form-label {
             font-size: 13px;
             font-weight: 600;
             color: #475569;
             margin-bottom: 6px;
         }

         /* INPUT */
         /* INPUT DEFAULT */
         .form-control,
         .form-select {
             border: 1.5px solid #cbd5e1;
             /* lebih tegas */
             border-radius: 12px;
             padding: 10px 14px;
             font-size: 14px;
             background-color: #ffffff;
         }

         .form-control:focus,
         .form-select:focus {
             border-color: #6366f1;
             box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
         }

         /* FOOTER */
         .form-card-footer {
             padding: 20px 28px;
             background: #f8fafc;
             display: flex;
             justify-content: flex-end;
             gap: 10px;
         }

         /* BUTTON */
         .btn-primary {
             background: linear-gradient(135deg, #6366f1, #4f46e5);
             border: none;
             border-radius: 12px;
             padding: 10px 22px;
             font-weight: 600;
         }

         .btn-primary:hover {
             box-shadow: 0 12px 24px rgba(99, 102, 241, 0.35);
         }

         .btn-light {
             border-radius: 12px;
         }

         /* sidebar background */
         .pc-sidebar.sidebar {
             background: #0f172a;
         }

         /* menu text & icon */
         .pc-sidebar.sidebar .pc-micon i,
         .pc-sidebar.sidebar .pc-mtext {
             color: #cbd5e1;
         }

         /* hover */
         .pc-sidebar.sidebar .pc-link:hover {
             background: rgba(255, 255, 255, 0.08);
             border-radius: 10px;
         }

         /* active */
         .pc-sidebar.sidebar .pc-item.active>.pc-link {
             background: linear-gradient(135deg, #6366f1, #8b5cf6);
             color: #fff;
             border-radius: 10px;
             box-shadow: 0 6px 15px rgba(99, 102, 241, .35);
         }

         .wa-float {
             position: fixed;
             bottom: 25px;
             right: 25px;
             width: 56px;
             height: 56px;
             z-index: 99999;

             background: #25D366;
             border-radius: 50%;

             display: flex;
             align-items: center;
             justify-content: center;

             box-shadow: 0 6px 20px rgba(0, 0, 0, .3);
         }

         .wa-float img {
             width: 32px;
             height: 32px;
             display: block;
             object-fit: contain;
         }

         /* ===== SIDEBAR HEADER ===== */
         .sidebar-header {
             padding: 20px 12px 16px;
             border-bottom: 1px solid rgba(255, 255, 255, 0.08);
             margin-bottom: 12px;
         }

         .brand-logo {
             display: flex;
             flex-direction: column;
             align-items: center;
             text-decoration: none;
         }

         /* LOGO */
         .brand-logo img {
             max-width: 72px;
             /* KUNCI: jangan besar */
             height: auto;
             object-fit: contain;
             margin-bottom: 8px;
         }

         /* TEKS DI BAWAH LOGO */
         .brand-text {
             font-size: 13px;
             font-weight: 600;
             letter-spacing: 1px;
             color: #aab4ff;
             text-align: center;
         }

         .pc-navbar {
             padding-top: 8px;
         }

         .pc-sidebar.collapsed .brand-text {
             display: none;
         }

         .pc-sidebar.collapsed .brand-logo img {
             max-width: 36px;
         }

         /* Dashboard Enhancement */
         .dashboard-title {
             font-weight: 700;
             letter-spacing: 0.3px;
         }

         .stat-card {
             border-radius: 16px;
             transition: all .3s ease;
         }

         .stat-card:hover {
             transform: translateY(-4px);
             box-shadow: 0 12px 30px rgba(0, 0, 0, .08);
         }

         .stat-icon {
             width: 56px;
             height: 56px;
             border-radius: 14px;
             display: flex;
             align-items: center;
             justify-content: center;
             font-size: 26px;
         }

         .progress-thin {
             height: 6px;
             border-radius: 6px;
         }

         /* ===============================
   DEVELOPER PAGE (DARK SOFT)
================================ */
         .developer-page {
             background: radial-gradient(circle at top right,
                     #1e3a5f,
                     #0b1d33 70%);
             min-height: 100vh;
             padding: 40px 0;
         }

         /* Header */
         .developer-page .page-header h4 {
             color: #ffffff;
         }

         .developer-page .page-header p {
             color: #9fb7d8;
         }

         /* ===============================
   DEVELOPER CARD
================================ */
         .developer-card {
             background: linear-gradient(180deg, #102540, #0c1b30);
             border-radius: 18px;
             box-shadow: 0 20px 50px rgba(0, 0, 0, .45);
             color: #eaf1ff;
             position: relative;
             z-index: 1;
             animation: fadeUp .7s ease;
         }

         /* Accent line */
         .developer-card::before {
             content: "";
             position: absolute;
             top: 0;
             left: 0;
             height: 4px;
             width: 100%;
             background: linear-gradient(90deg,
                     #0d6efd,
                     #20c997,
                     #ffc107);
         }

         /* Typography */
         .developer-card h4 {
             color: #ffffff;
         }

         .developer-card p {
             color: #c6d4ec;
         }

         /* ===============================
   BADGES
================================ */
         .developer-card .badge.bg-primary {
             background: linear-gradient(90deg, #0d6efd, #4dabf7);
         }

         .developer-card .badge.bg-dark {
             background: #1c2e45;
         }

         .developer-card .badge.bg-secondary {
             background: #334e68;
         }

         .developer-card .badge.bg-info {
             background: #20c997;
             color: #000;
         }

         /* ===============================
   PHOTO
================================ */
         .developer-photo {
             width: 130px;
             height: 130px;
             object-fit: cover;
             border-radius: 50%;
             border: 4px solid rgba(255, 255, 255, .15);
             box-shadow: 0 10px 25px rgba(0, 0, 0, .4);
         }

         /* ===============================
   SOCIAL ICONS (IMAGE)
================================ */
         .social-links-img {
             display: flex;
             justify-content: center;
             gap: 18px;
             margin-top: 22px;
         }

         .social-links-img a {
             width: 52px;
             height: 52px;
             border-radius: 50%;
             background: #ffffff;
             display: flex;
             align-items: center;
             justify-content: center;
             box-shadow: 0 8px 18px rgba(0, 0, 0, .35);
             transition: all .35s ease;
             position: relative;
         }

         .social-links-img img {
             width: 26px;
             height: 26px;
             object-fit: contain;
         }

         .social-links-img a:hover {
             transform: translateY(-6px) scale(1.1);
             box-shadow: 0 16px 30px rgba(0, 0, 0, .5);
         }

         /* Tooltip */
         .social-links-img a::after {
             content: attr(data-title);
             position: absolute;
             bottom: -32px;
             background: #0f172a;
             color: #fff;
             font-size: 11px;
             padding: 4px 10px;
             border-radius: 6px;
             opacity: 0;
             transition: .25s;
             white-space: nowrap;
         }

         .social-links-img a:hover::after {
             opacity: 1;
         }

         /* ===============================
   TIMELINE
================================ */
         .timeline {
             list-style: none;
             padding-left: 0;
             border-left: 3px solid #4dabf7;
         }

         .timeline li {
             padding-left: 15px;
             margin-bottom: 12px;
             position: relative;
         }

         .timeline li span {
             font-weight: 600;
             color: #4dabf7;
         }

         .timeline li::before {
             content: "";
             position: absolute;
             left: -9px;
             top: 6px;
             width: 12px;
             height: 12px;
             background: #20c997;
             border-radius: 50%;
         }

         /* ===============================
   ANIMATION
================================ */
         @keyframes fadeUp {
             from {
                 opacity: 0;
                 transform: translateY(20px);
             }

             to {
                 opacity: 1;
                 transform: translateY(0);
             }
         }

         .text-soft {
             color: #b9c7e3;
         }

         .hero-profile .role-text {
             color: #8fb3ff;
             font-size: 0.95rem;
         }

         .badge-glow {
             background: linear-gradient(90deg, #0d6efd, #20c997);
             padding: 6px 14px;
             border-radius: 20px;
         }

         .stats-row .stat-box {
             padding: 16px;
             border-radius: 14px;
             background: rgba(255, 255, 255, .05);
         }

         .stat-box h3 {
             margin: 0;
             font-weight: bold;
         }

         .stat-box p {
             font-size: .8rem;
             color: #b9c7e3;
         }

         .stat-box.blue h3 {
             color: #4dabf7;
         }

         .stat-box.green h3 {
             color: #20c997;
         }

         .stat-box.orange h3 {
             color: #ffc107;
         }

         .chip {
             padding: 4px 10px;
             border-radius: 12px;
             font-size: .75rem;
         }

         .chip.dark {
             background: #1c2e45;
         }

         .chip.gray {
             background: #334e68;
         }

         .chip.green {
             background: #20c997;
             color: #000;
         }


         /* ===============================
   CUSTOM FOOTER
================================ */
         .custom-footer {
             background: linear-gradient(90deg, #0b1d33, #102a43);
             border-top: 1px solid rgba(255, 255, 255, .08);
             padding: 18px 0;
         }

         .footer-brand {
             display: flex;
             align-items: center;
             gap: 14px;
         }

         .footer-logo {
             width: 36px;
             height: 36px;
             object-fit: contain;
             opacity: .9;
         }

         .footer-text strong {
             color: #ffffff;
             font-weight: 600;
         }

         .footer-text small {
             color: #9fb7d8;
             font-size: 12px;
         }

         .footer-copy {
             color: #9fb7d8;
             font-size: 12px;
         }

         /* ===============================
   SIDEBAR SCROLL FIX (MANTIS)
================================ */

         /* sidebar full layar */
         .pc-sidebar {
             height: 100vh;
             overflow: hidden;
         }

         .pc-sidebar .navbar-wrapper {
             height: 100%;
             display: flex;
             flex-direction: column;
             overflow: hidden;
         }

         .pc-sidebar .navbar-content {
             flex: 1;
             overflow-y: auto;
             overflow-x: hidden;
             padding-bottom: 40px;
         }

         /* AREA YANG DI-SCROLL */
         .pc-sidebar .navbar-content {
             height: calc(100vh - 120px);
             /* dikurangi tinggi logo */
             overflow-y: auto;
             overflow-x: hidden;
             padding-bottom: 80px;
             /* biar item terakhir gak ketutup */
         }

         /* scrollbar halus */
         .pc-sidebar .navbar-content::-webkit-scrollbar {
             width: 6px;
         }

         .pc-sidebar .navbar-content::-webkit-scrollbar-thumb {
             background: rgba(255, 255, 255, 0.3);
             border-radius: 10px;
         }

         .pc-sidebar .navbar-content::-webkit-scrollbar-thumb:hover {
             background: rgba(255, 255, 255, 0.5);
         }

         /* =====================================
   SIDEBAR SCROLL – FINAL FIX
===================================== */

         /* sidebar full layar */
         .pc-sidebar {
             height: 100vh;
             overflow: hidden;
         }

         /* wrapper sidebar */
         .pc-sidebar .navbar-wrapper {
             height: 100%;
             display: flex;
             flex-direction: column;
             overflow: hidden;
         }

         /* HEADER (logo) – TIDAK IKUT SCROLL */
         .pc-sidebar-header {
             flex-shrink: 0;
         }

         /* AREA MENU – INI YANG DI-SCROLL */
         .pc-sidebar .navbar-content {
             flex: 1;
             overflow-y: auto;
             overflow-x: hidden;
             padding-bottom: 40px;
         }

         /* SCROLLBAR HALUS */
         .pc-sidebar .navbar-content::-webkit-scrollbar {
             width: 6px;
         }

         .pc-sidebar .navbar-content::-webkit-scrollbar-track {
             background: transparent;
         }

         .pc-sidebar .navbar-content::-webkit-scrollbar-thumb {
             background: rgba(255, 255, 255, 0.35);
             border-radius: 10px;
         }

         .pc-sidebar .navbar-content::-webkit-scrollbar-thumb:hover {
             background: rgba(255, 255, 255, 0.55);
         }

         /* ===============================
   SIDEBAR LOGO SIZE FIX
================================ */
         .pc-sidebar-header {
             padding: 18px 12px 14px;
         }

         .sidebar-logo {
             max-width: 110px;
             /* 🔑 KUNCI UTAMA */
             width: 100%;
             height: auto;
             object-fit: contain;
             margin-bottom: 6px;
         }

         /* teks di bawah logo */
         .pc-sidebar-header h6 {
             font-size: 12px;
             letter-spacing: 1px;
             opacity: .9;
         }

         .pc-sidebar.collapsed .sidebar-logo {
             max-width: 42px;
         }

         .pc-sidebar.collapsed .pc-sidebar-header h6 {
             display: none;
         }

         .rw-card {
             background: #fff;
             border-radius: 16px;
             box-shadow: 0 6px 18px rgba(13, 60, 97, .12);
             padding: 16px;
         }

         .rw-card-header {
             display: flex;
             justify-content: space-between;
             align-items: start;
             margin-bottom: 10px;
         }

         .rw-title {
             font-weight: 600;
             font-size: 14px;
         }

         .rw-desc {
             font-size: 13px;
             color: #6c757d;
             line-height: 1.5;
         }

         .btn-icon {
             padding: 6px 8px;
             border-radius: 8px;
         }

         .card-form {
             border: none;
             border-radius: 16px;
             box-shadow: 0 6px 18px rgba(13, 60, 97, 0.12);
             overflow: hidden;
         }

         .card-header-green {
             background: linear-gradient(90deg, #198754 0%, #28b76b 100%);
             padding: 20px 24px;
             color: #fff;
             border: none;
         }

         .btn-green-custom {
             background: #198754;
             border-radius: 10px;
             padding: 8px 18px;
             border: none;
         }

         .form-control {
             border: 1.5px solid #d0d7e2;
             border-radius: 10px;
         }

         .form-control:focus {
             border-color: #198754;
             box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, .25);
         }
 </style>
