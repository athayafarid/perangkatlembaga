<footer class="pc-footer custom-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row align-items-center">

            {{-- Kiri: Identitas Sistem --}}
            <div class="col-md-6 my-1">
                <div class="footer-brand">
                    <img src="{{ asset('assets/images/logo.png') }}"
                         alt="Logo"
                         class="footer-logo">
                    <div class="footer-text">
                        <strong>Sistem Perangkat & Lembaga Desa</strong><br>
                        <small>
                            Dikembangkan oleh <b>Muhammad Farid Athaya</b> · Sistem Informasi
                        </small>
                    </div>
                </div>
            </div>

            {{-- Kanan: Copyright --}}
            <div class="col-md-6 my-1 text-md-end text-start">
                <small class="footer-copy">
                    © {{ date('Y') }} Perangkat dan Lembaga Desa.
                </small>
            </div>

        </div>
    </div>
</footer>
