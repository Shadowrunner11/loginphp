<?php
    include "header.php";
    if(isset($_COOKIE["anuncio"])){
        echo $_COOKIE["anuncio"];
        setcookie("anuncio", "");
    }
    
?>
<style>
        body{
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    color:azure;
    
}

body::before{
    position: fixed;
    content: "";
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-image: linear-gradient(
        115deg,
        rgba(158, 179, 236, 0.8),
        rgba(70, 67, 95, 0.7)
      ),
      url(https://upload.wikimedia.org/wikipedia/commons/5/52/Lake_Clearwater%2C_Canterbury%2C_New_Zealand_02.jpg);
    
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    z-index: -1;
}
form{
    width: 100%;

    background: linear-gradient(rgb(62, 62, 212), rgb(35, 93, 185));
    margin: auto;
    margin-top: 25vh;
    text-align: center;
    border-radius: 25px;
    /*box-shadow: 12px 12px 15px cadetblue;*/
}
@media (min-width: 500px) {
    form{width: 500px;}
    html{font-size: 20px;}
}


label, input{font-size: 1.2rem; display: block; margin:auto; width: 80%;}


#first-section input, #dropdown, textarea, [type="submit"]{
    border-radius: 5px;
    border: none;
    width: 95%;
    margin: auto;
    margin-bottom: 1.5rem;
    margin-top: 0.8rem;
    padding: 0.5rem 1%;
}
#dropdown, textarea{width: 98%;}


#submit{
    width: 100%;
    background-color: rgb(212, 91, 10);
    color: azure;
    font-size: 1rem;
}

#submit:hover{background-color: rgb(22, 169, 214);
}
    </style>
    <title>SENATI</title>
</head>
<body>
<form id="survey-form" method="POST" action="controller.php">
    <label>Username:<input type="text" pattern=".{8,}" title="El usuario debe tener 8 o más caracteres" name="username" id="username" required></label>
    <label>Contraseña:<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Contraseña invàlida, debe tener 8 caracteres mínimo" name="password" id="password" required></label>
    <input type="submit" value="Login">
</form>
