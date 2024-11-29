
<div class="copyright">
    <p>copyright <a href="equipe_creation.php">
                            <!-- <?= $nom_site; ?> -->www.Kivu_show.com
                 </a>
        . Tout droits reservés
    </p>
</div>
    
<script type="text/javascript">
    
    window.addEventListener('scroll', function(){
        const header = document.querySelector('header');
        header.classList.toggle("sticky", window.scrollY > 0);
    });
    
    function toggleMenu(){
        const menutoggle = document.querySelector('.menutoggle');
        const navbar = document.querySelector('.navbar');
    
        menutoggle.classList.toggle('active');
        navbar.classList.toggle('active');
    }
</script>  