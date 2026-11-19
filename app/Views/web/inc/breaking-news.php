<!-- =========================
     FULL WIDTH BREAKING NEWS
========================= -->

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

.breaking-news-bar{
    width:100%;
    background:linear-gradient(90deg,#0389c6,#0f172a);
    overflow:hidden;
    position:relative;
    height:55px;
    display:flex;
    align-items:center;
    border-top:2px solid rgba(255,255,255,0.08);
    border-bottom:2px solid rgba(255,255,255,0.08);
    box-shadow:0 4px 12px rgba(0,0,0,0.15);
    z-index:99;
}

/* LEFT LABEL */

.breaking-news-title{
    min-width:220px;
    height:55px;
    background:#ff003c;
    color:#fff;
    font-size:15px;
    font-weight:700;
    text-transform:uppercase;
    display:flex;
    align-items:center;
    justify-content:center;
    letter-spacing:1px;
    position:relative;
    z-index:2;
    box-shadow:0 0 15px rgba(255,0,60,0.4);
    flex-shrink:0;
}

.breaking-news-title::after{
    content:'';
    position:absolute;
    right:-20px;
    top:0;
    width:0;
    height:0;
    border-top:27.5px solid transparent;
    border-bottom:27.5px solid transparent;
    border-left:20px solid #ff003c;
}

/* NEWS AREA */

.breaking-news-scroll{
    position:relative;
    width:100%;
    overflow:hidden;
    height:55px;
    display:flex;
    align-items:center;
}

/* TRACK */

.breaking-news-track{
    display:flex;
    align-items:center;
    white-space:nowrap;
    width:max-content;

    /* START IMMEDIATELY */
    animation: tickerMove 70s linear infinite;
}

/* ENDLESS SMOOTH LOOP */

@keyframes tickerMove{
    0%{
        transform:translateX(0);
    }
    100%{
        transform:translateX(-50%);
    }
}

/* NEWS ITEM */

.breaking-news-track span{
    color:#fff;
    font-size:15px;
    font-weight:500;
    margin-right:80px;
    position:relative;
    padding-left:22px;
    flex-shrink:0;
}

.breaking-news-track span::before{
    content:'●';
    color:#00ffae;
    position:absolute;
    left:0;
    top:0;
    font-size:13px;
}

.breaking-news-track strong{
    color:#ffd700;
    font-weight:700;
}

/* PAUSE ON HOVER */

.breaking-news-bar:hover .breaking-news-track{
    animation-play-state:paused;
}

/* MOBILE */

@media(max-width:768px){

    .breaking-news-bar{
        height:50px;
    }

    .breaking-news-title{
        min-width:140px;
        font-size:12px;
        height:50px;
        padding:0 10px;
    }

    .breaking-news-title::after{
        border-top:25px solid transparent;
        border-bottom:25px solid transparent;
    }

    .breaking-news-track span{
        font-size:13px;
        margin-right:45px;
    }

}

</style>

<!-- =========================
     BREAKING NEWS HTML
========================= -->

<div class="breaking-news-bar">

    <!-- LEFT SIDE LABEL -->

    <div class="breaking-news-title">
      *  Breaking News  *
    </div>

    <!-- SCROLLING NEWS -->

    <div class="breaking-news-scroll">

        <div class="breaking-news-track">

            <!-- ORIGINAL -->

            <span>
                <strong>Nursing Admission Open 2026-27</strong> – Apply Now for GNM & B.Sc Nursing
            </span>
            
              <span>
                <strong>GDA Course under 3499/-* per month </strong> – Apply Now Limited Seats 2026-27
            </span>
            
             <span>
                <strong>GNM Course under 7999/-* per month </strong> – Apply Now Limited Seats 2026-27
            </span>
            
             <span>
                <strong>B.VOC Course under 5999/-* per month </strong> – Apply Now Limited Seats 2026-27
            </span>

            <span>
                <strong>100% Placement Assistance</strong> Available for Healthcare Students
            </span>

            <span>
                New Batch Started for <strong>German Language Training</strong>
            </span>

            <span>
                <strong>Scholarship Available</strong> for Eligible Students
            </span>

            <span>
                DHCI India launches <strong>Advanced Healthcare Training Program</strong>
            </span>

            <!-- DUPLICATE FOR ENDLESS LOOP -->

              <span>
                <strong>Nursing Admission Open 2026-27</strong> – Apply Now for GNM & B.Sc Nursing
            </span>
            
              <span>
                <strong>GDA Course under 3499/-* per month</strong> – Apply Now Limited Seats 2026-27
            </span>
            
             <span>
                <strong>GNM Course under 7999/-* per month </strong> – Apply Now Limited Seats 2026-27
            </span>
            
             <span>
                <strong>B.VOC Course under 5999/-*per month </strong> – Apply Now Limited Seats 2026-27
            </span>

            <span>
                <strong>100% Placement Assistance</strong> Available for Healthcare Students
            </span>

            <span>
                New Batch Started for <strong>German Language Training</strong>
            </span>

            <span>
                <strong>Scholarship Available</strong> for Eligible Students
            </span>

            <span>
                DHCI India launches <strong>Advanced Healthcare Training Program</strong>
            </span>
        </div>

    </div>

</div>