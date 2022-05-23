<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel Proyek Table Murid</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/tailwindcss">
        /* #cursor {
            transition: .5s linear;
        } */
        /* #cursor {
            clip-path: polygon(33% 13%, 82% 13%, 88% 57%, 72% 80%, 30% 95%, 8% 46%);
        } */

        :root {
            --main-clr:#2A9D8F ;
        }

        .modal-create {
            position: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background:rgba(0,0,0,.6);
            width: 100%;
            backdrop-filter: blur(10px);
            z-index:999;
            top:0;
            left: 0;
            animation: intro 1s forwards cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        @keyframes intro {
            0%{
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }
            100% {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }
        }

        @keyframes popForm {
            0%{
                opacity: 0;
                transform: scale(0);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--main-clr);
            border-radius: 1000px;
        }

        ::-webkit-scrollbar-track{
            background-color: transparent;
        }
        
        .modal-create form {
            width: 100%;
            opacity: 0;
            border-radius: 10px;
            overflow:hidden;
            max-width: 900px;
            background-color: #eee;
            animation: popForm .8s .5s forwards cubic-bezier(0.075, 0.82, 0.165, 1);
            padding: 30px 60px;
            position: relative;
            z-index:1;
        }

        .form-data {
            display: flex;
            width: 100%;
            gap: 35px;
        }

        .modal-create form::before {
            content: '';
            position: absolute;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            background: #2A9D8F;
            top: -75px;
            right: -75px;
        }
        .modal-create form::after{
            content: '';
            position: absolute;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            background: #E9C46A;
            top: -60px;
            left: -60px; 
            z-index:-1;
        }

        .modal-create form .part-one{
            width: 40%;
        }

        .modal-create form .part-two{
            width: 50%;
            height: 200px;
            margin-top: 0;
        }
        .modal-create textarea {
            width: 100%;
            height: 100%;
            resize:none;
            outline: none;
            box-shadow: 0 3px 5px rgba(0,0,0,.1);
            border-radius: 2px;
            padding: 2px 5px;
            color: #264653;
            letter-spacing: .5px;
            display: block;
            font-size: 1.2rem;
            margin-top: 5px;

        }

        .modal-create input {
            display: block;
            width: 100%;
            outline: none;
            border-radius: 2px;
            background: white;
            font-size: 1.2rem;
            padding: 2px 5px;
            border: 1px solid transparent;
            color: #264653;
            letter-spacing: .5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.1);
        }

        .modal-create input:focus{
            border: 1px solid #2A9D8F; 
        }

        .modal-create label {
            text-transform: capitalize;
            font-size: 1.2rem;
            color: #2A9D8F;
            letter-spacing: 1px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .modal-create li + li {
            margin-top: 15px;
        }

        select {
            border: 1px solid #2A9D8F;
            outline: none;
            box-shadow: 0 3px 5px rgba(0,0,0,.1);
            border-radius: 2px;
            font-size: 1.2rem;
            padding: 2px 5px;


        }

    </style>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          },
          keyframes: {
            gradient: {
                '0%' : {borderColor : '#264653'},
                '20%' : {borderColor : '#2A9D8F'},
                '40%' : {borderColor : '#E9C46A'},
                '80%' : {borderColor : '#F4A261'},
                '100%' : {borderColor : '#E76F51'},
            },
            rotate : {
                '0%' : {transform: 'rotate(0deg) translate(-50%, -50%);'},
                '100%' : {transform: 'rotate(360deg) translate(-50%, -50%);'},
            }
          },
          animation : {
            grad : 'gradient 10s linear infinite alternate',
            rotate: 'rotate 5s linear infinite'
          }
        }
      }
    }
  </script>
