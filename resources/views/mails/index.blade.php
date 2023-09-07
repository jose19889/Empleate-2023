
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <div class="card" style="background:#eef0f2;">
   <div class="container" >
     <div class="">
       <p style="color:red;"><strong>Puesto : {{ $data['title'] }} </strong></p>
      <hr>
       <p>Buenas mi correo es {{ $data['applicant'] }}</p>
      <hr>
       <p> {{ $data['message'] }}.</p>
     </div>
   </div>
 </div>



</body>
<style>
.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}
</style>
</html>
