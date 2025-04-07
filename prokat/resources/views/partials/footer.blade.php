<footer class="bg-light text-center text-lg-start mt-5 border-top shadow-sm">
    <div class="container py-4">
        <div class="row">

            <div class="col mb-4 mb-md-0">
                <h5 class="text-uppercase">О нас</h5>
            </div>

            <div class="col mb-4 mb-md-0">
                <h5 class="text-uppercase">Меню</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ url('/') }}" class="text-dark">Главная</a></li>
                    <li><a href="{{ url('/about') }}" class="text-dark">О нас</a></li>
                    <li><a href="{{ url('/contacts') }}" class="text-dark">Контакты</a></li>
                </ul>
            </div>

            <div class="col mb-4 mb-md-0">
                <h5 class="text-uppercase">Контакты</h5>
                <ul class="list-unstyled">
                    <li><span class="text-dark">Email:</span> info@example.com</li>
                    <li><span class="text-dark">Телефон:</span> +7 999 123-45-67</li>
                </ul>
            </div>

            <div class="col mb-4 mb-md-0">
                <h5 class="text-uppercase">Соцсети</h5>
                <a href="#" class="me-3 text-dark"><i class="bi bi-telegram"></i> Telegram</a><br>
            </div>

        </div>
    </div>

    <div class="text-center py-3 bg-light border-top">
        © {{ now()->year }} Prokat.ru — Все права защищены
    </div>
</footer>
