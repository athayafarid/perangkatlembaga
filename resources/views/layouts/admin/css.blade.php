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
         .form-control,
         .form-select {
             border-radius: 12px;
             border: 1px solid #e5e7eb;
             padding: 10px 14px;
             font-size: 14px;
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
    background: rgba(255,255,255,0.08);
    border-radius: 10px;
}

/* active */
.pc-sidebar.sidebar .pc-item.active > .pc-link {
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    color: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 15px rgba(99,102,241,.35);
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

    box-shadow: 0 6px 20px rgba(0,0,0,.3);
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
    border-bottom: 1px solid rgba(255,255,255,0.08);
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
    max-width: 72px;        /* KUNCI: jangan besar */
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






 </style>
