<?php
$host="localhost";
$user="root";
$password="";
$db="bibliotheque";

mysqli_connect($host, $user, $password, $db);





?>
<html lang="en">
  <head>
    
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>      <link href="styles.css" rel="stylesheet">
		

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
  </head>
  <body>
    
    <!-- navbar ex -->
		
			<nav class="navbar navbar-default navbar-fixed-top">
    
        <div class="container-fluid">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Brand</a>
            </div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse">
                
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Link</a></li>
                    
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">Dropdown <span class="caret"></span></a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="">Sub menu item</a></li>
                            <li><a href="">Sub menu item 2</a></li>
                            <li><a href="">Sub menu item 3</a></li>
                            
                            <li role="separator" class="divider"></li>
                            
                            <li><a href="">Sub menu item 4</a></li>
                        </ul>                        
                    </li>
                    
                </ul>
                
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search site...">
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Side Link</a></li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Account info <span class="caret"></span></a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="">Update security</a></li>
                            <li><a href="">Edit profile</a></li>
                            <li><a href="">Log out</a></li>
                        </ul>
                        
                    </li>
                </ul>
                
            </div>
            
        </div>
        
    </nav>
    
		<!-- container ex -->
		
    <div class="container" id="top">
			
      
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-8">
                <h1>Cats!</h1>
                  <p>Scottish fold russian blue but mouser but tiger mouser or singapura. Siberian egyptian mau sphynx and bobcat so cornish rex. Ocicat ragdoll persian. Abyssinian singapura egyptian mau. Balinese . Norwegian forest british shorthair for russian blue persian so tabby. Himalayan panther so ragdoll. Devonshire rex devonshire rex for bengal donskoy. Scottish fold malkin burmese norwegian forest havana brown ragdoll. Cheetah jaguar yet donskoy so puma, and ocelot, cornish rex british shorthair. Puma devonshire rex. Persian savannah maine coon for grimalkin, siamese ragdoll or american bobtail. Siamese kitty siamese manx so munchkin cougar but abyssinian . Donskoy bengal but bobcat yet kitten and devonshire rex and siamese scottish fold. Tiger russian blue turkish angora devonshire rex. Cornish rex british shorthair or malkin or munchkin. Persian american shorthair norwegian forest yet turkish angora for havana brown. Himalayan. Lynx british shorthair panther donskoy cheetah siberian. </p>

