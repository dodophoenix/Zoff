<!DOCTYPE html>
<?php
    $guid=substr(base64_encode(crc32($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_ACCEPT_LANGUAGE'])), 0, 8);
    if(isset($_GET['chan'])) {header('Location: '.$_GET['chan']); exit;}
    $list = explode("/", htmlspecialchars(strtolower($_SERVER["REQUEST_URI"])));
    if($list[1]==""||!isset($list[1])||count($list)<=1){$list="";include('php/nochan.php');die();}
    else $list=preg_replace("/[^A-Za-z0-9 ]/", '', $list[1]);
?>
<html lang="en">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
  <meta name="robots" content="noindex, nofollow" />
	<?php include("php/header.php"); ?>
  <script type="text/javascript" src="/static/dist/main.min.js"></script>
</head>
<body id="channelpage" class="noselect cursor-default">
    <header>
      <div class="navbar-fixed">
        <nav id="nav">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo brand-logo-navigate hide-on-med-and-down noselect">
                    <img id="zicon" src="static/images/squareicon_small.png" alt="zöff" title="Zöff" />
                </a>
                <div class="brand-logo truncate zbrand">
                    <a href="/" class="hide-on-large-only brand-logo-navigate">Zöff</a>
                    <span class="hide-on-large-only">/</span>
                    <span id="chan" class="chan clickable" title="Show big URL"><?php echo(ucfirst($list));?></span>
                </div>

                <ul class="title-container">
                    <li class="song-title cursor-pointer truncate" id="song-title">
                        Loading...
                    </li>
                    <li class="search-container hide" id="search-wrapper">
                        <input id="search" class="search_input" type="text" title="Search for songs..." placeholder="Find song on YouTube..." onsubmit="null;" autocomplete="off" />
                    </li>
                </ul>

                <ul class="right control-list noselect">
                  <li id="search_loader" class="valign-wrapper hide">
                      <div class="valign">
                         <div class="preloader-wrapper small active">
                          <div class="spinner-layer spinner-blue">
                            <div class="circle-clipper left">
                              <div class="circle"></div>
                            </div><div class="gap-patch">
                              <div class="circle"></div>
                            </div><div class="circle-clipper right">
                              <div class="circle"></div>
                            </div>
                          </div>

                          <div class="spinner-layer spinner-red">
                            <div class="circle-clipper left">
                              <div class="circle"></div>
                            </div><div class="gap-patch">
                              <div class="circle"></div>
                            </div><div class="circle-clipper right">
                              <div class="circle"></div>
                            </div>
                          </div>

                          <div class="spinner-layer spinner-yellow">
                            <div class="circle-clipper left">
                              <div class="circle"></div>
                            </div><div class="gap-patch">
                              <div class="circle"></div>
                            </div><div class="circle-clipper right">
                              <div class="circle"></div>
                            </div>
                          </div>

                          <div class="spinner-layer spinner-green">
                            <div class="circle-clipper left">
                              <div class="circle"></div>
                            </div><div class="gap-patch">
                              <div class="circle"></div>
                            </div><div class="circle-clipper right">
                              <div class="circle"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </li>
                    <li>
                        <a class="nav-btn" href="#find" id="search-btn">
                            <i class="mdi-action-search"></i>
                            <span class="hover-text">Find</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-btn" href="#skip" id="skip">
                            <i class="mdi-av-skip-next"></i>
                            <span class="hover-text">Skip</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-btn hide-on-small-only" href="#stir" id="shuffle">
                            <i class="mdi-av-shuffle"></i>
                            <span class="hover-text">Stir</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-btn" href="#settings" data-activates="settings-bar" id="settings">
                            <i class="mdi-image-dehaze"></i>
                            <span class="hover-text">Conf</span>
                        </a>
                    </li>
                </ul>
                <ul class="side-nav" id="settings-bar">
                    <?php include("php/panel.php");?>
                </ul>
                <div id="results" class="search_results hide">
                    <div id="temp-results-container">
                      <div id="temp-results" class="result-object">
                          <div id="result" class="result">
                              <img class="thumb" src="/static/images/loading.png" alt="Thumb"/>

                                  <div class="search-title truncate"></div>
                                  <span class="result_info"></span>

                              <div class="waves-effect waves-orange btn-flat" id="add-many" title="Add several videos">
                                  <i class="mdi-av-playlist-add"></i>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div id="empty-results-container">
                      <div id='empty-results' class='valign-wrapper'>
                        <span class='valign'>No results found..</span>
                      </div>
                    </div>
                </div>
            </div>
        </nav>
      </div>
      <div id="help" class="modal">
            <div class="modal-content">
                <h4>So you need help?</h4>
                <p>When listening on a channel, there are some different buttons you can click.</p>
                <p>If you click the cogwheel, you'll open the settings panel. Here you can change channel settings, decide if you want the computer you're on can be remote-controlled, and import playlists from YouTube.</p>
                <p>The search-icon, opens up a search inputfield. If you start typing here, the site will automagically search for your input!</p>
                <p>If you click the button next to the search icon, you'll skip on a song. The one next to that one, is shuffleling of the list. Next one there again is to open the chat.</p>
                <p>Clicking a song in the playlist, gives it a vote. If you're logged in, you'll have a delete button at your disposal.</p>
                <p>Also, whenever you're logged in, you'll have two tabs in the top of the playlist thats called "Playlist" and "Suggested". The playlist obviously shows the playlist. But the suggested tab, shows 5 songs that YouTube recommends based on the current song. There might also be user recommended songs. To add any of these, just click them as you'd click a song to vote.</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>
        <div id="embed" class="modal">
            <div class="modal-content">
              <h4>Embed code</h4>
              <p>Copy the code in the textarea, and paste on your website.</p>
              <p>
                <input type="checkbox" id="autoplay" checked="checked" />
                <label for="autoplay" class="padding_right_26">Autoplay</label>
                <label for="width_embed" class="embed-label">Width</label>
                <input type="number" value="600" id="width_embed" class="settings_embed" min="1" />
                <label for="height_embed" class="padding_left_6 embed-label">Height</label>
                <input type="number" value="300" id="height_embed" class="settings_embed" min="1" />
                <label for="color_embed" class="padding_left_6 embed-label">Color</label>
                <input type="color" id="color_embed" class="settings_embed" value="#808080" />
              </p>
              <textarea id="embed-area"></textarea>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>
    </header>
     <div id="channel-load" class="progress">
            <div class="indeterminate" id="channel-load-move"></div>
        </div>
    <main class="container center-align main">
        <div id="main-row" class="row">
            <div id="video-container" class="col s12 m9 video-container no-opacity click-through">
                <!--
                  width: calc(100% - 261px);
                  display: inline;
                  -->
                <div id="player" class="ytplayer"></div>
                <div id="main_components">
                <div id="player_overlay" class="hide valign-wrapper">
                  <div id="player_overlay_text" class="valign center-align">
                    Waiting for Video
                  </div>
                  <div id="player_overlay_controls" class="hide valign-wrapper">
                    <div id="playpause-overlay" class="valign center-align">
                      <i id="play-overlay" class="mdi-av-play-arrow hide"></i>
                      <i id="pause-overlay" class="mdi-av-pause"></i>
                    </div>
                    <div id="volume-button-overlay">
                      <i id="v-mute-overlay" class="mdi-av-volume-off"></i>
                      <i id="v-low-overlay" class="mdi-av-volume-mute"></i>
                      <i id="v-medium-overlay" class="mdi-av-volume-down"></i>
                      <i id="v-full-overlay" class="mdi-av-volume-up"></i>
                    </div>
                  </div>
                </div>
                <div id="controls" class="noselect">
                  <div id="playpause">
                    <i id="play" class="mdi-av-play-arrow hide"></i>
                    <i id="pause" class="mdi-av-pause"></i>
                  </div>
                  <div id="duration"></div>
                  <div id="fullscreen">
                    <i class="mdi-navigation-fullscreen"></i>
                  </div>
                  <button class="castButton mdi-hardware-cast tooltipped" data-position="top" data-delay="10" data-tooltip="Cast Zöff to TV" is="google-cast-button">
                  </button>
                  <button class="castButton-active hide mdi-hardware-cast-connected tooltipped" data-position="top" data-delay="10" data-tooltip="Stop casting" >
                  </button>
                  <div id="volume-button">
                    <i id="v-mute" class="mdi-av-volume-off"></i>
                    <i id="v-low" class="mdi-av-volume-mute"></i>
                    <i id="v-medium" class="mdi-av-volume-down"></i>
                    <i id="v-full" class="mdi-av-volume-up"></i>
                  </div>
                  <div id="volume"></div>
                  <div id="viewers"></div>
                  <div id="bar"></div>
                </div>
                </div>
            </div>
            <div id="playlist" class="col s12 m3">
              <div id="top-button" title="Scroll to the top" class="rounded-bottom hide top-button-with-tabs hide-on-small-only">Top</div>
              <div id="bottom-button" title="Scroll to the bottom" class="rounded-top hide hide-on-small-only">Bottom</div>
              <ul class="tabs playlist-tabs" style="width:96%">
                <li class="tab col s3"><a class="playlist-tab-links playlist-link active" href="#wrapper">Playlist</a></li>
                <li class="tab col s3"><a class="playlist-tab-links chat-link" href="#chat">Chat</a></li>
              </ul>
              <ul class="tabs playlist-tabs-loggedIn hide" style="width: 96%;">
                <li class="tab col s3"><a class="playlist-tab-links playlist-link active" href="#wrapper">Playlist</a></li>
                <li class="tab col s3"><a class="playlist-tab-links suggested-link" href="#suggestions">Suggested</a></li>
                <li class="tab col s3"><a class="playlist-tab-links chat-link" href="#chat">Chat</a></li>
              </ul>
                <div id="wrapper" class="tabs_height">
                    <div id="list-song-html">
                        <div id="list-song" class="card left-align list-song">
                            <div class="clickable vote-container" title="Vote!">
                                <a class="clickable center-align votebg">
                                    <span class="lazy card-image cardbg list-image" style="background-image:url('/static/images/loading.png');"></span>
                                </a>
                                <span class="card-content">
                                    <span class="flow-text truncate list-title"></span>
                                    <span class="vote-span">
                                        <span class="list-votes"></span>
                                        <span class="highlighted vote-text">&nbsp;votes</span>
                                    </span>
                                </span>
                            </div>
                            <div class="card-action center-align list-remove hide">
                                <a title="Remove song" id="del" class="waves-effect btn-flat clickable">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="suggestions" class="tabs_height" style="display:none;">
                        <p class="suggest-title-info">YouTube Suggests:</p>
                        <div class="suggest_bar" id="suggest-song-html">
                        </div>
                        <p class="suggest-title-info" id="user_suggests">Users Suggests:</p>
                        <div class="suggest_bar" id="user-suggest-html">
                        </div>
                </div>
                <div id="chatPlaylist" class="tabs_height" style="display:none;">
                  <ul class="" id="chat-bar">
                    <li id="chat-log">
                        <ul class="inherit-height">
                            <li class="active inherit-height">
                                <!--<ul id="chat inherit-height">-->
                                  <div class="row inherit-height">
                                    <div class="col s12">
                                      <ul class="tabs chatTabs">
                                        <li class="tab col s3 chat-tab-li"><a class="active chat-tab truncate" href="#channelchat"><?php echo $list; ?></a></li>
                                        <li class="tab col s3 chat-tab-li"><a class="chat-tab" href="#all_chat">All</a></li>
                                      </ul>
                                    </div>
                                    <div id="channelchat" class="col s12 inherit-height"><ul id="chatchannel" class="inherit-height"></ul></div>
                                    <div id="all_chat" class="col s12 inherit-height"><ul id="chatall" class="inherit-height"></ul></div>
                                  </div>
                                <!--</ul>-->
                            </li>
                        </ul>
                    </li>
                    <li id="chat-input">
                      <form action="#" id="chatForm">
                        <input id="text-chat-input" name="input" type="text" autocomplete="off" placeholder="Chat" maxlength="150" />
                      </form>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        <div id="playbar">
        </div>
    </main>

    <?php include("php/footer.php"); ?>
    </body>
</html>
