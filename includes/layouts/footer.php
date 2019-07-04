<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div>
<footer class="page-footer card-footer" style="background-color:lightgray; ">
    <img src="assets/images/JaBak.jpg" width="100" height="100" /> &nbsp;&nbsp;&nbsp;&nbsp;
    <p style="display:contents" class="page-footer" id="date">
        <script>
            n =  new Date();
            y = n.getFullYear();
            m = n.getMonth() + 1;
            d = n.getDate();
            document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
        </script>
        Our site is copyrighted to:
        <a class="noPrint" href="<?php echo BASE_URL . 'Map.php' ?>">JaBak</a>&copy;
    </p>
</footer>

</body>
</html>