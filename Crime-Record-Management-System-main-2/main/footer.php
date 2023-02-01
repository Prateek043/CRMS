<footer>
        <p class="para">Copyright © <span id="year">2018</span> All Rights Reserved</p>
    </footer>
    <script src="jquery.counterup.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script>
jQuery(document).ready(function($) {
      $('.counter').counterUp({
          delay: 10,
          time: 1000
      })
  })
</script>
<script>
const year=document.getElementById('year');
const data=new Date();
year.innerText=data.getFullYear();
    </script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- ****************************scroll btn**************************** -->
<script>
 mybutton=document.getElementById("myBtn");
 window.onscroll=function() {scrollFunction()};

 function scrollFunction(){
     if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
         mybutton.style.display="block";
     } else {
         mybutton.style.display="none";
     }
     }
     function topfunction(){
         document.body.scrollTop=0;
         document.documentElement.scrollTop=0;
     }
 
  </script>