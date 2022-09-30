<?php 
session_name('myid'); 
session_start();  

if(!isset($_SESSION["id_user"])){
  // logout.php supprime la session et redirige vers la page de login
  header('Location: ../vue/logout.php');
}
?>

<nav class="nav">
    <ul class="nav__list">
      <li class="nav__item <?php if($id_actif_navigation == 1) echo 'nav__item--selected'; ?>">
        <a href="../controleur/FrontControleur.php?action=pileouface">
          <?xml version='1.0' encoding='utf-8'?>
          <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g>
              <g>
                <g>
                  <path d="m473.6,256.6c0-99.3-67.1-185.9-163.3-210.6-9.2-2.4-18.6,3.2-20.9,12.4-2.4,9.2 3.2,18.6 12.4,20.9 80.9,20.7 137.4,93.7 137.4,177.3 0,73.7-43.9,139-109.6,167.7l15.9-37c3.7-8.7-0.3-18.8-9-22.6-8.7-3.7-18.8,0.3-22.6,9l-31,72.2c-3.7,8.7 0.3,18.8 9,22.6l72.2,31c10.8,3.8 19.8-2.5 22.6-9 3.7-8.7-0.3-18.8-9-22.6l-31.4-13.5c76.5-34.6 127.3-111.4 127.3-197.8z"/>
                  <path d="m210.4,433.9c-80.9-20.8-137.4-93.7-137.4-177.3 0-72.7 42.7-137.2 106.9-166.5l-14.9,34.6c-3.7,8.7 0.1,19.2 9,22.6 10.4,3.9 19.2-0.8 22.6-9l31-72.3c3-7 2.9-17.5-9-22.6l-72.2-31c-8.7-3.7-18.8,0.3-22.6,9-3.7,8.7 0.3,18.8 9,22.6l33.6,14.4c-76.8,34.7-127.8,111.6-127.8,198.2 7.10543e-15,99.3 67.2,185.8 163.3,210.6 11.6,3 18.9-4.6 20.9-12.4 2.3-9.2-3.2-18.5-12.4-20.9z"/>
                  <path d="m296.6,321.4c8.8-9.2 13.2-20.8 13.2-34.6 0-6.3-1.1-12.1-3.2-17.5-2.1-5.4-5.1-10-9-14-3.9-3.9-9-7.2-15.2-10-3.3-1.4-9.9-3.4-20-5.9v-57.4c6.5,1.3 11.6,4.1 15.4,8.3 3.7,4.2 6.2,10.2 7.4,18l20.6-3.1c-1.8-12.6-7-22.6-15.7-29.8-6.8-5.7-16-9.1-27.6-10.2v-9.5h-11.8v9.5c-13.2,1.3-23.2,5-29.9,10.9-10.1,8.8-15.1,20.3-15.1,34.5 0,8 1.7,15.1 5.2,21.4 3.4,6.3 8.3,11.2 14.7,14.7 8.6,4.8 17,8 25.2,9.5v63.5c-7.8-0.8-14.6-4.8-20.2-11.9-3.9-5-6.7-12.9-8.2-23.6l-20.1,3.8c0.7,10.3 3.4,19.1 7.9,26.3 4.5,7.2 9.9,12.4 16.2,15.6 6.2,3.2 14.4,5.4 24.3,6.7v19.9h11.8v-20.2c14-0.7 25.4-5.7 34.1-14.9zm-45.8-84.5c-9.1-2.7-15.5-6.4-19.3-11-3.8-4.6-5.7-10.3-5.7-17.1 0-6.9 2.2-12.8 6.7-17.8 4.5-5 10.6-8.1 18.3-9.3v55.2zm30.9,72.6c-5.1,5.8-11.5,9.1-19.2,10.1v-60.7c10.7,3.5 17.9,7.4 21.5,11.8 3.6,4.4 5.4,10.2 5.4,17.5-0.1,8.4-2.6,15.6-7.7,21.3z"/>
                </g>
              </g>
            </g>
          </svg>
        </a>
      </li>
      <li class="nav__item <?php if($id_actif_navigation == 2) echo 'nav__item--selected'; ?>">
        <a href="../controleur/FrontControleur.php?action=roulette">
        <?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 25.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 471.1 471.1" xml:space="preserve">
