<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Music Table</title>
    <style type="text/tailwindcss">
        * {
            font-family: 'Inter';
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
</head>
<body class="bg-gradient-to-r from-[#FFFFFF] to-[#00A8E8]">

    <nav class="fixed top-0 left-0 right-0 px-16 py-6 flex justify-between items-center mb-16" id="nav">
        <h1 class="font-bold text-[#00171F] text-2xl">My Music App</h1>

        <a href="/music/create" class="w-28 h-10 text-semibold text-white flex items-center justify-center bg-[#00171F] text-md rounded-md hover:opacity-70 transition">Add Music</a>

    </nav>
    

    <div id="main" class="p-32">
        <h2 class="mb-16 font-bold text-3xl animate-bounce text-[#00171F] relative before:absolute before:h-full before:rounded-md before:w-3 before:-left-[3%] before:bg-[#00171F] before:top-0">Our Popular Songs</h2>

        <div class="cards flex flex-wrap gap-10">

            @foreach($musics as $music)
            <div class="card w-full max-w-[300px] shadow-lg px-5 py-9 pb-4 bg-transparent backdrop-blur-sm rounded-md relative">
                <h3 class="text-3xl text-slate text-center font-bold mb-4 h-28 overflow-y-auto flex items-center">{{$music->music_name}} feat({{$music->music_feat}}).</h3>
                <div class="text-lg font-semibold text-center text-[#00171F] mb-1 h-10 overflow-ellipse flex items-center justify-center">{{$music->music_singer}} <span class="font-normal text-slate-500">{{$music->music_gender}}</span></div>
                <div class="text-center text-md text-[#003459] h-8 flex items-center justify-center">Wrote by {{$music->music_writer}}</div>


                <p class="description text-md overflow-y-auto text-slate-500 text-center h-32 mt-4 pr-2">{{$music->description}}</p>

                <div class="action flex gap-2 mt-2 absolute -top-6 -right-6">
                    <a href="/music/{{$music->id}}/change" class="w-16 h-10 flex items-center justify-center rounded-md bg-[#007EA7] text-white text-xl hover:opacity-70 transition"><i class="fa-solid fa-wrench"></i></a>

                    <form action="/music/{{$music->id}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden">
                        <button type="submit" class="w-16 h-10 flex items-center justify-center rounded-md bg-[#003459] text-white text-xl hover:opacity-70 transition" onclick='return confirm("Sure wanna delete :( ?")'><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
                <button type="button" class="text-2xl mt-5 bg-gradient-to-r from-[#003459] font-bold text-center w-full to-[#00A8E8] bg-clip-text text-transparent hover:opacity-70 transition "><i class="fa-solid fa-microphone mr-4"></i>Sing Now</button>
            </div>
            @endforeach 
        </div>
    </div>

    <script src="js/script.js">

    </script>
</body>
</html>