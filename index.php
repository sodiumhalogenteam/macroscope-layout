<?php
 // process form submission
//  http://form.guide/php-form/php-form-action-self.html

//var_dump($_POST);

if(isset($_POST['todosmd']))
{
 // echo 'test, yup I see the form was submited';
  // put data into todos.md
  $myfile = fopen("./todos.md", "w") or die("Unable to open file!");
  $txt = $_POST['todosmd'];
  fwrite($myfile, $txt);
  fclose($myfile);
    // refresh page
    header('Location: '.$_SERVER['PHP_SELF']);
}
else {
  echo 'no changes to md file';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- //owl-carousel Assets-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">




    <title>Macroscope 3.0</title>

</head>

<body>

    <div class="siteHeader">
        <!-- This section gets pushed to the left side-->
        <div class="siteHeader__section">
          <div class="siteHeader__item siteHeaderLogo">
            <div class="fa fa-inbox"></div>
          </div>
          <div class="siteHeader__item siteHeaderButton is-site-header-item-selected">Sodium Halogen</div>
          <div class="siteHeader__item siteHeaderButton">Projects</div>
          <div class="siteHeader__item siteHeaderButton">Tulum</div>
        </div>
        <!-- This section gets pushed to the right side-->
        <div class="siteHeader__section">
          <div class="siteHeader__item siteHeaderButton">Settings</div>
          <div class="siteHeader__item siteHeaderButton">Log out</div>
        </div>
      </div>
      
      <div class="photo photo1 photo--large">
       <div class="centeredPrompt">
        <div class="centeredPrompt__item centeredPromptIcon">
          <div class="icon fa fa-smile-o"></div>
        </div>
        <div class="centeredPrompt__item centeredPromptLabel">Welcome to the app! This is macrscope 3.0</div>
        <div class="centeredPrompt__item centeredPromptDetails">Thanks for signing in. This is your project management site for the Sodium Halogen team!</div>
        <div class="centeredPrompt__item button">Start by selecting the project you want to work on.     </div>
       </div>
      </div>
        
        
      <div class="container"> 
        <div class="Folders">
          <u>Folders</u>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores voluptates ducimus eos quisquam debitis molestias possimus ea tenetur tempora accusamus assumenda, quod praesentium delectus deleniti nobis explicabo quia cumque? Atque!</p>
        </div>
        <div class="to-dos">

        <!-- todo list -->
        <u>To-Do</u>
        <ul id="todos"></ul>
        <!-- edit form -->
<form method="post" action="./index.php" >
  <textarea name="todosmd" id="todosmd" cols="30" rows="10"></textarea>
  <input type="submit" value="save">
</form>


        </div>
      </div>
      
      <script src="js/main.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.min.js"></script>
<script>
// vars
var markdown = ""

// get todos
$.get('./todos.md', function(data) {
  markdown = data
  //show markdown in textarea
  document.getElementById("todosmd").value = markdown


  // convert markdown to html
  var converter = new showdown.Converter();
  var html = converter.makeHtml(markdown);

// regex
html = html.replace(/\[(| |\s)\]/gi,'<input class="task-list-item-checkbox" disabled="" id="" type="checkbox">')
              .replace(/\[(x|X)\]/gi,'<input checked="" class="task-list-item-checkbox" disabled="" id="" type="checkbox">')

  console.log(html)

  // add html to #todos
  $( "#todos" ).append( html );
})

</script>

</body>


<footer>
    <!-- jquery placed at the end of document to load pages faster -->


</footer>

</html>
