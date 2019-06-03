
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to SIAM-VIT</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/plyr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.10.2/katex.min.css" integrity="sha256-uT5rNa8r/qorzlARiO7fTBE7EWQiX/umLlXsq7zyQP8=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" integrity="sha256-JHGEmB629pipTkMag9aMaw32I8zle24p3FpsEeI6oZU=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style1.css">
  </head>

<body>
  <div class="wrapper">
    <nav id="sidebar">
  <div class="sidebar-header">
    <h3>Welcome to SIAM-VIT</h3>
  </div>

  <ul class="sidebar-list list-unstyled CTAs">
    <li>
      <a href="Welcome.html" class="article">Back to Home</a>
    </li>
  </ul>

  <ul class="sidebar-list list-unstyled components">
    <li class="">
      <a href="About us.html">About Us</a>
    </li>
    <li class="">
      <a href="Events.html">EVENTS</a>
    </li>
    <li class="">
      <a href="Blog.html">BLOG</a>
    </li>
    <li class="">
      <a href="Members.html">MEMBERS</a>
    </li>
    <li class="">
      <a href="http://localhost/register/Newmembers.php">NEW MEMBERS</a>
    </li>
    <li class="">
        <a href="http://localhost/register/register.php">SignUp</a>
      </li>
      <li class="">
        <a href="http://localhost/register/Login.php">Login</a>
      </li>
    <li class="">
      <a href="Follow.html">Follow SIAM-VIT on</a>
    </li>
  </ul>

  <ul class="sidebar-list list-unstyled CTAs">
    <li>
      <a href="Welcome.html" class="article">Back to Home</a>
    </li>
  </ul>
</nav>

    <div id="content">
      <header class="container-fluild header">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="align-items-middle">
                <button type="button" id="sidebarCollapse" class="btn btn-toggle-sidebar">
                  <div></div>
                  <div></div>
                  <div></div>
                </button>
                
                <h1 style="display: inline-block">Newest Members</h1>
              </div>
            </div>
          </div>
        </div>
      </header>
<?php
include_once("server.php");
$sql = "SELECT id,name, username, email, mobilenumber, team, status, profilepic FROM users";
$resultset = mysqli_query($db, $sql) or die("database error:". mysqli_error($db));
while( $record = mysqli_fetch_assoc($resultset) ) 
{?>
<link rel="stylesheet" type="text/css" href="cardstyle.css">
<a href="displayinfo.php?id=<?php echo $record['id']; ?>">
  <div class="column">
    <div class="card5">
      <img alt=""  src="<?php echo $record['profilepic']; ?>">
      <p><div class="a5"><?php echo $record['name']; ?></div></p>
<div class="title5"><?php echo $record['status']; ?></div>
<div class="title5"><?php echo $record['team']; ?></div>

</div>
    </div></a>
<?php } ?>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js" integrity="sha256-/YAntTqXy9V4LoXFkI5WPDl3ZwP/knn1BljmMJJ7QWc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.10.2/katex.min.js" integrity="sha256-TxnaXkPUeemXTVhlS5tDIVg42AvnNAotNaQjjYKK9bc=" crossorigin="anonymous"></script>
  <script>
   

    // render math equations
    let elMath = document.getElementsByClassName('mathquill');
    for (let i = 0, len = elMath.length; i < len; i += 1) {
      const el = elMath[i];

      katex.render(el.textContent, el, {
        throwOnError: false
      });
    }

    // this hack will make sure Bootstrap tabs work when using Handlebars
    if ($('#question-tabs').length && $('#user-answer-tabs').length) {
      $("#question-tabs a.nav-link").on('click', function () {
        $("#question-tab-contents .tab-pane").hide();
        $($(this).attr("href")).show();
      });
      $("#user-answer-tabs a.nav-link").on('click', function () {
        $("#user-answer-tab-contents .tab-pane").hide();
        $($(this).attr("href")).show();
      });
    } else {
      $("a.nav-link").on('click', function () {
        $(".tab-pane").hide();
        $($(this).attr("href")).show();
      });
    }

    // side bar events
    $(document).ready(function () {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>
</body>

</html>

