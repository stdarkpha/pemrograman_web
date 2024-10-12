<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<div class="my-8 swiper mySwiper">
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

<div class="max-w-screen-lg flex flex-col gap-8 mx-auto my-24">
    <h1 class="text-2xl font-semibold">All News (10)</h1>
    <?php for ($i = 0; $i < 10; $i++): ?>
        <div class="card lg:card-side bg-base-100 shadow-xl">
            <figure class="shrink-0">
                <img class="h-56" src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.webp" alt="Album" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">News Title <?= $i + 1 ?></h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse maiores quod dignissimos modi beatae eos illo reiciendis provident voluptates earum veritatis magni asperiores, quaerat accusamus sit dolorum iure totam quia?</p>
                <div class="card-actions justify-end">
                    <a href="index.php?news=news1" class="btn btn-primary">Detail News</a>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1.75,
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>