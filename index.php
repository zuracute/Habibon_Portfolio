<?php include('includes/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>USER PORTFOLIO | FAIZER</title>

        <!-- <link rel="stylesheet" href="external/cute.css"> -->
        <link rel="stylesheet" href="external/style1.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
        <!-- another font yan ah -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-MgGCm+HzqLEdbapJkWk0Pd8IFVD5MddEMgqQmTJRuY7iH9sPAVBMXExjfJcuLpqD8B8RjWd6ebB6gmqK/iEzYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-MgGCm+HzqLEdbapJkWk0Pd8IFVD5MddEMgqQmTJRuY7iH9sPAVBMXExjfJcuLpqD8B8RjWd6ebB6gmqK/iEzYg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lora:ital,wght@0,400..700;1,400..700&family=Noto+Serif+KR&family=Oswald:wght@200..700&family=Permanent+Marker&family=Ultra&display=swap" rel="stylesheet">
                <link
                
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Oswald:wght@200..700&family=Permanent+Marker&family=Ultra&display=swap" rel="stylesheet">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link
                href="https://fonts.googleapis.com/css2?family=Oswald&family=Raleway&display=swap"
                rel="stylesheet">

            <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Gabarito:wght@400..900&family=League+Gothic&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lora:ital,wght@0,400..700;1,400..700&family=Nosifer&family=Noto+Serif+KR&family=Oswald:wght@200..700&family=Permanent+Marker&family=Rubik+Lines&family=Ultra&display=swap" rel="stylesheet">
                <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&family=Permanent+Marker&family=Ultra&display=swap" rel="stylesheet">
                   
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var offcanvasTop = new bootstrap.Offcanvas(document.getElementById('offcanvasTop'));
                
                        var navbarToggler = document.querySelector('.navbar-toggler');
                
                        navbarToggler.addEventListener('click', function () {
                            if (offcanvasTop._isShown) {
                                offcanvasTop.hide();
                            } else {
                                offcanvasTop.show();
                            }
                        });
                    });
                </script>
                
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="d-flex left-part">
                    <a class="navbar-brand" href="index.html" data-aos="fade-right" delay="200"><h1>FH.</h1></a>
                </div>

              
                <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#offcanvasTop"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse "
                    id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto" data-aos="fade-in" delay="300">
                        <li class="nav-item" >
                            <a class="nav-link active" aria-current="page"
                                href="index.php">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="index.php#education"
                                role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                RESUME
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php#skills-slider">PROGRAMMING/
                                        SKILLS</a></li>
                                <li><a class="dropdown-item" href="index.php#education">ESSAYS /
                                        ACHIEVEMENTS</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true"
                                href="index.php#Hbtitle">PROJECTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true"
                                href="index.php#aboutcute">ABOUT</a>
                        </li>
                    </ul>
                    <div class="d-flex right-part" data-aos="fade-left">
                        <a class="navbar-brand" href data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasTop"> <h1>
                                <i class="bi bi-list" data-aos ></i>
                            </h1></a>
                    </div>
                </div>
            </div>
        </nav>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
          AOS.init();

          import AOS from 'aos';
            import 'aos/dist/aos.css'; // You can also use <link> for styles
            // ..
            AOS.init();
        </script>
        
    </head>
    <body>

        
        <div class="script-container">
        <script>
            
            "use strict"; 
            const body = document.getElementsByTagName("body").item(0);
            body.style.background = "transparent";
            const TP=2*Math.PI;
            const CSIZE=500;

            const ctx=(()=>{
              let d=document.createElement("div");
              d.style.textAlign="center";
              body.append(d);
              let c=document.createElement("canvas");
              c.width=c.height=2*CSIZE;
              d.append(c);
              return c.getContext("2d");
            })();
            ctx.translate(CSIZE,CSIZE);
            ctx.lineCap="round";
            
            onresize=()=>{ 
              let D=Math.min(window.innerWidth,window.innerHeight)-30; 
              ctx.canvas.style.width=ctx.canvas.style.height=D+"px";
            }
            
            const getRandomInt=(min,max,low)=>{
              if (low) return Math.floor(Math.random()*Math.random()*(max-min))+min;
              else return Math.floor(Math.random()*(max-min))+min;
            }
            
            function Color() {
              const CBASE=144;
              const CT=255-CBASE;
              this.getRGB=(ct)=>{
               let red=Math.round(CBASE+CT*(Math.cos(this.RK2+ct/this.RK1)));
               let grn=Math.round(CBASE+CT*(Math.cos(this.GK2+ct/this.GK1)));
               let blu=Math.round(CBASE+CT*(Math.cos(this.BK2+ct/this.BK1)));
                return "rgb("+red+","+grn+","+blu+")";
              }
              this.randomize=()=>{
                this.RK1=360+360*Math.random();
                this.GK1=360+360*Math.random();
                this.BK1=360+360*Math.random();
                this.RK2=TP*Math.random();
                this.GK2=TP*Math.random();
                this.BK2=TP*Math.random();
              }
              this.randomize();
            }
            
            var color=new Color();
            
            var stopped=true;
            var start=()=>{
              if (stopped) { 
                stopped=false;
                requestAnimationFrame(animate);
              } else {
                stopped=true;
              }
            }
            body.addEventListener("click", start, false);
            
            var dur=2000;
            var tt=getRandomInt(0,1000);
            var pause=0;
            var trans=false;
            var animate=(ts)=>{
              if (stopped) return;
              tt++;
              draw();
              requestAnimationFrame(animate);
            }
            
            var KF=Math.random();
            
            var Circle=function() { 
              this.dir=false;
              this.r=80;
              this.randomize=()=>{ 
                this.ka=0; //TP*Math.random();
            this.ka2=200;
              }
              this.randomize();
              this.setRA=()=>{
            this.a2=TP/4+1.57*(1+Math.sin(tt/this.ka2))/2;
                if (this.dir) this.a2=-this.a2;
              }
              this.setPath2=()=>{
                if (this.p) {
                  if (this.cont) {
                this.a=TP/2+this.p.a-this.p.a2;
                this.x=this.p.x+(this.p.r-this.r)*Math.cos(this.p.a-this.p.a2);
                this.y=this.p.y+(this.p.r-this.r)*Math.sin(this.p.a-this.p.a2);
                  } else {
                this.a=this.p.a-this.p.a2;
                this.x=this.p.x+(this.p.r+this.r)*Math.cos(this.p.a-this.p.a2);
                this.y=this.p.y+(this.p.r+this.r)*Math.sin(this.p.a-this.p.a2);
                  }
                } else {
                  this.x=this.r*Math.cos(this.a);
                  this.y=this.r*Math.sin(this.a);
                }
                this.path=new Path2D();
                this.path.arc(this.x,this.y,this.r,TP/2+this.a,this.a-this.a2,this.dir);
              }
            }
            
            onresize();
            
            var ca=[];
            var reset=()=>{
              ca=[new Circle()];
              ca[0].p=false;
              ca[0].a=0; //TP*Math.random();
              ca[0].setRA();
              ca[0].x=ca[0].r*Math.cos(ca[0].a);
              ca[0].y=ca[0].r*Math.sin(ca[0].a);
            }
            reset();
            
            var addCircle=(c)=>{
              let c2=new Circle();
              c2.a=c.a-c.a2;
              c2.dir=!c.dir;
              c2.p=c;
              c2.cont=false;
              c2.r=c.r*0.8;
            if (Math.random()<KF)
            c2.ka2=c.ka2*0.8;
              ca.push(c2);
              let c3=new Circle();
              c3.a=TP/2+c.a-c.a2;
              c3.dir=c.dir;
              c3.p=c;
              c3.cont=true;
              c3.r=c.r*0.8;
            if (Math.random()<1-KF)
            c3.ka2=c.ka2*0.8;
              ca.push(c3);
            }
            
            const dmx=new DOMMatrix([-1,0,0,1,0,0]);
            const dmy=new DOMMatrix([1,0,0,-1,0,0]);
            const dmxy=new DOMMatrix([-1,0,0,-1,0,0]);
            //const dmq=new DOMMatrix([0,1,-1,0,0,0]);
            const getXYPath=(spath)=>{
              this.level=1;
              let p=new Path2D(spath);
              p.addPath(p,dmxy);
              return p;
            }
            
            var draw=()=>{
              ca[0].a=tt/1000;
              for (let i=0; i<ca.length; i++) ca[i].setRA();
              for (let i=0; i<ca.length; i++) ca[i].setPath2();
              let pa=new Array(8);
              for (let i=0; i<pa.length; i++) pa[i]=new Path2D();
              for (let i=0; i<ca.length; i++) {
                if (i==0) pa[0].addPath(ca[i].path);
                else if (i<3) pa[1].addPath(ca[i].path);
                else if (i<7) pa[2].addPath(ca[i].path);
                else if (i<15) pa[3].addPath(ca[i].path);
                else if (i<31) pa[4].addPath(ca[i].path);
                else if (i<63) pa[5].addPath(ca[i].path);
                else if (i<127) pa[6].addPath(ca[i].path);
                else pa[7].addPath(ca[i].path);
              }
              ctx.clearRect(-CSIZE,-CSIZE,2*CSIZE,2*CSIZE);
            
              for (let i=0; i<pa.length; i++) {
                let pth=getXYPath(pa[i]);
                ctx.strokeStyle=color.getRGB(tt-180*i);
                ctx.lineWidth=Math.max(3, 24-3*i);
                ctx.stroke(pth);
              }
            }
            
            for (let i=0; i<127; i++) addCircle(ca[i]);
            
            start();
                        </script>
        </div>

        <script>
            AOS.init();
     </script>