<g>
	<path d="M412.2,465L350,357.2c35.3-31.5,57.5-77.3,57.5-128.2c0-89.3-68.1-163.3-156.3-171.3l17.2-29.8c0.9-1.6,0.7-3.7-0.8-5
		c-0.8-0.7-1.8-1-2.8-1h-15.4V5.2c0-2.9-2.3-5.2-5.2-5.2h-17.6c-2.9,0-5.2,2.3-5.2,5.2v16.7h-15.4c-1,0-2,0.3-2.8,1
		c-1.5,1.3-1.8,3.4-0.8,5l17.2,29.8c-88.1,8-156.3,82-156.3,171.3c0,50.9,22.2,96.7,57.5,128.2L58.8,465.1c-0.9,1.6-0.7,3.7,0.8,5
		c0.8,0.7,1.8,1,2.8,1h346.5c1.9,0,3.5-1.3,3.9-3.2C413,466.9,412.7,465.8,412.2,465z M229.5,8h12v13.9h-12V8z M213,29.9h45.1
		L235.5,69L213,29.9z M274.8,97.9c9,2.7,17.6,6.3,25.6,10.7l-11.2,19.3c-6.4-3.4-13.2-6.3-20.3-8.4L274.8,97.9z M269.6,82.5
		c0.6-2.2,2.6-3.7,4.8-3.7c0.4,0,0.9,0.1,1.3,0.2c2.7,0.7,4.2,3.5,3.5,6.1c-0.6,2.2-2.6,3.7-4.8,3.7c-0.4,0-0.9-0.1-1.3-0.2
		c-1.3-0.3-2.4-1.2-3-2.3S269.3,83.8,269.6,82.5z M307.4,112.6c7.9,4.9,15.3,10.6,22,16.9l-15.8,15.8c-5.3-5-11.2-9.5-17.4-13.4
		L307.4,112.6z M306.4,96.3c0.9-1.5,2.6-2.5,4.3-2.5c0.9,0,1.7,0.2,2.5,0.7c2.4,1.4,3.2,4.4,1.8,6.8c-0.9,1.5-2.6,2.5-4.3,2.5
		c-0.9,0-1.7-0.2-2.5-0.7c-1.2-0.7-2-1.7-2.3-3C305.5,98.8,305.7,97.5,306.4,96.3z M351.9,157.2l-19.3,11.2
		c-3.9-6.2-8.4-12-13.4-17.4l15.8-15.8C341.4,141.9,347.1,149.3,351.9,157.2z M338.3,119.2c0.9-0.9,2.2-1.5,3.5-1.5
		c1.3,0,2.6,0.5,3.5,1.5c2,1.9,2,5.1,0,7.1c-0.9,0.9-2.2,1.5-3.5,1.5c-1.3,0-2.6-0.5-3.5-1.5C336.3,124.3,336.3,121.1,338.3,119.2z
		 M366.6,189.7l-21.5,5.8c-2.2-7.1-5-13.8-8.4-20.3l19.3-11.2C360.3,172.2,363.9,180.8,366.6,189.7z M363.2,149.5
		c0.8-0.4,1.6-0.7,2.5-0.7c1.8,0,3.4,1,4.3,2.5c0.7,1.2,0.8,2.5,0.5,3.8c-0.3,1.3-1.2,2.4-2.3,3c-0.8,0.4-1.6,0.7-2.5,0.7
		c-1.8,0-3.4-1-4.3-2.5C360,154,360.8,150.9,363.2,149.5z M356,293.9l-19.3-11.2c3.4-6.4,6.3-13.2,8.4-20.3l21.5,5.8
		C363.9,277.2,360.3,285.8,356,293.9z M365.7,299.2c0.9,0,1.7,0.2,2.5,0.7c2.4,1.4,3.2,4.4,1.8,6.8c-0.9,1.5-2.6,2.5-4.3,2.5
		c-0.9,0-1.7-0.2-2.5-0.7c-1.2-0.7-2-1.7-2.3-3c-0.3-1.3-0.2-2.6,0.5-3.8C362.3,300.1,363.9,299.2,365.7,299.2z M335,322.8
		l-15.8-15.8c5-5.3,9.5-11.2,13.4-17.4l19.3,11.2C347.1,308.7,341.4,316.1,335,322.8z M345.4,331.7c2,1.9,2,5.1,0,7.1
		c-0.9,0.9-2.2,1.5-3.5,1.5s-2.6-0.5-3.5-1.5c-2-1.9-2-5.1,0-7.1c0.9-0.9,2.2-1.5,3.5-1.5C343.2,330.3,344.4,330.8,345.4,331.7z
		 M307.4,345.4l-11.2-19.3c6.2-3.9,12-8.4,17.4-13.4l15.8,15.8C322.6,334.8,315.3,340.5,307.4,345.4z M315.5,360.5
		c-0.3,1.3-1.2,2.4-2.3,3c-0.8,0.4-1.6,0.7-2.5,0.7c-1.8,0-3.4-1-4.3-2.5c-1.4-2.4-0.6-5.5,1.8-6.8c0.8-0.4,1.6-0.7,2.5-0.7
		c1.8,0,3.4,1,4.3,2.5C315.7,357.8,315.9,359.2,315.5,360.5z M274.8,360.1l-5.8-21.5c7.1-2.2,13.9-5,20.3-8.4l11.2,19.3
		C292.4,353.8,283.8,357.4,274.8,360.1z M275.7,379c-0.4,0.1-0.9,0.2-1.3,0.2c-2.3,0-4.2-1.5-4.8-3.7c-0.3-1.3-0.2-2.6,0.5-3.8
		c0.7-1.2,1.7-2,3-2.3c0.4-0.1,0.9-0.2,1.3-0.2c2.3,0,4.2,1.5,4.8,3.7C280,375.6,278.4,378.3,275.7,379z M347.2,254.8
		c1.6-7,2.6-14.3,2.8-21.8h22.3c-0.3,9.4-1.5,18.7-3.6,27.5L347.2,254.8z M350,225c-0.3-7.5-1.2-14.7-2.8-21.8l21.5-5.8
		c2.1,8.9,3.3,18.1,3.6,27.5H350z M342.1,229c0,58.8-47.8,106.5-106.5,106.5S129,287.7,129,229c0-58.8,47.8-106.5,106.5-106.5
		S342.1,170.2,342.1,229z M235.5,374.3c2.8,0,5,2.2,5,5c0,2.8-2.2,5-5,5c-2.8,0-5-2.2-5-5C230.5,376.6,232.8,374.3,235.5,374.3z
		 M204,362.2l5.8-21.5c7,1.6,14.3,2.6,21.8,2.8v22.3C222.1,365.5,212.9,364.3,204,362.2z M239.5,365.8v-22.3
		c7.5-0.3,14.7-1.2,21.8-2.8l5.8,21.5C258.2,364.3,249,365.5,239.5,365.8z M196.3,360.1c-9-2.7-17.6-6.3-25.6-10.7l11.2-19.3
		c6.4,3.4,13.2,6.3,20.3,8.4L196.3,360.1z M201.5,375.5c-0.6,2.2-2.6,3.7-4.8,3.7c-0.4,0-0.9-0.1-1.3-0.2c-2.7-0.7-4.2-3.5-3.5-6.1
		c0.6-2.2,2.6-3.7,4.8-3.7c0.4,0,0.9,0.1,1.3,0.2c1.3,0.3,2.4,1.2,3,2.3C201.6,372.8,201.8,374.2,201.5,375.5z M163.7,345.4
		c-7.9-4.9-15.3-10.6-22-16.9l15.8-15.8c5.3,5,11.2,9.5,17.4,13.4L163.7,345.4z M164.7,361.7c-0.9,1.5-2.6,2.5-4.3,2.5
		c-0.9,0-1.7-0.2-2.5-0.7c-1.2-0.7-2-1.7-2.3-3c-0.3-1.3-0.2-2.6,0.5-3.8c0.9-1.5,2.6-2.5,4.3-2.5c0.9,0,1.7,0.2,2.5,0.7
		C165.3,356.2,166.1,359.3,164.7,361.7z M119.1,300.8l19.3-11.2c3.9,6.2,8.4,12,13.4,17.4L136,322.8
		C129.7,316.1,124,308.7,119.1,300.8z M132.8,338.8c-0.9,0.9-2.2,1.5-3.5,1.5c-1.3,0-2.6-0.5-3.5-1.5c-2-1.9-2-5.1,0-7.1
		c0.9-0.9,2.2-1.5,3.5-1.5c1.3,0,2.6,0.5,3.5,1.5C134.7,333.7,134.7,336.9,132.8,338.8z M104.4,268.3l21.5-5.8
		c2.2,7.1,5,13.8,8.4,20.3l-19.3,11.2C110.7,285.8,107.1,277.2,104.4,268.3z M110.2,305.4c-0.3,1.3-1.2,2.4-2.3,3
		c-0.8,0.4-1.6,0.7-2.5,0.7c-1.8,0-3.4-1-4.3-2.5c-1.4-2.4-0.6-5.5,1.8-6.8c0.8-0.4,1.6-0.7,2.5-0.7c1.8,0,3.4,1,4.3,2.5
		C110.3,302.8,110.5,304.2,110.2,305.4z M115.1,164.1l19.3,11.2c-3.4,6.4-6.3,13.2-8.4,20.3l-21.5-5.8
		C107.1,180.8,110.7,172.2,115.1,164.1z M105.3,158.8c-0.9,0-1.7-0.2-2.5-0.7c-1.2-0.7-2-1.7-2.3-3c-0.3-1.3-0.2-2.6,0.5-3.8
		c0.9-1.5,2.6-2.5,4.3-2.5c0.9,0,1.7,0.2,2.5,0.7c2.4,1.4,3.2,4.4,1.8,6.8C108.8,157.9,107.1,158.8,105.3,158.8z M136,135.2
		l15.8,15.8c-5,5.3-9.5,11.2-13.4,17.4l-19.3-11.2C124,149.3,129.7,141.9,136,135.2z M125.7,126.2c-1.9-1.9-1.9-5.1,0-7.1
		c0.9-0.9,2.2-1.5,3.5-1.5s2.6,0.5,3.5,1.5c1.9,1.9,1.9,5.1,0,7.1c-0.9,0.9-2.2,1.5-3.5,1.5C127.9,127.7,126.6,127.2,125.7,126.2z
		 M163.7,112.6l11.1,19.3c-6.2,3.9-12,8.4-17.4,13.4l-15.8-15.8C148.4,123.1,155.8,117.5,163.7,112.6z M155.5,97.5
		c0.3-1.3,1.2-2.4,2.3-3c0.8-0.4,1.6-0.7,2.5-0.7c1.8,0,3.4,1,4.3,2.5c0.7,1.2,0.8,2.5,0.5,3.8c-0.3,1.3-1.2,2.4-2.3,3
		c-0.8,0.4-1.6,0.7-2.5,0.7c-1.8,0-3.4-1-4.3-2.5C155.4,100.2,155.2,98.8,155.5,97.5z M196.3,97.9l5.8,21.5
		c-7.1,2.2-13.9,5-20.3,8.4l-11.2-19.3C178.7,104.2,187.3,100.6,196.3,97.9z M195.3,79c0.4-0.1,0.9-0.2,1.3-0.2
		c2.3,0,4.2,1.5,4.8,3.7c0.7,2.7-0.9,5.4-3.5,6.1c-0.4,0.1-0.9,0.2-1.3,0.2c-2.3,0-4.2-1.5-4.8-3.7C191.1,82.4,192.7,79.7,195.3,79z
		 M123.9,203.2c-1.6,7-2.6,14.3-2.8,21.8H98.7c0.3-9.4,1.5-18.7,3.6-27.5L123.9,203.2z M121.1,233c0.3,7.5,1.2,14.7,2.8,21.8
		l-21.5,5.8c-2.1-8.9-3.3-18.1-3.6-27.5H121.1z M204,95.8c8.9-2.1,18.1-3.3,27.5-3.6v22.3c-7.5,0.3-14.7,1.2-21.8,2.8L204,95.8z
		 M261.3,117.4c-7-1.6-14.3-2.6-21.8-2.8V92.2c9.4,0.3,18.7,1.5,27.5,3.6L261.3,117.4z M235.5,83.7c-2.8,0-5-2.2-5-5
		c0-0.6,0.1-1.2,0.3-1.8l1.2,2.1c0.7,1.2,2,2,3.5,2c1.4,0,2.8-0.8,3.5-2l1.2-2.1c0.2,0.6,0.3,1.2,0.3,1.8
		C240.5,81.4,238.3,83.7,235.5,83.7z M71.5,229c0-86.4,66.9-157.8,152.7-163.6l2.3,4c-2.5,2.4-4,5.8-4,9.3c0,2.1,0.5,4.2,1.4,5.9
		c-5,0.4-9.9,1-14.7,1.9c0.4-2,0.4-4-0.1-6.1c-1.5-5.7-6.7-9.6-12.6-9.6c-1.1,0-2.3,0.1-3.4,0.4c-6.9,1.9-11,9-9.2,15.9
		c0.5,2,1.6,3.9,2.9,5.4c-4.7,1.7-9.2,3.6-13.6,5.7c-0.1-2-0.7-4.1-1.7-5.9c-2.3-4-6.6-6.5-11.3-6.5c-2.3,0-4.5,0.6-6.5,1.7
		c-3,1.7-5.2,4.5-6.1,7.9c-0.9,3.4-0.4,6.9,1.3,9.9c1.1,1.8,2.5,3.3,4.3,4.4c-4.1,2.8-8,5.8-11.8,9c-0.6-1.9-1.7-3.8-3.2-5.3
		c-2.5-2.5-5.7-3.8-9.2-3.8c-3.5,0-6.7,1.4-9.2,3.8c-5.1,5.1-5.1,13.3,0,18.4c1.5,1.5,3.3,2.6,5.3,3.2c-3.2,3.8-6.2,7.7-9,11.7
		c-1.1-1.7-2.6-3.2-4.5-4.3c-2-1.1-4.2-1.7-6.5-1.7c-4.6,0-9,2.5-11.3,6.5c-1.7,3-2.2,6.5-1.3,9.9s3,6.2,6.1,7.9
		c1.8,1,3.8,1.6,5.9,1.7c-2.1,4.4-4,9-5.7,13.7c-1.5-1.3-3.3-2.4-5.4-2.9c-1.1-0.3-2.2-0.4-3.4-0.4c-5.9,0-11,4-12.6,9.6
		c-0.9,3.4-0.4,6.9,1.3,9.9c1.7,3,4.5,5.2,7.9,6.1c1.1,0.3,2.2,0.4,3.4,0.4c0.9,0,1.8-0.1,2.7-0.3c-0.9,4.8-1.5,9.7-1.9,14.6
		c-1.8-0.9-3.8-1.4-5.9-1.4c-7.2,0-13,5.8-13,13c0,7.2,5.8,13,13,13c2.1,0,4.2-0.5,5.9-1.4c0.4,5,1,9.8,1.9,14.6
		c-0.9-0.2-1.8-0.3-2.7-0.3c-1.1,0-2.3,0.1-3.4,0.4c-3.4,0.9-6.2,3-7.9,6.1c-1.7,3-2.2,6.5-1.3,9.9c1.5,5.7,6.7,9.6,12.6,9.6
		c1.1,0,2.3-0.1,3.4-0.4c2.1-0.6,3.9-1.6,5.4-2.9c1.7,4.7,3.6,9.2,5.7,13.7c-2.1,0.1-4.1,0.7-5.9,1.7c-6.2,3.6-8.3,11.5-4.8,17.8
		c2.3,4,6.6,6.5,11.3,6.5c2.3,0,4.5-0.6,6.5-1.7c1.8-1.1,3.3-2.5,4.5-4.3c2.8,4.1,5.8,8,9,11.7c-2,0.6-3.8,1.7-5.3,3.2
		c-5.1,5.1-5.1,13.3,0,18.4c2.5,2.5,5.7,3.8,9.2,3.8c3.5,0,6.7-1.4,9.2-3.8c1.5-1.5,2.6-3.4,3.2-5.3c3.8,3.2,7.7,6.2,11.8,9
		c-1.7,1.1-3.2,2.6-4.3,4.4c-1.7,3-2.2,6.5-1.3,9.9c0.9,3.4,3,6.2,6.1,7.9c2,1.1,4.2,1.7,6.5,1.7h0c4.6,0,9-2.5,11.3-6.5
		c1.1-1.9,1.6-3.9,1.7-5.9c4.4,2.1,9,4,13.7,5.7c-1.4,1.5-2.4,3.3-2.9,5.4c-1.9,6.9,2.3,14.1,9.2,15.9c1.1,0.3,2.2,0.4,3.4,0.4
		c5.9,0,11-4,12.6-9.6c0.5-2,0.6-4.1,0.2-6.1c4.8,0.9,9.7,1.5,14.6,1.9c-0.9,1.8-1.4,3.8-1.4,5.9c0,7.2,5.8,13,13,13
		c7.2,0,13-5.8,13-13c0-2.1-0.5-4.2-1.4-5.9c5-0.4,9.8-1,14.6-1.9c-0.4,2-0.4,4.1,0.2,6.1c1.5,5.7,6.7,9.6,12.6,9.6
		c1.1,0,2.3-0.1,3.4-0.4c6.9-1.9,11-9,9.2-15.9c-0.5-2-1.6-3.9-2.9-5.4c4.7-1.7,9.2-3.6,13.7-5.7c0.1,2,0.6,4,1.7,5.9
		c2.3,4,6.6,6.5,11.3,6.5c2.3,0,4.5-0.6,6.5-1.7c6.2-3.6,8.3-11.5,4.8-17.8c-1.1-1.8-2.5-3.3-4.3-4.4c4.1-2.8,8-5.8,11.8-9
		c0.6,1.9,1.7,3.8,3.2,5.3c2.5,2.5,5.7,3.8,9.2,3.8s6.7-1.4,9.2-3.8c5.1-5.1,5.1-13.3,0-18.4c-1.5-1.5-3.3-2.6-5.3-3.2
		c3.2-3.8,6.2-7.7,9-11.7c1.1,1.7,2.6,3.2,4.5,4.3c2,1.1,4.2,1.7,6.5,1.7c4.6,0,9-2.5,11.3-6.5c3.6-6.2,1.5-14.2-4.8-17.8
		c-1.8-1-3.8-1.6-5.9-1.7c2.1-4.4,4-9,5.7-13.7c1.5,1.3,3.3,2.4,5.4,2.9c1.1,0.3,2.2,0.4,3.4,0.4c5.9,0,11-4,12.6-9.6
		c0.9-3.4,0.4-6.9-1.3-9.9c-1.7-3-4.5-5.2-7.9-6.1c-1.1-0.3-2.2-0.4-3.4-0.4c-0.9,0-1.8,0.1-2.7,0.3c0.9-4.8,1.5-9.7,1.9-14.6
		c1.8,0.9,3.8,1.4,5.9,1.4c7.2,0,13-5.8,13-13c0-7.2-5.8-13-13-13c-2.1,0-4.2,0.5-5.9,1.4c-0.4-5-1-9.8-1.9-14.7
		c0.9,0.2,1.8,0.3,2.7,0.3c0,0,0,0,0,0c1.1,0,2.3-0.2,3.4-0.4c6.9-1.9,11-9,9.2-15.9c-1.5-5.7-6.7-9.6-12.6-9.6
		c-1.1,0-2.3,0.1-3.4,0.4c-2.1,0.6-3.9,1.6-5.4,2.9c-1.7-4.7-3.6-9.2-5.7-13.7c2.1-0.1,4.1-0.7,5.9-1.7c3-1.7,5.2-4.5,6.1-7.9
		c0.9-3.4,0.4-6.9-1.3-9.9c-2.3-4-6.6-6.5-11.3-6.5c-2.3,0-4.5,0.6-6.5,1.7c-1.9,1.1-3.4,2.6-4.5,4.3c-2.8-4.1-5.8-8-9-11.7
		c2-0.6,3.8-1.7,5.3-3.2c5.1-5.1,5.1-13.3,0-18.4c-2.5-2.5-5.7-3.8-9.2-3.8s-6.7,1.4-9.2,3.8c-1.5,1.5-2.6,3.4-3.2,5.3
		c-3.8-3.2-7.7-6.2-11.8-9c1.7-1.1,3.2-2.6,4.3-4.5c1.7-3,2.2-6.5,1.3-9.9c-0.9-3.4-3-6.2-6.1-7.9c-2-1.1-4.2-1.7-6.5-1.7
		c-4.6,0-9,2.5-11.3,6.5c-1.1,1.9-1.6,3.9-1.7,5.9c-4.4-2.1-9-4-13.7-5.7c1.4-1.5,2.4-3.3,2.9-5.4c1.9-6.9-2.3-14.1-9.2-15.9
		c-1.1-0.3-2.2-0.4-3.4-0.4c-5.9,0-11,4-12.6,9.6c-0.5,2-0.6,4.1-0.2,6.1c-4.8-0.9-9.7-1.5-14.6-1.9c0.9-1.8,1.4-3.8,1.4-5.9
		c0-3.6-1.5-6.9-4-9.3l2.3-3.9c85.8,5.8,152.7,77.2,152.7,163.6c0,90.4-73.6,164-164,164C145.1,393,71.5,319.4,71.5,229z
		 M95.2,266.6c0.7,2.7-0.9,5.4-3.5,6.1c-0.4,0.1-0.9,0.2-1.3,0.2c-2.3,0-4.2-1.5-4.8-3.7c-0.3-1.3-0.2-2.6,0.5-3.8
		c0.7-1.2,1.7-2,3-2.3c0.4-0.1,0.9-0.2,1.3-0.2C92.6,262.9,94.6,264.4,95.2,266.6z M90.3,195.1c-0.4,0-0.9-0.1-1.3-0.2
		c-1.3-0.3-2.4-1.2-3-2.3c-0.7-1.2-0.8-2.5-0.5-3.8c0.6-2.2,2.6-3.7,4.8-3.7c0.4,0,0.9,0.1,1.3,0.2c2.7,0.7,4.2,3.5,3.5,6.1
		C94.6,193.6,92.6,195.1,90.3,195.1z M90.2,229c0,2.8-2.2,5-5,5s-5-2.2-5-5s2.2-5,5-5S90.2,226.2,90.2,229z M375.9,191.4
		c-0.7-2.7,0.9-5.4,3.5-6.1c0.4-0.1,0.9-0.2,1.3-0.2c2.3,0,4.2,1.5,4.8,3.7c0.7,2.7-0.9,5.4-3.5,6.1c-0.4,0.1-0.9,0.2-1.3,0.2
		C378.5,195.1,376.5,193.6,375.9,191.4z M380.7,262.9c0.4,0,0.9,0.1,1.3,0.2c1.3,0.3,2.4,1.2,3,2.3c0.7,1.2,0.8,2.5,0.5,3.8
		c-0.6,2.2-2.6,3.7-4.8,3.7c-0.4,0-0.9-0.1-1.3-0.2c-2.7-0.7-4.2-3.5-3.5-6.1C376.5,264.4,378.5,262.9,380.7,262.9z M380.8,229
		c0-2.8,2.2-5,5-5c2.8,0,5,2.2,5,5s-2.2,5-5,5C383.1,234,380.8,231.8,380.8,229z M343.8,362.5l58.1,100.6h-21.6
		c-1.1-0.1-2.3-0.1-3.3-0.1c-2.1,0-1.8,0.1-4.1,0c-0.8,0-0.8,0-1.5,0l-0.5,0H102.2c-1.1,0-1.5,0-2.5,0c-2.7,0-5.1,0.1-7.8,0
		c-0.1,0-0.4,0-0.5,0l-0.1,0H69.2l58.1-100.6c3,2.4,6.1,4.8,9.2,7l0.3,0.2l6.4,4.3c26.7,17.1,58.4,27,92.4,27
		c33.7,0,65.1-9.7,91.6-26.5"/>
	<path d="M143.1,374.1"/>
