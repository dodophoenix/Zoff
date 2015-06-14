<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Zöff</h5>
                <p class="grey-text text-lighten-4">The shared YouTube radio</p>
                <p class="grey-text text-lighten-4">
                    Being built around the YouTube search and video API
                    it enables the creation of collaborative and shared live playlists,
                    with billions of videos and songs to choose from, all for free and without registration.
                    <br>
                    Enjoy!
                </p>
                <p id="latest-commit" class="grey-text text-lighten-4 truncate"></p>
            </div>
            <div class="col l4 offset-l2 s12 valign-wrapper">
                <ul>
                    <li>
                        <a href="https://play.google.com/store/apps/details?id=no.lqasse.zoff">
                            <img title="Get it on Google Play" src="/static/images/google_play.png">
                        </a>
                        <a href="https://github.com/nixolas1/Zoff">
                            <img title="Contribute on GitHub" src="/static/images/GitHub_Logo.png">
                        </a>
                        <p>
                            <a class="waves-effect waves-light btn light-blue share shareface" href="https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER['HTTP_HOST'].'/'.$list; ?>" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER['HTTP_HOST'].'/'.$list; ?>','Share Playlist','width=600,height=300')">
                                <img class="left" src="/static/images/facebook.png">Share on&nbspFacebook
                            </a>
                        </p>
                        <p>
                            <a class="waves-effect waves-light btn light-blue share" href="http://twitter.com/intent/tweet?url=http://<?php echo $_SERVER['HTTP_HOST'].'/'.$list; ?>&text=Check out this playlist <?php echo ucfirst($list); ?> on Zöff!&via=zoffmusic" target="popup" onclick="window.open('http://twitter.com/intent/tweet?url=http://<?php echo $_SERVER['HTTP_HOST'].'/'.$list; ?>&text=Check out this playlist <?php echo ucfirst($list); ?> on Zöff!&via=zoffmusic','Share Playlist','width=600,height=300')">
                                <img class="left" src="/static/images/twitter.png">Share on&nbspTwitter
                            </a>
                        </p>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="donate_form">
                          <input type="hidden" name="cmd" value="_s-xclick">
                          <input type="hidden" name="hosted_button_id" value="JEXDYP59N5VWE">
                          <a border="0" title="Like what we made? Help us with a beer!" name="submit" class="waves-effect waves-light btn orange light-blue share" onclick="document.getElementById('donate_form').submit();">Donate
                          </a>
                        </form>
                        <p>
                            <a href="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=http://<?php echo $_SERVER['HTTP_HOST'].'/'.$list; ?>&choe=UTF-8&chld=L|1" >
                                <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://<?php echo $_SERVER['HTTP_HOST'].'/'.$list; ?>&choe=UTF-8&chld=L|1" alt="QRCode for link" title="QR code for this page, for easy sharing!">
                            </a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            &copy; 2014 - <?php echo date("Y"); ?>
            <a href="//nixo.no">Nixo</a> &amp;
            <a href="//kasperrt.no">KasperRT</a>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="/static/js/lib/materialize.js"></script>
<script type="text/javascript" src="/static/js/lib/color-thief.js"></script>
<script src="/static/js/lib/angular.min.js"></script>
<script src="/static/js/lib/angular-ui-router.min.js"></script>
<script src="/static/js/state.js"></script>
<!--<script type="text/javascript" src="/static/js/lib/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="/static/js/lib/jquery-ui-1.10.3.min.js"></script>-->
<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<!--<script type="text/javascript" src="/static/js/lib/iscroll-min.js"></script>-->
<script src="https://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha256.js"></script>

