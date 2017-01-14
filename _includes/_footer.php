<footer>
    <p class="text-center"> &copy; <?php echo date('Y') ?> Secured Dashboard powered by Free Software Enterprises - No Rights Reserved</p>
</footer>
<?php
if($_SESSION['debug'] == '1') {
    include '_includes/_debug.php';
}
?>