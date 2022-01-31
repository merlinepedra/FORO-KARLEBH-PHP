{{-- Desktop --}}
<section id="cards" class="cards grid-cols-2 hidden lg:grid">
    <div style='display: grid;place-items: center;' class="card-1 w-full h-grid bg-white">
        <div class="px-40">
            <h1 class="font-extrabold font-serif text-5xl mb-8">Transform your brand</h1>
            <p class="mb-8 text-gray-500 font-semibold">
                We are a full-service creative agency specializing in helping brands grow fast. Engage your clients through compeling visuals that do most of the marketing for you.
                <br>
            </p>
            <a href="#" 
            class="uppercase font-extrabold font-serif border-b-2 border-yellow-200 pb-1"
            >Learn More</a>
        </div>
    </div>

    <div class="card-2 w-full h-grid bg-green-400">
        <img class="w-full h-full" src="{{ asset('design/images/desktop/image-transform.jpg') }}">
    </div>

    <div class="card-3 w-full h-grid">
        <img class="w-full h-full" src="{{ asset('design/images/desktop/image-stand-out.jpg') }}">
    </div>

    <div style='display: grid;place-items: center;' class="card-4 w-full h-grid">
        <div class="px-40">
            <h1 class="font-extrabold font-serif text-5xl mb-8">Stand out to the right audience</h1>
            <p class="mb-8 text-gray-500 font-semibold">
                Using a collaborative efforts of designers, researchers, photographers, videographers and copyrighters, we will build and expand your brand in digital places.
                <br>
            </p>
            <a href="#" class="uppercase font-extrabold font-serif border-b-2 pb-1" style="border-color: hsl(7, 99%, 70%);">Learn More</a>
        </div>
    </div>

    <div class="card-5 w-full h-grid relative">
        <img class="w-full h-full" src="{{ asset('design/images/desktop/image-graphic-design.jpg') }}">
        <div style="color: hsl(198, 62%, 26%);" class="absolute top-brand text-center">
            <h1 class="mb-10 font-bold text-3xl font-serif">Graphic Design</h1>
            <p class="font-semibold text-center px-24">Great design make you memorable. We will deliver artwork that underscores your brand message and captures potential client's attention.
            </p>
        </div>
    </div>

    <div style="color: hsl(198, 62%, 26%);" class="card-6 w-full h-grid relative">
        <img class="w-full h-full" src="{{ asset('design/images/desktop/image-photography.jpg') }}">
        <div class="absolute top-brand text-center">
            <h1 class="mb-10 font-bold text-3xl font-serif">Photography</h1>
            <p class="font-semibold text-center px-32">Increase your credibility by getting the most stunning, high quality photos and improve your business image.</p>
        </div>
    </div>
</section>

{{-- Mobile --}}

<section class="cards lg:hidden grid grid-cols-1">
    <img class="card-1 w-full h-72 object-cover object-center" src="{{ asset('design/images/mobile/image-transform.jpg') }}">

    <div style='display: grid;place-items: center;' class="card-2 w-full bg-white">
        <div class="px-8 py-16 text-center">
            <h1 class="font-extrabold font-serif text-3xl mb-8 ">Transform your brand</h1>
            <p class="mb-8 text-gray-500 font-semibold ">
                We are a full-service creative agency specializing in helping brands grow fast. Engage your clients through compeling visuals that do most of the marketing for you.
                <br>
            </p>
            <a href="#" 
            class="uppercase font-extrabold font-serif border-b-2 border-yellow-200 pb-1"
            >Learn More</a>
        </div>
    </div>

    <img class="card-3 w-full h-72 object-cover object-center" src="{{ asset('design/images/mobile/image-stand-out.jpg') }}">

    <div style='display: grid;place-items: center;' class="w-full bg-white">
        <div class="card-4 px-8 py-16 text-center">
            <h1 class="font-extrabold font-serif text-3xl mb-8">Stand out to the right audience</h1>
            <p class="mb-8 text-gray-500 font-semibold">
                Using a collaborative efforts of designers, researchers, photographers, videographers and copyrighters, we will build and expand your brand in digital places.
                <br>
            </p>
            <a href="#" class="uppercase font-extrabold font-serif border-b-2 pb-1" style="border-color: hsl(7, 99%, 70%);">Learn More</a>
        </div>
    </div>

    <div class="card-5 w-full h-grid relative">
        <img class="w-full h-full" src="{{ asset('design/images/mobile/image-graphic-design.jpg') }}">
        <div style="color: hsl(198, 62%, 26%);" class="absolute top-brand-mobile text-center">
            <h1 class="mb-10 font-bold text-3xl font-serif">Graphic Design</h1>
            <p class="font-semibold text-center px-2">Great design make you memorable. We will deliver artwork that underscores your brand message and captures potential client's attention.
            </p>
        </div>
    </div>

    <div style="color: hsl(198, 62%, 26%);" class="card-6 w-full h-grid relative">
        <img class="w-full h-full" src="{{ asset('design/images/mobile/image-photography.jpg') }}">
        <div class="absolute top-brand-mobile text-center">
            <h1 class="mb-10 font-bold text-3xl font-serif">Photography</h1>
            <p class="font-semibold text-center px-2">Increase your credibility by getting the most stunning, high quality photos and improve your business image.</p>
        </div>
    </div>
</section>