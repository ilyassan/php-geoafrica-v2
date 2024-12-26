<main class="pt-6 pb-12">
        <h1 class="mb-12 font-bold text-center text-3xl">Country Details</h1>
        <div class="container">
            <div class="flex items-center gap-12">
                <div class="max-w-[28rem] overflow-hidden rounded-xl">
                    <img src="https://ilyassan.github.io/VisitMorocco/dev/assets/images/homepage/img_explore/safi.jpg" alt="Morocco">
                </div>
        
                <div class="flex flex-1 justify-between">
                    <form class="flex flex-col gap-3">
                        <div class="flex flex-col gap-1.5">
                            <label class="text-xl" for="country">Country:</label>
                            <input disabled class="text-xl bg-[#eee] outline-none px-3 py-1 rounded-lg" type="text" value="Morocco" name="country" id="country">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="text-xl" for="population">Population:</label>
                            <input class="text-xl bg-[#eee] outline-none px-3 py-1 rounded-lg" type="text" value="3798000" name="population" id="population">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label class="text-xl" for="population">Language:</label>
                            <input class="text-xl bg-[#eee] outline-none px-3 py-1 rounded-lg" type="text" value="Arabic" name="language" id="language">
                        </div>
                    </form>
        
                    <div class="flex flex-1 items-start justify-end gap-4">
                        <span class="bg-primary px-2 py-1 rounded-lg text-white">Save <i class="fa-solid fa-pen-to-square"></i></span>
                        <span class="bg-primary px-2 py-1 rounded-lg text-white">Delete <i class="fa-solid fa-delete-left"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-primary h-[1px] mt-10 mb-4"></div>
        <div class="container">
            <h1 class="text-center font-bold text-3xl mb-8">Cities</h1>
            <div class="flex gap-14 mb-10">
                <div class="relative">
                    <div class="relative">
                        <input id="city" class="bg-[#eee] rounded-lg py-1 pl-2 pr-8 outline-none" type="text" placeholder="Add a city">
                        <i class="absolute cursor-pointer text-primary text-xl right-1 top-1/2 -translate-y-1/2 fa fa-plus"></i>
                    </div>
                    <div id="cities" class="flex hidden overflow-hidden absolute top-[110%] z-10 bg-[#eee] rounded-lg w-full flex-col">
                        <span data-id="1" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Agadir</span>
                        <span data-id="2" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Safi</span>
                        <span data-id="3" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Tangier</span>
                        <span data-id="4" class="cursor-pointer hover:bg-slate-200 px-2 py-1 border-b border-b-black">Fes</span>
                    </div>
                </div>
                <div class="flex gap-10">
                    <div class="flex items-center gap-3 relative text-white bg-primary px-2">
                        <i class="cursor-pointer text-sm rotate-180 fa-solid fa-delete-left"></i>
                        Agadir
                        <span class="absolute w-0 h-0 -right-[16px] border-y-[16px] border-y-transparent border-l-[16px] border-l-primary"></span>
                    </div>
                    <div class="flex items-center gap-3 relative text-white bg-primary px-2">
                        <i class="cursor-pointer text-sm rotate-180 fa-solid fa-delete-left"></i>
                        Marrakech
                        <span class="absolute w-0 h-0 -right-[16px] border-y-[16px] border-y-transparent border-l-[16px] border-l-primary"></span>
                    </div>
                    <div class="flex items-center gap-3 relative text-white bg-primary px-2">
                        <i class="cursor-pointer text-sm rotate-180 fa-solid fa-delete-left"></i>
                        Safi
                        <span class="absolute w-0 h-0 -right-[16px] border-y-[16px] border-y-transparent border-l-[16px] border-l-primary"></span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-2">
                <div class="card cursor-pointer relative rounded-lg overflow-hidden">
                    <img src="https://ilyassan.github.io/VisitMorocco/dev/assets/images/homepage/img_explore/safi.jpg" alt="morocco">
                    <div class="flex items-center justify-center absolute top-0 right-0 w-full h-full bg-primary bg-opacity-45">
                        <span class="text-2xl font-bold text-white">Agadir</span>
                    </div>
                    <div class="absolute left-1 top-1 text-xs text-white font-bold bg-primary px-2 py-1 rounded-xl">Capital</div>
                </div>
                <div class="card cursor-pointer relative rounded-lg overflow-hidden">
                    <img src="https://ilyassan.github.io/VisitMorocco/dev/assets/images/homepage/img_explore/safi.jpg" alt="morocco">
                    <div class="flex items-center justify-center absolute top-0 right-0 w-full h-full bg-primary bg-opacity-45">
                        <span class="text-2xl font-bold text-white">Agadir</span>
                    </div>
                </div>
                <div class="card cursor-pointer relative rounded-lg overflow-hidden">
                    <img src="https://ilyassan.github.io/VisitMorocco/dev/assets/images/homepage/img_explore/safi.jpg" alt="morocco">
                    <div class="flex items-center justify-center absolute top-0 right-0 w-full h-full bg-primary bg-opacity-45">
                        <span class="text-2xl font-bold text-white">Agadir</span>
                    </div>
                </div>
                <div class="card cursor-pointer relative rounded-lg overflow-hidden">
                    <img src="https://ilyassan.github.io/VisitMorocco/dev/assets/images/homepage/img_explore/safi.jpg" alt="morocco">
                    <div class="flex items-center justify-center absolute top-0 right-0 w-full h-full bg-primary bg-opacity-45">
                        <span class="text-2xl font-bold text-white">Agadir</span>
                    </div>
                </div>
            </div>
        </div>
    </main>