<body class="">
    <div id="cursor" class="pointer-events-none fixed w-[100px] h-[100px] border-[4px] border-[#264653] rounded-[20px_25px_20px_25px] -translate-x-1/2 -translate-y-1/2 animate-grad rotate-[30deg] top-[200vh]"></div>
    <h1 class="w-full text-5xl text-[#264653] font-bold text-center before:w-8 before:absolute relative before:left-1/3 before:-translate-x-1/2 before:-bottom-2 before:h-1 before:bg-[#264653] my-20">Proyek Table Murid</h1>

    <div class="action mx-auto lg:max-w-[1000px] w-full mb-8">
        <a href="/murid" class="outline-none border-none w-[160px] h-[45px] flex items-center justify-center text-white bg-[#2A9D8F] font-semibold tracking-wide text-[16px] rounded-md shadow-md" id="addButton"> 
            <i class="fa-solid fa-plus mr-2"></i> 
            Tambah Siswa
        </a>    
    </div>
    <table class="w-full lg:max-w-[1000px] bg-slate-500 text-[#264653] mx-auto">
        <thead class="w-full bg-white h-16">
            <tr class="font-semibold shadow-md text-[16px] divide-x-[.5px] relative z-10 tracking-[.5px] uppercase">
                <th>No.</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Kelas</th>
                <th>Gender</th>
                <th class="w-2/5">Tentang Saya</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="w-full text-md tracking-wide">
            <?php $urutan = 1; ?>
            @foreach($data as $murid)
                <tr class="text-center bg-[#fff7f5] h-[80px]">
                    <td>{{$urutan++}}</td>
                    <td>{{$murid->nama}}</td>
                    <td>{{$murid->umur}}</td>
                    <td>{{$murid->kelas}}</td>
                    <td>{{$murid->gender}}</td>
                    <td>{{$murid->tentang_saya}}</td>
                    <td>
                        <a href="/murid/{{$murid->id}}/change" class="mb-2 w-32 h-8 flex justify-center items-center mx-auto bg-[#F4A261] text-white text-md capitalize font-semibold rounded-sm shadow-md"><i class="fa-solid fa-wrench mr-2"></i>change</a>
                        <form action="/murid/{{$murid->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="w-32 h-8 flex justify-center items-center mx-auto bg-[#E76F51] text-white text-md capitalize font-semibold rounded-sm shadow-md" onclick="return confirm('Apakah Anda ingin Menghapus?')"><i class="fa-solid fa-trash-can mr-2"></i>delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal-create relative">
        <form action="/murid/storeadd" method="post">
            @csrf
            <a id="close" href="/murid" class="block text-white text-3xl cursor-pointer absolute top-4 right-4 hover:opacity-80 transition duration-300"><i class="fa-solid fa-xmark"></i></a>
            <h2 class="text-5xl font-bold text-[#2A9D8F] w-full before:absolute before:left-0 before:-bottom-2 relative before:w-8 before:h-1 before:bg-[#2A9D8F] mb-10">Tambah Murid <i class="fa-solid fa-address-card ml-5"></i></h2>

            <div class="form-data">
                <div class="part-one">
                    <ul>
                        <li>
                            <label for='nama'> <i class="fa-solid fa-signature mr-1"></i> Nama </label>
                            <input type='text' name='nama' id='nama'>
                        </li>

                        <li>
                            <label for='kelas'><i class="fa-solid fa-landmark mr-1"></i> kelas </label>
                            <input type='text' name='kelas' id='kelas'>
                        </li>

                        <li>
                            <label for='umur'><i class="fa-solid fa-arrow-up-1-9 mr-1"></i> umur </label>
                            <input type='text' name='umur' id='umur'>
                        </li>

                        <li class="w-full">
                            <label for="gender"><i class="fa-solid fa-genderless mr-1"></i>Gender</label>
                            <select name="gender" id="gender" class="w-full text-[#264653]">
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </li>
                    </ul>
                </div>

                <div class="part-two">
                    <label for="tentang_saya">tentang saya</label>
                    <textarea name="tentang_saya" id="tentang_saya"></textarea>
                </div>
            </div>
            <button type="submit" class="text-white bg-[#2A9D8F] px-[24px] py-[7px] text-[18px] rounded-md shadow-lg uppercase font-semibold tracking-wider mt-8" name="submit"><i class="fa-solid fa-plus mr-1"></i> tambah</button>
        </form>
    </div>
    
    <script src="js/script.js"></script>

</body>
</html>