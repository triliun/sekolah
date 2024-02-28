<?php
session_start();
include 'database.php';

// if (isset($_SESSION['loggedin'])) {
//     header('Location: home.php');
//     exit;
// }

$project = [
[ 
    "judul" => "Berat Badan",
    "deskripsi" => "Program untuk menentukan tebakan sesuai dengan berat badan.",
    "link" => "berat-badan.php",
    "svg" => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-500 group-hover:fill-white" fill="curentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M240-200h480l-57-400H297l-57 400Zm240-480q17 0 28.5-11.5T520-720q0-17-11.5-28.5T480-760q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Zm113 0h70q30 0 52 20t27 49l57 400q5 36-18.5 63.5T720-120H240q-37 0-60.5-27.5T161-211l57-400q5-29 27-49t52-20h70q-3-10-5-19.5t-2-20.5q0-50 35-85t85-35q50 0 85 35t35 85q0 11-2 20.5t-5 19.5ZM240-200h480-480Z"/></svg>'
],
[ 
    "judul" => "Perulangan",
    "deskripsi" => "Program yang dapat mengulang kata dengan jumlah yang diinginkan.",
    "link" => "perulangan.php",
    "svg" => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-500 group-hover:fill-white" fill="curentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M482-160q-134 0-228-93t-94-227v-7l-64 64-56-56 160-160 160 160-56 56-64-64v7q0 100 70.5 170T482-240q26 0 51-6t49-18l60 60q-38 22-78 33t-82 11Zm278-161L600-481l56-56 64 64v-7q0-100-70.5-170T478-720q-26 0-51 6t-49 18l-60-60q38-22 78-33t82-11q134 0 228 93t94 227v7l64-64 56 56-160 160Z"/></svg>'
],
[ 
    "judul" => "Kalkulator",
    "deskripsi" => "Program untuk perhitungan sederhana seperti penjumlahan dan perkalian.",
    "link" => "/kalkulator",
    "svg" => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-500 group-hover:fill-white" fill="curentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M320-240h60v-80h80v-60h-80v-80h-60v80h-80v60h80v80Zm200-30h200v-60H520v60Zm0-100h200v-60H520v60Zm44-152 56-56 56 56 42-42-56-58 56-56-42-42-56 56-56-56-42 42 56 56-56 58 42 42Zm-314-70h200v-60H250v60Zm-50 472q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>'
],
[ 
    "judul" => "Data Array",
    "deskripsi" => "Jenis-jenis sistem pengelompokan data yang dapat menyimpan data.",
    "link" => "array.php",
    "svg" => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-slate-500 group-hover:fill-white" fill="curentColor" height="24" viewBox="0 -960 960 960" width="24"><path d="M600-160v-80h120v-480H600v-80h200v640H600Zm-440 0v-640h200v80H240v480h120v80H160Z"/></svg>'
]
];

function projectList($judul, $deskripsi, $link, $svg)
{
    echo '
<div class="p-1 max-w-md">
<div class="flex flex-col">
<div class="flex items-center">
<a href="' .$link. '" class="transition duration-200 group border border-blue-600 block max-w-xs mx-auto rounded-lg p-6 bg-gray-900 ring-1 ring-slate-900/5 space-y-3 hover:bg-blue-600">
  <div class="flex items-center space-x-3">
    ' .$svg. '
    <h3 class="text-slate-500 group-hover:text-white text-sm font-semibold">' .$judul. '</h3>
  </div>
  <p class="text-slate-500 group-hover:text-white text-sm">' .$deskripsi. '</p>
</a>
</div>
</div>
</div>
    ';
}

?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth antialiased">
<?php $title = 'Varrel Al Aljabaar K'; include 'layout/head.html'; ?>
<body class="bg-gray-900 backdrop-blur-3xl">
<?php include 'layout/nav.php' ?>
<main class="w-full mx-auto text-white">
<section>
  <div class="mx-auto max-w-screen-xl px-4 py-14 lg:flex lg:items-center">
    <div class="mx-auto max-w-3xl text-center">
      <h1
        class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl animate-gradient"
      >
        Varrel Al Jabaar K
        <br>
        <span class="sm:block"> Web Developer </span>
      </h1>

      <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed ">
        Just a Writter.
      </p>

      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <a
          class="block w-full rounded-lg bg-blue-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-blue-700 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
          href="https://api.whatsapp.com/send?phone=6285869433998&text=%F0%9F%98%80%20Halo%20Bang"
          titl="Contact Me!"
        >
          Contact Me
        </a>

        <a
          class="transition duration-200 block w-full rounded-lg border border-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
          href="#project"
        >
          Learn More
        </a>
      </div>
    </div>
  </div>
</section>
  <hr class="w-full m-0 p-0 border border-blue-600 my-5">
<section class="px-4 py-10 px-4">
    <h1 id="about" class="bg-gradient-to-r pb-2 text-center from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl animate-gradient">About Me
    </h1>
<p class="mx-auto text-center max-w-xl mt-4 sm:text-xl/relaxed">Hai, aku Varrel Al Jabaar Konstitusi , biasa dipanggil Varrel. Saya suka 🏊‍♂️ berenang seminggu sekali kadang ✍️ menulis artikel. Juga belajar bikin 🧑‍💻 blog app dan cari tau 🔎 trik SEO juga jadi rutinitas aku. Pernah loh, halaman aku sempet masuk peringkat 3 di mesin pencarian, meski cuma sebentar. Bangga banget sama pencapaian itu!</p>
</div>
</section>
</section>
<section class="px-4 py-10 px-4">
    <h1  id="project" class="bg-gradient-to-r pb-2 text-center from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl animate-gradient">
        My Project
        </h1>
<div class="flex flex-wrap max-w-4xl mx-auto justify-center mt-10">
<?php 
foreach ($project as $post) {
    projectList($post['judul'], $post['deskripsi'], $post['link'], $post['svg']);
}
?>
</div>

</div>
</section>
</main>
<?php include 'layout/footer.php'; ?>
<?php include 'layout/sc-nav.php'; ?>
</body>
</html>