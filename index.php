<?php /* PHP PEW PEW PEW BALONEY */

function directorydisplay($title, $author, $description){ 
    $display = array( 
    '<tr>', 
    '<td><a href="#' . $title . '">'. $title . '</a></td>', 
    '<td>' . $author . '</td>',
    '<td></td>',
    '</tr>'
    ); 
    return $display; 
}; 

function jsonloader($location, $debug = false){ 
    $json = file_get_contents($location); 
    $jsonArray = json_decode($json, true); 
    foreach($jsonArray as $key => $val){    
      if($debug == true){  echo '<pre>'; print_r($jsonArray); echo '</pre>'; }
      else{
       echo implode(directorydisplay($val['title'], $val['author'], $val['description'])); 
      }}};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="http://metro.techs.net.nz/favicon.ico">
  <title>Technology Solutions Code Repository</title>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap.min.css">
  <style>body{padding-top:70px;}</style>
  <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.min.js"></script>
  <![endif]-->
</head>

<body style="">
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Technology Solutions</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="http://www.techs.co.nz">www.techs.co.nz</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  <div class="container">
    <div class="page-header">
      <div class="row">
        <div class="col-md-8">
          <h1>Code Repository</h1>
          <p>Found on <a href="https://github.com/TechnologySolutions/WebTools">https://github.com/TechnologySolutions/WebTools</a></p>
        </div>
        <div class="col-md-4">
          <img src="http://metro.techs.net.nz/images/2013/ts_logo_70px.jpg" alt="Technology Solutions: Total Internet and IT Solutions" style="width:100%;max-width:399px">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
      <form class="form-inline" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
          <a href="#advanced">Advanced Search</a>
        </form>
        </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Author</th>
          <th>Code</th>
        </tr>
      </thead>
      <tbody>
        <?php jsonloader('directory.json'); ?>
      </tbody>
    </table>
  </div> <!-- /container -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
</html>