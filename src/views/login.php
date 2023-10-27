<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e0c81e361c.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="bg-amber-100" >


<main class="h-screen flex flex-col justify-center items-center">
        <div >
            <img class="h-96 w-96 translate-y-10 "  src="/src/images/ico.png" alt="">
        </div>
      
        <form action="/login" method="post"  class="w-[450px] flex flex-col rounded-md py-4 gap-5 bg-white">
        <h3 class="text-3xl mb-6">Bienvenido, Ingresa con tu cuenta</h3>
            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
            
                <input type="text" name="correo" class="w-[95%] border-2 border-slate-300 " placeholder="   Email "> <i class="fa-solid fa-envelope translate-y-0 -translate-x-10" style="color: #919bac;"></i> </input>
            </div>

         
            <div class="flex gap-1 flex-row  items-center justify-between mx-10">
                <input type="text" name="password" class="w-[95%] border-2 border-slate-300  " placeholder="   Password"  > <i class="fa-solid fa-lock translate-y-0 -translate-x-10 " style="color: #919bac;"> </i>  </input>
            </div>

            <div class="self-end ">
                <button type="submit" class="px-2 py-1 rounded-md text-white mb-6 inline-block  bg-blue-500  mx-14 ">Ingresar</button>
            </div>
        </form>
    </main>
</body>
</html>

