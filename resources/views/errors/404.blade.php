<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Error</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/arca-a.ico') }}" sizes="16x16">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f2f2f2;
        color: #2c3e50;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }

    .container {
        text-align: center;
        background: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        position: relative;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: black;
        z-index: -2;
    }

    .jade-icon {
        font-size: 6rem;
        color: #388E3C;
        margin-bottom: 20px;
        animation: floating 3s infinite ease-in-out;
    }

    @keyframes floating {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    h1 {
        font-family: 'Playfair Display', serif;
        font-size: 7rem;
        color: #8BC34A;
        margin-bottom: 0.5rem;
    }

    h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: #2c3e50;
    }

    p {
        font-size: 1.15rem;
        margin-bottom: 2rem;
        color: #2c3e50;
    }

    .btn-jade {
        background-color: #388E3C;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-size: 1.1rem;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-jade:hover {
        background-color: #4CAF50;
        transform: scale(1.05);
    }

    @media (max-width: 1024px) {
        .container {
            padding: 30px;
        }

        h1 {
            font-size: 5rem;
        }

        h2 {
            font-size: 1.75rem;
        }

        p {
            font-size: 1rem;
        }

        .btn-jade {
            padding: 0.65rem 1.25rem;
            font-size: 1rem;
        }
    }

    @media (max-width: 767px) {
        .container {
            padding: 20px;
            max-width: 90%;
        }

        .jade-icon {
            font-size: 4rem;
        }

        h1 {
            font-size: 4rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        p {
            font-size: 0.95rem;
        }

        .btn-jade {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
    }
</style>

<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="jade-icon">
            <i class=" bx bx-diamond"></i>
        </div>
        <h2>No Encontrado</h2>
        <h1>404</h1>
        <p>Lo Siento. El contenido que estas buscando no existe. O escribiste mal el enlace.</p>
        <button class="btn-jade" onclick="window.location.href='{{ route('home') }}'">Volver a la Página Principal</button>
    </div>
</body>

</html>
