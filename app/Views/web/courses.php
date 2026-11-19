<?php include("inc/header.php"); ?>

 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18194245812">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-18194245812');
</script>

<!-- Event snippet for Submit lead form conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-18194245812/GZuLCMzW97UcELTR2OND'});
</script>

<?php

$type = $_GET['type'] ?? 'all';
?>

<style>
.small_pt{padding:60px 0;background:#f7f9fc;}
.section_title{text-align:center;margin-bottom:40px;}
.section_title h2{font-weight:700;color:#0f172a;}

.tabs{text-align:center;margin-bottom:30px;}
.tabs button{
    border:1px solid #ddd;
    background:#fff;
    padding:8px 20px;
    margin:5px;
    border-radius:6px;
    cursor:pointer;
}
.tabs .active{
    background:#0d3b82;
    color:#fff;
}

.row{display:flex;flex-wrap:wrap;margin:0 -10px;}
.col-lg-3,.col-md-4,.col-sm-6{padding:10px;}

.content_box{
    background:#fff;border-radius:14px;overflow:hidden;
    border:1px solid #eef2f7;transition:.3s;height:100%;
}
.content_box:hover{
    transform:translateY(-6px);
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

.content_img img{
    width:100%;height:180px;object-fit:cover;
}

.content_desc{padding:15px;}

.content_title a{
    font-size:15px;font-weight:600;
    color:#0f172a;text-decoration:none;
}
.content_title a:hover{color:#0d3b82;}

.meta{
    display:flex;justify-content:space-between;
    font-size:13px;margin:10px 0;color:#666;
}

.rating{font-size:14px;color:#f59e0b;}

.enquire_btn{
    display:block;text-align:center;padding:10px;
    border-top:1px solid #eee;color:#0d3b82;
    font-weight:600;text-decoration:none;
}
.enquire_btn:hover{background:#f1f5f9;}

@media (min-width:1200px){ .col-lg-3{width:25%;} }
@media (max-width:1199px){ .col-md-4{width:33.33%;} }
@media (max-width:768px){ .col-sm-6{width:50%;} }
@media (max-width:480px){ .col-sm-6{width:100%;} }



</style>

<section class="small_pt">
<div class="container">

<div class="section_title">
    <p>OUR COURSES</p>
    <h2>Delhi <span style="color:#0d3b82;">Healthcare Institute Courses</span></h2>
</div>


<div class="row">

<?php if(!empty($courses)){ ?>

<?php foreach($courses as $row):?>

<div class="col-lg-3 col-md-4 col-sm-6 course_card"
     data-category="<?= strtolower($row['course_type'] ?? 'certificate') ?>">

    <div class="content_box">

        <div class="content_img">
            <a href="<?=site_url('course_details/'.$row['slug'])?>">
                <img src="<?=site_url('public/'.$row['thumbnail'])?>">
            </a>
        </div>

        <div class="content_desc">

            <h4 class="content_title">
                <a href="<?=site_url('course_details/'.$row['slug'])?>">
                    <?= (strlen($row['name']) > 40)
                        ? substr($row['name'],0,40).'...'
                        : $row['name']; ?>
                </a>
            </h4>

            <div class="meta">
                <span>⏱ <?=$row['duration'] ?? '6 Months'?></span>
                <span>🎓 <?=$row['qualification'] ?? '12th'?></span>
            </div>

            <div class="rating">
                ⭐ <?=$row['rating'] ?? '4.7'?> 
                (<?=$row['reviews'] ?? '2.4K'?>)
            </div>

        </div>

        <a class="enquire_btn" href="<?=site_url('course_details/'.$row['slug'])?>">
            Enquire Now →
        </a>

    </div>

</div>

<?php endforeach;?>

<?php }else{?>

<div class="col-12 text-center">
    <h2>No Courses Found</h2>
</div>

<?php }?>

</div>
</div>
</section>

<!-- SCRIPT -->
<script>
let urlType = "<?= $type ?>";

function filterCourses(filter){
    document.querySelectorAll(".course_card").forEach(card=>{
        if(filter==="all"){
            card.style.display="block";
        }else{
            card.style.display = (card.dataset.category===filter) ? "block" : "none";
        }
    });
}

// page load pe filter
filterCourses(urlType);

// tab click
document.querySelectorAll(".tab_btn").forEach(btn=>{
    btn.addEventListener("click",function(){

        document.querySelectorAll(".tab_btn").forEach(b=>b.classList.remove("active"));
        this.classList.add("active");

        let filter = this.dataset.filter;
        filterCourses(filter);

        // URL change (optional)
        window.history.pushState({}, "", "?type="+filter);
    });
});
</script>

<?php include("inc/footer.php"); ?>