<?php
$sql = "SELECT header_nickname FROM achievements WHERE category = 'header'";
$stmt = $conn->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$headerNickname = $row['header_nickname'] ?? '';

?>

<div class="container-fluid main-content">
    <h1 class="intro-text" data-aos="zoom-in" delay="200"><?php echo $headerNickname; ?></h1>
</div>

        
             <div id="animated-background"></div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var offcanvasElement = document.getElementById('offcanvasRight');
                var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
        
                var closeButtons = document.querySelectorAll('.btn-close');
                closeButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        offcanvas.hide();
                    });
                });
            });
         
      </script>
        
        <div class="project-title" id="project-title" data-aos="fade-right" delay="600">
                <h1>My<br> Achievements</h1>
            </div>
        <div class="project-container" data-aos="zoom-in" delay="200">
    <div id="carousel">
  <?php
        // Fetch data from the database for achievements with images
        $sql = "SELECT A_title, A_image FROM achievements WHERE A_image IS NOT NULL AND A_image <> ''";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Define the image filename without the path
            $imageFilename = $row['A_image'];
            echo '<figure>';
            // Set the image source to "../admin/uploads/" concatenated with the filename
            echo '<img src="admin/' . $imageFilename . '" alt="' . $row['A_title'] . '">';
            echo '<figcaption>' . $row['A_title'] . '</figcaption>';
            echo '</figure>';
        }
        ?>
    </div>
