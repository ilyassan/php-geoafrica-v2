<main class="pt-6 pb-12">
    <h1 class="mb-12 font-bold text-center text-3xl">Add Country</h1>
    <div class="flex gap-8 container">
        <div class="w-1/2 max-h-fit rounded-xl overflow-hidden border-4 border-primary">
            <img class="scale-105" src="https://raw.githubusercontent.com/ilyassan/php-geoafrica/f2c47de82a52213e3bf150a55bf2289e39554349/assets/images/world.jpg" alt="Map">
        </div>
        <form class="flex flex-1 flex-col gap-3">
            <div class="flex gap-x-2 flex-col md:flex-row justify-between">
                <div class="relative flex-1">
                    <div class="flex flex-col gap-2">
                        <label class="text-lg" for="continent">Continent:</label>
                        <input id="continent" class="bg-[#eee] rounded-lg py-2 pl-2 pr-8 outline-none" type="text" placeholder="Select a continent">
                    </div>
                    <div id="continents" class="flex hidden overflow-hidden absolute top-[110%] z-10 bg-[#eee] rounded-lg w-full flex-col">
                        <span data-id="1" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Agadir</span>
                        <span data-id="2" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Safi</span>
                        <span data-id="3" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Tangier</span>
                        <span data-id="4" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Fes</span>
                    </div>
                </div>
                <div class="relative flex-1">
                    <div class="flex flex-col gap-2">
                        <label class="text-lg" for="country">Country:</label>
                        <input id="country" class="bg-[#eee] rounded-lg py-2 pl-2 pr-8 outline-none" type="text" placeholder="Search for a country">
                    </div>
                    <div id="countries" class="flex hidden overflow-hidden absolute top-[110%] z-10 bg-[#eee] rounded-lg w-full flex-col">
                        <span data-id="1" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Agadir</span>
                        <span data-id="2" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Safi</span>
                        <span data-id="3" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Tangier</span>
                        <span data-id="4" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Fes</span>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-2 flex-col md:flex-row justify-between">
                <div class="flex-1 flex flex-col gap-2">
                    <label class="text-lg" for="population">Population:</label>
                    <input class="bg-[#eee] outline-none px-3 py-2 rounded-lg" type="number" min="1" step="100000" placeholder="Country Population" name="population" id="population">
                </div>
                <div class="relative flex-1">
                    <div class="flex flex-col gap-2">
                        <label class="text-lg" for="language">Language:</label>
                        <input id="language" class="bg-[#eee] rounded-lg py-2 pl-2 pr-8 outline-none" type="text" placeholder="Select the language">
                    </div>
                    <div id="languages" class="flex hidden overflow-hidden absolute top-[110%] z-10 bg-[#eee] rounded-lg w-full flex-col">
                        <span data-id="1" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Agadir</span>
                        <span data-id="2" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Safi</span>
                        <span data-id="3" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Tangier</span>
                        <span data-id="4" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Fes</span>
                    </div>
                </div>
            </div>
            <div class="relative w-1/2">
                <div class="flex flex-col gap-2">
                    <label class="text-lg" for="language">Cities:</label>
                    <div class="relative">
                        <input id="city" class="w-full bg-[#eee] rounded-lg py-2 pl-2 pr-8 outline-none" type="text" placeholder="Add a city">
                        <i class="absolute cursor-pointer text-primary text-xl right-2 top-1/2 -translate-y-1/2 fa fa-plus"></i>
                    </div>
                </div>
                <div id="cities" class="flex hidden overflow-hidden absolute top-[110%] z-10 bg-[#eee] rounded-lg w-full flex-col">
                    <span data-id="1" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Agadir</span>
                    <span data-id="2" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Safi</span>
                    <span data-id="3" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Tangier</span>
                    <span data-id="4" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Fes</span>
                </div>
            </div>
            <div class="flex gap-2">
                <div class="cursor-pointer flex gap-2 items-center bg-primary text-white px-2 py-1 rounded-lg w-fit">
                    Safi
                    <i class="text-sm fa-solid fa-plus rotate-45"></i>
                </div>
                <div class="cursor-pointer flex gap-2 items-center bg-primary text-white px-2 py-1 rounded-lg w-fit">
                    Agadir
                    <i class="text-sm fa-solid fa-plus rotate-45"></i>
                </div>
                <div class="cursor-pointer flex gap-2 items-center bg-primary text-white px-2 py-1 rounded-lg w-fit">
                    Marrakech
                    <i class="text-sm fa-solid fa-plus rotate-45"></i>
                </div>
            </div>
            <button class="flex mt-6 gap-2.5 items-center w-fit bg-primary px-4 py-1 rounded-lg text-white">Add <i class="fa-solid fa-pen-to-square"></i></button>
        </form>
    </div>
</main>

<script type="text/javascript">
    inputOptions("continent", "continents");
    inputOptions("country", "countries");
    inputOptions("language", "languages");
    inputOptions("city", "cities");

    function inputOptions(inputId, optionsContainerId) {
        const input = document.getElementById(inputId);
        const optionsContainer = document.getElementById(optionsContainerId);
        const citiesOptions = Array.from(optionsContainer.children);
        citiesOptions.forEach(option => {
            option.onmousedown = function() {
                let cityId = option.getAttribute("data-id");
                let city = option.textContent;
                input.value = city;
                input.setAttribute("data-id", cityId);
            }
        });
        input.onblur = closeOptionsContainer;
        input.onfocus = openOptionsContainer;

        function closeOptionsContainer() {
            optionsContainer.classList.add("hidden");
        }

        function openOptionsContainer() {
            optionsContainer.classList.remove("hidden");
        }
    }
</script>