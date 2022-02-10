<?php 
$pagepart = $this->pager;
?>
<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">© 2022 Nsh. <br><?= $pagepart->showProperty("footertrtext");?></p>
    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <svg class="icon-svg" width="40" height="40" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="64" height="64" rx="15" fill="black"/>
            <path d="M14.64 23.92V32.17H25.5V34.09H14.64V43H12.42V22H26.82V23.92H14.64ZM54.2609 27.22L48.2909 43H46.2809L41.3009 30.07L36.3209 43H34.3109L28.3709 27.22H30.4109L35.3609 40.63L40.4309 27.22H42.2609L47.3009 40.63L52.3109 27.22H54.2609Z" fill="white"/>
        </svg>
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
    </ul>
  </footer>
</div>

</body>
</html>