</div>

<div class="container-fluid services-content">
    <div class="row text-center">
        <?php
        // Fetch data from the database for achievements with intro details
        $sql = "SELECT intro_title, intro_role, intro_description FROM achievements WHERE intro_title IS NOT NULL AND intro_title <> '' AND intro_role IS NOT NULL AND intro_role <> '' AND intro_description IS NOT NULL AND intro_description <> ''";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="col-md-3 col-side">';
            echo '<h1 class="prog" data-aos="fade-right" data-aos-delay="500">' . $row['intro_title'] . '</h1>';
            echo '<h5 class="prog-content" data-aos="zoom-in" data-aos-delay="500">' . $row['intro_role'] . '</h5>';
            echo '<p class="col-content" data-aos="zoom-in" data-aos-delay="500">' . $row['intro_description'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>

                            
                    
<section id="aboutcute">
    <?php
    // Fetch about data from the database
    $sql = "SELECT * FROM about";
    $stmt = $conn->query($sql);
    $count = 0; // Variable to track the iteration count
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $count++; // Increment the count for each iteration
        ?>
        <div class="container-fluid container-about">
            <div class="row about-me">
                <?php if ($count % 2 == 1) { // Check if the count is odd ?>
                    <div class="col-md right-side">
                        <h3 class="local" data-aos="fade-down-right" data-aos-delay="500"><?php echo $row['about_title']; ?></h3>
                        <h1 class="web-dev" data-aos="fade-down-right" data-aos-delay="500"><?php echo $row['about_role']; ?></h1>
                        <p class="local-text" data-aos="fade-down" data-aos-delay="500"><?php echo $row['about_description']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <div class="gallery" data-aos="fade-down" data-aos-delay="500">
                            <img data-aos="zoom-in-up" data-aos-delay="500" src="admin/<?php echo $row['about_image']; ?>" class="img-fluid img-outside" style="width: 90%; height: 110%;">
                        </div>
                    </div>
                <?php } else { // If the count is even ?>
                    <div class="col-md-6">
                        <div class="gallery" data-aos="fade-down-right" data-aos-delay="500">
                            <img data-aos="zoom-in-up" data-aos-delay="500" src="admin/<?php echo $row['about_image']; ?>" class="img-fluid img-outside" style="width: 90%; height: 110%;">
                        </div>
                    </div>
                    <div class="col-md right-side">
                        <h3 data-aos="fade-down-right" data-aos-delay="500" class="local"><?php echo $row['about_title']; ?></h3>
                        <h1 data-aos="fade-down-right" data-aos-delay="500" class="web-dev"><?php echo $row['about_role']; ?></h1>
                        <p data-aos="fade-down-right" data-aos-delay="500" class="local-text"><?php echo $row['about_description']; ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</section>

           
<div class="container-fluid container-languages" data-aos="fade-down" data-aos-delay="500">
    <section class="splide" id="skills-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                // Fetch skills data from the database
                $sql = "SELECT * FROM skills";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <li class="splide__slide">
                        <div class="col-sm-4 mx-auto">
                            <img src="admin/<?php echo $row['skills_image']; ?>" class="img-fluid" style="width: 200px; height: 200px;">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#skills-slider', {
            type       : 'loop',
            perPage    : 3, 
            autoplay   : true,
            interval   : 2000, 
            pauseOnHover: false 
        }).mount();
    });
