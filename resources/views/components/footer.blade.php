<footer class="footer-easystem pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="text-white mb-3">Easystem SmartTech</h5>
                <p class="small">PT. Easystem Smart Tech menghadirkan solusi digital yang berfokus pada pembuatan website, aplikasi mobile, dan sistem administrasi instansi/desa di Jawa Barat.</p>
            </div>
            <div class="col-md-2">
                <h6 class="text-white mb-3">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li class="mb-2"><a href="{{ route('products.index') }}">Produk</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}">Layanan</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-white mb-3">Kontak</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Tonjong, Majalengka</li>
                    <li class="mb-2"><i class="bi bi-telephone-fill me-2"></i>+62 811 2199 987</li>
                    <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i>info@easystem.co.id</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-white mb-3">Sosial Media</h6>
                <div class="d-flex gap-3 fs-5">
                    <a href="https://www.facebook.com/pteasystem" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/pt_easystem_smart_tech/" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=628112199987" target="_blank" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.youtube.com/@PTeaSYstem" target="_blank" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <p class="text-center small mb-0">&copy; {{ now()->year }} Dimas XII RPL 1. Seluruh hak cipta dilindungi.</p>
    </div>
</footer>
