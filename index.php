<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <!--
    Modified from the Debian original for Ubuntu
    Last updated: 2016-11-16
    See: https://launchpad.net/bugs/1288690
  -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>PHP Origin Tools</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="main_page">
      <div class="page_header floating_element">
       <img src="/tools.png" alt="Ubuntu Logo" class="floating_element"/> 
        <span class="floating_element">
          PHP Origin Tools</br>
          <?php echo date(DATE_RFC2822);?>
        </span>
      </div>
      <div class="content_section floating_element">
        <div class="section_header section_header_red">
          <div id="about"></div>
          Host name: <?php echo gethostname(); ?>
        </div>
        <div class="content_section_text">
          <p>
            This page provides some helpful tools to reflect headers and other data that is sent via GET requests.  This helps in
            troubleshooting application layer issues by providing visibility into the headers seen on the backend or origin behind various
            networking load balancers such as Azure Application Gateways, Content Delivery Network endpoints, or Azure Front Doors.
          </p>
        </div>
        <div class="section_header">
            <div id="requestheaders"></div>
            Request Headers
            </div>
        <div class="content_section_text">
          <?php
           # From https://www.php.net/manual/en/function.apache-request-headers.php
           $requestHeaders = apache_request_headers();

           foreach ($requestHeaders as $header => $value) {
            echo "$header: $value <br />\n";
           }
          ?>
        </div>
        <div class="section_header">
            <div id="postvalues"></div>
            POST Values
            </div>
        <div class="content_section_text">
          <?php 
           # From https://stackoverflow.com/questions/196664/print-out-post-values
           echo "<pre>"; print_r($_POST) ;  echo "</pre>";  
          ?>
        </div>
      </div>
    </div>
    <div class="validator">
    </div>
  </body>
</html>          