</script>


<style>
                .splide__pagination__page{
                    display: none;
                }
                .splide__arrow{
                    display: none;
                }
                .splide__slide {
                    width: 200px; 
                    display: inline-block;
                }

            </style>
            
            <div id="education" class="education">
            <div class="container-fluid container-education">
                <div class="col-md-6">
                    <div class="education-cute">
                    <?php
                        $sql = "SELECT * FROM education_d";
                        $stmt = $conn->query($sql);
                        $education_item = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                <img data-aos="zoom-in-up" data-aos-delay="500" src="admin/<?php echo $education_item['image']; ?>" class="img-fluid" id="education-image-preview">
                <h1 data-aos="fade-down" data-aos-delay="500"><?php echo $education_item['title']; ?></h1>
                 </div>
                </div>

        <div class="educ-number" data-aos="zoom-in-up" data-aos-delay="500">
            <?php
            $sql = "SELECT COUNT(*) AS total FROM educatio"; 
            $stmt = $conn->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $total_entries = $row['total'];
            for ($i = 1; $i <= $total_entries; $i++) {
                echo '<div class="col-md">';
                echo '<div class="circle-text">';
                echo '<h1>' . $i . '</h1>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <div class="educ-lavel" data-aos="fade-down-left" data-aos-delay="500">
    <?php
    $sql = "SELECT education_levels FROM educatio";
    $stmt = $conn->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $level = $row['education_levels'];
        echo '<div class="col-md">';
        echo '<div class="level-text">';
        echo '<h1>' . $level . '</h1>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>

        <div class="educ-achievement" data-aos="flip-left" data-aos-delay="500">
            <div class="year">
                <?php
                $sql = "SELECT * FROM educatio";
                $stmt = $conn->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md">';
                    echo '<div class="list">';
                    echo '<h1 class="education-dev">' . htmlspecialchars($row['education_school']) . '</h1>';
                    echo '<p class="education-title">' . htmlspecialchars($row['education_year']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

          
                <!-- <div id="technical" class="technical">
                    <div class="vertical-text" data-aos="zoom-in-up" data-aos-delay="500" >TECHNICAL SKILLS</div>
                    <div class="empty-row">
                        <div class="skill" data-aos="fade-down" data-aos-delay="500">
                            <h1>Programming</h1>
                            <h1>Network Security</h1>
                            <h1>Cryptanalysis</h1>
                            <h1>System Administration</h1>
                        </div>
                    </div>
                    
                        <div class="empty-row">
                        <div class="skill" data-aos="fade-up" data-aos-delay="500">
                            <h1>Data Analysis</h1>
                            <h1>Risk Assessment</h1>
                            <h1>Incident Response</h1>
                            <h1>Problem-Solving</h1>
                        </div>
                    </div>
                    <div class="opposite-vertical-text" data-aos="zoom-in-up" data-aos-delay="500">ANALYTICAL SKILLS</div>
                </div> -->
                <style>
                    .Hbtitle{
                        text-align: center;
                        font-optical-sizing: auto;
                        font-family: "ultra", serif;
                        font-style: normal;
                        font-weight: 300;
                        font-size: 50px;
                        margin-top: 250px;
                    }
                </style>


<?php

// Fetch gallery items from the database
$sql = "SELECT * FROM gallery";
$stmt = $conn->query($sql);
$gallery_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="Hbtitle" class="Hbtitle">
    <p data-aos="zoom-in-up" data-aos-delay="500">PROJECTS AND HOBBIES</p>
</div>
<section class="game-section">
    <h2 class="line-title" data-aos="fade-left" data-aos-delay="500">DRAG AND VIEW</h2>
    <div class="owl-carousel custom-carousel owl-theme" data-aos="zoom-in-up" data-aos-delay="500">
        <?php foreach ($gallery_items as $item) : ?>
            <div class="item" style="background-image: url(admin/<?php echo $item['gallery_image']; ?>);">
                <div class="item-desc">
                    <h3><?php echo $item['gallery_title']; ?></h3>
                    <p><?php echo $item['gallery_description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

         

<?php include('contact.php'); ?>

<div class="contact">
    <h1 data-aos="fade-down" data-aos-delay="500">CONTACT ME!</h1>

    <div class="card" data-aos="zoom-in-up" data-aos-delay="500">
        <div class="container-fluid work-with-me-container">
        <?php if ($contact_info && isset($contact_info['email'])): ?>
                <h5>Want to work with me? Send me a mail <a class="email" href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a></h5>
            <?php else: ?>
                <h5>No contact information available. Please check back later.</h5>
            <?php endif; ?>
      </div>
      <?php if ($updateSuccess): ?>
        <div class="alert alert-success mt-3" role="alert" style="width: 50%; margin: auto;" id="success-message">Message sent successfully!</div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').remove();
            }, 6000);
        </script>
    <?php endif; ?>

    <?php if ($updateError): ?>
        <div class="alert alert-danger mt-3" role="alert">Failed to send message. Please try again.</div>
    <?php endif; ?>
        <form method="POST">
            <div class="input-div">
                <input type="text" class="input" name="email" placeholder="Email">
            </div>
            <div class="input-div">
                <input class="input" type="text" name="phone" placeholder="Phone">
            </div>
            <div class="input-div">
                <input class="input" type="text" name="message" placeholder="Message">
            </div>
            <div class="button-div">
                <button type="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>

        <?php
        $sql = "SELECT * FROM socials";
        $stmt = $conn->query($sql);
        $socials = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

            <div class="socials" data-aos="flip-left" data-aos-delay="500">
                <ul>
                    <?php foreach ($socials as $social): ?>
                        <li>
                            <a class="<?php echo $social['platform']; ?>" href="<?php echo $social['url']; ?>">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <?php if ($social['platform'] === 'facebook'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                                    </svg>
                                <?php elseif ($social['platform'] === 'twitter'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path d="M16 5.517a6.5 6.5 0 0 1-1.885.518 3.291 3.291 0 0 0 1.444-1.815 6.574 6.574 0 0 1-2.08.795 3.281 3.281 0 0 0-5.601 2.985c0 .257.028.51.053.756A9.353 9.353 0 0 1 1.112 4.99a3.28 3.28 0 0 0 1.017 4.381 3.288 3.288 0 0 1-1.487-.411v.041c0 1.328.943 2.436 2.192 2.69a3.301 3.301 0 0 1-.868.116c-.212 0-.416-.021-.616-.058.416 1.257 1.623 2.171 3.052 2.197a6.591 6.591 0 0 1-4.84 1.338c-.314 0-.624-.019-.928-.057 1.728 1.107 3.777 1.754 5.98 1.754 7.174 0 11.083-5.946 11.083-11.083 0-.169-.004-.337-.012-.503.76-.55 1.424-1.237 1.946-2.021z"/>
                                    </svg>
                                <?php elseif ($social['platform'] === 'instagram'): ?>
                                    <svg class="instagram-icon" viewBox="0 0 24 24" width="25" height="29" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" fill="#0F0F0F"></path>
                                            <path d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z" fill="#0F0F0F"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z" fill="#0F0F0F"></path>
                                        </svg>
                                <?php elseif ($social['platform'] === 'google'): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="gmail-icon" viewBox="0 0 16 16">
                                        <path d="M8 1a7 7 0 0 1 7 7 7 7 0 0 1-14 0A7 7 0 0 1 8 1zm6.5 2a.5.5 0 0 1 .5.5v.034a6.502 6.502 0 0 1-.5 12.964.5.5 0 0 1-.5-.5V3.5a.5.5 0 0 1 .5-.5zM8 4.393L2.5 7.682v6.182a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V7.682L8 4.393zM1.543 6.491A1.5 1.5 0 0 1 2.5 6.034h11a1.5 1.5 0 0 1 .957.457l-5.473 3.15a.5.5 0 0 1-.484 0L1.543 6.491z"/>
                                    </svg>
                                    
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            </div>
            </div>

            </body>

        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
            <div class="offcanvas-body">
                <div class="cardcute">
                    <p><span><a href="index.php#Hbtitle"></a>HOME</span></p>
                    <p><span><a href="index.php#aboutcute"></a>ABOUT ME</span></p>
                    <p><span><a href="index.php#Hbtitle"></a>PROJECTS</span></p>
                    <p><span><a href="index.php#Hbtitle"></a>RESUME</span></p>
                    <p><span><a href="index.php#Hbtitle"></a>CONTACT ME</span></p>
                </div>
            </div>
        </div>
        
        <footer>
    
        </footer>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
                crossorigin="anonymous"></script>
        
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
        var splide = new Splide( '.splide', {
      type   : 'loop',
      perPage: 3,
      focus  : 'center',
      arrows: false,
    } );
    
    splide.mount();
    </script>
    <script>
        $(document).ready(function () {
            $('.col-hover').hover(
                function () {
                    $(this).find('.hover-text').show();
                },
                function () {
                    $(this).find('.hover-text').hide();
                }
            );
        });
    </script>
         <!--  jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--  Owl Carousel CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script>
            $(document).ready(function () {
            $(".custom-carousel").owlCarousel({
                autoWidth: true,
                loop: true,
                autoplay: true, // Enable autoplay
                autoplayTimeout: 5000, // Set autoplay timeout in milliseconds (e.g., 5 seconds)
                autoplaySpeed: 1000, // Set autoplay speed in milliseconds (e.g., 1 second)
                rewind: true, // Enable rewind to the beginning when reaching the end
            });
        
            $(".custom-carousel .item").click(function () {
                $(".custom-carousel .item").not($(this)).removeClass("active");
                $(this).toggleClass("active");
            });
            });
        </script>
        
        
        <style>
            .cardcute {
                width: 100%;
                height: 100%;
                border-radius: 4px;
                background: #212121;
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                padding: .5em;
            }

            .cardcute p {
                flex: 1;
                overflow: hidden;
                cursor: pointer;
                border-radius: 2px;
                transition: all .5s;
                background: #212121;
                border: 1px solid #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0;
            }

            .cardcute p:hover {
                flex: 4;
            }

            .cardcute p span {
                min-width: 14em;
                padding: .5em;
                text-align: center;
                transform: rotate(-90deg);
                transition: all .5s;
                text-transform: uppercase;
                color: #ffffff;
                letter-spacing: .1em;
                font-size: 70px;
                /* font-family: "Ultra", serif;
                font-weight: 400;
                font-style: normal; */
                font-family: "Lora", serif;
                font-optical-sizing: auto;
                font-style: normal;
                font-weight: bolder;
            }

            .cardcute p:hover span {
                transform: rotate(0);
                color: rgb(255, 234, 0);
            }
            .artworks {
                margin-top: 10%;
            }

            #aboutcute {
                margin-top: 10%;
            }
            .offcanvas-header {
            background-color: #f8f9fa!important;
        
            padding: 10px!important;
            }
            .offcanvas{
                height: 100vh!important;
            }
        </style>

<style>
    .vertical-text {
         writing-mode: vertical-rl; /* vertical writing mode */
         text-orientation: mixed; /* upright text orientation */
         transform: rotate(180deg); /* rotate the text */
         font-size: 24px; /* adjust font size as needed */
         font-weight: bold; /* optional: adjust font weight */
         margin: 20px 0; /* optional: adjust margin */
         text-align: center;
         font-optical-sizing: auto;
         font-family: "ultra", serif;
         font-style: normal;
         font-weight: 300;
         font-size: 60px;
     
     }
     #technical{
         height: 100vh;
         margin-top: 50px;
     }
     .empty-row {
         width: 35%; /* Adjust the width of the empty columns */
         height: 100%; /* Adjust the height of the empty columns */
         margin: auto;
         border: 5px solid black; /* Optional: Add border for better visibility */
     }
     .technical {
         display: flex;
         flex-direction: row;
         align-items: center;
      }
      .opposite-vertical-text{
         writing-mode: vertical-rl; /* vertical writing mode */
         text-orientation: mixed; /* upright text orientation */
         transform: rotate(360deg); /* rotate the text */
         font-size: 24px; /* adjust font size as needed */
         font-weight: bold; /* optional: adjust font weight */
         margin: 20px 0; /* optional: adjust margin */
         text-align: center;
         font-optical-sizing: auto;
         font-family: "ultra", serif;
         font-style: normal;
         font-weight: 300;
         font-size: 58px;
      }
      .skill{
         font-optical-sizing: auto;
         font-family: "serif", serif;
         font-style: normal;
         font-weight: 300;
         text-align: center;
         margin-top: 100px;
      }
      #technical{
         margin-top: 20  0px;
      }
 </style>
                 <style>
                    .socials{
                        position: relative;
                        height: 25vh;
                        /* background-color: rgba(233, 233, 233, 0.961); */
                    }
                   .socials ul {
                        position: absolute;
                        top:50%;
                        left:50%;
                        transform:translate(-50%,-50%);
                        margin:0;
                        padding:0;
                        display:flex;
                    }
                    .instagram-icon {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        transition: background 0.8s ease;
                        background: transparent; 
                    }
            
                    .instagram:hover .instagram-icon {
                        background: #ff5ddc; /* Background color on hover */
                    }
                    .socials ul li {
                        list-style:none;
                    }
                    .socials ul li a {
                        display:block;
                        position:relative;
                        width:100px;
                        height:100px;
                        line-height:80px;
                        font-size:40px;
                        text-align:center;
                        text-decoration:none;
                        color:#696464;
                        margin: 0 30px;
                        transition:.5s;
                    }
                    .socials ul li a span {
                        position:absolute;
                        transition: transform .5s;
                    }
                    .socials ul li a span:nth-child(1),
                    .socials ul li a span:nth-child(3){
                        width:100%;
                        height:3px;
                    }
                    .socials ul li a span:nth-child(1) {
                        top:0;
                        left:0;
                        transform-origin: right;
                    }
                    .socials ul li a:hover span:nth-child(1) {
                        transform: scaleX(0);
                        transform-origin: left;
                        transition:transform .5s;
                    }
            
                    .socials ul li a span:nth-child(3) {
                        bottom:0;
                        left:0;
                        transform-origin: left;
                    }
                    .socialsul li a:hover span:nth-child(3) {
                        transform: scaleX(0);
                        transform-origin: right;
                        transition:transform .5s;
                    }
            
                    .socials ul li a span:nth-child(2),
                    .socials ul li a span:nth-child(4){
                        width:3px;
                        height:100%;
                        background:#404040;
                    }
                    .socials ul li a span:nth-child(2) {
                        top:0;
                        left:0;
                        transform:scale(0);
                        transform-origin: bottom;
                    }
                    .socials ul li a:hover span:nth-child(2) {
                        transform: scale(1);
                        transform-origin: top;
                        transition:transform .5s;
                    }
                    ul li a span:nth-child(4) {
                        top:0;
                        right:0;
                        transform:scale(0);
                        transform-origin: top;
                    }
                    .socials ul li a:hover span:nth-child(4) {
                        transform: scale(1);
                        transform-origin: bottom;
                        transition:transform .5s;
                    }
            
                    .facebook:hover {
                        color: #3b5998;
                    }
                    .facebook:hover span { 
                        background: #3b5998;
                    }
                    .twitter:hover {
                        color: #1da1f2;
                    }
                    .twitter:hover span { 
                        background: #1da1f2;
                    }
                    .instagram:hover {
                        color: #c32aa3;
                    }
                    .instagram:hover span { 
                        background: #c32aa3;
                    }
                    .google:hover {
                        color: #dd4b39;
                    }
                    .google:hover span { 
                        background: #dd4b39;
                    }
                </style>
