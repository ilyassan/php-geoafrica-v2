<main class=" flex items-center justify-center bg-primary/50 min-h-screen">
    <div class="max-w-xl w-full bg-white py-10 rounded-lg shadow-lg">
        <h1 class="font-bold text-2xl lg:text-3xl text-center mb-16 text-neutral-600">Login To <span class="text-primary font-extrabold">GeoAfrica</span></h1>
        <form action=<?= URLROOT . "login" ?> method="POST" class="max-w-lg mx-auto">
        <input type="hidden" name="csrf_token" value="<?= generateCsrfToken() ?>">
            <div class="mb-3">
                <label for="email" class="block mb-2 text-xs font-medium">Email</label>
                <input type="email" id="email" name="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com" />
            </div>
            <div class="mb-3">
                <label for="password" class="block mb-2 text-xs font-medium">Password</label>
                <input type="password" id="password" name="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" />
            </div>
            <div class="mb-5 text-xs">
                Don't have an account ? <a href="signup" class="text-primary font-bold">Sign up</a>
            </div>
            <input type="submit" value="Submit" name="login" class="text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  py-2  bg-primary w-full cursor-pointer hover:bg-primary/90">
        </form>
    </div>

</main>