<p>Cras mattis consectetur purus sit amet fermentum. Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nulla vitae elit libero, a pharetra augue.</p>
              </div>
              
					
						
              <div class="col-sm-4">
                <h3>A sidebar</h3>
                  <ul>
                    <li>one</li>
                    <li>two</li>
                    <li>three</li>
                  </ul>
              </div>
          </div>
      </div>
			
			<hr> <!-- carousel ex -->
			
			<div class="container">
        <div class="page-header">
            <h1>Look a Cat Carousel</h1>
            
        </div><!-- page-header -->
        
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
            <!-- indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            
            <!-- wrapper for the slides -->
            <div class="carousel-inner" role="listbox">
                
                <div class="item active">
                    <img src="http://placekitten.com/1260/490" alt="cute kitten">
                    <div class="carousel-caption">
                        <h4>Welcome to the carousel!</h4>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="http://placekitten.com/1260/520" alt="cute kitten">
                    <div class="carousel-caption">
                        <h4>And another slide...</h4>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="http://placekitten.com/1260/550" alt="cute kitten">
                    <div class="carousel-caption">
                        <h4>The final slide :)</h4>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    </div>
                </div>
                
            </div>
            
            <!-- controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            
        </div>
        
    </div><!-- container -->
		
			<hr>  <!-- Form ex -->
		
			<div class="container">
        
        <div class="page-header">
            <h1>Bootstrap Forms</h1>
            <p class="lead">Bootstrap has amazing prebuilt forms</p>
        </div><!-- page-header -->
        
        <div class="row">
            <div class="col-sm-4">
            
                <form>
                    <div class="form-group has-error">
                        <label for="formName">Your name</label>
                        <input type="text" id="formName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="formEmail">Email address</label>
                        <input type="email" id="formEmail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="formMessage">Write things</label>
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Checkbox
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="formRadio"> Bootstrap me!
                        </label><br>
                        <label>
                            <input type="radio" name="formRadio"> Moar Bootstrap!
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Do it!</button>
                </form>
							<br>
                
            </div>
            <div class="col-sm-8">
            
                <form class="form-inline">
                    
                    <div class="form-group">
                        <label for="loginEmail" class="sr-only">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon">@</div>
                            <input id="loginEmail" type="email" class="form-control" placeholder="twitter handle">
                            <div class="input-group-addon"></div>
                        </div>
                    </div>
							
                    <div class="form-group">
                        <label for="loginPassword" class="sr-only">Password</label>
                        <input id="loginPassword" type="password" class="form-control" placeholder="password">
                    </div>
                    
                    <button type="submit" class="btn btn-danger">Submit</button>
                    
                </form>
                
            </div>
        </div><!-- row -->
        
        <br><br><hr>
        
        <div class="row">
            <div class="col-sm-6">
                
                <form class="form-horizontal">
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">First name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control input-lg" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Last name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    
                </form>
                
            </div>
        </div><!-- row -->
        
    </div><!-- container -->
		
		<hr>  <!-- Table ex -->
		
		<div class="container">
        
        <div class="page-header">
            <h1>Bootstrap Tables</h1>
            <p class="lead">Table examples</p>
        </div><!-- page-header -->
        
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                <tr class="success">
                    <td>David</td>
                    <td>da@email.com</td>
                    <td>Words1</td>
                </tr>
                <tr>
                    <td class="info">Dianne</td>
                    <td>QT@dem.io</td>
                    <td class="warning">PI</td>
                </tr>
                <tr class="danger">
                    <td>Payton</td>
                    <td>grly@lert.com</td>
                    <td>Canton</td>
                </tr>
            </tbody>
        </table>
        
    </div><!-- container -->
		
		<hr> <!-- Buttons & IMG ex -->
		
		<div class="container">
        
        <div class="page-header">
            <h1>Bootstrap Buttons</h1>
            <p class="lead">Bootstrap lets you easily create beautiful, user-friendly buttons.</p>
        </div><!-- page-header -->
        
        <div class="row">
            <div class="col-sm-4">
                <h3>Default Buttons</h3>
                <!-- Use the bootstrap button classes on <a>, <button> or <input> tags -->
                
                <a class="btn btn-default" href="#" role="button">Link</a>
                <button class="btn btn-default" type="submit">Button</button>
                <input class="btn btn-default" type="button" value="Input">
                <input class="btn btn-default" type="submit" value="Submit">
                
            </div>
            <div class="col-sm-8">
                <h3>Button Styles</h3>
                
                <!-- Standard button -->
                <button type="button" class="btn btn-default">Default</button>

                <!-- Primary button -->
                <button type="button" class="btn btn-primary">Primary</button>

                <!-- Success / positive action button -->
                <button type="button" class="btn btn-success">Success</button>

                <!-- Info alert button -->
                <button type="button" class="btn btn-info">Info</button>

                <!-- Warning style button -->
                <button type="button" class="btn btn-warning">Warning</button>

                <!-- Danger style button -->
                <button type="button" class="btn btn-danger">Danger</button>

                <!-- Looks like link, behaves like button -->
                <button type="button" class="btn btn-link">Link</button>
            </div>
        </div>
        
        <hr>
        
        <div class="row">
            <div class="col-sm-6">
                <h3>Button Sizes</h3>
                <button type="button" class="btn btn-default btn-xs">Extra small button</button>
                <button type="button" class="btn btn-warning btn-sm">Small button</button>
                <button type="button" class="btn btn-info btn-lg">Large button</button>
                
            </div>
            <div class="col-sm-6">
                <h3>Block Level Buttons</h3>
                <button type="button" class="btn btn-danger btn-block">Block level button</button>
                <button type="button" class="btn btn-default btn-lg btn-block">Block level button</button>
                <button type="button" class="btn btn-primary btn-sm btn-block">Block level button</button>
                <button type="button" class="btn btn-link btn-block">Block level button</button>
            </div>
        </div>
        
        <div class="page-header">
            <h2>Images</h2>
            <p class="lead">There are a few cool things you can do with images, too!</p>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <h4>Responsive image</h4>
                <img src="http://placehold.it/500x200" class="img-responsive">
            </div>
            <div class="col-sm-6">
                <h4>Non-responsive</h4>
                <img src="http://placehold.it/500x200">
            </div>
        </div>
        
        <h3>Image Shapes</h3>
        <img src="http://placehold.it/200" class="img-rounded">
        <img src="http://placehold.it/200" class="img-circle">
        <img src="http://placehold.it/200" class="img-thumbnail">
			
    </div><!-- container -->
		
		<hr> <!-- Helper class ex -->
		
		<div class="container">
        
        <div class="page-header">
            <h1>Bootstrap Helper Classes</h1>
            <p class="lead">Lots of itty bitty classes that save you time here &amp; there.</p>
        </div><!-- page-header -->
        
        <h3>Contextual Colours</h3>
        <p class="text-muted">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="text-primary">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="text-success">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="text-info">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="text-warning">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="text-danger">Nulla vitae elit libero, a pharetra augue.</p>
        
        <h3>Contextual Backgrounds</h3>
        <p class="bg-muted">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="bg-primary">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="bg-success">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="bg-info">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="bg-warning">Nulla vitae elit libero, a pharetra augue.</p>
        <p class="bg-danger">Nulla vitae elit libero, a pharetra augue.</p>
        
        <h3>Quick Floats</h3>
        <div class="clearfix">
            <div class="pull-left bg-primary">I'm a div that's floated left!</div>
            <div class="pull-right bg-success">I'm a div that's floated right!</div>
        </div>
        
        <h3>Center Content Blocks</h3>
        <div class="center-block small-box bg-info">Curabitur blandit tempus porttitor. Curabitur blandit tempus porttitor. Etiam porta sem malesuada magna mollis euismod. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</div>
        
        <h3>Show &amp; Hide Content</h3>
        <div class="show">I'm in a div with the class of <code>.show</code></div>
        <div class="hidden">I'm in a div with the class of <code>.hidden</code></div>
        
        <hr>
    </div><!-- container -->
		
		<hr> <!-- glyphicons -->
		
		<div class="container">
        
        <div class="page-header">
            <h1>Bootstrap Glyphicons</h1>
            <p class="lead">Icons that are fonts</p>
        </div><!-- page-header -->
        
        <p><span class="glyphicon glyphicon-circle-arrow-right"></span></p>
        
        <h3><span class="glyphicon glyphicon-music"></span> An icon in a header!</h3>
        
        <p><span class="glyphicon glyphicon-trash"></span> There's an icon for just about anything you can think of!</p>
        
        <p>You can link an icon like so: <a href="index.html"><span class="glyphicon glyphicon-cog"></span></a></p>

        
        <button type="button" class="btn btn-default btn-lg btn-info">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span> A button with an icon
        </button>
        
        <br><br>
        
        <div class="alert alert-warning">
            <span class="glyphicon glyphicon-exclamation-sign"></span>
            You may use icons in alert messages, too!
        </div>
        
        <br>
        
        <h4>Use icons for User Interface design</h4>
        
        <div class="btn-toolbar">
            <div class="btn-group">
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-play"></span></button>
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pause"></span></button>
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-stop"></span></button>
            </div>
        </div>
        
        
        <hr>
    </div><!-- container -->
			
		<hr> <!-- modal ex -->
		
		<div class="container">
        <div class="page-header">
            <h1>Bootstrap Modal Windows</h1>
            <p class="lead">Easy popup windows without needing to code any CSS or JS!</p>
        </div><!-- page-header -->
        
        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#updateCreditCard">Modal Example!</button>
        
        <!-- Modal -->
        <form class="modal fade" id="updateCreditCard">
            
            <div class="modal-dialog modal-lg">
            
                <div class="modal-content">
                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        <h4 class="modal-title"><span class="glyphicon glyphicon-star"></span> I'm an Example Modal Window</h4>
                    </div>
                    
                    <div class="modal-body">
                    
                        <h1>Modal Me</h1>
											
												<p>Pelt around the house and up and down stairs chasing phantoms jump launch to pounce upon little yarn mouse, bare fangs at toy run hide in litter box until treats are fed. Sit in window and stare ooo, a bird! yum hiss at vacuum cleaner so human is washing you why halp oh the horror flee scratch hiss bite bathe private parts with tongue then lick owner's face but lick sellotape and inspect anything brought into the house, yet thinking longingly about tuna brine. Refuse to leave cardboard box refuse to drink water except out of someone's glass. Russian blue chase red laser dot need to chase tail pelt around the house and up and down stairs chasing phantoms or stares at human while pushing stuff off a table. Poop in the plant pot. Stare at wall turn and meow stare at wall some more meow again continue staring if it smells like fish eat as much as you wish. Gate keepers of hell rub face on everything, for leave dead animals as gifts, and touch water with paw then recoil in horror. Vommit food and eat it again hate dog my left donut is missing, as is my right. Has closed eyes but still sees you sleep on dog bed, force dog to sleep on floor. Where is my slave? I'm getting hungry ears back wide eyed and get video posted to internet for chasing red dot but lick the other cats stretch, and hola te quiero. I like big cats and i can not lie chase after silly colored fish toys around the house. Paw at your fat belly tuxedo cats always looking dapper and paw at beetle and eat it before it gets away. Cat is love, cat is life. Scratch the box cat slap dog in face, ears back wide eyed. Swat turds around the house jump launch to pounce upon little yarn mouse, bare fangs at toy run hide in litter box until treats are fed gnaw the corn cob, so lick butt, or sit on the laptop for hunt by meowing loudly at 5am next to human slave food dispenser lick plastic bags. Claw drapes. Asdflkjaertvlkjasntvkjn (sits on keyboard) stand in front of the computer screen, asdflkjaertvlkjasntvkjn (sits on keyboard). Behind the couch ignore the squirrels, you'll never catch them anyway. Stares at human while pushing stuff off a table sit on human for sit on the laptop. Present belly, scratch hand when stroked stares at human while pushing stuff off a table. Bathe private parts with tongue then lick owner's face i like big cats and i can not lie mew but sit on human sit in box thinking longingly about tuna brine sit in box. Meow for food, then when human fills food dish, take a few bites of food and continue meowing get video posted to internet for chasing red dot why must they do that meowzer!, brown cats with pink ears jump off balcony, onto stranger's head. 

</p>

                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                
                </div>
                
            </div>
            
        </form>
        
    </div><!-- container -->
			
		<hr><!-- tabs -->
			
		<div class="container">
        <div class="page-header">
            <h1>Bootstrap Togglable Tabs</h1>
            <p class="lead">The tabs are strong with this one!</p>
        </div><!-- page-header -->
        
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#about" role="tab" data-toggle="tab">About Product</a></li>
            <li><a href="#specs" role="tab" data-toggle="tab">Product Specs</a></li>
            <li><a href="#reviews" role="tab" data-toggle="tab">Reviews</a></li>
            <li><a href="#purchase" role="tab" data-toggle="tab">Purchase</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="about">
                <h2>About product</h2>
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue.Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue.</p>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="specs">
                <h2>Product specs</h2>
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue.Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue.</p>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="reviews">
                <h2>Reviews</h2>
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue.</p>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="purchase">
                <h2>Purchase</h2>
                <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue.Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue.</p>
            </div>
        </div>
        
    </div><!-- container -->

      

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
  </body>
</html>