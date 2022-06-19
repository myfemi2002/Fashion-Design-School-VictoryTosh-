<footer class="main-footer fixed-btm">
    <p class="text-left">
        © <?php
        $copyYear = 2019; // Set your website start date
        $curYear = date('Y'); // Keeps the second year updated
        echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
        ?>
        <a class="text-primary" href="https://www.newinfo.com.ng/" target="_blank">Newinfo Global Solutions Ltd</a>.
    </p>
</footer>
