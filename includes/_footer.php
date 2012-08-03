<footer>
    <div class="footer-columns">
        <div class="row">
            <div class="eight columns">
                <h5><a href="index.php">Family Giving Tree  <span class="handwritten">fulfilling children’s wishes</span></a></h5>
            </div>
        </div>
        <div class="row">
            <div class="six columns">
                <div class="row">
                    <div class="six columns">
                        <dl>
                            <dt>Contact Us</dt>
                            <dd>606 Valley Way,<br>
                            Milipitas, CA 95035</dd>
                            <dd>(408) 946-3111</dd>
                        </dl>
                        <h6>Follow Us</h6>
                        <ul class="glyph social link-list">
                            <li><a href="#">e</a></li>
                            <li><a href="#">o</a></li>
                            <li><a href="#">d</a></li>
                        </ul>
                    </div>
                    <div class="six columns">
                        <h6>Upcoming Events</h6>
                        <ul class="upcoming-events">
                            <li>
                                <a href="#">8/2 FGT Open House</a>
                                <p>This is a description of the event.</p>
                            </li>
                            <li>
                                <a href="#">8/2 FGT Open House</a>
                                <p>This is a description of the event.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="six columns">
                <div class="row">
                    <div class="six columns elf hide-for-small">
                        <img src="images/elf.png" alt="Family Giving Tree ELf">
                    </div>
                    <div class="six columns">
                        <h6>Sign up to our newsletter</h6>
                        <form action="http://visitor.constantcontact.com/d.jsp" method="post" target="_blank" id="ccoptin" style="margin-bottom:3;">
                            <input type="hidden" name="m" value="1100352066583">
                            <input type="hidden" name="p" value="oi">
                            <div class="row collapse">
                                <div class="nine mobile-three columns">
                                    <input type="text" name="ea "/>
                                </div>
                                <div class="three mobile-one columns">
                                    <button class="postfix button purple small">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-nav">
        <div class="row">
            <div class="nine columns">
                <ul class="link-list">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#">Who We Help</a></li>
                    <li><a href="lead-a-drive.php">Lead a Drive</a></li>
                    <li><a href="sponsor.php">Sponsors</a></li>
                    <li><a href="#">Join Our Community</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="#">Events</a></li>
                </ul>
            </div>
            <div class="three columns">
                <p class="right">&copy; <?php echo date('Y'); ?> Family Giving Tree</p>
            </div>
        </div>
    </div>
</footer>
  
<!-- Included JS Files (Compressed) -->
<script src="javascripts/jquery.min.js"></script>
<script src="javascripts/foundation.min.js"></script>
<script src="javascripts/spin.min.js"></script>
<script src="javascripts/jquery.raptorize.js"></script>

<!-- Application Javascript, safe to override -->
<script src="javascripts/app.js"></script>

<?php yield('footer')?>

<script>
  var _gaq = _gaq || [];
  _gaq.push(
    ['_setAccount', 'ACCOUNT_ID'],
    ['_trackPageview'],
    ['b._setAccount', 'ACCOUNT_ID'],
    ['b._trackPageview']
  );

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>