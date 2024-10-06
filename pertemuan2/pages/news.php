<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="swiper mySwiper mb-8">
    <div class="swiper-wrapper">
        <?php for ($i = 0; $i < 10; $i++): ?>
            <div class="swiper-slide card aspect-video overflow-hidden">
                <img class="w-full h-full object-cover"
                    src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.webp" alt="Album" />
            </div>
        <?php endfor; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>

<div class="container flex flex-col gap-8 mx-auto">
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <figure>
            <img src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.webp" alt="Album" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">New album is released!</h2>
            <p>Click the button to listen on Spotiwhy app.</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Listen</button>
            </div>
        </div>
    </div>

    <div class="card lg:card-side bg-base-100 shadow-xl">
        <figure>
            <img src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.webp" alt="Album" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">New album is released!</h2>
            <p>Click the button to listen on Spotiwhy app.</p>
            <div class="card-actions justify-end">
                <button class="btn btn-primary">Listen</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>