<style>
                .contact h1 {
                    font-family: "Rubik Lines", system-ui;
                    font-weight: 200;
                    font-style: normal;
                    font-size: 70px;
                    text-align: center;
                    }
                    .contact h2 {
                    font-family: "Rubik Lines", system-ui;
                    font-weight: 200;
                    font-style: normal;
                    font-size: 40px;
                    text-align: left;
                    margin-left: 50px;
                    }

                    .contact h3 {
                    font-family: "Rubik Lines", system-ui;
                    font-weight: 200;
                    font-style: normal;
                    font-size: 40px;
                    text-align: right;
                    margin-right: 50px;
                    }

                    .card {
                    height: 20rem;
                    background: transparent;
                    /* background-color: #b8b9bb; */
                    /* background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%); */
                    border-top-left-radius: 2rem;
                    border-bottom-right-radius: 2rem;
                    padding: 1rem;
                    /* box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px; */
                    transition: 0.5s ease-in-out;
                    }

                    .heading {
                    text-align: center;
                    font-weight: 600;
                    padding-top: 1rem;
                    font-size: large;
                    }

                    .input-div {
                    margin-top: 1rem;
                    text-align: center;
                    transition: 0.5s ease-in-out;
                
                    }

                    .card input {
                    background-color: transparent;
                    border: none;
                    border-bottom: 1px solid black;
                    width: 25rem;
                    padding: 8px;
                    outline: none;
                    }

                    .button-div {
                    text-align: center;
                    }

                    .submit {
                    margin-top: 3rem;
                    text-align: center;
                    padding: 8px 3rem;
                    border: none;
                    border-top-left-radius: 1rem;
                    border-bottom-right-radius: 1rem;
                    background-color: black;
                    color: white;
                    transition: 0.5s ease-in-out;
                    cursor: pointer
                    }

                    .submit:hover {
                    box-shadow: rgba(44, 43, 43, 0.664) 5px 5px, rgba(45, 45, 45, 0.3) 10px 10px, rgba(60, 59, 59, 0.2) 15px 15px, rgba(54, 53, 53, 0.1) 20px 20px, rgba(240, 46, 170, 0.05) 25px 25px;
                    }

                    .card input::placeholder {
                    color: black;
                    }

                    .input:focus {
                    transition: 0.2s ease-in-out;
                    box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
                    }

                    .input:hover {
                    transition: 0.2s ease-in-out;
                    box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
                    }
            </style>

            

<style>
    /* .main-content h1{
             font-family: "Rubik Lines", system-ui;
            font-weight: 700;
            font-style: oblique;
            font-size: 100px;
            text-align: center;

            } */
            .navbar{
                z-index: 1;
                }

            .offcanvas{
                width: 100%!important;
            }
            .offcanvas {
            transition: transform 0.3s ease-in-out;
        }

        .offcanvas-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 1.8rem;
        }

        .btn-close {
            font-size: 1.5rem;
            color: #6c757d;
        }
        
</style>