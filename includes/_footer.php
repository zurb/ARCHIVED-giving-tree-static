<footer>
    <div class="row">
        <div class="four columns">
            <a href="index.php"><img src="http://placehold.it/170x80" alt="Family Giving Tree"></a>
            <dl>
                <dt>Contact Us</dt>
                <dd><span class="glyph">6</span>606 Valley Way,<br>
                Milipitas, CA 95035</dd>
                <dd>(408) 946-3111</dd>
            </dl>
            <a href="http://goo.gl/maps/u2VDe" class="map">
                <img src="http://placehold.it/80x80" alt="Family Giving Tree Location">
            </a>
        </div>
        <div class="four columns">
            <h6>Upcoming Events</h6>
            <div class="row">
                <div class="three columns">
                    <ul class="date">
                        <li class="month">Aug</li>
                        <li class="day">2</li>
                    </ul>
                </div>
                <div class="nine columns">
                    <h5 class="event-title">
                        <a href="#">FGT Open House</a>
                    </h5>
                    <p>This is a description of the event.</p>
                </div>
            </div>
            <div class="row">
                <div class="three columns">
                    <ul class="date">
                        <li class="month">Aug</li>
                        <li class="day">2</li>
                    </ul>
                </div>
                <div class="nine columns">
                    <h5 class="event-title">
                        <a href="#">FGT Open House</a>
                    </h5>
                    <p>This is a description of the event.</p>
                </div>
            </div>
        </div>
        <div class="four columns">
            <h5>Sign up to our newsletter</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <form>
                <label>Email Address</label>
                <div class="row collapse">
                    <div class="nine mobile-three columns">
                        <input type="text" />
                    </div>
                    <div class="three mobile-one columns">
                        <a href="#" class="postfix button">Sign up</a>
                    </div>
                </div>
            </form>
            <h6>Follow Us</h6>
            <ul class="glyph social link-list">
                <li><a href="#">e</a></li>
                <li><a href="#">o</a></li>
                <li><a href="#">d</a></li>
            </ul>  
        </div>
    </div>
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