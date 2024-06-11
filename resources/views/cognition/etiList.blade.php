<!DOCTYPE html>
<html lang="en">
<head>
@include('cognition/MetricHPE')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.24.0/css/patternfly.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.24.0/css/patternfly-additions.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<style type="text/css">
#searchInput {
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 5px 12px 5px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

body {
   line-height: normal;
   padding: 10px 2px 2px 2px; 
}
 
a {
   color: black;
   text-decoration: none;
}

a:hover {
   color: black;
   text-decoration: none;
}


li {
  padding: 0px;
}

.hover {
   background-color: #eee;
}

.selected {
   background-color: #eee;
   font-weight: bold;
}


/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

</style>
<script>
function searchFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("etiList");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
</head>
<body style="background-color: white;">
<div class="container-fluid">
  <div class="row">
     <div class="col-md-3 pre-scrollable" id="list">
       <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Search ETIs in list...">

       <ul id="etiList" style="list-style-type: none; padding: 0; margin: 0; font-size: 15pt; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
        @foreach ($etis as $eti)
       <li style="font-size: 15pt;" id="{{ $eti->name }}">
           <span class="etiLine">
           <i hpe-svg-icon="dynamic" id="type" class="hpe-icon hpe-icon-blurry-fix hpe-icon-eti" ng-class="$ctrl.typeIcon" style="margin-right: 1rem; background-size: 0px; pointer-events: none;"><!--?xml version="1.0" encoding="utf-8"?-->
           <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve" focusable="false">
              <style type="text/css">
	       .st0{fill:#231F20;}
              </style>
              <g id="XMLID_1_">
              	<polygon id="XMLID_5_" points="15.354,2.354 14.646,1.646 11,5.293 11,3 10,3 10,7 14,7 14,6 11.707,6 	"></polygon>
              	<path id="XMLID_9_" d="M8.874,4H3.333l-2.514,8h2.041l-1,4h2.104l5.486-8H7.244L8.874,4z M7.551,9l-4.114,6H3.141l1-4
		H2.181l1.886-6h3.319l-1.63,4H7.551z"></path>
              </g> 
           </svg>
          </i>
          <span style="font-family: 'MetricHPE', 'Helvetica Neue', Helvetica, Arial, sans-serif; top: 0; bottom: 0; right: 1.6rem; padding: 0 0; font-size: 15px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="#">{{ $eti->label }}</a></span>
         </span>
       </li>
       @endforeach
       </ul>
       </div>
<div class="col-md-9" id="contentDiv">
<iframe id="content" frameBorder=0></iframe>
</div>
</div>
</div>
<div class="loading" id="loading">Loading&#8230</div>
<!-- Begin CDN Content for frameworks --> 
      <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/patternfly/3.27.5/js/patternfly.js"></script>
      <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
      <script src="/assets/js/c3.min.js"></script>
      <script src="/assets/js/d3.v3.js"></script>
      <script src="/assets/js/jquery.matchHeight-min.js"></script>
      <!-- End CDN Content for frameworks --> 

      
      <!-- Begin Stacked JavaScripts from template heirarchy --> 
      <script>
      </script>
      <!-- End Stacked JavaScripts from template heirarchy --> 


<script>

   $("li").hover(
      function() {
          $(this).addClass('hover');
      }, function() {
          $(this).removeClass('hover');
      }
   );
   $("li").click(
      function() {
          $("li").removeClass('selected');
          $(this).addClass('selected');
          console.log("/cognition/doc/eti/"+$(this).attr('id'));
          //$('#loading').css('display','block')
          //$('#content').hide()
          $.ajax({
             url: "/cognition/doc/eti/"+$(this).attr('id'),
             success: function(result) {
                $("#content").contents().find("body").html(result); 
             }
          });
          //$('#loading').css('display','none')
          //$("#content").contents().find("body").ready(function() {
           //   $('#content').show();
          //});
          
      }
   );

   $(document).ready(function() {
      $('#loading').css('display','none');
      $('#list').css("max-height", $(document).height()-20);
      $('#content').css("height", $(document).height()-20);
      $('#content').css("width", $("#contentDiv").width());
   });
  
   $(window).resize(function() {
      $('#list').css("max-height", $(document).height()-20);
      $('#content').css("height", $(document).height()-20);
      $('#content').css("width", $("#contentDiv").width());
   });

</script>



</body>
</html>
