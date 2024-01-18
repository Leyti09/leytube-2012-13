<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/config.inc.php"); ?>
<?php require($_SERVER['DOCUMENT_ROOT'] . "/static/important/initialized_utils.php"); ?>
<?php
  $thread = $_user_fetch_utils->fetch_thread_name($_GET['v']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SubRocks - <?php echo $thread['title'] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/static/css/new/www-core.css">
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
        <script>function onLogin(token){ document.getElementById('submitform').submit(); }</script>
        <style>
            .channel-box-top {
                background: #666;
                color: white;
                padding: 5px;
            }

            .sub_button {
                position: relative;
                bottom: 2px;
            }

            .channel-box-description {
                background: #e6e6e6;
                border: 1px solid #666;
                color: #666;
                padding: 5px;
            }

            .channel-box-no-bg {
                border: 1px solid #666;
                color: black;
                padding: 5px;
            }

            .channel-pfp {
                height: 88px;
                width: 88px;
                border-color: #666;
                border: 3px double #999;
            }

            .channel-stats {
                display: inline-block;
                vertical-align: top;
            }

            .channel-stats-minor {
                font-size: 11px;
            }
            
            .comment-pfp {
                width: 52px;
                height: 52px;
                border-color: #666;
                display: inline-block;
                border: 3px double #999;
            }
        </style>
    </head>
    <body>
        <div class="www-core-container">
            <?php require($_SERVER['DOCUMENT_ROOT'] . "/static/module/header.php"); ?>
            <div class="channel-box-profle">
                <div class="channel-box-top" style="height: 12px;">
                    <h3 style="display: inline-block;"><?php echo $thread['title']; ?></h3>
                </div>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if(!isset($_SESSION['siteusername'])){ $error = "you are not logged in"; goto skipcomment; }
                        if(!$_POST['comment']){ $error = "your comment cannot be blank"; goto skipcomment; }
                        if(strlen($_POST['comment']) > 1000){ $error = "your comment must be shorter than 1000 characters"; goto skipcomment; }
                        if(!isset($_POST['g-recaptcha-response'])){ $error = "captcha validation failed"; goto skipcomment; }
                        if(!$_user_insert_utils->validateCaptcha($config['recaptcha_secret'], $_POST['g-recaptcha-response'])) { $error = "captcha validation failed"; goto skipcomment; }
                        //if(ifBlocked(@$_SESSION['siteusername'], $user['username'], $conn)) { $error = "This user has blocked you!"; goto skipcomment; } 
                
                        $stmt = $conn->prepare("INSERT INTO `forum_replies` (toid, author, contents) VALUES (?, ?, ?)");
                        $stmt->bind_param("sss", $thread['id'], $_SESSION['siteusername'], $text);
                        $text = $_POST['comment'];
                        $stmt->execute();
                        $stmt->close();
                
                        skipcomment:
                    }
                ?>
                <div class="channel-box-no-bg">
                    <div class="comment-watch">
                        <img class="comment-pfp" src="/dynamic/pfp/<?php echo $_user_fetch_utils->fetch_user_pfp($thread['author']); ?>">
                        <span  style="display: inline-block; vertical-align: top;width: 575px;">
                            <span class="comment-info" style="display: inline-block;">
                                <b><a style="text-decoration: none;" href="/user/<?php echo htmlspecialchars($thread['author']); ?>">
                                    <?php echo htmlspecialchars($thread['author']); ?> 
                                </a></b> 
                                <span style="color: #666;">(<?php echo $_video_fetch_utils->time_elapsed_string($thread['date']); ?>)</span>
                            </span><br>
                            <span class="comment-text" style="display: inline-block;">
                                <?php echo $_video_fetch_utils->parseTextDescription($thread['contents']); ?>
                            </span>
                        </span>

                    </div>
                    <hr class="thin-line">
                    <?php if(!isset($_SESSION['siteusername'])) { ?>
                        <div class="comment-alert">
                            <a href="/sign_in">Sign In</a> or <a href="/create_account">Sign Up</a> now to reply!
                        </div>
                    <?php } else { ?>
                    <form method="post" action="" id="submitform">
                        <?php echo $error; ?>
                            <textarea 
                                onkeyup="textCounter(this,'counter',500);" 
                                class="comment-textbox" cols="32" id="com" style="width: 98%;"
                                placeholder="Reply to this thread" name="comment"></textarea><br><br> 
                            <input disabled class="characters-remaining" maxlength="3" size="3" value="500" id="counter"> <?php if(!isset($cLang)) { ?> characters remaining <?php } else { echo $cLang['charremaining']; } ?> 
                            <input type="submit" value="Post" class="g-recaptcha" data-sitekey="<?php echo $config['recaptcha_sitekey']; ?>" data-callback="onLogin">
                            <script>
                            function textCounter(field,field2,maxlimit) {
                                var countfield = document.getElementById(field2);
                                if ( field.value.length > maxlimit ) {
                                    field.value = field.value.substring( 0, maxlimit );
                                    return false;
                                } else {
                                    countfield.value = maxlimit - field.value.length;
                                }
                                }
                            </script>
                    </form>
                    <?php } ?>
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM forum_replies WHERE toid = ? ORDER BY id DESC");
                        $stmt->bind_param("s", $thread['id']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($comment = $result->fetch_assoc()) {
                    ?>
                        <hr class="thin-line">
                        <div class="comment-watch">
                            <img class="comment-pfp" src="/dynamic/pfp/<?php echo $_user_fetch_utils->fetch_user_pfp($comment['author']); ?>">
                            <span  style="display: inline-block; vertical-align: top;width: 575px;">
                                <span class="comment-info" style="display: inline-block;">
                                    <b><a style="text-decoration: none;" href="/user/<?php echo htmlspecialchars($comment['author']); ?>">
                                        <?php echo htmlspecialchars($comment['author']); ?> 
                                    </a></b> 
                                    <span style="color: #666;">(<?php echo $_video_fetch_utils->time_elapsed_string($comment['date']); ?>)</span>
                                </span><br>
                                <span class="comment-text" style="display: inline-block;">
                                    <?php echo $_video_fetch_utils->parseTextDescription($comment['contents']); ?>
                                </span>
                            </span>

                        </div>
                    <?php } 
                    if($result->num_rows == 0) {
                        echo "<br>There are no replies! Be the first one to reply.";
                    }
                    ?>
                </div>
            </div><br>
        </div>
        </div>
        <div class="www-core-container">
        <?php require($_SERVER['DOCUMENT_ROOT'] . "/static/module/footer.php"); ?>
        </div>

    </body>
</html>