</g>
</svg>

      </a>
      </li>
      <li class="nav__item <?php if($id_actif_navigation == 3) echo 'nav__item--selected'; ?>">
        <a href="../controleur/FrontControleur.php?action=accueil">
          <?xml version="1.0" encoding="iso-8859-1"?>
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 512 512" xml:space="preserve">
            <g>
              <g>
                <path d="M506.555,208.064L263.859,30.367c-4.68-3.426-11.038-3.426-15.716,0L5.445,208.064
                  c-5.928,4.341-7.216,12.665-2.875,18.593s12.666,7.214,18.593,2.875L256,57.588l234.837,171.943c2.368,1.735,5.12,2.57,7.848,2.57
                  c4.096,0,8.138-1.885,10.744-5.445C513.771,220.729,512.483,212.405,506.555,208.064z"/>
              </g>
            </g>
            <g>
              <g>
                <path d="M442.246,232.543c-7.346,0-13.303,5.956-13.303,13.303v211.749H322.521V342.009c0-36.68-29.842-66.52-66.52-66.52
                  s-66.52,29.842-66.52,66.52v115.587H83.058V245.847c0-7.347-5.957-13.303-13.303-13.303s-13.303,5.956-13.303,13.303v225.053
                  c0,7.347,5.957,13.303,13.303,13.303h133.029c6.996,0,12.721-5.405,13.251-12.267c0.032-0.311,0.052-0.651,0.052-1.036v-128.89
                  c0-22.009,17.905-39.914,39.914-39.914s39.914,17.906,39.914,39.914v128.89c0,0.383,0.02,0.717,0.052,1.024
                  c0.524,6.867,6.251,12.279,13.251,12.279h133.029c7.347,0,13.303-5.956,13.303-13.303V245.847
                  C455.549,238.499,449.593,232.543,442.246,232.543z"/>
              </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
          </svg>
           
        </a>
      </li>
      <li class="nav__item <?php if($id_actif_navigation == 4) echo 'nav__item--selected'; ?>">
        <a href="../controleur/FrontControleur.php?action=historique&jeu=roulette" class="">
          <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="25px" height="25px"><path d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24.984375 6.9863281 A 1.0001 1.0001 0 0 0 24 8 L 24 22.173828 A 3 3 0 0 0 22 25 A 3 3 0 0 0 22.294922 26.291016 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 23.708984 27.705078 A 3 3 0 0 0 25 28 A 3 3 0 0 0 28 25 A 3 3 0 0 0 26 22.175781 L 26 8 A 1.0001 1.0001 0 0 0 24.984375 6.9863281 z"/></svg>        
        </a>
      </li>
      <li class="nav__item <?php if($id_actif_navigation == 5) echo 'nav__item--selected'; ?>">
        <a href="../controleur/FrontControleur.php?action=profil">
            <?xml version="1.0" encoding="iso-8859-1"?>
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 512 512" xml:space="preserve">
                <g>
                <g>
                    <path d="M256,0c-84.83,0-153.6,85.965-153.6,192S171.17,384,256,384s153.6-85.965,153.6-192S340.83,0,256,0z M256,358.4
                    c-70.579,0-128-74.65-128-166.4S185.421,25.6,256,25.6S384,100.25,384,192S326.579,358.4,256,358.4z"/>
                </g>
                </g>
                <g>
                <g>
                    <path d="M367.812,361.762c-6.869,6.682-14.182,12.689-21.82,18.099c24.388,11.332,45.781,20.753,64.051,28.732
                    c67.797,29.585,76.356,35.439,76.356,52.207c0,11.597-11.418,25.6-25.6,25.6H51.2c-14.182,0-25.6-14.003-25.6-25.6
                    c0-16.768,8.559-22.622,76.348-52.207c18.278-7.979,39.671-17.399,64.051-28.732c-7.637-5.41-14.95-11.418-21.82-18.099
                    C37.598,410.539,0,417.075,0,460.8C0,486.4,22.921,512,51.2,512h409.6c28.279,0,51.2-25.6,51.2-51.2
                    C512,417.075,474.402,410.539,367.812,361.762z"/>
                </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </svg>

        </a>
    </li>
    </ul>
</nav>