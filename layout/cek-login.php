<?php if (!isset($_SESSION['loggedin'])):?>
<section class="fixed z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class="relative top-40 mx-auto shadow-xl rounded-lg p-4 backdrop-blur-md backdrop-brightness-150 max-w-md p-2">

        <div class="p-6 pt-0 text-center">
            <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-xl font-normal text-red-500 mt-5 mb-6">Anda harus login untuk mengakses halaman ini!</h3>
        <a class="lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200" href="/../login.php">Sign In</a>
        <a class="py-2 px-6 bg-blue-600 hover:bg-blue-700 text-sm text-white font-bold rounded-xl transition duration-200" href="/../register.php">Sign up</a>
        </div>

    </div>
</section>
<?php endif;?>