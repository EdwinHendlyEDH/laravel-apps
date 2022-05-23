<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            font-family: 'Inter';
        }
        @keyframes gradient{
            100%{
                filter: hue-rotate(360deg);
            }
        }
        button {
            animation: gradient 10s linear infinite;
        }

        select {
            background: transparent;
            border: 1px solid #333;
            outline: none;
            padding: 5px 10px;
            margin: 0;
            width: 100%;
            font-family:inherit;
            font-size: 10px;
            cursor: pointer;
            line-height: inherit;
        }

        .select {
            border-radius: 3px;
            font-size: 1.25em;
        }
        option {
            font-size: 1em;
        } 

        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #007EA7, #00A8E8);
            border-radius: 1000px;
        }

        #nav.fixed-nav {
            box-shadow: 1px 2px 5px rgba(0,0,0,.05);
            z-index: 9999;
            backdrop-filter: blur(2px);
        }
    </style>
    <title>Add new Music</title>
</head>
<body class="flex items-center justify-center flex-col gap-8 min-h-[100vh] bg-gradient-to-r from-[#FFFFFF] to-[#00A8E8]">
    <a href="/music" class="absolute top-10 right-10 text-white text-4xl"><i class="fa-solid fa-x"></i></a>
    <h1 class="text-6xl bg-gradient-to-r from-[#003459] font-bold text-center w-full to-[#00A8E8] bg-clip-text text-transparent mt-20 flex items-center">Add New Music <i class="fa-solid fa-music text-white ml-8"></i></h1>

    <form action="/music/data" method="post" class="w-full max-w-[500px] shadow-lg px-5 py-9 pb-4 bg-transparent backdrop-blur-sm rounded-md relative mb-20">

        @csrf
        <ul>
            <li>
                <label for='music_name' class="block text-lg text-[#333] font-semibold">Music Name </label>
                <input type='text' name='music_name' id='music_name' class="border-slate-500 border bg-transparent shadow-sm rounded-sm w-full block outline-none py-1 px-2">
            </li>
            <li class="mt-5">
                <label for='music_singer' class="block text-lg text-[#333] font-semibold">Music Singer </label>
                <input type='text' name='music_singer' id='music_singer' class="border-slate-500 border bg-transparent shadow-sm rounded-sm w-full block outline-none py-1 px-2">
            </li>
            <li class="mt-5">
                <label for="singer_gender" class="block text-lg text-[#333] font-semibold">Singer Gender</label>
                <select name="singer_gender" id="singer_gender" class="select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </li>
            <li class="mt-5">
                <label for='music_writer' class="block text-lg text-[#333] font-semibold">Music Writer </label>
                <input type='text' name='music_writer' id='music_writer' class="border-slate-500 border bg-transparent shadow-sm rounded-sm w-full block outline-none py-1 px-2">
            </li>
            <li class="mt-5">
                <label for='music_feat' class="block text-lg text-[#333] font-semibold">Feat </label>
                <input type='text' name='music_feat' id='music_feat' class="border-slate-500 border bg-transparent shadow-sm rounded-sm w-full block outline-none py-1 px-2">
            </li>
            <li class="mt-5">
                <label for="description" class="block text-lg text-[#333] font-semibold">Description</label>
                <textarea name="description" id="description" style="resize:none;" class="w-full h-32 bg-transparent border border-slate-500 shadow-sm rounded-sm outline-none px-2 py-1"></textarea>
            </li>
            <li class="mt-8">
                <button type="submit" name="submit" class="bg-gradient-to-r from-[#0b62a0] to-[#46bae7] w-fulltext-white text-md font-semibold tracking-[1px] uppercase rounded-sm py-2 w-full shadow-md text-white">Add</button>
            </li>
        </ul>
    </form>
</body>
</html>