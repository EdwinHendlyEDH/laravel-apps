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

        .modal-create {
            position: fixed;
            height: 100vh;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            background:rgba(0,0,0,.2);
            display: none;
            width: 100%;
        }

        .modal-create.active {
            display: flex;
        }

        .modal-create form {
            width: 100%;
            max-width: 700px;
            background-color: #eee;
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
        <a href="/murid/create" class="outline-none border-none w-[160px] h-[45px] flex items-center justify-center text-white bg-[#2A9D8F] font-semibold tracking-wide text-[16px] rounded-md shadow-md" id="addButton"> 
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
                @if($urutan%2)
                <tr class="text-center bg-[#fff7f5] h-[100px]">
                @else
                <tr class="text-center bg-[#fff] h-[100px]">
                @endif
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
    
    <script src="js/script.js"></script>
</body>
</html>